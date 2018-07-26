<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width">
        <title>SGIAD</title>
        <link text="text/css" rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css"/>
        <link text="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
        
        <style>
            ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #777;
            }
            li {
                float: left;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 10px 10px;
                text-decoration: none;
            }

            li a:hover {
                background: lightgray;
            }
            
            
            .submenu{
                display: none;
                
            }
            
        </style>
    </head>
    <body>
        <div class="container" style="height: 120px;background-color: #40c4ff">
            <center>
                <br/><h3 style="color: white">Instituto Superior de Comunicação e Imagem de Moçambique</h3>
            </center>
            <?php 
            $d= date('m');
            if($d==01 || $d==02 || $d==03 || $d==04 || $d==05 || $d==06){
                echo '<a style="float: right;color: white">'.date('Y').'/01'.'</a>';
            }
            else{
                echo '<a style="float: right;color: white">'.date('Y').'/02'.'</a>';
            }
            ?>
            <br/>
            <a href="logout.php" style="float: right;color: white">Sair</a>
        </div>
        <div class="container" style="height: 40px;background-color: #777" id="nav">
            <ul>
                <li><a onclick="carregavIU()" style="text-decoration: none">Estudantes</a></li>
                <li><a onclick="carregavID()" style="text-decoration: none">Docentes</a></li>
                
                <li> <a onmouseover="mostra()" style="text-decoration: none">Configuracoes</a>
                    <ul id="sub-menu" class="submenu">
                        <li><a onclick="carregavIP()" style="text-decoration: none">Perguntas de avaliacao</a></li>
                        <li><a onclick="carregavDI()" style="text-decoration: none">Datas para resposta</a></li>
                    </ul>
                </li>
                
                <li><a onclick="carregavGR()" style="text-decoration: none">Relatórios</a></li>
            </ul>
        </div>
        <div style="height: 80px"></div>
        <div class="container" id="cx">
            <center><img src="imagens/logo.png"/>
                <p>Bem vindo Administrador ao sistema de gestao dos inqueritos de avaliacao de docentes</p>
                <p>Desejamos que essa plataforma seja um veiculo para avaliacao do desempenho dos docentes</p>
            </center>
        </div>
        

        <script>
            function mostra(){
                if ( $("#sub-menu").is(':hidden') ) {
                    $("#sub-menu").slideDown(200);
                } 
                else {
                    $("#sub-menu").slideUp(200);
                }
            }
            
            function carregavIP(){
                $("#cx").load("vIP.php");
            }
            function carregavIU(){
                $("#cx").load("vIU.php");
            }
            function carregavID(){
                $("#cx").load("vID.php");
            }
            function carregavDI(){
                $("#cx").load("vDI.php");
            }
            function carregavGR(){
                $("#cx").load("vGR.php");
            }
            
        </script>
        <script type="text/javascript" src="jquery/jquery-1.10.2.min.js" </script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js" </script>
        <script type="text/javascript" src="bootstrap/js/npm.js" </script>
    </body>
</html>

