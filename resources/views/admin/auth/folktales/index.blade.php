@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Folk Tale Upload Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Folk Tales</li>
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
                <h3 class="card-title">Upload Folk tale</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('folk_tales.store')}}" method="post" role="form" enctype="multipart/form-data" id="form">
                @method('PUT')
                @csrf
               <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputFile">State</label>
                      <select name="state" class="form-control" required="">
                        <option value="" selected="" disabled="">--SELECT STATE--</option>
                        <option value="Arunachal Pradesh" {{old('state') == 'Arunachal Pradesh' ? 'selected' : ''}}>Arunachal Pradesh</option>
                        <option value="Assam" {{old('state') == 'Assam' ? 'selected' : ''}}>Assam</option>
                        <option value="Manipur" {{old('state') == 'Manipur' ? 'selected' : ''}}>Manipur</option>
                        <option value="Meghalaya" {{old('state') == 'Meghalaya' ? 'selected' : ''}}>Meghalaya</option>
                        <option value="Mizoram" {{old('state') == 'Mizoram' ? 'selected' : ''}}>Mizoram</option>
                        <option value="Nagaland" {{old('state') == 'Nagaland' ? 'selected' : ''}}>Nagaland</option>
                        <option value="Sikkim" {{old('state') == 'Sikkim' ? 'selected' : ''}}>Sikkim</option>
                        <option value="Tripura" {{old('state') == 'Tripura' ? 'selected' : ''}}>Tripura</option>
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
                      <label for="exampleInputFile">Heading</label>
                      <input  type="text" min="1900" max="2099" step="1" class="form-control" placeholder="Enter heading" name="heading" value="{{old('heading')}}" required="">
                      @if($errors->has('heading'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                          <strong>{{ $errors->first('heading') }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <input type="file" class="form-control" name="file" style="height: auto;" required="">
                        @if($errors->has('file'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('file') }}</strong>
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