@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery Upload Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gallery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 offset-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Upload Gallery</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('gallery.individual.store')}}" method="post" role="form" enctype="multipart/form-data" id="form">
                @method('PUT')
                @csrf
               <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputFile">State</label>
                      <select name="state" id="state2" class="form-control" required="">
                        <option value="" selected="" disabled="">--SELECT STATE--</option>
                        <option value="Arunachal Pradesh" {{ old('state') == 'Arunachal Pradesh' ? 'selected' : '' }}>Arunachal Pradesh</option>
                        <option value="Assam" {{ old('state') == 'Assam' ? 'selected' : '' }}>Assam</option>
                        <option value="Manipur" {{ old('state') == 'Manipur' ? 'selected' : '' }}>Manipur</option>
                        <option value="Meghalaya" {{ old('state') == 'Meghalaya' ? 'selected' : '' }}>Meghalaya</option>
                        <option value="Mizoram" {{ old('state') == 'Mizoram' ? 'selected' : '' }}>Mizoram</option>
                        <option value="Nagaland" {{ old('state') == 'Nagaland' ? 'selected' : '' }}>Nagaland</option>
                        <option value="Sikkim" {{ old('state') == 'Sikkim' ? 'selected' : '' }}>Sikkim</option>
                        <option value="Tripura" {{ old('state') == 'Tripura' ? 'selected' : '' }}>Tripura</option>
                      </select>
                      @if($errors->has('state'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                          <strong>{{ $errors->first('state') }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputFile">Tribe</label>
                      <select name="tribe" id="tribe_update" class="form-control" required="">
                        <option value="" selected="" disabled="">--SELECT TRIBE--</option>
                      </select>
                      @if($errors->has('tribe'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                          <strong>{{ $errors->first('tribe') }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputFile">Caption</label>
                      <input  type="text" class="form-control" placeholder="Enter Caption" name="caption" value="{{old('caption')}}">
                      @if($errors->has('caption'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                          <strong>{{ $errors->first('caption') }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <input type="file" class="form-control" name="file[]" style="height: auto;" id="imgInp" multiple="" required="">
                        @if($errors->has('file'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('file') }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <img id="new_file" src="{{asset('backend/admin/dist/img/image_plaholder.jpg')}}" alt="" width="100%">
                      <h4 class="old-new" style="background: #c3c3c3;">preview</h4>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <p class="file_count"></p>
                  </div>
                </div>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('loader')
<div class="loader-loading">
  <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
</div>
@endsection

@section('msg')
<div class="msg_box">
  <center class="msg">
    @if(session()->has('msg'))
      <b>{!! session()->get('msg') !!}</b>
    @endif
  </center>
</div>
@endsection

@section('script')
<script>
  function readURL(input) {
    if(input.files.length > 10){
        alert("you can select max 10 files at a time.");
        $('#imgInp').val('');
        $('#new_file').attr('src', '../../../backend/admin/dist/img/image_plaholder.jpg');
        $('.old-new').css('background', '#c3c3c3');
        $('.file_count').css('opacity', '0');
    }
    
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        
      reader.onload = function (e) {
        $('#new_file').attr('src', e.target.result);
        $('.old-new').css('background', '#33d057');
        $('.file_count').css('opacity', '1');
        if(input.files.length > 1){
          file_count = input.files.length - 1;
        } else {
          $('.file_count').css('opacity', '0');
        }
        $('.file_count').html('+' + file_count  + ' more selected');
      } 
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  $("#imgInp").change(function(){
      readURL(this);
  });

    // ajax script

    $(document).ready(function() {
     var state= $('#state2').val();
     if (state != null) {
      $('.loader-loading').css('display', 'block');
      $("#form :input").prop("disabled", true);
      $.ajax({
      type: "POST",
      url: '{{route('gallery.individual.get_tribe_based_on_state')}}',
      data: {
         _token: "{{csrf_token()}}",
        "state":state,
      },
      success: function(response){
        $('#tribe_update').html(response);
        $("#form :input").prop("disabled", false);
        $('.loader-loading').css('display', 'none');

       }
    });
     }
    });

  $('#state2').change(function(){
    var state= $(this).val();
    $('.loader-loading').css('display', 'block');
    $("#form :input").prop("disabled", true);
     $.ajax({
      type: "POST",
      url: '{{route('gallery.individual.get_tribe_based_on_state')}}',
      data: {
         _token: "{{csrf_token()}}",
        "state":state,
      },
      success: function(response){
        $('#tribe_update').html(response);
        $("#form :input").prop("disabled", false);
        $('.loader-loading').css('display', 'none');

       }
    });
  });
  $("#form").on("submit", function(e){
     $("#overlay").addClass("progress-bar-overlay");
     $('#custom-progress-bar').css({transform: 'scale(1) translate(-50%, 50%)'});
 });
</script>
@endsection