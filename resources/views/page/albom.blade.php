@extends('template')
@section('title')
{{$title}}
@stop
@section('style')
	<link rel="stylesheet" href="/src/css/albom.css">
	<link rel="stylesheet" href="/src/css/component.css">
@stop
@section('content')
	<div id="grid-gallery" class="grid-gallery">
         <div class="titlePage">
         	<h2>{{$title}}</h2>
        </div>
		<section class="grid-wrap">
			<ul class="grid">
				<li class="grid-sizer"></li>
				@foreach($photoList as $photo)
		        <li>
		        	<figure>
		        		<img src="/gellery/{{$photo->name}}" alt="{{$photo->name}}">
		        	</figure>
				</li>
				@endforeach
		 	</ul>
		 </section>
		<section class="slideshow">
			<ul>
				@foreach($photoList as $photo)
					<li>
						<figure>
							<img src="/gellery/{{$photo->name}}" alt="{{$photo->name}}">
						</figure>
					</li>
				@endforeach
			</ul>
			<nav><span class="icon nav-prev"></span><span class="icon nav-next"></span><span class="icon nav-close"></span></nav>
		</section>
	</div>
@stop
@section('script')
<script src="/src/js/modernizr.js"></script>
<script src="/src/js/js/imagesloaded.pkgd.min.js"></script>
<script src="/src/js/js/masonry.pkgd.min.js"></script>
<script src="/src/js/js/classie.js"></script>
<script src="/src/js/js/cbpGridGallery.js"></script>
<script>new CBPGridGallery( document.getElementById( 'grid-gallery' ) );</script>
@stop