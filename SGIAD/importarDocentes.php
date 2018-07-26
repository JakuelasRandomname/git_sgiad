<?php
include("./dbconfig.php");

    $filename=$_FILES["file"]["tmp_name"];		
                if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
                    $sql = "INSERT into docentes (Username,Nome,Turma,Disciplina) 
                    values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."')";
                    $result = $conn->query($sql);
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Erro:Please Upload CSV File.\");
							window.location = \"indexAdmin.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"Importado com sucesso.\");
						window.location = \"indexAdmin.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }

