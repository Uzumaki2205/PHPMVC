<?php 
require 'vendor/autoload.php';
use App\SQLiteConnection;

class ReportModel {
	private $pdo;

	public function __construct()
	{
		$sqlite = new SQLiteConnection();
		$this->pdo = $sqlite->connect();
	}

	public function Report()
    {
        $sql = "SELECT * FROM Report";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function DeleteReport($id)
    {
        try {
            $sql = "Delete FROM Report WHERE ID=:id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id,]);
            return "Success To Delete";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}