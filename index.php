<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHPMAN</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div id="search" class="col-3">
			<form action="#" id="search_form">
				<div class="form-group">
					<input type="text" id="search_term" class="form-control" placeholder="Procurar por....">
					<button type="submit" class="btn btn-default form-control" >Vai!</button>
				</div>
			</form>
			<div id="search_results"></div>
		</div>

		<div id="manpage" class="col-9">
			<h1>Hey!</h1>
			<p>Faça sua pesquisa :)</p>
			<p>As buscas são feitas usando a função <a href="function.glob.html">glob</a> do PHP.
				Não sei se é a melhor, mas já é rápida o suficiente para uma coisa feita para rodar
				localmente.	Evite termos muito genéricos (por exemplo: function). Trazer resultados 
				demais pode fazer o seu servidor travar por uns minutos.</p>

			<p>Fiz esse programa porque minha conexão é uma porcaria. E meu computador não aguenta lidar
				com +12.000 arquivos ou um html de 50mb. Anyways, enjoy ;)</p>
			<p>PS: Tem muita coisa pra fazer/consertar ainda...</p>
				<p class="pull-right"><a href="http://facebook.com/ronyarkhan">Yarkhan</a></p>
		</div>
		<script src="jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script	src="assets/js/functions.js"></script>
	</div>
</body>
</html>

