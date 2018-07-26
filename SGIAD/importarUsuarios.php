<?php
include("./dbconfig.php");

    $filename=$_FILES["file"]["tmp_name"];		
                if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
                    $sql = "INSERT into estudantes (id,Nome,Turma,disc1,disc2,disc3,disc4,disc5,disc6,disc7,password) 
                    values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]
                            ."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."')";
                    $result = $conn->query($sql);
				if(!isset($result))
				{
                                    	echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"indexAdmin.php\"
						  </script>";		
				}
				else {
                                        $sql2= "INSERT into usuarios Select username,password from estudantes";
                                        $query = $conn->query($sql2);
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"indexAdmin.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }



