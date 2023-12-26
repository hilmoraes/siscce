$(function(){
	$("#medico").change(function(){
		var id = $(this).val();
		$.ajax({
			type : "POST",
			url: "exibe_agenda.php?id="+id,
			dataType: "text",
			success: function(res){
				$("#agendas").children(".agendas").remove();
				$("#agendas").append(res);
			}
		});
	});
});


$(function(){
	$("#dtc").change(function(){
		var id = $(this).val();
		$.ajax({
			type : "POST",
			url: "exibe_consulta_medico.php?id="+id,
			dataType: "text",
			success: function(res){
				$("#consultasM").children(".consultasM").remove();
				$("#consultasM").append(res);
			}
		});
	});
});


$(function(){
	$("#medicoCo").change(function(){
		var id = $(this).val();
		$.ajax({
			type : "POST",
			url: "exibe_consulta_medico_M.php?id="+id,
			dataType: "text",
			success: function(res){
				$("#consultasM").children(".consultasM").remove();
				$("#consultasM").append(res);
			}
		});
	});
});