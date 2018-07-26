<?php

$connect = mysqli_connect("localhost", "root", "", "sgiad");
$columns = array('id', 'dataInicio','dataFim','epoca');

$query = "SELECT * FROM datas order by epoca";


$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 //$sub_array[] = '<div  data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="dataInicio">' . $row["dataInicio"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="dataFim">' . $row["dataFim"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="epoca">' . $row["epoca"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Apagar</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM datas order by epoca";
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

