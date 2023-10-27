<?php
    session_start();
    include_once('componentes/paginas/php/conexao.php');
    include "componentes/paginas/cliente/php/consulta_cliente.php";

    

    // print_r($_SESSION);
    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['nome'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM cad_cliente WHERE nome LIKE '%$data%' or nome LIKE '%$data%' or nome LIKE '%$data%' ORDER BY nome DESC";
    }
    else
    {
        $sql = "SELECT * FROM cad_cliente ORDER BY nome DESC";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagem/x-icon" href="componentes/imgs/icones/ico-sem-fundo.ico.ico" />
    <link rel="stylesheet" href="componentes/header/header_php.css">
    <link rel="stylesheet" href="componentes/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="componentes/js/script.js" defer></script>
    <title>Bora Trabalhar</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href=""><img src="componentes/imgs/logo/logo-sem-fundo.png"></a></div>
            <!-- Menu -->
            <div class="align-left">
                <div class="aba-perfil">
                    <img src="componentes/imgs/icones/do-utilizador.png" alt="">
                    <?php
                        echo "<h3>$logado</h3>";
                    ?>
                </div>
                <div class="hamburguer active">&#9776;</div>
                <ul class="menu active">
                    <li class="actives"><a href="#container">INÍCIO</a></li>
                    <li class="">
                        <p>SERVIÇOS</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="./componentes/paginas/servicos/pedreiros.html">Pedreiro</a></li>
                                <li><a href="./componentes/paginas/servicos/pequenosreparos.html">Peq. Reparos</a></li>
                                <li><a href="./componentes/paginas/servicos/pintores.html">Pintor</a></li>
                                <li><a href="./componentes/paginas/servicos/diarista.php">Diarista</a></li>
                                <li><a href="./componentes/paginas/servicos/servico.html">Outros</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <p>SOBRE</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="./componentes/paginas/sobre/sobre.html">Sobre Nós</a></li>
                                <li><a href="./componentes/paginas/suporte/suporte.html">Suporte</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <p>CONTA</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="componentes/paginas/perfil/perfil.php">Meu Perfil</a></li>
                                <li><a href="exit.php">Exit</a></li>
                                <?php while ($usuario = $queryp->fetch_array()) { ?>        
                  
                  <tr>
            
                     
                      <a id="ed" class='btn btn-sm btn-primary' href='componentes/paginas/perfil/perfil.php?id_cliente= <?php echo $usuario['id_cliente'];?>' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                   
                  </tr>
                 <?php } ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main id="container">
        <div class="barra-pesquisa">
            <h1 style="color: #555;">O que você procura?</h1><br>

            <form class="form">
                <button>
                    <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                        aria-labelledby="search">
                        <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                            stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </button>
                <input class="input" placeholder="Ex. Encanador" required="" type="text">
                <button class="reset" type="reset">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </form>
        </div>
        <!-- CAIXA DE CATEGORIAS -->
        <section class="box-categorias">
            <div class="categoria">
                <a href="componentes/paginas/servicos/pedreiros.html">
                    <span class="txt-categoria">Construção</span>
                    <div class="icone-categoria">
                        <img class="img-categorias" src="componentes/imgs/hidrauli.png" alt="">
                    </div>
                </a>
            </div>
            <div class="categoria">
                <a href="componentes/paginas/servicos/pequenosreparos.html">
                    <span class="txt-categoria">Elétricos</span>
                    <div class="icone-categoria">
                        <img class="img-categorias" src="componentes/imgs/lampada-eletrica.png" alt="">
                    </div>
                </a>
            </div>
            <div class="categoria">
                <a href="componentes/paginas/servicos/diarista.php">
                    <span class="txt-categoria">Domésticos</span>
                    <div class="icone-categoria">
                        <img class="img-categorias" src="componentes/imgs/vassoura.png" alt="">
                    </div>
                </a>
            </div>
            <div class="categoria">
                <a href="componentes/paginas/servicos/pintores.html">
                    <span class="txt-categoria">Pinturas</span>
                    <div class="icone-categoria">
                        <img class="img-categorias" src="componentes/imgs/rolo-de-pintura.png" alt="">
                    </div>
                </a>
            </div>
        </section>
        <div class="area">
            <div class="slogan">
                <h2>Tudo em um só lugar</h2>
                <br>
                <p> Praticidade e segurança na palma da sua mão! Com o aplicativo do <b>Bora Trabalhar</b>, você recebe
                    notificações e avisos em tempo real.</p>

                <div class="apks">
                    <a href="https://play.google.com/store/games?hl=pt_BR&gl=US">
                        <img src="componentes/imgs/playstor.png" alt="" class="baixar">
                    </a>
                    <a href="https://www.apple.com/br/store"><img src="componentes/imgs/apple.png" alt=""
                            class="baixar">
                    </a>
                </div>
            </div>

            <div class="imgcarinha">
                <img src="componentes/imgs/carinha.png" alt="">
            </div>
        </div>
    </main>
    </div>
</body>

</html>