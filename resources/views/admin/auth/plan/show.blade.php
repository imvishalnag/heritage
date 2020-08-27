@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Plan View</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Plan</li>
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
          <div class="col-md-12">
           <table id="plan_list" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Sl No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Interval</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection


@section("script")
<script type="text/javascript">
    $(function () {
    var i = 1;
    var table = $('#plan_list').DataTable({
        processing: true,
        serverSide: true,
        iDisplayLength: "50",
        ajax: "{{ route('admin.ajax.plan_list') }}",
        columns: [
            { "render": function(data, type, full, meta) {return i++;}},
            {data: 'name', name: 'name',searchable: true},
            {data: 'description', name: 'description',searchable: true},
            {data: 'price', name: 'price',searchable: true},
            {data: 'invoice_period', name: 'invoice_period',searchable: true},
            {data: 'invoice_interval', name: 'invoice_interval',searchable: true},
            {data: 'is_active', name: 'is_active', render:function(data, type, row){
                if (row.is_active == '1') {
                    return "<button class='btn btn-success rounded'>Active</a>"
                }else if(row.is_active == '2'){
                    return "<button class='btn btn-warning rounded'>Deactive</a>"
                }
            }},              
            {data: 'action', name: 'action',searchable: true}
        ]
    });
    
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