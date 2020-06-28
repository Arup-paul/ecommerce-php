<?php

class Database {
    public $connection;
    public $stmt;
    public function __construct( $dsn, $username, $password ) {

        $this->connection = new PDO( $dsn, $username, $password );
    }


    public function connection(){
        return $this->connection;
    }

    public function insert( $table, $data ) {
        $placeholders = [];
        foreach ( $data as $key => $value ) {
            $placeholders[] = ':' . $key;
        }

        $query = 'INSERT INTO ' . $table . ' (' . implode( ',', array_keys( $data ) ) . ') VALUES (' . implode( ',', $placeholders ) . ')';
        $stmt  = $this->connection->prepare( $query );

        foreach ( $data as $placeholder => $val ) {
            $stmt->bindValue( ':' . $placeholder, $val );
        }

        return $stmt->execute();
    }


        public function select($table, $columns = '*', array $data = [])
    {
        $query = 'SELECT '.$columns.' FROM '.$table;

        if (! empty($data)) {
            $string = [];
            foreach ($data as $key => $value) {
                $string[] = "`{$key}` = :{$key}"; // placeholder will never be string
            }
            $query .= ' WHERE '.implode(',', $string);
        }

        $this->stmt = $this->connection->prepare($query);

        foreach ($data as $placeholder => $val) {
            $this->stmt->bindParam(':'.$placeholder, $val);
        }

        return $this->stmt;
    }

    

    public function update() {}
    public function delete() {}
}

define( 'DSN', 'mysql:dbname=php_ecommerce;host=localhost' );
define( 'DB_USERNAME', 'root' );
define( 'DB_PASSWORD', '' );

$connection = new Database( DSN, DB_USERNAME, DB_PASSWORD );

?>