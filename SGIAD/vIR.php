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
                 var dataTable = $('#tI').DataTable({
                  "processing" : true,
                  "order" : [],
                  "ajax" : {
                   url:"lerIR.php",
                   type:"POST"
                  }
                 });
                }
				} );           
        </script>
    </head>
    <body>
        <center>    
            <br/>
            <br/>
            <div class="container">
                <table cellpadding="1" cellspacing="1" border="1" class="table-responsive" id="tI"> 
                    <thead>
                        <tr>
                            <th>Nome do Docente</th>
                            <th>Turma</th>
                            <th>Cat1</th>
                            <th>Cat2</th>
                            <th>Cat3</th>
                            <th>Cat4</th>
                            <th>Cat5</th>
                            <th>Cat6</th>
                            <th>Cat7</th>
                            <th>Cat8</th>
                            <th>Cat9</th>
                            <th>Data da Resposta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>	
                            <td colspan="5" class="dataTables_empty">Loading data from server</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome do Docente</th>
                            <th>Turma</th>
                            <th>Cat1</th>
                            <th>Cat2</th>
                            <th>Cat3</th>
                            <th>Cat4</th>
                            <th>Cat5</th>
                            <th>Cat6</th>
                            <th>Cat7</th>
                            <th>Cat8</th>
                            <th>Cat9</th>
                            <th>Data da Resposta</th>
                        </tr>
                    </tfoot>
                </table>
         </div>
        </center>    
    </body>
</html>
