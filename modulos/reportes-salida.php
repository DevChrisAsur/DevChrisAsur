<form name="formulario">
	<input type="file" name="archivo">
	<input type="button" value="Comprobar" onClick="comprobar()">
</form>

<script>
	function comprobar(){
		if(document.formulario.archivo.value==""){
			alert("complete los campos");
		}
	}
</script> 