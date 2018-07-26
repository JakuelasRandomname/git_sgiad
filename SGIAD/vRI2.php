<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.structure.css">
        <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    </head>
    <body>
        <?php
            include("./dbconfig.php");
        ?>
        <center>
            <div class="container">
                <form class="form-horizontal" method="post" action="gravarInquerito.php">
                <table class="table-responsive">    
                    <tr>
                        <td><label for="cD" class="control-label" style="height: 25px">Selecione o docente</label></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="cSD" class="form-control" style="height: 30px">
                                <option value="1">--Selecione aqui o docente a avaliar--</option>
                                <?php
                                    session_start();
                                    $username=$_SESSION['username'];
                                    
                                    $query = "select * from estudantes where id= '".$username."'";
                                    $result3 = $conn->query($query);
                                    $row3 = $result3->fetch_assoc();
                                    $turma=$row3["turma"];
                                    $disc1=$row3["disc1"];
                                    $disc2=$row3["disc2"];
                                    $disc3=$row3["disc3"];
                                    $disc4=$row3["disc4"];
                                    $disc5=$row3["disc5"];
                                    $disc6=$row3["disc6"];
                                    $disc7=$row3["disc7"];        
                                    //busca dados do estudante consoante o username fornecido no login    
                                    
                                   // session_register("turma");
                                    $_SESSION['turma'] = $turma;      
                                    
                                    
                                    $sql = "SELECT docentes.nome,docentes.disciplina from docentes where docentes.turma= '"
                                            .$turma."' and "
                                            . "('".$disc1."'=docentes.disciplina or '"
                                            .$disc2."'=docentes.disciplina or '"
                                            .$disc3."'=docentes.disciplina or '"
                                            .$disc4."'=docentes.disciplina or '"
                                            .$disc5."'=docentes.disciplina or '"
                                            .$disc6."'=docentes.disciplina or '"
                                            .$disc7."'=docentes.disciplina)";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='".$row["nome"]." (".$row["disciplina"].")"."'>".$row["nome"]."(".$row["disciplina"].")"."</option>";
                                            //busca os docentes associados ao estudante
                                            
                                        }
                                    } 
                                ?>
                            </select>
                            
                        </td>
                    </tr>
                    <?php 
                        $sql2 = "SELECT * FROM perguntasdocentes order by ordem";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            while($row2 = $result2->fetch_assoc()) {
                                echo "<tr><td>";
                                echo "<label for='txCp' class='control-label'>".$row2["categoria"]."</label>";
                                echo "</td></tr>";
                                echo "<tr><td>";
                                echo "<input type='radio' name=".$row2["id"]." value='1'/>1.Nunca<br/>"
                                        . "<input type='radio' name=".$row2["id"]." value='2'/>2.Raramente<br/>"
                                        . "<input type='radio' name=".$row2["id"]." value='3'/>3.As vezes<br/>"
                                        . "<input type='radio' name=".$row2["id"]." value='4'/>4.Muitas vezes<br/>"
                                        ."<input type='radio' name=".$row2["id"]." value='5'/>5.Sempre<br/>";
                                echo "</td></tr>";
                                //busca as perguntas
                            }
                        } 
                        $conn->close();
                    
                    ?>    
                    <tr>
                        <td>
                            <br/><button type="submit" name="btnsave" class="form-control" style="color: white;background-color: #40c4ff;height: 30px">
                                <span class="glyphicon glyphicon-save"></span> &nbsp; Salvar Inquerito</button>
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </center>    
    </body>
</html>
