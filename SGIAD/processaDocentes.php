<?php
include './dbconfig.php';
                            
                            //processa todos inqueritos respondidos e armazena nos inueritos processados, para cada docente avaliado ele cria um registro
       $query1="select distinct nomeDocente from inqueritosrespondidos";
        $result = $conn->query($query1);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $nome=$row['nomeDocente'];  
              $sql2= "INSERT into inqueritosprocessados(nomeDocente,turma,mCat1,mCat2,mCat3,mCat4,mCat5,mCat6,mCat7,mCat8,mCat9) select nomeDocente,turma,moda(Cat1,'".$nome."'),moda(Cat2,'".$nome."'),moda(Cat3,'".$nome."'),moda(Cat4,'".$nome."'),moda(Cat5,'".$nome."'),moda(Cat6,'".$nome."'),moda(Cat7,'".$nome."'),moda(Cat8,'".$nome."'),moda(Cat9,'".$nome."') from inqueritosRespondidos
                where nomeDocente='".$nome."'
                group by nomeDocente"; 
              $query = $conn->query($sql2); 

              $sql3= "UPDATE inqueritosprocessados SET epoca= (SELECT distinct 
                        CASE
                        WHEN dataResposta between (select dataInicio from datas where epoca='antes dos testes') and (select dataFim from datas where epoca='antes dos testes') THEN 'Antes dos testes'
                        WHEN dataResposta between (select dataInicio from datas where epoca='apos os testes') and (select dataFim from datas where epoca='apos os testes') THEN 'Apos os testes'
                        WHEN dataResposta between (select dataInicio from datas where epoca='fim do semestre') and (select dataFim from datas where epoca='fim do semestre') THEN 'Fim do semestre'
                        END
                        AS epoca
                        from  inqueritosrespondidos where nomeDocente='".$nome."')
                      where nomeDocente='".$nome."'";       

              $query2 = $conn->query($sql3);


                                }
} 