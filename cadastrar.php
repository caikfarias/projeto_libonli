<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario;
?>

<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<title>Projeto Login</title>
	<link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
	<div id="corpo-form-Cad">
	<h1>Cadastro</h1>
	<form method="POST">
		<input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
		<input type="text" name="telefone" placeholder="Telefone" maxlength="30">
		<input type="email" name="email" placeholder="E-mail" maxlength="40">
		<input type="passowrd" name="senha" placeholder="Senha" maxlength="15">
		<input type="passowrd" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
		<input type="submit" value="cadastrar">
	</form>
</div>
<?php 
//verificar se clicou no botao
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes($_POST['confSenha']);
	
	//verificar se esta preenchido
	if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($confirmarSenha))
	{
		$u->conectar("tela_de_login","localhost","root","");
		if($u->msgErro == "")//se esta tudo ok
		{
		
			if($senha == $confirmarSenha)
			{
				if($u->cadastrar($nome,$telefone,$email,$senha))
				{
					echo"Cadastrado com sucesso!
					efetue o login para entrar!";
				}
				else
				{
					echo "E-mail ja cadastrado!";
				}
			}
			else
			{
				echo "Senha e e-mail não correspondem!";
			}
		
		}
			else
		{
			echo "Erro: ".$u->msgErro;
		}
	}else
	{
		echo "Preencha todos os campos!";
	}
}

?>
</body>
</html>
