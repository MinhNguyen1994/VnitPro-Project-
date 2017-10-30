@extends('layouts.layoutAdmin')

@section('contend-header')
<h1>
    Home
    <small>Welcome</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>       
</ol>            
@endsection