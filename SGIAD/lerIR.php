<?php
session_start();
$id=$_SESSION['username'];

$connect = mysqli_connect("localhost", "root", "", "sgiad");
$columns = array('NomeDocente','turma','cat1','cat2','cat3','cat4','cat5','cat6','cat7','cat8','cat9','dataResposta');

$query = "SELECT * FROM inqueritosrespondidos where idEstudante='".$id."'";


$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["NomeDocente"];
 $sub_array[] = $row["turma"];
 $sub_array[] = $row["Cat1"];
 $sub_array[] = $row["Cat2"];
 $sub_array[] = $row["Cat3"];
 $sub_array[] = $row["Cat4"];
 $sub_array[] = $row["Cat5"];
 $sub_array[] = $row["Cat6"];
 $sub_array[] = $row["Cat7"];
 $sub_array[] = $row["Cat8"];
 $sub_array[] = $row["Cat9"];
 $sub_array[] = $row["dataResposta"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM inqueritosrespondidos where idEstudante='".$id."'";
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

