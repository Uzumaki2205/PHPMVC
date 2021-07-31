<?php 
require 'vendor/autoload.php';
use App\SQLiteConnection;

class QuestionModel {
	private $pdo;

    public function __construct()
    {
    	$sqlite = new SQLiteConnection();
        $this->pdo = $sqlite->connect();
        $this->checkLogin();
    }

    public function checkLogin()
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

	public function Question()
    {
        $sql = "SELECT * FROM Question ORDER BY RANDOM() LIMIT 20";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function SubmitQuestion($request, $mssv, $name, $email)
    {
        try {
            $correct = 0;
            $point = 0;
            foreach ($request as $key => $value) {
                if (str_contains($key, 'result')) {
                    $id_question = substr($key, 6);

                    $sql = "SELECT Result, Point FROM Question Where Id=:id_question";
                    $stmt = $this->pdo->prepare($sql);
                    $stmt->execute([":id_question" => $id_question]);
                    $res = $stmt->fetch(\PDO::FETCH_ASSOC);

                    if ($res['Result'] == $value . ' ') {
                        $correct++;
                        $point = $point + $res['Point'];
                    }
                }
            }

            $sql_insert = "INSERT INTO Report(Mssv, Name, Email, Final_Result, Point) VALUES (:mssv, :name, :email, :final_result, :point)";
            $statement = $this->pdo->prepare($sql_insert);
            $statement->execute([
                ':mssv' => $mssv,
                ':name' => $name,
                ':email' => $email,
                ':final_result' => $correct . '/20',
                ':point' => $point,
            ]);

            return $correct . '/20';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function CreateQuestion(
        $title,
        $description,
        $type_question,
        $point_question,
        $answer_A,
        $answer_B,
        $answer_C,
        $answer_D,
        $result
    ) {
        $sql = "INSERT INTO Question(title, description, ans_a, ans_b, ans_c, ans_d, result, point, typequestion) 
        VALUES(:title, :description, :ans_a, :ans_b, :ans_c, :ans_d, :result, :point, :type_question)";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':title' => $title,
                ':description' => $description,
                ':type_question' => $type_question,
                ':point' => $point_question,
                ':ans_a' => $answer_A,
                ':ans_b' => $answer_B,
                ':ans_c' => $answer_C,
                ':ans_d' => $answer_D,
                ':result' => $result,
            ]);
            return "Success To Add";
        } catch (Exception $e) {
            //echo $sql . $e->getMessage();
            return "Fail To Add";
        }
    }

    public function DeleteQuestion($id)
    {
        try {
            $sql = "Delete FROM Question WHERE ID=:id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return "Success To Delete";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}