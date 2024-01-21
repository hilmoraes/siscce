function doPost(formName, actionName)
{
	var hiddenControl = document.getElementById('relfuncao');
	var theForm = document.getElementById(formName);
	
	hiddenControl.value = actionName;
	theForm.submit();
}