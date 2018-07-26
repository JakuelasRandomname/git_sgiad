<?php
//include './dbconfig.php';
//
//
//$sql = "SELECT * FROM docentes";
//$result = $conn->query($sql);
//
//
//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
//       $data[]=$row;
//    }
//} 
//
//$conn->close();
//
//$results = array("sEcho" => 1,
//        	"iTotalRecords" => count($data),
//        	"iTotalDisplayRecords" => count($data),
//        	"aaData" => $data );
//
//
//echo json_encode($results);
$connect = mysqli_connect("localhost", "root", "", "sgiad");
$columns = array('id', 'Username','Nome','Turma','Disciplina');

$query = "SELECT * FROM docentes";


$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div  data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="Username">' . $row["Username"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="Nome">' . $row["Nome"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="Turma">' . $row["Turma"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="Disciplina">' . $row["Disciplina"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Apagar</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM docentes";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 //"draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);
