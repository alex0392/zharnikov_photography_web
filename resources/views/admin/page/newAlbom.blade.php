@extends('admin.template')

@section('content')
<div class="form_newAlbom">
	<form role="form" action="{{ url('/albom') }}" method="POST">
	{{ csrf_field() }}
		<div class="form-group">
		   	<label for="exampleInputEmail1">Название альбома</label>
		   	<input type="text" class="form-control" id="inputNameAlbom" placeholder="Введите название альбома" name="nameAlbom">
		</div>
		<div class="form-group">
			<div class="form-group">
		  		<label>Тип альбома</label>
		  		<select class="form-control" name="typeAlbomList" id="selectTypeAlbom">
		  			<option disabled>Выбрать из списка</option>
		  			@foreach($albomTypeList as $type)
		  				<option>{{$type->albom_type}}</option>
		  			@endforeach
		  		</select>
		  	</div>
			<div class="checkbox">
				<label>Создать новый тип</label>
		      	<a class="btn btn-primary btn-xs" id="addNewType" role="button" data-toggle="collapse" href="#collapseNewTypeAlbom" aria-expanded="false" aria-controls="collapseNewTypeAlbom">on/off
		      	</a>
	    	</div>
			<div class="collapse form-group" id="collapseNewTypeAlbom">
				<label for="exampleInputEmail1">Новый тип альбома</label>
				<input type="text" class="form-control" id="inputNameAlbom" placeholder="Введите новый тип альбома" name="newTypeAlbom">
			</div>
		</div>
		<div class="form-group" style="border-top: 1pxs solid aliceblue;padding-top: 10px;">
	  		<button type="submit" class="btn btn-success">Добавить</button>
	  	</div>
	</form>
</div>
@stop

@section('script')
<script src="/src/admin/js/scriptAddAlbom.js"></script>
@stop