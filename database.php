<?php

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __contruct(){
        $this->host = 'localhost';
        $this->db = 'bdsemana';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';

    }

    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db
            $options = {
                PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE>_PREPARES    => false,
            ];

            $pdo = new PDO($connection, $this->user, $this->password,$options)

            return $pdo;
        }catch(PDOException $e){
            print_r('Error conecction: ' . $e->getMessage());
            }
            
        }
    }
    
?>