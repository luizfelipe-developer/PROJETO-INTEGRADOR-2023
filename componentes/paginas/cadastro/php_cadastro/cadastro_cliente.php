<?php 
include("../../../php/conexao.php");
//receber as iformações repassadas pelo método POST pelo formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$dt_nascimento = $_POST['dt_nascimento'];
$genero = $_POST['genero'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmacao_senha = $_POST['confirmacao_senha'];
//inserir os valores adicionados das variáveis nos campos da tabela cliente do BD
$inserirSql = "INSERT INTO cad_cliente(nome, sobrenome, cpf, dt_nascimento, genero, endereco, cep, telefone, email, senha, confirmacao_senha) VALUES('$nome', '$sobrenome', '$cpf', '$dt_nascimento', '$genero', '$endereco', '$cep', '$telefone', '$email', '$senha', '$confirmacao_senha')";
//sempre que os valores forem do tipo varchar, devem ficar entre 'aspas simples' 
//Verificação
if (mysqli_query($conexao, $inserirSql)) {
    echo "Usuário cadastrado!";
}else{
    echo "Usuário não cadastrado. Erro: ".mysqli_connect_error($conexao);
}
//encerrar a conexão, para evitar travamentos no BD
mysqli_close($conexao);
header('Location: ../../entrar/logins_form.html');
?>