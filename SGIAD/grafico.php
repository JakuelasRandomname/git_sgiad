<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            #container {
                max-width: 800px;
                min-width: 310px;
                height: 400px;
                margin: 0 auto
            }
        </style>
	</head>
	<body>
            
            <?php
                include './dbconfig.php';
                
                $query = "select NomeDocente FROM inqueritosprocessados WHERE id = '".$_POST["id"]."'";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $nome=$row['NomeDocente'];
                
                            
            ?>
                    <div id="container"></div>

                    
            <script type="text/javascript">
                    var nome=<?php echo "'Grafico do(a) ".$nome."'"; ?>;
                    
                    var e1 = <?php  
                            $sql = "SELECT distinct mCat1,mCat2,mCat3,mCat4,mCat5,mCat6,mCat7,mCat8,mCat9 from inqueritosprocessados where nomeDocente='".$nome."' and epoca='Antes dos testes'";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo "[".$row['mCat1'].",".$row['mCat2'].",".$row['mCat3'].",".$row['mCat4'].",".$row['mCat5'].",".$row['mCat6'].",".$row['mCat7'].",".$row['mCat8'].",".$row['mCat9']."]";
                            ?>;
                    var e2 = <?php  
                            $sql = "SELECT distinct mCat1,mCat2,mCat3,mCat4,mCat5,mCat6,mCat7,mCat8,mCat9 from inqueritosprocessados where nomeDocente='".$nome."' and epoca='Apos os testes'";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo "[".$row['mCat1'].",".$row['mCat2'].",".$row['mCat3'].",".$row['mCat4'].",".$row['mCat5'].",".$row['mCat6'].",".$row['mCat7'].",".$row['mCat8'].",".$row['mCat9']."]";
                            ?>;
                    var e3 = <?php  
                            $sql = "SELECT distinct mCat1,mCat2,mCat3,mCat4,mCat5,mCat6,mCat7,mCat8,mCat9 from inqueritosprocessados where nomeDocente='".$nome."' and epoca='Fim do semestre'";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo "[".$row['mCat1'].",".$row['mCat2'].",".$row['mCat3'].",".$row['mCat4'].",".$row['mCat5'].",".$row['mCat6'].",".$row['mCat7'].",".$row['mCat8'].",".$row['mCat9']."]";
                            ?>;
                                    
                    Highcharts.chart('container', {
                        title: {
                            text: nome
                        },

                        subtitle: {
                            text: 'Source: SGIAD'
                        },

                        xAxis: {

                            categories: ['Cat1','Cat2','Cat3','Cat4','Cat5','Cat6','Cat7','Cat8','Cat9']
                        },

                        yAxis: {
                            title: {
                                text: 'Moda das Categorias'
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },
                        series: [{
                            name: 'Antes dos testes',
                            data: e1
                        }, {
                            name: 'Apos os testes',
                            data: e2
                        }, {
                            name: 'Fim do semestre',
                            data: e3
                        }],

                        responsive: {
                            rules: [{
                                condition: {
                                    maxWidth: 500
                                },
                                chartOptions: {
                                    legend: {
                                        layout: 'horizontal',
                                        align: 'center',
                                        verticalAlign: 'bottom'
                                    }
                                }
                            }]
                        }

                    });
		</script>
                <br/>
                <br/>
                <div id="legenda">
                    <ol type="A">
                        <li>Cat1= Domina as materias ministradas</li><br/>
                        <li>Cat2= Demonstra boa organizacao e preparacao das aulas</li><br/>
                        <li>Cat3= Utiliza meios que facilitam a compreencao</li><br/>
                        <li>Cat4= Foi claro na orientacao das materias</li><br/>
                        <li>Cat5= Soube motivar os alunos nas materias ministradas</li><br/>
                        <li>Cat6= Conseguiu participacao equilibrada e activa dos alunos</li><br/>
                        <li>Cat7= Relacionou-se correctamente com os alunos</li><br/>
                        <li>Cat8= Teve disponibilidade para esclarecimento de duvidas e atendimento aos alunos</li><br/>
                        <li>Cat9= Foi assiduo e pontual</li><br/>
                    </ol>
                </div>
	</body>
</html>
