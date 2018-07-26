<?php
$connect = mysqli_connect("localhost", "root", "", "sgiad");
$columns = array('id','NomeDocente','turma','epoca','mCat1','mCat2','mCat3','mCat4','mCat5','mCat6','mCat7','mCat8','mCat9');

$query = "SELECT * FROM inqueritosprocessados group by nomeDocente";


$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="NomeDocente">' . $row["NomeDocente"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="turma">' . $row["turma"] . '</div>';
 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="epoca">' . $row["epoca"] . '</div>';
 
 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="mCat1">' . $row["mCat1"] . '</div>';
 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="mCat2">' . $row["mCat2"] . '</div>';
 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="mCat3">' . $row["mCat3"] . '</div>';
 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="mCat4">' . $row["mCat4"] . '</div>';
 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="mCat5">' . $row["mCat5"] . '</div>';
 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="mCat6">' . $row["mCat6"] . '</div>';
 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="mCat7">' . $row["mCat7"] . '</div>';
 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="mCat8">' . $row["mCat8"] . '</div>';
 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="mCat9">' . $row["mCat9"] . '</div>';
 
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Visualizar grafico</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM inqueritosprocessados";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
// "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

