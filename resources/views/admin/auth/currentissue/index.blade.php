@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Current Issue Upload Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Current Issue</li>
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
          <div class="col-md-10 offset-md-1">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Upload Current Issue Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('current_issue.store')}}" method="post" role="form" enctype="multipart/form-data" id="form">
                @method('PUT')
                @csrf
               <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Heading</label>
                      <input  type="text" class="form-control" placeholder="Enter Heading" name="heading" value="{{old('heading')}}" style="height: 44px;" required="">
                      @if($errors->has('heading'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                          <strong>{{ $errors->first('heading') }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-0">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <input type="file" class="form-control" name="file"  id="imgInp" style="height: auto;" required="">
                        @if($errors->has('file'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('file') }}</strong>
                          </span>
                        @enderror
                      </div>
                      <img class="pt-1" id="new_file2" src="#" alt="" width="68">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputFile">Description</label>
                      <div class="input-group">
                        <textarea id="editor1" name="description" class="form-control" value="{{old('editor1')}}">{{old('description')}}</textarea>
                        @if($errors->has('description'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('description') }}</strong>
                          </span>
                        @enderror
                      </div>
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
    CKEDITOR.replace( 'editor1' );
    $("#form").on("submit", function(e){
     $("#overlay").addClass("progress-bar-overlay");
     $('#custom-progress-bar').css({transform: 'scale(1) translate(-50%, 50%)'});
    });
    function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        
      reader.onload = function (e) {
        $('#new_file2').attr('src', e.target.result);
      } 
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  $("#imgInp").change(function(){
      readURL(this);
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