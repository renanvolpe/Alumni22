<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro - Alumni</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-reboot.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/padrao.css">
		<link rel="stylesheet" type="text/css" href="../icones/css/all.css">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="../js/jquery.mask.min.js"></script>
		
		<meta charset="utf-8">
	</head>
	<body>

		<div class="container" >
			<div class="row justify-content-center">
				<div class="col-md-5 card border-0 pr-0 pl-0 shadow pb-2 mg-t-5 mb-4">
					<div class="card-header pl-4 border-0" id="cardLogin">
						<h3>Cadastre-se no Alumni</h3>
						<p>Encontre ex-alunos e estabeleça contato pessoal e profissional.</p>
					</div>
					<div class="card-body">
						<form class="mg-t-3">
							<div class="col-12 my-1 mt-4">
						      	<label class="sr-only" for="email">CPF</label>
						      	<div class="input-group rounded-pill border">
						        	<div class="input-group-prepend">
						          		<div class="input-group-text border-0 bg-transparent"><i class="far fa-id-card"></i></div>
						        	</div>
						        	<input type="text" class="form-control border-0 rounded-pill" id="cpf" name="cpf" placeholder="Digite seu CPF" required="" onkeypress="$(this).mask('000.000.000-00');">
						      	</div>
						    </div>
						    <div class="col-12 my-1 mt-4 mb-2">
						      	<select class="form-control rounded-pill" name="campus" id="campus">
						      		<option>Escolha seu campus</option>
						      		<option>Jacareí</option>
						      	</select>
						    </div>
						    <button class="btn col-8 offset-2 btn-alumni rounded-pill mt-4 mb-2">Prosseguir <i class="fas fa-chevron-right ml-2"></i></button>
						</form>
						<p class="text-center mg-t-3 text-blue">Já possuo conta: Fazer Login</p>
					</div>
				</div>
			</div>
		</div>

		
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	</body>
</html>