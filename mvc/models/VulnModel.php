<?php
require 'vendor/autoload.php';
use App\SQLiteConnection;

class VulnModel {
	private $pdo;

    function __construct()
    {
        $sqlite = new SQLiteConnection();
        $this->pdo = $sqlite->connect();
        $this->checkLogin();
    }

	function ExecuteCommand($name) {
		$res = '';		
		$res = shell_exec('ping ' . $_POST['ip']);
		return $res;
	}

	function checkLogin()
    {
        if (isset($_SESSION["type"]) && ($_SESSION["type"] == 'user' || ($_SESSION["type"] == 'admin'))) {
            $sql = "SELECT UserType FROM User WHERE Username=:username AND Email=:email LIMIT 1";
            try {
                $stmt = $this->pdo->query($sql);
                $stmt->execute([
                    ':username' => $_SESSION['username'],
                    ':email' => $_SESSION['email'],
                ]);

                $result = $stmt->fetchAll();
                if (!$result)
                    header("Location: ../Account/Login");
            } catch (Exception $e) {
                echo 'You do not have validated!!';
                header("Location: ../Account/Login");
            }
        } else {
            echo 'You not have permission to access this page!!';
            header("Location: ../Account/Login");
        }
    }
}