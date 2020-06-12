@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Heritage Upload Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Heritage</li>
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
                <h3 class="card-title">Upload heritage file</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('heritage.store')}}" method="post" role="form" enctype="multipart/form-data" id="form">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Year</label>
                        <input  type="number" min="1900" max="2099" step="1" class="form-control" placeholder="E.g. 2020" name="year" value="{{old('year')}}" required="">
                        @if($errors->has('year'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('year') }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Month</label>
                        <select name="month" class="form-control" required="">
                          <option selected="" disabled="" value="">--SELECT MONTH--</option>
                            <option value='Janaury' {{ old('month') == 'Janaury' ? 'selected' : '' }}>Janaury</option>
                            <option value='February' {{ old('month') == 'February' ? 'selected' : '' }}>February</option>
                            <option value='March' {{ old('month') == 'March' ? 'selected' : '' }}>March</option>
                            <option value='April' {{ old('month') == 'April' ? 'selected' : '' }}>April</option>
                            <option value='May' {{ old('month') == 'May' ? 'selected' : '' }}>May</option>
                            <option value='June' {{ old('month') == 'June' ? 'selected' : '' }}>June</option>
                            <option value='July' {{ old('month') == 'July' ? 'selected' : '' }}>July</option>
                            <option value='August' {{ old('month') == 'August' ? 'selected' : '' }}>August</option>
                            <option value='September' {{ old('month') == 'September' ? 'selected' : '' }}>September</option>
                            <option value='October' {{ old('month') == 'October' ? 'selected' : '' }}>October</option>
                            <option value='November' {{ old('month') == 'November' ? 'selected' : '' }}>November</option>
                            <option value='December' {{ old('month') == 'December' ? 'selected' : '' }}>December</option>
                        </select>
                        @if($errors->has('month'))
                          <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $errors->first('month') }}</strong>
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