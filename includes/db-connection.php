<?php 
$server = 'localhost';
$user =  'root';
$password = '';
$db = 'todo_list';


$conn =mysqli_connect("localhost", "root", "", "todo_list");
if(mysqli_connect_error()){
echo "Connection Fail".mysqli_connect_error();
}

  ?>

