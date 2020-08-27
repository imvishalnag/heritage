@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Member Subscription</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Member Subscription List</li>
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
           <table id="member_subscription_list" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Sl No</th>
                <th>User Name</th>
                <th>Plan Name</th>
                <th>Plan Started From</th>
                <th>Plan Ends</th>
                <th>Plan Expire Status</th>
                <th>Remaining Days</th>
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
    var table = $('#member_subscription_list').DataTable({
        processing: true,
        serverSide: true,
        iDisplayLength: "50",
        ajax: "{{ route('admin.ajax.member_subscription_list') }}",
        columns: [
            { "render": function(data, type, full, meta) {return i++;}},
            {data: 'user_name', name: 'user_name',searchable: true},
            {data: 'plan_name', name: 'plan_name',searchable: true},
            {data: 'starts_at', name: 'starts_at',searchable: true},
            {data: 'ends_at', name: 'ends_at',searchable: true},
            {data: 'expire_status', name: 'expire_status', render:function(data, type, row){
                if (row.expire_status == '1') {
                    return "<button class='btn btn-success rounded'>Running</a>"
                }else if(row.expire_status == '2'){
                    return "<button class='btn btn-warning rounded'>Expired</a>"
                }
            }},
            {data: 'remaining_days', name: 'remaining_days',searchable: true},
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