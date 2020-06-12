@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Magazine Update Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Magazine</li>
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
                <h3 class="card-title">Update Magazine Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('magazine.update', ['id' => $id])}}" method="post" role="form" enctype="multipart/form-data" id="form">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Title</label>
                        <input  type="text" class="form-control" placeholder="Book title" name="title" value="{{old('title') ?? $title}}" required="">
                        @if($errors->has('title'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('title') }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Price</label>
                        <input  type="number" min="1" class="form-control" placeholder="E.g. 200" name="price" value="{{old('price') ?? $price}}" required="">
                        @if($errors->has('price'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('price') }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputFile">Writer</label>
                        <input  type="text" class="form-control" placeholder="Author name" name="author" value="{{old('author') ?? $author}}" required="">
                        @if($errors->has('author'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('author') }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputFile">Thumbnail (<small class="text-warning">Leave it if you don't want to update the thumbnail</small>)</label>
                        <div class="input-group">
                          <input type="file" class="form-control" name="file" style="height: auto;" id="imgInp">
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
                        <img id="old_file" src="{{asset('assets/magazine/'.$file.'')}}" alt="" width="100%">
                        <h4 class="old-new" style="background: #ff8100;">Old</h4>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <img id="new_file" src="{{asset('backend/admin/dist/img/image_plaholder.jpg')}}" alt="" width="100%" style="max-height: 140px;width: auto;max-width: 100%;">
                        <h4 class="old-new" style="background: #33d057;">New</h4>
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

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
          
        reader.onload = function (e) {
          $('#new_file').attr('src', e.target.result);
          $('#old_file').css('opacity', '0.5');
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