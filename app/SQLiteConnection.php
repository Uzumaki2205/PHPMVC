<?php
namespace App;

/**
 * SQLite connnection
 */
class SQLiteConnection {
    /**
     * PDO instance
     * @var type
     */
    private $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect() {
        if ($this->pdo == null) {
            try {
                $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
            } catch (\PDOException $e) {
                echo "Connect To Database Fail because " + $e->getMessage();
            }
        }
        return $this->pdo;
    }
}