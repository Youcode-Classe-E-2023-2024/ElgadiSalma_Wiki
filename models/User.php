<?php
include_once '_config/Database.php';
class User
{
    private $db;

    public $id_user;
    public $email;
    public $username;
    public $photo;
    private $password;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUsers($myId)
    {
        $this->db->query("SELECT * FROM users WHERE id_user != :myId");
        $this->db->bind(':myId', $myId);
        

        $users = $this->db->resultSet();

        return $users;
    }

    public function check_email($email) 
    {
        $this->db->query("SELECT * FROM users WHERE email = ?");
        $this->db->bind(1, $email, PDO::PARAM_STR);

        $row = $this->db->single();

        return ($row) ? true : false;
    }

    public function register($email, $username, $role, $password, $photo) 
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO users (username, email, password, photo, role) VALUES (?, ?, ?, ?, ?)");
        $this->db->bind(1, $username, PDO::PARAM_STR);
        $this->db->bind(2, $email, PDO::PARAM_STR);
        $this->db->bind(3, $hashedPassword, PDO::PARAM_STR);
        $this->db->bind(4, $photo, PDO::PARAM_STR);
        $this->db->bind(5, $role, PDO::PARAM_INT);

        $result = $this->db->execute();

        return $result;
    }


    public function login($email, $password) 
    {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email, PDO::PARAM_STR);
    $this->db->execute();

    $row = $this->db->single();

    if ($row) {
        $hashedPasswordFromDatabase = $row->password; 
        if (password_verify($password, $hashedPasswordFromDatabase)) {
            return [
                'id_user' => $row->id_user,
                'photo' => $row->photo,
                'username' => $row->username,
                'email' => $row->email,
                'role' => $row->role
            ];
        } else {
            return false;
        }
    } else {
        return false;
    }
    }

    public function deleteUser($userId) {
        $this->db->query("DELETE FROM users WHERE id_user = ?");
        $this->db->bind(1, $userId, PDO::PARAM_INT);

        return $this->db->execute();
    }


}
