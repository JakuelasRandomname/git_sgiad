<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.theme.css">
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.structure.css">
        <link rel="stylesheet" href="Datatable/datatables.min.css">
        <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="Datatable/datatables.min.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                fetch_data();

                function fetch_data()
                {
                 var dataTable = $('#tDI').DataTable({
                  "processing" : true,
                  "order" : [],
                  "ajax" : {
                   url:"lerDatas.php",
                   type:"POST"
                  }
                 });
                }
            function update_data(id, column_name, value)
            {
             $.ajax({
              url:"updateDatas.php",
              method:"POST",
              data:{id:id, column_name:column_name, value:value},
              success:function(data)
              {
               $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
               $('#tDI').DataTable().destroy();
               fetch_data();
              }
             });
             setInterval(function(){
              $('#alert_message').html('');
             }, 5000);
            }

            $(document).on('blur', '.update', function(){
             var id = $(this).data("id");
             var column_name = $(this).data("column");
             var value = $(this).text();
             update_data(id, column_name, value);
            });
            
            $(document).on('click', '.delete', function(){
            var id = $(this).attr("id");
            if(confirm("De certeza que deseja remover esses dados?"))
            {
             $.ajax({
              url:"deleteDatas.php",
              method:"POST",
              data:{id:id},
              success:function(data){
               $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
               $('#tDI').DataTable().destroy();
               fetch_data();
              }
             });
             setInterval(function(){
              $('#alert_message').html('');
             }, 5000);
            }
           });

        } );
            
        </script>
        
    </head>
    <body>
        <center>
            <br/>
            <br/>
            <div class="container">
                <form class="form-horizontal" method="post" action="gravarDatas.php">
                <table class="table-responsive">    
                    <tr>
                        <td><label for="dtE" class="control-label" style="height: 30px">Selecione a epoca de avaliacao</label></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="epoca" class="form-control" style="height: 30px">
                                <option value="Antes dos testes">Antes dos testes</option>
                                <option value="Apos dos testes">Apos dos testes</option>
                                <option value="Fim do semestre">Fim do semestre</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="dtI" class="control-label" style="height: 25px">Selecione a data de inicio</label></td>
                    </tr>
                    <tr>
                        <td><input name="dtI" type="date" class="form-control" style="height: 30px"></td>
                    </tr>
                    <tr>
                        <td><label for="dtF" class="control-label" style="height: 25px">Selecione a data de fim</label></td>
                    </tr>
                    <tr>
                        <td><input name="dtF" type="date" class="form-control" style="height: 30px"></td>
                    </tr>
                    <tr>
                        <td>
                            <br/><button type="submit" name="btnsave" class="form-control" style="color: white;background-color: #40c4ff;height: 30px">
                                <span class="glyphicon glyphicon-save"></span> &nbsp; Salvar Datas</button>
                        </td>
                    </tr>
                    
                </table>
                </form>
                </div> 
                <div class="container">
                <table cellpadding="1" cellspacing="1" border="1" class="table-responsive" id="tDI"> 
                    <thead>
                        <tr>
                            <th>Data de Inicio</th>
                            <th>Data de Fim</th>
                            <th>Epoca</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>	
                            <td colspan="5" class="dataTables_empty">Loading data from server</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Data de Inicio</th>
                            <th>Data de Fim</th>
                            <th>Epoca</th>
                            <th>Apagar</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                
                
            
    </body>
</html>


