<?php

class Account extends Controller {
    private $account_model;

    function __construct() {
        $this->account_model = $this->model('AccountModel');
        // $this->checkLogin();
    }

    // public function checkLogin()
    // {
    //     if (isset($_SESSION["type"]) && ($_SESSION["type"] == 'user' || ($_SESSION["type"] == 'admin'))) {
    //         $sql = "SELECT UserType FROM User WHERE Username=:username AND Email=:email LIMIT 1";
    //         try {
    //             $stmt = $this->pdo->query($sql);
    //             $stmt->execute([
    //                 ':username' => $_SESSION['username'],
    //                 ':email' => $_SESSION['email'],
    //             ]);

    //             $result = $stmt->fetchAll();
    //             if (!$result)
    //                 header("Location: ../Account/Login");
    //         } catch (Exception $e) {
    //             echo 'You do not have validated!!';
    //             header("Location: ../Account/Login");
    //         }
    //     } else {
    //         echo 'You not have permission to access this page!!';
    //         header("Location: ../Account/Login");
    //     }
    // }

    function Login() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(!isset($_SESSION['username'])) 
            { 
                $this->view('login');
            } 
            else echo '<article class="tile is-child notification is-danger">
            <p class="title">You are logined!!</p>
            <p class="subtitle">Please logout before login.</p>
            </article>
            ';
        }
        else {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $alert = $this->account_model->Login($_POST['username'], $_POST['password']);
                $this->view('login', ["alert"=>$alert]);
            }
        }
        
    }

    function Register() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('register');
        }
        else {
            if (isset($_POST['Register'])) {
                $res = $this->account_model->CreateUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['re_password']);
                $this->view('register', ["alert"=>$res]);
            }
        }
    }

    public function Logout()
    {
        session_destroy();
        header('Location: ../');
    }
}
