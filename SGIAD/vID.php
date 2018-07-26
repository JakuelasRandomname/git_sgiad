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
                 var dataTable = $('#tD').DataTable({
                  "processing" : true,
                  "order" : [],
                  "ajax" : {
                   url:"lerDocentes.php",
                   type:"POST"
                  }
                 });
                }
            function update_data(id, column_name, value)
            {
             $.ajax({
              url:"updateDocentes.php",
              method:"POST",
              data:{id:id, column_name:column_name, value:value},
              success:function(data)
              {
               $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
               $('#tD').DataTable().destroy();
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
              url:"deleteDocentes.php",
              method:"POST",
              data:{id:id},
              success:function(data){
               $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
               $('#tD').DataTable().destroy();
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
        <div class="container">
            <form class="form-horizontal" action="importarDocentes.php" method="post" name="upload_excel" enctype="multipart/form-data">
            <table class="table-responsive"> 
                <tr>
                    <td><label class="control-label" for="file">Selecione o Ficheiro</label></td>
                </tr>
                <tr>
                    <td><input type="file" name="file" id="file" class="form-control"></td>
                </tr>
                <br/>
                <tr>
                    <td><br/><button type="submit" name="btnsave" class="form-control" style="color: white;background-color: #40c4ff;height: 30px">
                             <span class="glyphicon glyphicon-save"></span> &nbsp; Salvar Docentes</button>
                    </td>
                </tr>
            </table>
            </form>
        </div>
        
        <br/>
        <br/>
        <br/>
        
        <div class="container">
                <table cellpadding="1" cellspacing="1" border="1" class="table-responsive" id="tD"> 
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Nome</th>
                            <th>Turma</th>
                            <th>Disciplina</th>
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
                            <th>Id</th>
                            <th>Username</th>
                            <th>Nome</th>
                            <th>Turma</th>
                            <th>Disciplina</th>
                            <th>Apagar</th>
                        </tr>
                    </tfoot>
                </table>
        </div>
        </center>
    </body>
</html>



