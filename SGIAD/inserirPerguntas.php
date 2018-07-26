<?php
    include './dbconfig.php';

    
        
        $titulo=$_POST["txC"];
        
        
        $sql= "INSERT into perguntasdocentes(categoria) values ('"
                .$titulo."')";
        
        $query = $conn->query($sql);
        
        if($query === TRUE) {           
            echo "<script language='javascript' type='text/javascript'>alert('Salvo com sucesso!!!');window.location.href='indexAdmin.php'</script>";
            
            
        } else {        
            echo "<script language='javascript' type='text/javascript'>alert('Erro!!!');window.location.href='indexAdmin.php'</script>";
        }
        
        $conn->close();
        
        
        
     

    
        
    
    
    