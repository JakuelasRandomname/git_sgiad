<!DOCTYPE html>

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
                 var dataTable = $('#tR').DataTable({
                  "processing" : true,
                  "order" : [],
                  "ajax" : {
                   url:"lerDocAv.php",
                   type:"POST"
                  }
                 });
                }
   
            $('#todos').click(function(){
                $('#myModal2').load('processaDocentes.php');
                $('#tR').DataTable().destroy();
                fetch_data();
            });
            
            $(document).on('click', '.delete', function(){
            var id = $(this).attr("id");
            $('#myModal').empty();
            $('#myModal').load('grafico.php',{id:id});
           });

} );           
        </script>
    </head>
    <body>
        <script src="highcharts/code/highcharts.js"></script>
            <script src="highcharts/code/modules/series-label.js"></script>
            <script src="highcharts/code/modules/exporting.js"></script>
            <script src="highcharts/code/modules/export-data.js"></script>
        <center>
            <div align="left">
                <button type="button" name="todos" id="todos" class="btn btn-info">
                    <span class="glyphicon glyphicon-warning-sign"></span> &nbsp; Processar todos inqueritos
                </button>
            </div>
        </center>
    
    
        <div class="container" name="myModal" id="myModal">
        </div>
    
        <div class="container" name="myModal2" id="myModal2">
        </div>
        
        <br/>
        <br/>
        
        <center>    
            <div class="container">
                <table cellpadding="1" cellspacing="1" border="1" class="table-responsive" id="tR"> 
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nome do Docente</th>
                            <th>Turma</th>
                            
                            
                            <th>Relatorio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>	
                            <td colspan="5" class="dataTables_empty">Loading data from server</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Nome do Docente</th>
                            <th>Turma</th>
                            
                            
                            <th>Relatorio</th>
                        </tr>
                    </tfoot>
                </table>
         </div>
        </center>    
    </body>
</html>
