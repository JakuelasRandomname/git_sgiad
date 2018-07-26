<?php
       include './dbconfig.php';

       session_start();
       $idEstudante=$_SESSION['username'];
       $turma=$_SESSION['turma'];
       $data=date('Y-m-d');
       
       
       $docente=$_REQUEST["cSD"];
       $p1=$_POST["1"];
       $p2=$_POST["2"];
       $p3=$_POST["3"];
       $p4=$_POST["4"];
       $p5=$_POST["5"];
       $p6=$_POST["6"];
       $p7=$_POST["7"];
       $p8=$_POST["8"];
       $p9=$_POST["9"];
       
       $sql2="select * from inqueritosrespondidos where NomeDocente='".$docente."'AND idEstudante='".$idEstudante."'";
       $result = $conn->query($sql2);
       $count=$result->num_rows;
        if($count >= 1) {
          echo "<script language='javascript' type='text/javascript'>alert('Docente ja avaliado por si, selecione outro docente ou volte noutra altura');window.location.href='indexEstudante.php'</script>";
        }
        else{
           $sql= "INSERT into inqueritosrespondidos(idEstudante,NomeDocente,Cat1,Cat2,Cat3,Cat4,Cat5,Cat6,Cat7,Cat8,Cat9,dataResposta,turma) values ('"
                .$idEstudante."','"
                .$docente."','"
                .$p1."','"
                .$p2."','"
                .$p3."','"
                .$p4."','"
                .$p5."','"
                .$p6."','"
                .$p7."','"
                .$p8."','"
                .$p9."','"
                .$data."','"   
                .$turma."')";

            $query = $conn->query($sql);
        
            if($query === TRUE) {           
                echo "<script language='javascript' type='text/javascript'>alert('Salvo com sucesso!!!');window.location.href='indexEstudante.php'</script>";


            } else {        
                echo "<script language='javascript' type='text/javascript'>alert('Erro!!!');window.location.href='indexEstudante.php'</script>";
            }
       }
       

        
       $conn->close();