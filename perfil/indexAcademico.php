<?php
session_start();

require '../conexaoBanco.php';

if (isset($_SESSION['banco']) && empty($_SESSION['banco']) == false) {

	



	$matricula = $_SESSION['banco'];

		$Pega_CPF = "SELECT * FROM matricula WHERE prontuario = '$matricula' ";

		$Pega_CPF = $pdo->query($Pega_CPF);


		foreach ($Pega_CPF->fetchAll() as $valor):
			
			
			$ValorCPF = $valor['cpfaluno'];

		endforeach;


		
	} else{
		header("Location: ../login/index.php");
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Perfil</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-reboot.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/padroes.css">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/perfil.css">
		<link href="../icones/css/all.css" rel="stylesheet">

		<meta charset="utf-8">
	</head>
	
	<body>
		<div class="container-fluid">
			
			<div class="row">
				<nav class="col-sm-12 col-lg-2 fixed-top" style="padding:0; position: absolute; position-top:0px; ">
					<div class="navMobile ">
						<div class="text-center hidden-md-down">
							<img src="../img/user.svg" class="rounded-circle">
							<h1>Nome do Usuário</h1>
							<hr>
						</div>
						<ul class="list-unstyled">
							<li><i class="fas fa-user"></i><a href="index.php"> Dados pessoais </a> <i class="fas fa-chevron-right icone-direita hidden-md-down"></i></li>
							<li><i class="fas fa-file"></i> <a href="indexAcademico.php"> Dados acadêmicos </a><i class="fas fa-chevron-right icone-direita hidden-md-down"></i></li>
							<li><i class="fas fa-briefcase"></i> <a href="indexProfissional.php">Dados profissionais </a> <i class="fas fa-chevron-right icone-direita hidden-md-down"></i></li>
						</ul>
					</div>
				</nav>
				
				<div class="col-lg-10 offset-lg-2 mg-bt" id="card_ctd"  style=" padding-top: 0px; transition: all 0.5s ease;">
					<div class="card">
						<div class="card-body">
							<img src="../img/images.png" class="card-img fd-perfil" alt="...">
							<div class="card-img-overlay text-center">
								<div class="col-md-2 offset-md-5 col-sm-3 offset-sm-4 col-lg-2 offset-lg-5">
									<img src="../img/user.svg" class="rounded-circle" style="width: 50%;">
								</div>
								<h4>Nome do Usuário</h4>
							</div>

							<h1 class="col-md-12 text-center">Dados Academicos</h1>
								<hr>

							<div class="col-md-6 offset-md-4 offset-md-4 offset-sm-3"> 

								

								<ul class="nav nav-pills text-center" role="tab-list">
      								<li class="nav-item">
        								<a class="nav-link active" id="nav-meusDados-tab" data-toggle="tab" href="#meusDados" role="tab" aria-controls="nav-meusDados" aria-selected="true">
        									<i class="fas fa-user" style="margin-bottom: 0.5rem;"></i> Meus Dados
        								</a>
      								</li>
      								<li class="nav-item">
        								<a class="nav-link" id="nav-editarDados-tab" data-toggle="tab" href="#editarDados" role="tab" aria-controls="nav-editarDados" aria-selected="false">
        									<i class="fas fa-user-edit" style="margin-bottom: 0.5rem;"></i> Editar Dados 
        								</a>
      								</li>
    							</ul>
							</div>
							
							<div class="tab-content col-sm-8 offset-sm-2 offset-md-1 col-md-10 offset-lg-1"  id="ctd">



  								<div class="tab-pane fade show active" id="meusDados" role="tabpanel" aria-labelledby="nav-meusDados-tab">
  									
  									
  									<div class="row">
										<div class="col-md-4 offset-md-1 border-bottom mg-bt">
											<h6><i class="fas fa-university"></i> Campus de graduação</h6>
											<p>Nome Campus</p>
										</div>
										<div class="col-md-4 offset-md-2 border-bottom mg-bt">
											<h6><i class="fas fa-graduation-cap"></i> Curso de graduação</h6>
											<p>Curso</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 offset-md-1 border-bottom mg-bt">
											<h6><i class="fas fa-id-card"></i> Prontuario</h6>
											<p>Prontuario</p>
										</div>
										<div class="col-md-4 offset-md-2 border-bottom mg-bt">
											<h6><i class="fas fa-calendar"></i> Data de inicio da graduação</h6>
											<p>Inicio: </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 offset-md-1 border-bottom mg-bt">
											<h6><i class="fas fa-calendar"></i> Data de fim da graduação</h6>
											<p>fim:</p>
										</div>
										<div class="col-md-4 offset-md-2 border-bottom mg-bt">
											<h6><i class="fas fa-id-card"></i> IRA</h6>
											<p>IRA...</p>
										</div>
									</div>
									

  								</div>

  								


  								<div class="tab-pane fade" id="editarDados" role="tabpanel" aria-labelledby="nav-editarDados-tab">
  									<form>
  										<h1>Editar dados: </h1>
  										<div class="tab-pane fade show active" id="meusDados" role="tabpanel" aria-labelledby="nav-meusDados-tab">
  									
  									<div class="row">
										
										<div class="col-md-4 offset-md-1 mg-bt">
											<h6><i class="fas fa-user-circle"></i> Campus de graduação</h6>
											
											
											<input type="text" name="Nome_SobreNome" class="EntradaPerfil" id="EntradaPerfilNome" placeholder ="Campus de graduação">
										</div>

										<div class="col-md-4 offset-md-2  ">

											<h6><i class="fas  fa-graduation-cap"></i> Cruso de graduação</h6>

											<input type="text" name="DataNascUsuario" class="EntradaPerfil" id="EntradaPerfilNasc" placeholder ="Curso de graduação">
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 offset-md-1 mg-bt">
											<h6><i class="fas fa-id-card"></i> Prontuario</h6>
											<input type="text" name="EmailUsuario" class="EntradaPerfil" id="EntradaPerfilEmail" placeholder ="Prontuario">
										</div>


										<div class="col-md-4 offset-md-2 mg-bt">
											<h6><i class="fas fa-calendar"></i> Data de inicio da graduação</h6>
											<input type="text" name="GeneroUsuario" class="EntradaPerfil" id="EntradaPerfilGenero" placeholder ="Data de inicio da graduação">
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 offset-md-1 border-bottom mg-bt">
											<h6><i class="fas fa-calendar"></i> Data de fim da graduação</h6>
											<input type="text" name="RGUsuario" class="EntradaPerfil" id="EntradaPerfilRG" placeholder ="Data de fim da graduação">
										</div>
										<div class="col-md-4 offset-md-2 border-bottom mg-bt">
											<h6><i class="fas fa-id-card"></i> IRA</h6>
											<input type="text" name="CPFUsuario" class="EntradaPerfil" id="EntradaPerfilCPF" placeholder ="IRA">
										</div>
									</div>
									

  								</div>
  										<button class="btn btn-dark btn-block col-md-10 offset-md-1">
  											Salvar Alterações
  										</button>
  									</form>
  								</div>  								
							</div>






						</div>
					</div>
				</div>
			</div>
		</div>


		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="../js/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8" async defer></script>
		<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
		<script src="../js/dashboard.js" type="text/javascript"></script>
	</body>
</html>