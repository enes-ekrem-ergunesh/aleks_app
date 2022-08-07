<?php
class NoteDao
{

    private $conn;
    /**
     * constructor of dao class
     */
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "memduh2PRD";
        $schema = "alexdb";
        $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function get_all()
    {
        $stmt = $this->conn->prepare("SELECT * FROM notes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM notes WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        return "deleted successfully";
    }

}
