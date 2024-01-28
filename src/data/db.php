<?php

namespace Src\data;

use PDO;
use PDOException;

class db
{

    private $conn;
    private $user;
    private $pass;


    function __construct($dbname)
    {
        $this->conn =  "mysql:host=localhost;dbname=$dbname";
        $this->user = "root";
        $this->pass = "";
    }

    private function coonect()
    {
        $db = new PDO($this->conn, $this->user, $this->pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    private function dis(array $data, array $values)
    {
        $d = [];
        $da = [];

        foreach ($data as $key => $value) {
            $d[] = "`" . $value . "`";
        }
        foreach ($values as $key => $value) {
            $da[] = "'" . $value . "'";
        }

        $finshData = implode(",", $d);
        $finshvalue = implode(",", $da);
        return [$finshData, $finshvalue];
    }

    private function disUpdate(array $data)
    {
        $d = [];
        $da = [];

        foreach ($data as $key => $value) {
            $d[] = "`" . $key . "`" . "=" . "'" . $value . "'";
        }


        $finshData = implode(",", $d);

        return $finshData;
    }


    public function create(string $table, string $folderName, array $data, array $values)
    {
        $dis = $this->dis($data, $values);



        try {

            $db = $this->coonect();

            $q = "INSERT INTO `$table` ($dis[0]) VALUES ( $dis[1])";

            $db->exec($q);

            header("location: /pages/$folderName/index.php");
        } catch (PDOException $e) {

            echo "Failed" . $e->getMessage();
        }
    }

    public function update(string $table, string $folderName, array $postData, int $id)
    {
        $dis = $this->disUpdate($postData);



        try {

            $db = $this->coonect();

            $q = "UPDATE `$table` SET $dis WHERE id=$id";


            $db->exec($q);

            header("location: /pages/$folderName/index.php");
        } catch (PDOException $e) {

            echo "Failed" . $e->getMessage();
        }
    }

    public function delete(string $table, string $folderName, int $id)
    {

        try {

            $db = $this->coonect();

            $q = "DELETE FROM `$table` WHERE `id` = $id";

            $db->exec($q);

            header("location: /pages/$folderName/index.php");
        } catch (PDOException $e) {

            echo "Failed" . $e->getMessage();
        }
    }
    public function select(string $table)
    {

        try {

            $db = $this->coonect();

            $sql = "SELECT * FROM `$table` ";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $re = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $re;
        } catch (PDOException $e) {

            echo "Failed" . $e->getMessage();
        }
    }
}
