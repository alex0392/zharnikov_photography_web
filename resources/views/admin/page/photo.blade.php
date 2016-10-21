@extends('admin.template')
@section('style')
<link rel="stylesheet" href="/src/admin/css/alboms.css">
@stop
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<a class="btn btn-default" href="/admin/albom/{{$albomId}}/addPhoto" role="button">Добавить фотографии</a>
		</div>
	</div>
	@if(empty($photoList))
	<div style="color:#fff;margin:20px 0;font-size:1.5rem;">Нету загруженных фотографий</div>
	@else
    <section class="photo-box">
        <ul id="grid" class="grid effect-1"> 
			@foreach($photoList as $photo)
	        	<li>
	            	<div class="img-box"><img src="/gellery/{{$photo->name}}" alt="{{$photo->name}}"></div>
	            	<div class="hover_text">
	              		<div class="holder">
	              			@if(!($photo->avatarAlbom))
	              			<form action="/photo/{{$photo->albom}}" method="POST">
	              				{{ method_field('PUT') }}
	              				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	              				<input type="hidden" name="photoName" value="{{$photo->name}}">
	              				<input type="submit" value="Сделать заглавной" class='btn btn-default' style='margin-left:10px;margin-top:20px;'>
	              			</form>
	              			@else
	              				<input type="button" value="Заглавная" class='btn btn-success' style='margin-left:10px;margin-top:20px;' disabled>
	              			@endif
		              		@if(isset($photo->homePage) && $photo->homePage!='')
		              			<input type="button" value="Убрать с главной" class='btn btn-warning btn-xs toHome' data-photoId="{{$photo->id}}" data-triger="1" style="position:absolute;right:10px;top:10px;z-index:10;">
		              		@else
		              			<input type="button" value="Поместить на главную" class='btn btn-success btn-xs toHome' data-photoId="{{$photo->id}}" data-triger="" style="position:absolute;right:10px;top:10px;z-index:10;">
		              		@endif
	              			<form action="/photo/{{$photo->id}}" method="POST">
	              				{{ method_field('DELETE') }}
	              				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	              				<input type="hidden" name="albomId" value="{{$photo->albom}}">
	              				<input type="hidden" name="photoName" value="{{$photo->name}}">
	              				<input type="submit" value="Удалить" class='btn btn-danger btn-xs' style='position:absolute;bottom:5%;right:10%;'>
	              			</form>
	              			<!--<a class="btn btn-danger" href="photo/" role="button" style="position:absolute;bottom:5%;right:10%;">Удалить</a>-->
	              		</div>
	            	</div>
	          	</li>
			@endforeach
	</section>
	@endif
@stop
@section('script')
	<script src="/src/js/js/modernizr.custom.js"></script>
	<script src="/src/js/js/masonry.pkgd.min.js"></script>
	<script src="/src/js/js/imagesloaded.js"></script>
	<script src="/src/js/js/classie.js"></script>
	<script src="/src/js/js/AnimOnScroll.js"></script>
	<script>new AnimOnScroll( document.getElementById( 'grid' ), {minDuration : 0.4,maxDuration : 0.7,viewportFactor : 0.2} );
			$('.toHome').click(function(){
				var data=$(this).data();
				var obj=$(this);
				token = $('input[name=_token]').val();
				console.log(data.photoid);
				var triger=(data.triger=='')?'1':'';
				$.ajax({
					url:'/photo/'+data.photoid+'/edit',
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
			})
	

	</script>
@stop