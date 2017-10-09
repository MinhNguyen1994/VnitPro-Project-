@extends('layouts.layoutAdmin')

@section('contend-header')
<h1>
    Products
    <small>{{ $data['dataProduct']['titleSmall']}}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('history') }}"><i class="fa fa-dashboard"></i> History</a></li>       
    <li><i class="fa fa-dashboard"></i>{{ $data['dataProduct']['titleMini'] }}</li>    
</ol>            
</section>  
@endsection