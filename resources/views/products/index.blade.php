@extends('layouts.layoutAdmin')

@section('contend-header')
<h1>
    Products
    <small>List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><i class="fa fa-dashboard"></i> Product</li>      
</ol>            
</section>  
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">	
    <div class="box box-warning">
      <div class="box-header with-border">
        <h2 class="box-title">Products</h2>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <a href="{{ route('product.create') }}"><button class="btn btn-warning">Create New Product</button></a>
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
            <th>Code Group</th>
            <th>Unit</th>
            <th>Description</th>    
            <th>Group</th>
            <th>Created Time</th>
            <th>Updated Time</th>
            <th>Action</th>            
          </tr>
          </thead>
          <tbody>
          @foreach($data as $value)            
          <tr>
            <td>{{ $value->name_product }}</td>            
            <td>{{ $value->code_product }}</td>
            <td>{{ $value->unit->name }}</td>                      
            <td>{{ $value->description }}</td>
            <td>{{ $value->product_group->name_product_group}}</td>            
            <td>{{ $value->created_at }}</td>
            <td>{{ $value->updated_at }}</td>
            <td>
                <a href="{{ route('product.edit',['id' => $value->id]) }}">Edit </a> | 
                <a href="{{ route('product.delete',['id' => $value->id]) }}"> Delete</a>
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
