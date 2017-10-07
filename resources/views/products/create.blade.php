@extends('layouts.layoutAdmin')

@section('contend-header')
<h1>
    Products
    <small>{{ $data['dataProduct']['titleSmall']}}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('product') }}"><i class="fa fa-dashboard"></i> Product</a></li>       
    <li><i class="fa fa-dashboard"></i>{{ $data['dataProduct']['titleMini'] }}</li>    
</ol>            
</section>  
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">

@endsection

@section('content')

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $data['dataProduct']['titlePage'] }}</h3>
    </div>       
    
    <div class="box box-body">
        <form role="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Name Product</label>
                <input type="text" class="form-control" placeholder="Enter..." name="name" value="{{ $data['dataProduct']['name_product'] }}">
                <div>           

                    <label class="control-label" for="inputError" style="color:red">
                        @if($errors->has('name'))
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('name') }}
                        @endif
                    </label>
                </div>                
            </div>          
            <div class="form-group">
                <div>
                    <label>Code Product</label>
                </div>                                              
                <input type="text" class="form-control" placeholder="Enter..." name="code" value="{{ $data['dataProduct']['code_product'] }}">
                <div>
                    <label class="control-label" for="inputError" style="color:red">
                        @if($errors->has('code'))
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('code') }}
                        @endif
                    </label>
                </div>                  
            </div>
            <div class="form-group">                
                <div class="row">                    
                    <div class="col-xs-4 col-md-2">
                        <div>
                            <label>Quanlity</label>
                        </div>
                        <input type="number" name="quanlity" class="form-control" value="{{ $data['dataProduct']['quanlity'] }}">
                    </div>
                    <div class="col-xs-5 col-md-3">
                        <div class="row">
                            <div class="container">
                                <label>Unit</label>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-md-8">
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected disabled>Choose a Unit</option>        
                                    @foreach($data['dataUnit'] as $d)
                                        <option>{{ $d->name }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="col-xs-4 col-md-4">
                                <a href="" class="btn btn-warning" id="newUnit">New</a>
                            </div>   
                        </div>                                   
                    </div>
                                                             
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label>Description</label>
                </div>
                <textarea class="form-control" placeholder="Say something..." rows="4" name="description">{{ $data['dataProduct']['description'] }}</textarea>
                <div>
                    <label class="control-label" for="inputError" style="color:red">
                        @if($errors->has('description'))
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('description') }}
                        @endif
                    </label>
                </div>
            </div>  

            <div class="form-group">
                <button class="btn btn-warning" name="submit">Done, Do it !</button>                
            </div>
                    
        </form>
    </div>
</div>

@endsection('content')

@section('javascript')
<!-- <script type="text/javascript">
    $('#newUnit').on('click',function(){
       $.ajax({
            url: '/group/unit',
            type: 'GET',
       });
    });
</script> -->

@endsection

