@extends('layouts.layoutAdmin')

@section('contend-header')
<h1>
    Product Groups
    <small>List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('product') }}"><i class="fa fa-dashboard"></i> Product</a></li>   
    <li><i class="fa fa-dashboard"></i> Product Group</li>   
</ol>            
</section>  
@endsection

@section('content')
	<div class="box box-warning">
		<?php echo "Today is".date('h:i:sa')." ".date('d/m/Y'); ?>
	</div>
@endsection
