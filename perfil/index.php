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
	</nav>			
			<div class="row">
				<nav class="col-sm-12 col-lg-2  fixed-top" style="padding:0; position: absolute; position-top:0px; ">
					<div class="navMobile">
						<div class="text-center hidden-md-down">
							<img src="../img/user.svg" class="rounded-circle">
							<h1>Nome do Usuário</h1>
							<hr>
						</div>
						<ul class="list-unstyled">
							<a href="index.php"><li><i class="fas fa-user"></i> Dados pessoais <i class="fas fa-chevron-right icone-direita hidden-md-down"></i></li></a>
							<a href="indexAcademico.php"><li><i class="fas fa-file"></i>Dados acadêmicos<i class="fas fa-chevron-right icone-direita hidden-md-down"></i></li></a>
							<a href="indexProfissional.php"><li><i class="fas fa-briefcase"></i> Dados profissionais <i class="fas fa-chevron-right icone-direita hidden-md-down"></i></li></a>
						</ul>
					</div>
					</div>
			
				
				<div class="bcol-lg-10 offset-lg-2 mg-bt" id="card_ctd"  style=" padding-top: 0px; transition: all 0.5s ease;">
					<div class="card">
						<div class="card-body">
							<img src="../img/images.png" class="card-img fd-perfil" alt="...">
							<div class="card-img-overlay text-center">
								<div class="col-md-2 offset-md-5 col-sm-3 offset-sm-4 col-lg-2 offset-lg-5">
									<img src="../img/user.svg" class="rounded-circle" style="width: 50%;">
								</div>
								<h4>Nome do Usuário</h4>
							</div>

							<h1 class="col-md-12 text-center">Dados Pessoais </h1>
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
											<h6><i class="fas fa-user-circle"></i> Nome</h6>
											<p>Nome + Sobrenome do usuário</p>
										</div>
										<div class="col-md-4 offset-md-2 border-bottom mg-bt">
											<h6><i class="fas fa-calendar"></i> Data de Nascimento</h6>
											<p>Data de nascimento do usuário</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 offset-md-1 border-bottom mg-bt">
											<h6><i class="fas fa-envelope"></i> Email</h6>
											<p>Email do usuário</p>
										</div>
										<div class="col-md-4 offset-md-2 border-bottom mg-bt">
											<h6><i class="fas fa-venus-mars"></i> Gênero</h6>
											<p>Gênero do usuário</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 offset-md-1 border-bottom mg-bt">
											<h6><i class="fas fa-id-card"></i> RG</h6>
											<p>RG do usuário</p>
										</div>
										<div class="col-md-4 offset-md-2 border-bottom mg-bt">
											<h6><i class="fas fa-id-card"></i> CPF</h6>
											<p>CPF do usuário</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 offset-md-1 border-bottom mg-bt">
											<h6><i class="fas fa-phone"></i> Telefone</h6>
											<p>(XX) XXXXX-XXXX</p>
										</div>
										<div class="col-md-4 offset-md-2 border-bottom mg-bt">
											<h6><i class="fas fa-map-marker-alt"></i> Endereço</h6>
											<p>Endereço do usuário</p>
										</div>
									</div>

  								</div>

  								


  								<div class="tab-pane fade" id="editarDados" role="tabpanel" aria-labelledby="nav-editarDados-tab">
  									<form>
  										
  										<div class="tab-pane fade show active" id="meusDados" role="tabpanel" aria-labelledby="nav-meusDados-tab">
  									
  									<div class="row">
										
										<div class="col-md-4 offset-md-1 mg-bt">
											<h6><i class="fas fa-user-circle"></i> Nome</h6>
											<input type="text" name="Nome_SobreNome" class="EntradaPerfil" id="EntradaPerfilNome" placeholder ="Nome e Sobrenome">
										</div>

										<div class="col-md-4 offset-md-2 mg-bt">

											<h6><i class="fas fa-calendar"></i> Data de Nascimento</h6>

											<input type="text" name="DataNascUsuario" class="EntradaPerfil" id="EntradaPerfilNasc" placeholder ="Data de nascimento">
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 offset-md-1 mg-bt">
											<h6><i class="fas fa-envelope"></i> Email</h6>
											<input type="text" name="EmailUsuario" class="EntradaPerfil" id="EntradaPerfilEmail" placeholder ="E-mail">
										</div>


										<div class="col-md-4 offset-md-2 mg-bt">
											<h6><i class="fas fa-venus-mars"></i> Gênero</h6>
											<input type="text" name="GeneroUsuario" class="EntradaPerfil" id="EntradaPerfilGenero" placeholder ="Genero">
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 offset-md-1 mg-bt">
											<h6><i class="fas fa-id-card"></i> RG</h6>
											<input type="text" name="RGUsuario" class="EntradaPerfil" id="EntradaPerfilRG" placeholder ="RG">
										</div>
										<div class="col-md-4 offset-md-2 mg-bt">
											<h6><i class="fas fa-id-card"></i> CPF</h6>
											<input type="text" name="CPFUsuario" class="EntradaPerfil" id="EntradaPerfilCPF" placeholder ="CPF">
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 offset-md-1 mg-bt">
											<h6><i class="fas fa-phone"></i> Telefone</h6>
											<input type="text" name="TelefoneUsuario" class="EntradaPerfil" id="EntradaPerfilTelefone" placeholder ="Telefone">
										</div>
										<div class="col-md-4 offset-md-2 mg-bt">
											<h6><i class="fas fa-map-marker-alt"></i> Endereço</h6>
											<input type="text" name="Nome_SobreNome" class="EntradaPerfil" id="EntradaPerfil" placeholder ="Endereço do Usuário">
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