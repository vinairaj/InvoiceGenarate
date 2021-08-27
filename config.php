<?php
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "estore");
define("DB_HOST", "localhost");
class DatabaseConnect
{
    function dbConnect()
    {
        $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE) or die('Could not connect to MySQL server.');
        return $connection;
    }
    function queryInsertExecute($query) {
        $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE) or die('Could not connect to MySQL server.');
        $data = mysqli_query($connection,$query);
        $insertId = mysqli_insert_id($connection);
        return $insertId;
    }
    function queryExecute($query) {
        return mysqli_query($this->dbConnect(),$query);
    }
    function dbClose(){
         //Closing the connection
         mysqli_close($this ->dbConnect());
    }

}
?>