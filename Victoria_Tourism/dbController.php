<?php

class dbController
{
    private $conn;

    public function __construct($host, $user, $pass, $db)
    {
        $this->conn = new mysqli(
            $this->host = $host,
            $this->user = $user,
            $this->pass = $pass,
            $this->db = $db
        );

        if ($this->conn->connect_errno) {
            exit('Connection failed');

        } else {
            echo '';
        }

        return $this->conn;
    }

    public function getOneRecord($sql)
    {
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function executeQuery($sql)
    {
        $this->conn->query($sql);
        if ($this->conn->error) {
            exit($this->conn->error);

            return false;
        } else {
            return true;
        }
    }


    public function cleanUp($value)
    {
        $value = trim($value);
        $value = htmlentities($value);
        $value = $this->conn->real_escape_string($value);
        return $value;
    }


    public function uploadImage($temp, $dest)
    {

        if (move_uploaded_file($temp, $dest)) {
            echo "Image moved to folder";
        } else {
            echo "Image not moved to folder";
        }
    }

    private function logError($error)
    {
        error_log("SQL Error: $error" . PHP_EOL, 3, "my-errors.log");
        exit("OOPs something went wrong");
    }

    public function insertQuery($sql, $countryname, $location, $theme, $description, $image)
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            //exit("Prepare failed: " . $this->conn->error);
            $this->logError($this->conn->error);
            return false;
        }
        $stmt->bind_param("sssss", $countryname, $location, $theme, $description, $image);
        $stmt->execute();
        if ($stmt->affected_rows) {
            return true;
        } else {
            return false;
        }
    }


    public function searchQuery($sql, $search)
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            exit("prepare failed: " . $this->conn->error);
        }
        $stmt->bind_param("s", $search);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultset = $result->fetch_all(MYSQLI_ASSOC);
        return $resultset;
    }


    public function getAllRecords($sql)
    {
        $results = $this->conn->query($sql); //Run the SQL query
        if ($this->conn->error) {
            exit($this->conn->error); //if SQL error , stop script and display error message
        }
        while ($row = $results->fetch_assoc()) {
            $resultset[] = $row; //store results in an array called $resultset
        }
        return $resultset; //send array of results back to display script
    }


    public function prepareQuery($sql, $countryname, $location, $description, $image, $theme)
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            exit("prepare failed: " . $this->conn->error);
//$this->logError($this->conn->error);

        }
        $stmt->bind_param("sssss", $countryname, $location, $description, $image);
        $stmt->execute();
        if ($stmt->affected_rows) {
            return true;

        } else {
            return false;
        }
    }

    public function updateRecord($sql, $description, $countryid)
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            exit("prepare failed: " . $this->conn->error);
        }
        $stmt->bind_param("si", $description, $countryid);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteRecord($sql, $countryid) {
        $stmt = $this->conn->prepare($sql);
        if(!$stmt) {
            exit("prepare failed: ".$this->conn->error);
        }
        $stmt->bind_param("i",$countryid);
        $stmt->execute();
        if($stmt->affected_rows) {
            return true;
        } else {
            return false;
        }
    }
}

?>
