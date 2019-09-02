<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();
// unset($_SESSION['todo']);
$todo = $_POST['todo_input'];
$submit = $_POST['submit'];
$delete_todo = $_GET['delete'];
$_SESSION['todo'][] = [
   "todo_item" => $todo,
   "delete" => $delete_todo
];
if (isset($todo)) {
   header("location:index.php");
}
?>
</body>
</html>


