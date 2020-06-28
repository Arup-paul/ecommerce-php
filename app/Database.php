<?php

class Database {
     public $connection;
    public function __construct($dsn,$username,$password){
        
        $this->connection = new PDO($dsn,$username,$password);
    }


     public function insert($table, $data)
    {
        $placeholders = [];
        foreach ($data as $key => $value) {
            $placeholders[] = ':'.$key;
        }

        $query = 'INSERT INTO '.$table.' ('.implode(',', array_keys($data)).') VALUES ('.implode(',', $placeholders).')';
        $stmt = $this->connection->prepare($query);

        foreach ($data as $placeholder => $val) {
            $stmt->bindValue(':'.$placeholder, $val);
        }

        return $stmt->execute();
    }

    public function select($table, $columns = '*',$data = []){
      $query  = 'SELECT'. $columns. 'FROM' . $table;


    }

    public function where($data = []){
        $string = [];
       if(is_array($data)){
           foreach($data as $key => $value){
             $string[] = "'{$key}' = ':{$value}'";
           }
           $strings = implode(',',$string);
       }    
    }

    
    public function update(){}
    public function delete(){}
}


define( 'DSN', 'mysql:dbname=php_ecommerce;host=localhost' );
define( 'DB_USERNAME', 'root' );
define( 'DB_PASSWORD', '' );

$connection = new Database( DSN, DB_USERNAME, DB_PASSWORD );




?>