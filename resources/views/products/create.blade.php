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
<style type="text/css">
    #popupForm{
        position: fixed;        
        top: 20%;
        left: 40%;        
        width: 350px;
        height: auto;              
        border: 3px solid gray;
        border-radius:10px;
        background: #e6f2ae;
        display: none;                
    }    
</style>

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
                                <select class="form-control select2" style="width: 100%;" name="unit">                                   
                                    @foreach($data['dataUnit'] as $d)
                                        @if($d->name == $data['dataProduct']['unit'])
                                        <option value="{{ $d->id }}" selected>{{ $d->code }}</option>
                                        @else
                                        <option value="{{ $d->id }}">{{ $d->code }}</option>
                                        @endif
                                    @endforeach
                                </select> 
                            </div>
                            <div class="col-xs-4 col-md-4">
                                <a class="btn btn-warning" id="newUnit">New</a>
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
                <div>
                    <label>Group Product</label>
                </div>
                <div class="row">
                    <div class="col-xs-5 col-md-3">
                        <select class="form-control select2" name="productGroup">                    
                            @foreach($data['dataGroup'] as $d)
                                @if($d->id == $data['dataProduct']['id_product_group'])
                                    <option value="{{ $d->id }}" selected>{{ $d->name_product_group }}</option>
                                @else
                                    <option value="{{ $d->id }}">{{ $d->name_product_group }}</option>
                                @endif
                            @endforeach                    
                        </select>
                    </div>
                </div>                
            </div>  
            <div class="form-group">
                <button type="submit" class="btn btn-warning" name="formProduct" value="Save">Done, Do it !</button>                
            </div>                   
        </form>
    </div>
</div>
<div id="popupForm" class="box box-warning">    
    <div class="box-header" style="text-align: center;">
        <h3 class="box-title" style="font-weight: bold;font-size: 20px">NEW UNIT</h3>
    </div>
    <div class="box box-body box-primary" style="background: #e6f2ae">
        <form role="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name_unit" class="form-control">
            </div>
            <div class="form-group">
                <label>Code</label>
                <input type="text" name="code_unit" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description_unit" class="form-control">
            </div>
            <div class="form-group">                
                <div class="row">
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success" name="formUnit" style="width: 100%;" id="UnitSubmit" value="Save">Save</button>
                    </div>
                    <div class="col-xs-6">
                        <a class="btn btn- btn-danger" style="width: 100%;" id="cancel">Cancel</a>
                    </div>
                </div>                
            </div>            

        </form>
    </div>
</div>

@endsection('content')

@section('javascript')
<script type="text/javascript">
        $('#newUnit').on('click',function(){
            $('#popupForm').css('display','block');            
        });
        $('#cancel').on('click',function(){
            $('#popupForm').css('display','none');
        });        
    
</script>


@endsection

