@extends('admin.template')
@section('style')
<link rel="stylesheet" href="/src/admin/css/alboms.css">
@stop
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<a class="btn btn-success" href="/admin/albom/new" role="button">Создать новый альбом</a>
		</div>
	</div>
    <section class="photo-box">
        <ul id="grid" class="grid effect-1"> 
			@foreach($albomList as $albom)
	        	<li>
	        		@if(empty($albom->avatar))
	            	<div class="img-box"><img src="/src/images/avatar.jpg" alt="not avatar"></div>
	            	@else
	            	<div class="img-box"><img src="/gellery/{{$albom->avatar}}" alt="{{$albom->albom_name}}"></div>
	            	@endif
	            	<div class="hover_text">
	              		<div class="holder">
	                		<div class="text"> 
	                  			<div class="title">{{$albom->albom_name}}</div>
		              			<input type="button" value="Редактировать" class='btn btn-info btn-xs editAlbom' data-toggle="modal" data-target="#modalEditAlbom" data-albomId="{{$albom->id}}" data-albomtype="{{$albom->albom_type}}" data-albomName="{{$albom->albom_name}}" style="position:absolute;left:10px;top:10px;z-index:10;">

								<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                  			<div class="link-block"><a href="/admin/albom/{{$albom->id}}" class="link-albom">открыть альбом</a></div>
		              			<form action="/albom/{{$albom->id}}" method="POST" style="position:absolute;right:10px;bottom:10px;z-index:10;">
		              				{{ method_field('DELETE') }}
		              				<input type="hidden" name="_token" value="{{ csrf_token() }}">
		              				<input type="submit" value="Удалить" class='btn btn-danger btn-xs'>
		              			</form>
	                		</div>
	              		</div>
	            	</div>
	          	</li>
			@endforeach
	</section>
	<div class="modal fade" id="modalEditAlbom" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Редактирование альбома</h4>
	      </div>
	      <form action="" method="POST" id="formEdit">
	      {{ method_field('PUT') }}
	      <input type="hidden" name="_token" value="{{ csrf_token() }}">
	      <div class="modal-body">
	        	<div class="form-group">
	        		<label for="nameAlbom">Название альбома</label>
	        		<p>Текущее название: <span id="nameActual" style="font-weight:bold;"></span></p>
					<input type="text" class="form-control" id="nameAlbom" name="nameAlbom" placeholder="albom name">
	        	</div>
	        	<div class="form-group">
	        		<label>Тип альбома</label>
	        		<p>Текущий тип: <span id="typeActual" style="font-weight:bold;"></span></p>
	        		<select class="form-control" name="typeAlbomList" id="selectTypeAlbom">
		  				<option disabled>Выбрать из списка</option>
		  				@foreach($albomTypeList as $type)
		  					<option>{{$type->albom_type}}</option>
		  				@endforeach
		  			</select>
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop

@section('script')
	<script src="/src/js/js/modernizr.custom.js"></script>
	<script src="/src/js/js/masonry.pkgd.min.js"></script>
	<script src="/src/js/js/imagesloaded.js"></script>
	<script src="/src/js/js/classie.js"></script>
	<script src="/src/js/js/AnimOnScroll.js"></script>
	<script>new AnimOnScroll( document.getElementById( 'grid' ), {minDuration : 0.4,maxDuration : 0.7,viewportFactor : 0.2} );</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.editAlbom').click(function(){
				var name=$(this).data();
				
				$('#nameActual').text(name.albomname);
				$('#typeActual').text(name.albomtype);
				$('#formEdit').attr('action','/albom/'+name.albomid);
			});
/*
			$('.toHome').click(function(){
				var data=$(this).data();
				var obj=$(this);
				token = $('input[name=_token]').val();
				var triger=(data.triger=='')?'1':'';
				$.ajax({
					url:'/albom/'+data.albomid+'/edit',
					headers: {'X-CSRF-TOKEN': token},
					type:'POST',
					data:{triger:triger},
					success:function(res){
						
						if(data.triger.length<1){
							obj.val('Убрать с главной');
							obj.attr('data-triger','1');
							obj.removeClass('btn-success');
							obj.addClass('btn-warning');
						}else{
							obj.val('Поместить на главную');
							obj.attr('data-triger','');
							obj.removeClass('btn-warning');
							obj.addClass('btn-success');							
						}
					}
				})
			})*/
		});
	</script>
@stop