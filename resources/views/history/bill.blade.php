@extends('layouts.layoutAdmin')

@section('contend-header')
<h1>
    History
    <small>Bills</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('history') }}"><i class="fa fa-dashboard"></i> History</a></li>       
    <li><i class="fa fa-dashboard">Bills</i></li>    
</ol>            
</section>  
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title">
				List Bills
			</h3>
		</div>
		<div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          	<thead>          
	          	<tr>
	          		<th>Location</th>
		            <th>Date Time</th>
		            <th>Name Bills</th>   
		            <th>Code Bills</th>            
		            <th>Employee</th>
		            <th>Action</th>
		            <th>Product and Quanlity</th>
		            <th>Description</th>
	          	</tr>
          	</thead>
          	<tbody>
	         	
          	</tbody>         
        </table>
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