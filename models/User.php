<?php

class User
{
    public $id_user;
    public $email;
    public $username;
    public $photo;
    private $password;

    public function __construct()
    {
        global $db;
    }

    public function getAllUsers($myId)
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM users WHERE id_user !=$myId");
        $stmt->execute();

        $result = $stmt->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $users;
    }
    public function check_email($email)
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return ($row) ? true : false;
    }
    public function register($email, $username,$role, $password, $photo)
    {
        global $db;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (username, email, password, photo, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssi', $username, $email, $hashedPassword, $photo, $role);
        $result = $stmt->execute();
        return $result;
    }

    public function login($email, $password)
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $hashedPasswordFromDatabase = $row['password'];
            if (password_verify($password, $hashedPasswordFromDatabase)) {
                return ['id_user' => $row['id_user'], $row['photo'], 'username' => $row['username'], 'email' => $row['email'],'role' => $row['role']];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function send_invitation($id_me, $id_user)
    {
        global $db;
        $stmt = $db->prepare("INSERT INTO invitation (id_user1, id_user2) VALUES ('$id_me','$id_user')");
        $result = $stmt->execute();
        return $result;
    }

    // function edit()
    // {
    //     global $db;
    //     return $db->query("UPDATE users SET users_email = '$this->email', users_username = '$this->username' WHERE users_id = '$this->id_user'");
    // }

    public function setPassword($pwd)
    {
        $this->password = password_hash($pwd, PASSWORD_DEFAULT);
    }
}