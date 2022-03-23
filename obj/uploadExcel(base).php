<!DOCTYPE html>
<html>
<head>
	<title>Upload Excel</title>
</head>
<body>
	<h1>Upload Excel</h1>

	<form method="POST" action="../controller/pais_controller.php?acao=uploadExcel" enctype="multipart/form-data">
		<label>Arquivo</label>
		<input type="file" name="arquivo"><br><br>
		<input type="submit" value="Enviar" name="">
	</form>
</body>
</html>