<?php
class Database {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $pdo;

    public function __construct() {
        
				$this->host = 'localhost';
				$this->db = 'u881899582_academy';
				$this->user = 'u881899582_academy';
				$this->pass = '[0LU4I;Sue';
    }

    private function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->db";
        $this->pdo = new PDO($dsn, $this->user, $this->pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insertData($table, $data) {
        try {
            $this->connect();

            $columns = implode(', ', array_keys($data));
			$placeholders = ':' . implode(', :', array_keys($data));

			$sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
			$stmt = $this->pdo->prepare($sql);

			foreach ($data as $key => $value) {
				$stmt->bindValue(':' . $key, $value);
			}
            $stmt->execute();

            echo "Data inserted successfully!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
	public function getData($table, $field = '*', $condition_arr = [], $order_by_field = '', $order_by_type = 'desc', $limit = '') {
    try {
        $this->connect();

        $sql = "SELECT $field FROM $table";
        $params = [];

        if (!empty($condition_arr)) {
            $sql .= ' WHERE ';
            $conditions = [];
            foreach ($condition_arr as $key => $val) {
                $conditions[] = "$key = :$key";
                $params[":$key"] = $val;
            }
            $sql .= implode(' AND ', $conditions);
        }

        if ($order_by_field != '') {
            $sql .= " ORDER BY $order_by_field $order_by_type";
        }

        if ($limit != '') {
            $sql .= " LIMIT $limit";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

}



?>
