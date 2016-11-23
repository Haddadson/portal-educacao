<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Portal Educação</title>


  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="styles/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="styles/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="icon" href="../../imgs/logo.png" >
</head>
<body>
  <?php 
    include('../../navbar.php');
  ?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center blue-text text-darken-4">Banco de Questões</h1>
      <div class="row center">
        <h5 class="header col s12 light">A ferramenta que produz provas de maneira simples e funcional</h5>
      </div>
      <br><br>
    </div>
  </div>


  <div class="container">
    <div class="section" align="center">
      
      <!-- Criação e posicionamento dos botões na página -->
      
      <a class="waves-effect waves-light btn light-blue darken-4" id="inserir">Inserir Questões
        <i class="tiny material-icons white-text text-darken-1">add</i>
      </a>

      <a class="waves-effect waves-light btn light-blue darken-4" id="editar">Editar Questões
        <i class="tiny material-icons white-text text-darken-1">mode_edit</i>
      </a>

      <a class="waves-effect waves-light btn light-blue darken-4" id="produzir">Produzir Prova
        <i class="tiny material-icons white-text text-darken-1">library_books</i>
      </a>
      <br><br>

      <!-- Criação do formulário (Inserir Questões) -->

      <form id="FORMinserir" name="FORMiserir" action="insQuest.php" method="post" enctype="multipart/form-data">
        <div class="esconder" id="inserir_questoes">
          <p>  
            <select class="browser-default" id="estilo-inserir" name="estilo-inserir">
              <option value="" disabled selected>Escolha o estilo da questão a ser inserida.</option>
              <option value="0">Múltipla Escolha</option>
              <option value="1">Verdadeiro ou Falso</option>
              <option value="2">Dissertativa</option>
            </select>
          </p>
         
          <p>
            <select class="browser-default" id="nivel-inserir" name="nivel-inserir">
              <option value="" disabled selected>Escolha o nível de dificuldade da questão.</option>
              <option value="1">Fácil</option>
              <option value="2">Mediana</option>
              <option value="3">Difícil</option>
            </select>
          </p>

          <p>
            <select class="browser-default" id="disciplina-inserir" name="disciplina-inserir">
              <option value="" disabled selected>Defina a disciplina.</option>
              <option value="Aplicações para Web">Aplicações para Web</option>
              <option value="Arquitetura de Sistemas Digitais">Arquitetura de Sistemas Digitais</option>
              <option value="Linguagem de Programação">Linguagem de Programação - JAVA</option>
              <option value="Manutenção de Computadores">Manutenção de Computadores</option>
              <option value="Biologia">Biologia</option>
              <option value="Filosofia">Filosofia</option>
              <option value="Física">Física</option>
              <option value="Geografia">Geografia</option>
              <option value="Historia">História</option>
              <option value="Matemática">Matemática</option>
              <option value="Português">Português</option>
              <option value="Química">Química</option>
              <option value="Sociologia">Sociologia</option>
              <option value="outro">Outra</option>
            </select>
          </p> 

          <p>
            <div class="row" align="left">
              <div class="input-field col s12">
                <input type="text" class="validate" id="tema-inserir" name="tema-inserir">
                <label class="active" for="tema-inserir">Digite o tema:</label>
              </div>
            </div>
          </p>

          <div class="row">
            <div class="col s12">
              <div class="row">
                <div class="input-field col s12">
                  <textarea class="materialize-textarea" id="cabecalho-inserir" name="cabecalho-inserir"></textarea>
                  <label for="cabecalho-inserir">Digite o cabeçalho da questão:</label>
                </div>
              </div>
            </div>
          </div>

          <!-- Espaço onde as alternativas serão inseridas -->
          
          <div id="alternativas-inserir" name="alternativas-inserir">
          </div> 

          <!-- Botões específicos para questões de Múltipla Escolha ou VF -->
          
          <div class="esconder" id="adicionar_excluir-inserir" align="left">
            <a class="btn-floating btn waves-effect waves-light light-blue darken-4" id="inserirAlternativa-inserir">
			        <i class="material-icons">add</i>
      			</a>
      			<a class="btn-floating btn waves-effect waves-light light-blue darken-4" id="excluirAlternativa-inserir">
      			  <i class="material-icons">delete</i>
      			</a>
            <a class="btn-floating btn waves-effect waves-light light-blue darken-4" id="limparAlternativa-inserir">
      			  <i class="material-icons">delete_forever</i>
      			</a>
          </div>
			
			        
        <!-- Permite ao usuario fazer o upload de uma imagem que precisa estar na questao. -->
			<div id="uploadImg">
			  <div class="file-field input-field">
			    <div class="blue darken-4 btn">
			      <span><i class="material-icons right">attach_file</i>Anexar Imagem</span>
			      <input type="hidden" name="MAX_FILE_SIZE" value="30000">
			      <input type="file" name="userfile">
			    </div>
			    <div class="file-path-wrapper">
			      <input class="file-path validate" type="text">
			    </div>
			  </div>
			</div>
			
    			<br>
            <button type="submit" class="waves-effect waves-light btn light-blue darken-4" id="enviar-inserir">Enviar
              <i class="tiny material-icons white-text text-darken-1">input</i>
            </button>
            <button type="reset" class="waves-effect waves-light btn light-blue darken-4" id="refazer-inserir">Refazer
              <i class="tiny material-icons white-text text-darken-1">replay</i>
            </button> 
        </div>
      </form>
	  
	    <!-- Criação do formulário (Editar Questoes) -->
      <!-- Criação de uma div que servirá como um local para armazenar e exibir na tela as questões inseridas no banco de dados -->
      <div class="esconder" id="editar_questoes">
        <?php
			    include('altQuest.php');
        ?>
      </div>

      <!-- Criação do formulário (Produzir Prova) -->

      <form id="FORMproduzir" name="FORMproduzir" action="geraProva.php" method="post">
        <div class="esconder" id="produzir_prova">
          <p>
            <select class="browser-default" id="disciplina-produzir" name="disciplina-produzir">
              <option value="" disabled selected>Defina a disciplina.</option>
              <option value="Aplicações para Web">Aplicações para Web</option>
              <option value="Arquitetura de Sistemas Digitais">Arquitetura de Sistemas Digitais</option>
              <option value="Linguagem de Programação">Linguagem de Programação - JAVA</option>
              <option value="Manutenção de Computadores">Manutenção de Computadores</option>
              <option value="Biologia">Biologia</option>
              <option value="Filosofia">Filosofia</option>
              <option value="Física">Física</option>
              <option value="Geografia">Geografia</option>
              <option value="Historia">História</option>
              <option value="Matemática">Matemática</option>
              <option value="Português">Português</option>
              <option value="Química">Química</option>
              <option value="Sociologia">Sociologia</option>
              <option value="outro">Outra</option>
            </select>
          </p> 

          <p>
            <div class="row" align="left">
              <div class="input-field col s12">
                <input type="text" class="validate" id="tema-produzir" name="tema-produzir">
                <label class="active" for="tema-produzir">Digite o tema:</label>
              </div>
            </div>
          </p>  

          <p>Escolha o nível de dificuldade das questões da prova:</p> 
          <p>
            <input type="checkbox" class="filled-in" id="facil-produzir" name="facil-produzir"/>
            <label for="facil-produzir">Faceis</label>
          </p>
          <p>
            <input type="checkbox" class="filled-in" id="medio-produzir" name="medio-produzir"/>
            <label for="medio-produzir">Medias</label>
          </p>
          <p>
            <input type="checkbox" class="filled-in" id="dificil-produzir" name="dificil-produzir"/>
            <label for="dificil-produzir">Dificeis</label>
          </p>

          <br>
          <p>Defina o estilo das questões que estarão presentes na prova:</p>
          <p>
            <input type="checkbox" class="filled-in" id="dissertativas-produzir" name="dissertativas-produzir"/>
            <label for="dissertativas-produzir">Dissertativas</label>
          </p>
          <p>
            <input type="checkbox" class="filled-in" id="multipla_escolha-produzir" name="multipla_escolha-produzir"/>
            <label for="multipla_escolha-produzir">Multipla Escolha</label>
          </p>
          <p>
            <input type="checkbox" class="filled-in" id="v_f-produzir" name="v_f-produzir"/>
            <label for="v_f-produzir">Verdadeiro ou Falso</label>
          </p>

          <br>
          <p>Escolha o número de questões:</p>
          <p class="range-field">
            <input type="range" min="0" max="100"  id="numQuestoes-produzir"/>
          </p>

          <br><br>
          <button type="submit" class="waves-effect waves-light btn light-blue darken-4" id="pub">Gerar Prova
            <i class="tiny material-icons white-text text-darken-1">description</i>
          </button>
        </div>
      </form> 

    </div>
  </div>
  <!-- FOOTER -->
  <?php 
    include('../../footer.php');
  ?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../../template/js/materialize.js"></script>
  <script src="../../template/js/init.js"></script>
  <script src="Script.js"></script>
  <script src="../../index.js"></script>

  </body>
</html>
