@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1244.06px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Members View</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Members</li>
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
           <table id="member_list" class="table table-striped table-bordered dt-responsive wrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Sl No</th>
                <th>User Name</th>
                <th>Name</th>
                <th>email</th>
                <th>Phone</th>
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
    var table = $('#member_list').DataTable({
        processing: true,
        serverSide: true,
        iDisplayLength: "50",
        ajax: "{{ route('admin.ajax.member_data_list') }}",
        columns: [
            { "render": function(data, type, full, meta) {return i++;}},
            {data: 'username', name: 'username',searchable: true},
            {data: 'name', name: 'name',searchable: true},
            {data: 'email', name: 'email',searchable: true},
            {data: 'phone', name: 'phone',searchable: true},
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