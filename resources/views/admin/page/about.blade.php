@extends('admin.template')
@section('style')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<style type="text/css">
	.note-editor.note-frame .note-editing-area .note-editable{
		background-color: #2a2b30;
	}
</style>
@stop
@section('content')
	<div class="row">
		<input type="button" value="Редактировать" class='btn btn-warning' onclick="edit()">
		<input type="button" value="Сохранить изменения" class='btn btn-success' onclick="save()">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</div>
	
		<!--<h2 style="color:#fff;text-align:center;margin-top:50px;">Информация отсутствует</h2>-->
	
	<div class="content-box" style="margin-top:20px;color:#fff">
		<div class="click2edit">{!!html_entity_decode($content)!!}</div>
	</div>
	
@stop
@section('script')
  	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
  	<script>
  		var edit = function() {
  			$('.click2edit').summernote({focus: true});
		};
  	    var save = function() {
  			var makrup = $('.click2edit').summernote('code');
  			
  			$('.click2edit').summernote('destroy');
  			loadToServer();
		};

		var loadToServer=function(){
			var content=$('.click2edit').html();
			if(content.length<2){
				content='<h2 style="color:#fff;text-align:center;margin-top:50px;">Информация отсутствует</h2>'
			}
			//console.log(content);
			token = $('input[name=_token]').val();
			$.ajax({
				url:'/about',
				headers: {'X-CSRF-TOKEN': token},
				type:'PUT',
				data:{content:content},
				success:function(res){
					console.log(res);
					alert('Изменения приняты!!!');
				}
			})
		}

  </script>

@stop