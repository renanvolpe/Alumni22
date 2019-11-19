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


		$emailAluno = addslashes($_POST['emailAluno']);
		$confirmaSenha = md5(addslashes($_POST['confirmaSenhaAluno']));
		$senha = md5(addslashes($_POST['SenhaAluno']));

		

		if (isset($_POST['emailAluno']) && empty($_POST['emailAluno']) == false && $_POST['confirmaSenhaAluno'] == $_POST['SenhaAluno']) {

			
		
			//$UFestadoAluno = addslashes($_POST['estadoAluno']);
			$UFestadoAluno = "SP";
			$cidadeAluno = addslashes($_POST['cidadeAluno']);
			//$cidadeAluno = "jacarei";
			
			$GeneroALuno = addslashes($_POST['GeneroALuno']);
			
			$dataNascAluno  = addslashes($_POST['dataNascAluno']);



			$rgAluno = addslashes($_POST['rgAluno']);
			$cepAluno = addslashes($_POST['cepAluno']);
			$numeroAluno = addslashes($_POST['numeroAluno']);
			$ruaAluno = addslashes($_POST['ruaAluno']);
			$bairroAluno = addslashes($_POST['bairroAluno']);
			$complementoAluno = addslashes($_POST['complementoAluno']);



		
		


			// recebe o id de genero que vai ser inserido na tabela usuarioaluno do banco alumni
			$Idsexo = $pdo->prepare('SELECT id FROM genero WHERE  genero = :GeneroALuno ');
			$Idsexo->bindValue(':GeneroALuno', $GeneroALuno);


			$RecebeIdGenero = $Idsexo->execute();

			
			

			//Recebe a sigla do estado e guarda na variavel o id que esse estado representa
			$idEstado = $pdo->prepare('SELECT id from estado WHERE uf = :UFestadoAluno ') ;
			$idEstado->bindValue(':UFestadoAluno', $UFestadoAluno);

			$RecebeIdEstado =  $idEstado->execute();


			echo "<br>
			Genero: $GeneroALuno com id : $RecebeIdGenero - $UFestadoAluno com id: $RecebeIdEstado ";


			
			

			//Recebe o id da cidae pelo estado
			$IdCidade = $pdo->prepare('SELECT cidade.id from estado, cidade WHERE cidade.idEstado = estado.id and estado.id = :RecebeIdEstado and cidade.cidade = :cidadeAluno ');
			$IdCidade->bindValue(':RecebeIdEstado', $RecebeIdEstado);
			$IdCidade->bindValue(':cidadeAluno', $cidadeAluno);

			$recebeIdCidade =  $IdCidade->execute();


			//insere login e senha
			$InsereLogin = "INSERT INTO login(email,senha, idTipoUsuario) VALUES('$emailAluno','$senha ','60' ) ";

			$pdo->query($InsereLogin);



			$IdLogin = $pdo->prepare('SELECT id from login where email = :emailAluno AND senha = :senha ');
			$IdLogin->bindValue(':senha', $senha);
			$IdLogin->bindValue(':emailAluno', $emailAluno);

			$RecebeIdLogin =  $IdLogin->execute();


			$InsereEndereco = "INSERT INTO enderecoaluno values('$ValorCPF','$recebeIdCidade','$ruaAluno','$bairroAluno','$numeroAluno','$cepAluno' ) ";

				$pdo->query($InsereEndereco);




			$AtualizaRG_DataNasc_Genero_dataNasc_login = "UPDATE usuarioaluno SET dataNasc = '$dataNascAluno', rg = '$rgAluno', idGenero = '$RecebeIdGenero', idLogin = '$RecebeIdLogin'  WHERE cpf = '$ValorCPF' ";

				$pdo->query($AtualizaRG_DataNasc_Genero_dataNasc_login);

	}



		
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
						<form class="mt-3" method="POST">
							<div  class="text-center hidden-md-down">
							<img src="../img/user.svg" class="rounded-circle" style="width: 25%;">
							</div>
							
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
							        	<input id="date" type="date"class="form-control border-0 rounded-pill" name="dataNascAluno">
							      	</div>
							    </div>
							    <div class="col-6 my-1 mt-4 mb-2">
							      	<select class="form-control rounded-pill" name="GeneroALuno" id="campus" required="">
							      		<option>Escolha seu gênero</option>
							      		<option>Feminino</option>
							      		<option>Masculino</option>
							      	</select>
							    </div>
							</div>
							<div class="form-row">
								
                            <script type='text/javascript' >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=('');
            document.getElementById('bairro').value=('');
            document.getElementById('cidade').value=('');
            document.getElementById('uf').value=('');
           
           
    }

    function meu_callback(conteudo) {
        if (!('erro' in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            
           
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert('CEP não encontrado.');
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável 'cep' somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != '') {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com '...' enquanto consulta webservice.
                document.getElementById('rua').value='...';
                document.getElementById('bairro').value='...';
                document.getElementById('cidade').value='...';
                document.getElementById('uf').value='...';
                
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert('Formato de CEP inválido.');
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

							    <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<label for="cep"></label>
							        	<input type="text" class="form-control border-0 rounded-pill" id="cep" name="cepAluno" value="" placeholder="Digite seu CEP"  required="" onkeypress="mask(this,'00000-000')" maxlength="8"  onblur="pesquisacep(this.value)" >
							        </div>
							    </div>
							
							      <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="rua" name="ruaAluno" placeholder="Rua" required class="form-control" maxlength="" onkeypress="">
							        </div>
							    </div>
							</div>
							<div class="form-row">
								

							    <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="bairro" name="bairroAluno" placeholder="Bairro"  required="" onkeypress="" maxlength="">
							        </div>
							    </div>
							     <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="numero" name="numeroAluno" placeholder= "Número"  required="required"
							        	 onkeypress="" maxlength="4">
							        </div>
							    </div>
							    
								<div class="col-12 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="complemento" name="complementoAluno" placeholder="Complemento" >
							      	</div>
							    </div>
							
							</div>
							<div class="form-row">
								

							    <div class="col-6 my-1 mt-4 mb-2">

							      	<select class="form-control rounded-pill" name="uf" id="uf" >
							      		<option value="O">Selecione uma opcao</option>
							      		<option value="AC">Acre</option>
										<option value="AL">Alagoas</option>
										<option value="AP">Amapá</option>
										<option value="AM">Amazonas</option>
										<option value="BA">Bahia</option>
										<option value="CE">Ceará</option>
										<option value="DF">Distrito Federal</option>
										<option value="ES">Espírito Santo</option>
										<option value="GO">Goiás</option>
										<option value="MA">Maranhão</option>
										<option value="MT">Mato Grosso</option>
										<option value="MS">Mato Grosso do Sul</option>
										<option value="MG">Minas Gerais</option>
										<option value="PA">Pará</option>
										<option value="PB">Paraíba</option>
										<option value="PR">Paraná</option>
										<option value="PE">Pernambuco</option>
										<option value="PI">Piauí</option>
										<option value="RJ">Rio de Janeiro</option>
										<option value="RN">Rio Grande do Norte</option>
										<option value="RS">Rio Grande do Sul</option>
										<option value="RO">Rondônia</option>
										<option value="RR">Roraima</option>
										<option value="SC">Santa Catarina</option>
										<option value="SP">São Paulo</option>
										<option value="SE">Sergipe</option>
										<option value="TO">Tocantins</option>
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
							        	<input type="text" class="form-control border-0 rounded-pill" id="rg" name="rgAluno" placeholder="Digite seu RG" required="" onkeypress="mask('00.000.000-A')" maxlength="9" size="9">
							      	</div>
							    </div>

							    <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="far fa-id-card"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="cpf" name="cpfaluno" placeholder="<?php echo $ValorCPF; ?>" required="" readonly="">
							      	</div>
							    </div>
							</div>

							<div class="form-row">
								<div class="col-12 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-envelope"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="email" name="emailAluno" placeholder="Digite seu email" required="">
							      	</div>
							    </div>
							</div>

							<div class="form-row">
								<div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-lock"></i></div>
							        	</div>
							        	<input type="password" class="form-control border-0 rounded-pill" id="senha" name="SenhaAluno" placeholder="Digite uma senha" required="">
							      	</div>
							    </div>

							    <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-lock"></i></div>
							        	</div>
							        	<input type="password" class="form-control border-0 rounded-pill" id="confirmaSenha" name="confirmaSenhaAluno" placeholder="Confirmar senha" required="">
							      	</div>
							    </div>
							</div>
							
						    <button class="btn col-8 offset-2 btn-alumni rounded-pill mt-4 mb-2">Finalizar <i class="fas fa-chevron-right ml-2"></i></button>
						</form>
						<p class="text-center mg-t-3 text-blue">Já possuo conta: Fazer Login</p>
						<p class="text-center mg-t-3 text-blue"><a href="../php/sair.php">Sair</a></p>
					</div>
				</div>
			</div>
		</div>

		
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	</body>
</html>