@extends('template')
@section('title')
{{$title}}
@stop
@section('style')
<link rel="stylesheet" href="/src/css/alboms.css">
@stop
@section('content')
    <div class="titlePage">
          <h2>{{$title}}</h2>
    </div>
    <section class="photo-box">
    	<ul id="grid" class="grid effect-1"> 
		@foreach($albomList as $albom)
            <li>
              <div class="img-box">
              @if(!empty($albom->avatar))
              <img src="/gellery/{{$albom->avatar}}" alt="{{$albom->avatar}}"></div>
              @else
              <img src="/src/images/avatar.jpg" alt=""></div>
              @endif
              <div class="hover_text">
                <div class="holder">
                  <div class="text"> 
                    <div class="title">{{$albom->albom_name}}</div>
                    <div class="link-block"><a href="/portfolio/{{$albom->link}}" class="link-albom hvr-shutter-out-vertical">открыть альбом</a></div>
                  </div>
                </div>
              </div>
            </li>
		@endforeach
@stop
@section('script')
<script src="/src/js/js/modernizr.custom.js"></script>
	<script src="/src/js/js/masonry.pkgd.min.js"></script>
	<script src="/src/js/js/imagesloaded.js"></script>
	<script src="/src/js/js/classie.js"></script>
	<script src="/src/js/js/AnimOnScroll.js"></script>
	<script>new AnimOnScroll( document.getElementById( 'grid' ), {minDuration : 0.4,maxDuration : 0.7,viewportFactor : 0.2} );</script>
@stop