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
        </style>
    </head>
    <body>
        <div class="container" style="background-color: #40c4ff">
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
        <div class="container" style="height: 40px;background-color: #777">
            <ul>
                <li><a onclick="carregavRI()" style="text-decoration: none">Responder Inquerito</a></li>
                <li><a onclick="carregavIR()" style="text-decoration: none">Inqueritos Respondidos</a></li>
            </ul>
        </div>
        <div id="cx1" style="height: 90px"></div>    
        <div class="container" id="cx">
            <center><img src="imagens/logo.png"/>
                <p>Bem vindo ao sistema de gestao dos inqueritos de avaliacao de docentes</p>
                <p>Desejamos que essa plataforma seja um veiculo para avaliacao do desempenho dos docentes</p>
            </center>
        </div>
<!--        <div style="height: 50px;background-color: darkgray" class="container">
            <center>    
                <p>Copyright SEI</p>
            </center>
        </div>-->
        <script>
            function carregavRI(){
                $('#cx1').hide();
                $('#cx').load('vRI2.php');
            } 
            function carregavIR(){
                $('#cx1').hide();
                $('#cx').load('vIR.php');
            } 
        </script>
        <script type="text/javascript" src="jquery/jquery-1.10.2.min.js" </script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js" </script>
        <script type="text/javascript" src="bootstrap/js/npm.js" </script>
    </body>
</html>