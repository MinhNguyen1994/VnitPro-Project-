@extends('layouts.layoutAdmin')

@section('titlePage','Locations')

@section('titlePageSmall','List')

@section('titleMenu','Locations')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">	
    <div class="box box-primary">
      <div class="box-header with-border">
        <h2 class="box-title">List of Locations</h2>
      </div>
      <!-- /.box-header -->
      <div>
        <a href="/location/create"><button class="btn btn-primary">Create New Location</button></a>
        <label>
          @if(Session::has('success'))
            <p style="color: red;font-weight: bold">{{ Session::get('success') }}</p>
          @endif
        </label>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>          
          <tr>
            <th>Name</th>            
            <th>Address</th>            
            <th>Description</th>
            <th>Time Create</th>
            <th>Action</th>            
          </tr>
          </thead>
          <tbody>
          @foreach($data as $value)
          <tr>
            <td>{{ $value->name_warehouse }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->address }}</td>
            <td>{{ $value->create_at }}</td>
            <td>
                <a href="location/edit/{{ $value->id}}">Edit </a> | 
                <a href="location/delete/{{$value->id}}"> Delete</a>
            </td>
          </tr>
          @endforeach
          </tbody>          
          
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
	
@endsection

@section('javascript')
<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection


