<?php

    class Config{

        public $pdo;

        public function __construct(){
            try{
                $this->pdo = new PDO("mysql:dbname=teste_prog;host=localhost","root","");
            }catch(PDOExcetion $e){
                echo "erro";
            }
        }

    }
            
        
        
    
    
            

?>