<?php
class DB
{
    private $hostname = '';

    private $username = '';

    private $password = '';

    private $dbName = '';

    public $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->hostname;dbname=$this->dbName", $this->username, $this->password);
        } catch (PDOException $e) {
            echo __LINE__.$e->getMessage();
        }
    }

    public function getProfile($profile)
    {
        $query = $this->connection->prepare("SELECT `name_profile` FROM `profiles` WHERE `id_profile` = :profile");
        $query->execute([":profile" => $profile]);
        $result = $query->fetchObject();
        return $result;
    }

    public function getLogin($username, $password)
    {
        $query = $this->connection->prepare("SELECT `user_name`, `email`, `name`, `profile`, `status` FROM `users` WHERE `user_name`   = :username AND `password` = :password");
        $query->execute([":username" => $username, ":password" => $password]);
        $result = $query->fetchObject();
        return $result;
    }

    public function getUsers()
    {
        $query = $this->connection->prepare("SELECT `id`, `user_name`, `email`, `name`, `profile`, `status` FROM `users`");
        $query->execute();
        $result = [];
        
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $result[] = $row;
        }
        return $result;
    }

    public function getUser($id)
    {
        $query = $this->connection->prepare("SELECT `id`, `user_name`, `email`, `name`, `profile`, `status`, `password` FROM `users` WHERE `id` = :id");
        $query->execute([':id' => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function deleteUsers($id)
    {
        $query = $this->connection->prepare("DELETE FROM users WHERE id = :id");
        return $query->execute([":id" => $id]);
    }

    public function updateUser($post)
    {
        $request = "UPDATE users
        SET email=:mail, name=:username, password=:pass, user_name=:nickname, status=:stat, profile=:prof
        WHERE id=:id";
    
        $query = $this->connection->prepare($request);
        
        $query->bindParam(":mail", $post['email']);
        $query->bindParam(":username", $post['nameUser']);
        $query->bindParam(":pass", $post['password']);
        $query->bindParam(":nickname", $post['username']);
        $query->bindParam(":stat", $post['status']);
        $query->bindParam(":prof", $post['profile']);
        $query->bindParam(":id", $post['idUser']);
    
        return $query->execute();
    }

    public function insertUsers($post)
    {
        $query = $this->connection->prepare(
            "INSERT INTO users (`email`, `name`, `password`, `user_name`, `status`, `profile`) VALUES (?, ?, ?, ?, ?, ? )"
        );
        $query->bindParam(1, $post['email']);
        $query->bindParam(2, $post['nameUser']);
        $query->bindParam(3, $post['password']);
        $query->bindParam(4, $post['username']);
        $query->bindParam(5, $post['status']);
        $query->bindParam(6, $post['profile']);
    
        return $query->execute();
    }
}
