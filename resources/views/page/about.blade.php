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
	{!!html_entity_decode($content)!!}
@stop