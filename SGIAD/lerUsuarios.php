<?php
//include './dbconfig.php';
//
//
//$sql = "SELECT * FROM estudantes";
//$result = $conn->query($sql);
//
//
//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        //echo "Username: " . $row["Username"]. " - Password: " . $row["Password"]. "<br>";
//        $data[]=$row;
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
$columns = array('username', 'Nome','turma','disc1','disc2','disc3','disc4','disc5','disc6','disc7','password');

$query = "SELECT * FROM estudantes";


$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div  data-id="'.$row["id"].'" data-column="username">' . $row["id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="Nome">' . $row["Nome"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="turma">' . $row["turma"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="disc1">' . $row["disc1"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="disc2">' . $row["disc2"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="disc3">' . $row["disc3"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="disc4">' . $row["disc4"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="disc5">' . $row["disc5"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="disc6">' . $row["disc6"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="disc7">' . $row["disc7"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="password">' . $row["password"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Apagar</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM estudantes";
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



 



