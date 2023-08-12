<?php


$conn = mysqli_connect("localhost", "root", "", "todo_app");
if (!$conn) {
    echo "connect error " . mysqli_connect_error($conn);
}

$sql = "SELECT * FROM  `tasks` ORDER BY id ";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>TODO App</title>
</head>
<body>
    
    <h1 class="form border p-2 my-3 text-center"  >TODO</h1>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="Actions/add_task.php" method="POST" class="form border p-2 my-3">
                    <input type="text" name="title" class="form-control my-3 border border-success" placeholder="add new todo">
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3 " placeholder="add new todo">
                </form>
                </div>
            <div class="col-12">
                <table class="table table-bordered">
                
                <thead>
                        <tr>
                            <th>Number</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                            <?php // var_dump($row); die; 
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['title']; ?></td>

                                <td>
                                    <a href="Actions/delete-task.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> </a>
                                    <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-info"><i class="fa-solid fa-edit"></i> </a>
                                </td>
                                
                            </tr>
                        <?php endwhile; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>  

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
