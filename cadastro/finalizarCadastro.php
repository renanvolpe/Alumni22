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

		$pegaNome = "SELECT U.nome FROM matricula as M, usuarioaluno as U where M.cpfaluno = U.cpf  and prontuario ='$matricula' ";

		$pegaNome = $pdo->query($pegaNome);


		foreach ($pegaNome->fetchAll() as $valor):
			
			
			$pegaNome = $valor['nome'];

		endforeach;




		
	} else {
		header("Location: index.php");
		exit;
	}

?>

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
				<div class="col-md-7 card border-0 pr-0 pl-0 shadow pb-2 mt-5 mb-5">
					<div class="card-header pl-4 border-0" id="cardLogin">
						<h3>Cadastre-se no Alumni</h3>
						<p>Encontre ex-alunos e estabeleça contato pessoal e profissional.</p>
					</div>
					<div class="card-body">
						<form class="mt-3">
							<div class="form-row">
								

							    <div class="col-12 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-user"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="sobrenome" name="sobrenome" placeholder="<?php echo $pegaNome ?> " readonly="" required="">
							      	</div>
							    </div>
							</div>

							<div class="form-row">
								<div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-calendar-alt"></i></div>
							        	</div>
							        	<input id="date" type="date"class="form-control border-0 rounded-pill">
							      	</div>
							    </div>
							    <div class="col-6 my-1 mt-4 mb-2">
							      	<select class="form-control rounded-pill" name="campus" id="campus" required="">
							      		<option>Escolha seu gênero</option>
							      		<option>Feminino</option>
							      		<option>Masculino</option>
							      	</select>
							    </div>
							</div>
							<div class="form-row">
								

							    <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="cep" name="cep" placeholder="Digite seu CEP"  required="" onkeypress="mask(this,'00000-000')" maxlength="8">
							        </div>
							    </div>
							      <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="logradouro" name="logradouro" placeholder="Logradouro"  maxlength="">
							        </div>
							    </div>
							</div>
							<div class="form-row">
								

							    <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="bairro" name="bairro" placeholder="Bairro"  required="" onkeypress="" maxlength="">
							        </div>
							    </div>
							     <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="numero" name="numero" placeholder= "Número"  required="required" 		 onkeypress="" maxlength="4">
							        </div>
							    </div>
							</div>
							<div class="form-row">
								

							    <div class="col-6 my-1 mt-4 mb-2">
							      	<select class="form-control rounded-pill" name="estado" id="estado">
							      		
							      		<option value="0">Selecione o Estado</option>
										<option value="ac">Acre</option>
										<option value="al">Alagoas</option>
										<option value="ap">Amapá</option>
										<option value="am">Amazonas</option>
										<option value="ba">Bahia</option>
										<option value="ce">Ceará</option>
										<option value="df">Distrito Federal</option>
										<option value="es">Espirito Santo</option>
										<option value="go">Goiás</option>
										<option value="ma">Maranhão</option>
										<option value="ms">Mato Grosso do Sul</option>
										<option value="mt">Mato Grosso</option>
										<option value="mg">Minas Gerais</option>
										<option value="pa">Pará</option>
										<option value="pb">Paraíba</option>
										<option value="pr">Paraná</option>
										<option value="pe">Pernambuco</option>
										<option value="pi">Piauí</option>
										<option value="rj">Rio de Janeiro</option>
										<option value="rn">Rio Grande do Norte</option>
										<option value="rs">Rio Grande do Sul</option>
										<option value="ro">Rondônia</option>
										<option value="rr">Roraima</option>
										<option value="sc">Santa Catarina</option>
										<option value="sp">São Paulo</option>
										<option value="se">Sergipe</option>
										<option value="to">Tocantins</option>
							      	</select>
							    </div>
							<div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="cidade" name="cidade" placeholder="Cidade"  required="" onkeypress="" maxlength="">
							        </div>
							    </div>
							</div>
							
							<div class="form-row">
								<div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="far fa-id-card"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="rg" name="rg" placeholder="Digite seu RG" required="" onkeypress="mask('00.000.000-A')" maxlength="9" size="9">
							      	</div>
							    </div>

							    <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="far fa-id-card"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="cpf" name="cpf" placeholder="<?php echo $ValorCPF; ?>" required="" readonly="">
							      	</div>
							    </div>
							</div>

							<div class="form-row">
								<div class="col-12 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-envelope"></i></div>
							        	</div>
							        	<input type="email" class="form-control border-0 rounded-pill" id="email" name="email" placeholder="Digite seu email" required="">
							      	</div>
							    </div>
							</div>

							<div class="form-row">
								<div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-lock"></i></div>
							        	</div>
							        	<input type="password" class="form-control border-0 rounded-pill" id="senha" name="nome" placeholder="Digite uma senha" required="">
							      	</div>
							    </div>

							    <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-lock"></i></div>
							        	</div>
							        	<input type="password" class="form-control border-0 rounded-pill" id="confirmaSenha" name="confirmaSenha" placeholder="Confirmar senha" required="">
							      	</div>
							    </div>
							</div>
							
						    <button class="btn col-8 offset-2 btn-alumni rounded-pill mt-4 mb-2">Finalizar <i class="fas fa-chevron-right ml-2"></i></button>
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