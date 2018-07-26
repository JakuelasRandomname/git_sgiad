<?php

$di=$_POST['dtI'];
$df=$_POST['dtF'];
$ep=$_REQUEST['epoca'];

include './dbconfig.php';

$sql="delete from datas where epoca='".$ep."'";
$query = $conn->query($sql);

$sql2= "INSERT into datas(dataInicio,dataFim,epoca) values ('"
                .$di."','"
                .$df."','"
                .$ep."')";

        $query = $conn->query($sql2);
        
        if($query === TRUE) {           
            echo "<script language='javascript' type='text/javascript'>alert('Salvo com sucesso!!!');window.location.href='indexAdmin.php'</script>";
            
            
        } else {        
            echo "<script language='javascript' type='text/javascript'>alert('Erro!!!');window.location.href='indexAdmin.php'</script>";
        }
        
        $conn->close();
