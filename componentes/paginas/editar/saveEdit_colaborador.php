<?php
    // isset -> serve para saber se uma variável está definida
    include_once('../php/conexao.php');
    if(isset($_POST['update'])){

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $dt_nascimento = $_POST['dt_nascimento'];
        $genero = $_POST['genero'];
        $profissao = $_POST['profissao'];

        $cep = $_POST['cep'];
        $uf = $_POST['uf'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $id_colaborador = $_POST['id_colaborador'];
        
        $sqlUpdate = "UPDATE cad_colaborador
        SET nome='$nome', sobrenome='$sobrenome', cpf='$cpf', dt_nascimento='$dt_nascimento', genero='$genero', profissao='$profissao', cep='$cep', uf='$uf', cidade='$cidade', bairro='$bairro', endereco='$endereco', numero='$numero', telefone='$telefone', email='$email', senha='$senha' WHERE id_colaborador='$id_colaborador'";
        $resultado = $conexao->query($sqlUpdate);
        print_r($resultado);
    }
    header('Location: ../../../index_cliente.php');

?>  