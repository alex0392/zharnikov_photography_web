@extends('admin.template')
@section('style')
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<link rel="stylesheet" href="/src/admin/css/dropzone.css">
@stop
@section('content')
	<div class="row" style="margin-bottom:40px;">
		<a class="btn btn-primary" href="/admin/albom/{{$albom}}" role="button">Назад</a>
	</div>
	<div class="uploadFile-box">
    	<div class="dropzone" id="dropzoneFileUpload">
        </div>
    </div>
@stop
@section('script')
	<script src="/src/admin/js/dropzone.js"></script>
    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl + "/photo/{{$albom}}",
            params: {
                _token: token
            }
        });
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
 
            },
        };
    </script>
@stop