$(document).ready(function(){
	$('#addNewType').click(function() {
		var attr=$('#selectTypeAlbom').attr('disabled');
		if(attr){
			$('#selectTypeAlbom').removeAttr('disabled');
		}else{
			$('#selectTypeAlbom').attr('disabled',true);
		}
	});
})