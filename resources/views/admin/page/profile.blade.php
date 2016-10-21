@extends('admin.template')
@section('content')
	<form>
		<div class="form-group" style="width:50%;">
			<div class="form-group">
	    		<label style="color:#fff">Имя пользователя: <span style="font-weight:bold;margin-right:20px;">{{$userName}}</span></label>
	    		<a class="btn btn-warning btn-xs" role="button" data-toggle="collapse" href="#collapseEditName" aria-expanded="false" aria-controls="collapseNewTypeAlbom">редактировать
			      	</a>
	    	</div>
			<div class="form-group">
			    <div class="collapse form-group" id="collapseEditName">
			    	<input type="text" class="form-control" id="" placeholder="Name">
			    </div>	
	 		</div>
			<div class="form-group">
	    		<label style="color:#fff">E-mail: <span style="font-weight:bold;margin-right:20px;">{{$email}}</span></label>
	    		<a class="btn btn-warning btn-xs" role="button" data-toggle="collapse" href="#collapseEditEmail" aria-expanded="false" aria-controls="collapseNewTypeAlbom">редактировать
			      	</a>
	    	</div>
			<div class="form-group">
			    <div class="collapse form-group" id="collapseEditEmail">
			    	<input type="text" class="form-control" id="" placeholder="Email">
			    </div>	
	 		</div>
	    	<div class="form-group">
	    		<a class="btn btn-primary btn-xs" role="button" data-toggle="collapse" href="#collapseEditPas" aria-expanded="false" aria-controls="collapseNewTypeAlbom">сменить пароль
			      	</a>
			</div>
			<div class="collapse" id="collapseEditPas">
				<div class="form-group">
					<label style="color:#fff">Введить старый пароль</label>
				    <div class="form-group">
				    	<input type="text" class="form-control" id="" placeholder="Password">
				    </div>	
		 		</div>
				<div class="form-group">
					<label style="color:#fff">Введите новый пароль</label>
				    <div class=" form-group" id="">
				    	<input type="text" class="form-control" id="" placeholder="Password">
				    </div>	
		 		</div>
		 	</div>
 		</div>
 		<div class="form-group">
  			<button type="submit" class="btn btn-default">Сохранить изменения</button>
  		</div>
	</form>
@stop