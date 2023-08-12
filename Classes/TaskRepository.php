<?php 

class TaskRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllTasks() {
        $tasks = [];
        $query = "SELECT * FROM tasks";
        $result = $this->db->query($query);

        while ($row = $result->fetch_assoc()) {
            $tasks[] = new Task($row['id'], $row['title']);
        }

        return $tasks;
    }

    public function addTask($title) {
        $title = $this->db->real_escape_string($title);

        $query = "INSERT INTO tasks (title) VALUES ('$title')";
        $this->db->query($query);
    }

    
    public function updateTask($title) {
        $title = $this->db->real_escape_string($title);

        $id = $_GET['id'];
        $query = "UPDATE `tasks` SET `title`='$title' WHERE `id` = $id ";
        $this->db->query($query);
    }


    public function deleteTask($title) {
        $title = $this->db->real_escape_string($title);

        $id = $_GET['id'];
        $query = "DELETE FROM tasks WHERE id = '$id'";
        $this->db->query($query);
    }

}
