@extends('layouts.layoutAdmin')

@section('contend-header')
<h1>
    DataBase
    <small>Import</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('import') }}"><i class="fa fa-dashboard"></i> Import</a></li>    
    
</ol>            
</section>  
@endsection

@section('css')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
        <h3 class="box-title">Choose File Import</h3>
  </div> 
  <div class="box-body">
  	<form role="form" method="POST" enctype="multipart/form-data" >
  		{{ csrf_field() }}
        	<div class="box-body">        
          	<div class="form-group">
            		<label for="exampleInputFile">File input</label>
            		<input type="file" id="exampleInputFile" name="file">
            		<p class="help-block" style="color:red;font-weight:bold">{{ Session::get('status') }}</p>
          	</div>
          	<div class="checkbox">              
              <div class="form-group">
                <div class="form-group">
                  <label>
                    <input type="radio" name="location" class="iradio_minimal-blue" value="City">                    
                  </label>
                  <label style="font-weight: 700">City</label>                
                </div>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label>
                    <input type="radio" name="location" class="iradio_minimal-blue" value="District">                    
                  </label>
                  <label style="font-weight: 700">District</label>                
                </div>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label>
                    <input type="radio" name="location" class="iradio_minimal-blue" value="Ward">                    
                  </label>
                  <label style="font-weight: 700">Ward</label>                
                </div>
              </div>            		
        	</div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary" name="submit" style="margin:0px 1%">Import</button>          
        </div>       
      </form>  
  </div>
</div>
<div class="box box-danger">
  <div class="box-header with-border">
      <div class="col-xs-6"><h3 class="box-title">Show Information Database</h3></div>     
  </div>
  <div class="box-body">
      <div class="col-xs-4">
        <div class="box-header">
          <h3 class="box-title">Cities</h3>
        </div>            
        <select class="form-control select2" style="width: 100%;" id="city" name="city">                                       
          <option value="0" selected disabled>Choose a City</option>
          @foreach($city as $c)
            <option value="{{$c->code_city}}">{{$c->name_city}}</option> 
          @endforeach                               
        </select>                                   
      </div>
      <div class="col-xs-4">
        <div class="box-header">
          <h3 class="box-title">Districts </h3>
        </div>
        <select class="form-control select2" style="width: 100%;" id="district" name="district">
          <option value="0" selected>Must Choose City</option>      
        </select>
      </div>
      <div class="col-xs-9" style="margin-top: 2%">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Wards</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Numberic</th>
                  <th>Name</th>                 
                  <th>Code ward</th>
                  <th>Description</th>                  
                </tr>
                </thead>
                <tbody id="ward">

                </tbody>                
              </table>
            </div>            
          </div>
      </div>
  </div> 
</div>

@endsection

@section('javascript')
<script type="text/javascript">
  $('#city').change(function(){              
    var code_city = $('#city').val();    
    $.ajax({
      url: '/ajax-district',
      type: 'GET',
      data: {'code_city': code_city},
      dataType:'json',
      success: function(district){                                                               
        $('#district').empty();
            $('#district').append('<option value="0" selected disabled>Choose a District</option>');
        $.each(district, function(create,districtObj){
          $('#district').append('<option value="'+districtObj.code_district+'">'+districtObj.name_district+'</option>');
        });       
      }

    });
  });
  $('#district').change(function(){
    var code_district = $('#district').val();
    $.ajax({
      url: '/ajax-ward',
      type: 'GET',
      data: {'code_district': code_district},
      dataType: 'json',
      success: function(ward){        
        $('#ward').empty();
        var i = 0;                        
        $.each(ward,function(create,wardObj){
          i = i+1;
          $('#ward').append('<tr><td>'+i+'</td><td>'+wardObj.name_ward+'</td><td>'+wardObj.code_ward+'</td><td>'+wardObj.description+'</td></tr>');
        });
      }
    });
  });
</script>
@endsection





