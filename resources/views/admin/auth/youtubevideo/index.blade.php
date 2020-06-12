@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>YouTube Video Upload Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">YouTube Video</li>
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
                <h3 class="card-title">Upload YouTube Video</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('youtube_video.store')}}" method="post" role="form" enctype="multipart/form-data" id="form">
                @method('PUT')
                @csrf
               <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputFile">Video Code</label>
                      <input  type="text" class="form-control" placeholder="Enter 11 digit video code (see below screenshot for reference)" name="code" value="{{old('code')}}" required="">
                      @if($errors->has('code'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                          <strong>{{ $errors->first('code') }}</strong>
                        </span>
                      @enderror
                    </div>
                    <img class="img-responsive" src="{{asset('backend/admin/dist/img/code.jpg')}}"  width="100%" style="border: 1px solid #c7c7c7;margin-bottom: 5px;" alt="video code reference">
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputFile">Heading</label>
                      <div class="input-group">
                        <input type="text" class="form-control" value="{{old('heading')}}" name="heading" placeholder="Enter video heading" required="">
                        @if($errors->has('heading'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('heading') }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputFile">Thumbnail</label>
                      <div class="input-group">
                        <input type="file" class="form-control" name="file" required="" style="height: auto;" id="imgInp">
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
                        <img id="new_file" src="{{asset('backend/admin/dist/img/image_plaholder.jpg')}}" alt="" width="100%" style="max-height: 140px;width: auto;max-width: 100%;">
                        <h4 class="old-new" style="background: #c3c3c3;">PREVIEW</h4>
                      </div>
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

@section('script')
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        
      reader.onload = function (e) {
        $('#new_file').attr('src', e.target.result);
        $('.old-new').css('background', '#33d057');
      }
        
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  $("#imgInp").change(function(){
      readURL(this);
  });
$("#form").on("submit", function(e){
     $("#overlay").addClass("progress-bar-overlay");
     $('#custom-progress-bar').css({transform: 'scale(1) translate(-50%, 50%)'});
});
</script>
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