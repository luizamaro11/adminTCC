
$(document).ready(function(){
	$(document).on("click", "#entrar", function(){
		var usuario = $("#usuario").val();
		var senha = $("#senha").val();

		if(usuario == "admin" && senha == "admin"){
			$(location).attr("href", "mesas.html");
		}
		else if(usuario != "admin" && senha != "admin"){
			$("#msgUsuario").html("usuario está incorreto, por favor tente novamente");
			$("#msgUsuario").css("color", "red");
			$("#msgSenha").html("senha está incorreto, por favor tente novamente");
			$("#msgSenha").css("color", "red");
		} 
		else if(usuario != "admin"){
			$("#msgUsuario").html("usuario está incorreto, por favor tente novamente");
			$("#msgUsuario").css("color", "red");
		} 
		else if(senha != "admin"){
			$("#msgSenha").html("senha está incorreto, por favor tente novamente");
			$("#msgSenha").css("color", "red");
		} 
		
	});
});

