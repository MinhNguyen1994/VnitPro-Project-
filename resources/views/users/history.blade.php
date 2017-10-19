
@extends('users.layoutUser')

@section('contend-header')
<h1>
    User
    <small>History</small>
</h1>           
</section>  
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
	.history{
		margin: 5px 0px;
	}
	.historyTitle{
		position: relative;
		width: 100%;
		border: 2px solid black;
	}
	.title{
		float: left;
	}
	.icon{
		float: right;		
	}	
	.rotateRight{
		transform: rotate(-90deg);
		-moz-transform: rotate(-90deg);
    	-webkit-transform: rotate(-90deg);
    	-o-transform: rotate(-90deg);
		transition-duration: 0.5s;
	}
	.rotateLeft{
		transform: rotate(0deg);
		-moz-transform: rotate(0deg);
    	-webkit-transform: rotate(0deg);
    	-o-transform: rotate(0deg);
		transition-duration: 0.5s;
	}
	.historyContent{
		width: 100%;		
		display: none;
		border: 1px solid black;		
	}
	.labelHistoryContent{
		color: black;
		font-weight: bolder;
	}	
</style>
@endsection

@section('content')
	<div class="box box-danger">
		<div class="box box-header">
			<h3 class="box-title">Detail Bills</h3>
		</div>
		<div class="box-body">			
			@foreach($data as $key => $value)								
				<div class="col-md-4 col-xs-12 col-sm-6 history">
					<div class="historyTitle btn btn-primary" >
						<div class="title">{{ $key + 1 }}. {{ $value->name }} ( {{ $value->created_at }} )</div>
						<div class="icon"><i class="fa fa-angle-double-left"></i></div>
					</div>
					<div class="historyContent btn btn-info" style="text-align: left;">
						<div>
							<label class="labelHistoryContent">Code Bill : </label> {{ $value->code }}							
						</div>
						<div>
							<label class="labelHistoryContent">Location : </label> {{ $value->warehouse->name_warehouse }}
						</div> 
						<div>
							<label class="labelHistoryContent">Employee : </label> {{ $value->user->name }}
						</div>
						<div>
							<label class="labelHistoryContent">Action :</label> 							
								@if($value->action == 0)
									<strong style="color: orange">Import to warehouse</strong>
								@endif															
						</div>
						<div>
							<label class="labelHistoryContent">Detail Products :</label>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Name</th>
										<th>Code</th>
										<th>Quanlity</th>
										<th>Unit</th>
									</tr>
								</thead>
								<tbody>
									@foreach($value->product as $val)																			
										<tr>
											<td>{{ $val->name_product }}</td>
											<td>{{ $val->code_product }}</td>
											<td>{{ $val->pivot->quanlity_change }}</td>
											<td>{{ $val->unit_id }}</td>
										</tr>
									@endforeach
								</tbody>
								
							</table>
						</div>
					</div>					
				</div>
				
			@endforeach
		</div>
	</div>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
	$('.history').on('click',function(){		
		$('.historyTitle').removeClass('btn-success').addClass('btn-primary');
		$(this).children('.historyTitle').removeClass('btn-primary').addClass('btn-success');
		$('.rotateRight').removeClass('rotateRight').addClass('rotateLeft');
		$(this).children('.historyTitle').children('.icon').removeClass('rotateLeft').addClass('rotateRight');
		$('.historyContent').fadeOut('fast')
		$(this).children('.historyContent').fadeIn('slow');
			
	});
	
});
</script>
	
@endsection