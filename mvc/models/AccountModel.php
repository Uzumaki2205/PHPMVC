<?php
require 'vendor/autoload.php';
use App\SQLiteConnection;

class AccountModel
{
    private $pdo;

    function __construct()
    {
    	$sqlite = new SQLiteConnection();
        $this->pdo = $sqlite->connect();

        //$this->checkLogin();
    }

    public function CreateUser($username, $email, $password, $re_password)
    {
        if (empty($username) || empty($email) || empty($password) || empty($re_password))
            return "Value Cannot Be Empty!!";
        if ($password != $re_password)
            return "Password does not matches!!";

        $sql = 'INSERT INTO User(Username, Password, Email) VALUES(:username, :password, :email)';

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':password' => $password,
                ':email' => $email,
            ]);

            //header("Location: ../Account/Login");
            return "Successfully!!";
        } catch (Exception $e) {
            //echo $sql . $e->getMessage();
            //header("Location: register.php");
            return "Error when create user!!";
        }
    }

    public function Login($username, $password)
    {
        if (empty($username) || empty($password))
            return "Value Cannot Be Empty!!";
        
        $sql = "SELECT Username, Email, UserType FROM User WHERE Username=:username AND Password=:password LIMIT 1";

        try {
            $stmt = $this->pdo->query($sql);
            $stmt->execute([
                ':username' => $username,
                ':password' => $password,
            ]);

            $result = $stmt->fetchAll();
            if ($result != null) {
                
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $result[0]['Email'];
                $_SESSION["type"] = $result[0]['UserType'];

                if ($result[0]['UserType'] == 'admin')
                    header("Location: ../Admin/Index");
                else if ($result[0]['UserType'] == 'user')
                    header("Location: ../");
                else header("Location: ../Account/Login");
            } else header("Location: ../Account/Login");
        } catch (Exception $e) {
            //echo $sql . $e->getMessage();
            //header("Refresh:0; url=register.php");
            header("Location: ../Account/Login");
        }
    }


    // public function Question()
    // {
    //     $sql = "SELECT * FROM Question ORDER BY RANDOM() LIMIT 20";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    // public function SubmitQuestion($request, $mssv, $name, $email)
    // {
    //     try {
    //         $correct = 0;
    //         $point = 0;
    //         foreach ($request as $key => $value) {
    //             if (str_contains($key, 'result')) {
    //                 $id_question = substr($key, 6);

    //                 $sql = "SELECT Result, Point FROM Question Where Id=:id_question";
    //                 $stmt = $this->pdo->prepare($sql);
    //                 $stmt->execute([":id_question" => $id_question]);
    //                 $res = $stmt->fetch(\PDO::FETCH_ASSOC);

    //                 if ($res['Result'] == $value . ' ') {
    //                     $correct++;
    //                     $point = $point + $res['Point'];
    //                 }
    //             }
    //         }

    //         $sql_insert = "INSERT INTO Report(Mssv, Name, Email, Final_Result, Point) VALUES (:mssv, :name, :email, :final_result, :point)";
    //         $statement = $this->pdo->prepare($sql_insert);
    //         $statement->execute([
    //             ':mssv' => $mssv,
    //             ':name' => $name,
    //             ':email' => $email,
    //             ':final_result' => $correct . '/20',
    //             ':point' => $point,
    //         ]);

    //         return $correct . '/20';
    //     } catch (Exception $e) {
    //         return $e->getMessage();
    //     }
    // }
}
