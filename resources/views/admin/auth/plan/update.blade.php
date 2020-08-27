@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Plan Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Plan</li>
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
                <h3 class="card-title">Update Plan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('plan.update')}}" method="post" role="form" id="form">
                <input type="hidden" value="{{ $plan->id }}" name="plan_id">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputFile">Plan Name</label>
                          <input  type="text" class="form-control" placeholder="Plan Name" name="title" value="{{$plan->name}}" required="">
                          @if($errors->has('title'))
                            <span class="invalid-feedback" role="alert" style="color:red">
                              <strong>{{ $errors->first('title') }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputFile">Plan Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter Plan Description">{{ $plan->description }}</textarea>  
                            @if($errors->has('description'))
                              <span class="invalid-feedback" role="alert" style="color:red">
                                <strong>{{ $errors->first('description') }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputFile">Plan Rule</label>
                            <textarea name="rule" class="form-control" placeholder="Enter Plan Rule">{{ $plan->rule }}</textarea>  
                            @if($errors->has('rule'))
                              <span class="invalid-feedback" role="alert" style="color:red">
                                <strong>{{ $errors->first('rule') }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputFile">Price</label>
                          <input  type="number" class="form-control" placeholder="Price" name="price" value="{{$plan->price}}" required="">
                          @if($errors->has('price'))
                            <span class="invalid-feedback" role="alert" style="color:red">
                              <strong>{{ $errors->first('price') }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputFile">Currency</label>
                          <div class="input-group">
                            <input type="text" class="form-control" name="currency" value="{{ $plan->currency }}" placeholder="Enter Currency">
                            @if($errors->has('currency'))
                              <span class="invalid-feedback" role="alert" style="color:red">
                                <strong>{{ $errors->first('currency') }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputFile">Invoice Period</label>
                          <div class="input-group">
                            <input type="text" class="form-control" value="{{ $plan->invoice_period }}"name="invoice_period">
                            @if($errors->has('invoice_period'))
                              <span class="invalid-feedback" role="alert" style="color:red">
                                <strong>{{ $errors->first('invoice_period') }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputFile">Invoice Interval</label>
                          <div class="input-group">
                            <input type="text" class="form-control" value="{{ $plan->invoice_interval }}"name="invoice_interval">
                            @if($errors->has('invoice_interval'))
                              <span class="invalid-feedback" role="alert" style="color:red">
                                <strong>{{ $errors->first('invoice_interval') }}</strong>
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