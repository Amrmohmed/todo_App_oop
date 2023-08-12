<?php 


$conn =  mysqli_connect("localhost","root","","todo_app");

if(!$conn){
    echo "connect error " . mysqli_connect_error($conn);
}


$sql = "CREATE TABLE IF NOT EXISTS tasks(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL 
) ";

mysqli_query($conn,$sql);

mysqli_close($conn);

