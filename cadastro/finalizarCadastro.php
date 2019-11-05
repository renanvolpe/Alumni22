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
							        	<input type="text" class="form-control border-0 rounded-pill" id="cep" name="cep" value="" placeholder="Digite seu CEP"  required="" onkeypress="mask(this,'00000-000')" maxlength="8"  onblur="pesquisacep(this.value)" >
							        </div>
							    </div>
							
							      <div class="col-6 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="rua" name="rua" placeholder="Rua" required class="form-control" maxlength="" onkeypress="">
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
							        	<input type="text" class="form-control border-0 rounded-pill" id="numero" name="numero" placeholder= "Número"  required="required"
							        	 onkeypress="" maxlength="4">
							        </div>
							    </div>
							    
								<div class="col-12 my-1 mt-4">
							      	<div class="input-group rounded-pill border">
							        	<div class="input-group-prepend">
							          		<div class="input-group-text border-0 bg-transparent"><i class="fas fa-map-marker-alt"></i></div>
							        	</div>
							        	<input type="text" class="form-control border-0 rounded-pill" id="complemento" name="complemento" placeholder="Complemento" >
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