<?php

$connect = mysqli_connect("localhost", "root", "", "sgiad");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM perguntasdocentes WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
