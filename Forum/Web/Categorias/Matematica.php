<?php 
    session_start();
    if ( isset($_SESSION["usuario"]) ) {
      $userData = (array) $_SESSION["usuario"];
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Portal Educação</title>
            <!--Meta-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
            <!-- CSS  -->
            <link href="../CSS.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="../../../styles/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="../../../styles/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link rel="icon" href="../../../imgs/logo.png" >
            <style type="text/css">
                body {
                    display: flex;
                    min-height: 100vh;
                    flex-direction: column;
                }
                main {
                    flex: 1 0 auto;
                }
            </style>
        </head>

        <body onload="Perfil(0); CarregaTopicos('Matemática')">
            <?php 
              include('../../../navbar.php');
            ?>
          
            <!-- Modal de login -->
           <?php 
             if(!isset($_SESSION['usuario'])) {
               include('../../../modal.php');
             }
            ?>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <div class="section no-pad-bot" id="index-banner">
                <div class="container">
                    <br><br>
                    <a href="../Forum.php"><h1 class="header center blue-text text-darken-4">Fórum</h1></a>
                    <div class="row center">
                        <h5 class="header col s12 light">Fórum para discussões</h5>
                    </div>
                    <br><br>
                </div>
            </div>

            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col s7">
                            <h4 class="light-blue-text text-darken-3 center-align"> Matématica  
        <a href="../Pag_do_Topico.php" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">add</i></a></h4>
                            <table class="highlight">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Data</th>
                                        <th>Respostas</th>
                                        <th>Autor</th>
                                    </tr>
                                </thead>

                                <tbody id="Topicos">
                                    <form action="../MostraTopico.php" method="post" name="acessar">
                                    <input type="hidden" id="titulo" name="tituloo" value="teste">

                                    <script type="text/javascript">

                                        function envia(titulo) {

                                            document.getElementById("titulo").value = titulo;

                                          document.acessar.submit();
                                            
                                            
                                        }
                                    </script>
            <?php 
              //
              /*
              $dbhost = 'cefet-inf-2015.ddns.net:43306'; // endereco do servidor de banco de dados
              $dbuser = 'root'; // login do banco de dados
              $dbpass = 'apenasinf-2015'; // senha
              */
              $dbhost = 'localhost'; // endereco do servidor de banco de dados
              $dbuser = 'root'; // login do banco de dados

              $dbname = 'bdforum'; // nome do banco de dados a ser usado
              $conecta = @mysql_connect($dbhost, $dbuser, $dbpass);
              $seleciona = @mysql_select_db($dbname);

              $consulta = mysql_query('select * from Matematica where comentario=0 order by Id desc');



              // envia a categoria
              
              $categoriavet =  explode("/",$_SERVER['PHP_SELF']);
              $categoria = explode(".", end($categoriavet));
              $aux =current($categoria);
              echo "<input type=\"hidden\" name=\"categoria\" value=\"$aux\">";

              // mostra os tópicos

              while($conteudo=mysql_fetch_array($consulta)){

                  $titulo= $conteudo['Titulo'];

                  $result = mysql_query("select count(*) from Matematica where Titulo='$titulo' and Comentario=1");//conta o numero de respostas
                 
                
                  echo "<tr><input type=\"hidden\" id=\"tit\" name=\"titulo\"><td><a href=\"#\" onclick=\"envia('".$titulo."')\">". $conteudo['Titulo'] . "</td><td>" . $conteudo['Data'] . "</td><td>" . mysql_result($result, 0) . "</td><td>". $conteudo['Autor'] . "</a></td></tr>";

              } 
             ?>

             </form>
                                </tbody>
                            </table>
                        </div>
                  
                        <div class="col s5">
                            <div class="col s12 m10">
                                <div class="card horizontal">
                                    <div onmouseover="document.getElementById('tit').value=$titulo" class="card-image">
                                        <img src="../Squirtle.png">
                                    </div>
                                    <div class="card-stacked">
                                        <div class="card-content">
                                            <div style="color: #1E90FF">Nome: </div><div id="Nome"></div>
                                            <div style="color: #1E90FF">Matrícula: </div><div id="Matricula"></div>
                                            <div style="color: #1E90FF">Posts: </div><div id="Posts"></div>
                                            <div id="Classificacao" style="color: blue"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="collection">
                                    <a href="#!" class="collection-item"><h6>Novos Posts</h6></a>
                                    <a href="#!" class="collection-item"><div id="Topico1"></div></a>
                                    <a href="#!" class="collection-item"><div id="Topico2"></div></a>
                                    <a href="#!" class="collection-item"><div id="Topico3"></div></a>
                                    <a href="#!" class="collection-item"><div id="Topico4"></div></a>
                                </div>

                                <div class="collection">
                                    <a href="#!" class="collection-item"><h6>Estatísticas do Fórum</h6></a>
                                    <a  class="collection-item"><div id="PostsTotal"></div></a>
                                    <a  class="collection-item"><div id="TopicosTotal"></div></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <?php 
              include('../../../footer.php');
            ?>

            <!--  Scripts-->
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="../../../template/js/materialize.js"></script>
            <script src="../../../template/js/init.js"></script>
            <script src="../../../index.js"></script>
            <script type="text/javascript" src="../Script.js"></script>
        </body>
    </html>