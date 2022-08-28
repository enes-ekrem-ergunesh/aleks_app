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

    public function get_by_id($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM notes WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //[] || [sth]
        return reset($result); //result[0];
    }

    public function add($entity)
    {
        $stmt = $this->conn->prepare("INSERT INTO notes (name, description) VALUES (:name, :description)");
        $stmt->execute([':name' => $entity["name"], ':description' => $entity["description"]]);
        $stmt->fetchAll(PDO::FETCH_ASSOC); //[] || [sth]
        return "added successfully!";
    }

    public function update($id)
    {
        $stmt = $this->conn->prepare("UPDATE notes 
        SET name = 'test2', 
        desc = 'test2' 
        WHERE (id = :id)");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //[] || [sth]
        return reset($result); //result[0];
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM notes WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        return "deleted successfully";
    }
}
