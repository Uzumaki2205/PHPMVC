<?php 
require 'vendor/autoload.php';
use App\SQLiteConnection;

class AdminModel {
	private $pdo;

	public function __construct()
	{
		$sqlite = new SQLiteConnection();
		$this->pdo = $sqlite->connect();
		$this->checkAdmin();
	}

	public function checkAdmin()
	{
		if (isset($_SESSION["type"]) && $_SESSION["type"] == 'admin') {
			$sql = "SELECT UserType FROM User WHERE Username=:username AND Email=:email LIMIT 1";
			try {
				$stmt = $this->pdo->query($sql);
				$stmt->execute([
					':username' => $_SESSION['username'],
					':email' => $_SESSION['email'],
				]);

				$result = $stmt->fetchAll();
				if (!$result)
					header("Location: index.php");
			} catch (Exception $e) {
				//echo 'You do not have validated!!';
				header("Location: ../Account/Index");
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">
			You not have permission to access this page!!
			</div>';
			//header("Location: ../Account/Index");
		}
	}
}