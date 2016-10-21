@extends('template')
@section('title')
{{$title}}
@stop
@section('style')
	<link rel="stylesheet" href="/src/css/contact.css">
@stop
@section('content')
    <div class="titlePage">
          <h2>{{$title}}</h2>
    </div>
    <div class="contactPage">
    	<p>Станислав Жарников</p>
		<p>Телефон: <span>+375 29 511 81 90</span></p>
		<p>email: <span>vladislavzharnikov@mail.ru</span></p>
		<p>skype: <span>vladislavzharnikov</span></p>
    </div>

@stop