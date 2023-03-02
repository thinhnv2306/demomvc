<?php

class User
{

    public function login($POST)
    {
        $DB = new Database();
        $_SESSION['error'] = "";

        if (isset($POST['username']) && isset($POST['password'])) {
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];

            $query = "SELECT * from users where users.name= :username && users.password = :password limit 1";

            $data = $DB->read($query, $arr);
            if (is_array($data)) {
                //login
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->user_address;
            } else {
                $_SESSION['error'] = "Wrong username or password";
            }

        } else {
            $_SESSION['error'] = "Please enter username or password";

        }
    }

    public function signup($POST)
    {
        $DB = new Database();
        $_SESSION['error'] = "";

        if (isset($POST['username']) && isset($POST['password']) && isset($POST['email'])) {
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];
            $arr['email'] = $POST['email'];

            $query = "INSERT INTO users (username, password, email) VALUES (:username,:password,:email)";

            $data = $DB->write($query, $arr);
            if ($data) {
                header("Location:" . ROOT . "login");
                die;
            }

        } else {
            $_SESSION['error'] = "Please enter a valid username or password";
        }
    }
    public function check_logged_in()
    {
        if (isset($_SESSION['user_url'])) {
            $arr['user_url'] = $_SESSION['user_url'];

            $query = "SELECT * from users where url_address= :user_url limit 1";

            $data = $DB->read($query, $arr);
            if (is_array($data)) {
                //login
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->user_address;

                return true;
            }
        }
        return false;
    }
}
