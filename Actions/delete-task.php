<?php



require_once '../Classes/Task.php';
require_once '../Classes/TaskRepository.php';



$db = new mysqli('localhost', 'root', '', 'todo_app');
$taskRepository = new TaskRepository($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $title = $_POST['title'];
    $taskRepository->deleteTask($title);
}

$db->close();


header("location:../index.php");

 
?>