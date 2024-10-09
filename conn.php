<?php
class DB extends PDO{
    public function __contruct($dsn, $username=NULL,$password=NULL,$options=[]){
        $default_options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO:: ATTR_ERRMODE => PDO::ERMODE_EXCEPTION
        ];
        $options = array_replace($default_options,$options);
        parent::_construct($dsn,$username,$password,$options);

    }

    public function run($sql,$argc=NULL){
        if($argc){
            return $this->query($sql);

        }
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $stmt;
    }
}