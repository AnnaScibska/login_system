<?php
namespace Entities;

class User
{
    public $username;
    public $userPassword;
    public $email;
    public $id;

    public function userLogIn ($email, $userPassword) {
        $this->email = $email;
        $this->userPassword = $userPassword;

        $conn = \Database\Connection::connect();

        try {
            $sql = "SELECT * FROM oop_test.users WHERE Users_Email = ? AND Users_password = ? LIMIT 1;";
            $q = $conn->prepare($sql);
            $q->execute(array($email, $userPassword));
            if($q->rowCount()) {
                while ($row = $q->fetch()) {
                    $this->username = $row['Users_Name'];
                    $this->id = $row['Users_Id'];
                }
            }
        }
        catch(\PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        \Database\Connection::disconnect();
    }

    public function userRegister ($username, $email, $userPassword) {
        $this->username = $username;
        $this->email = $email;
        $this->userPassword = $userPassword;

        $conn = \Database\Connection::connect();

        try {
            $sql = "INSERT INTO oop_test.users (Users_name, Users_email, Users_password) VALUES (?, ?, ?)";
            $q = $conn->prepare($sql);
            $q->execute(array($username, $email, $userPassword));
        }
        catch(\PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        \Database\Connection::disconnect();
    }
}