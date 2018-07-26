<?php
   include("./dbconfig.php");
   session_start();
   
   $username=$_POST["txUsername"];
   $password=$_POST["txPassword"];
   
   $sql="select * from usuarios where username= '".$username."'AND password='".$password."'limit 1";
   
   $result = $conn->query($sql);
   $count=$result->num_rows;
   
      if($count == 1) {
        if($username=="ADMIN" || $username=="admin" || $username=="Admin"){
          //  session_register("username");
            $_SESSION['username'] = $username;
            header("location: indexAdmin.php");  
        }
        else{
            $d=date('Y-m-d');;
            $sql="SELECT * FROM `datas` WHERE'".$d."'between dataInicio and dataFim";
            $result = $conn->query($sql);
            if($result->num_rows>0){
               // session_register("username");
                $_SESSION['username'] = $username;
                header("location: indexEstudante.php");
            }
            else{
                echo "<script language='javascript' type='text/javascript'>alert('De momento nao existe nenhum inquerito a ser respondido');window.location.href='index.php'</script>";
            }
        }
      }
      else {
         echo "<script language='javascript' type='text/javascript'>alert('Username ou Password errado');window.location.href='index.php'</script>";
      }
    
   



