<?php

    class Base{

        private $host = DB_HOST;
        private $dbname = DB_NAME;
        private $user = DB_USER;
        private $password = DB_PASSWORD;

        private $dbh;
        private $stmt;
        private $error;

//Nos conectara a la base de datos
    public function __construct()
    {
      $dns ='mysqlhost='.$this->host.'; dbname='. $this->dbname;  

      $option= [
          PDO::ATTR_ERRMODE=>true,
          PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION
      ];

      try{
          $this->dbh= new PDO($dns, $this->user, $this->password, $option);
          $this->dbh ->exec('set names utf8 ');
      }catch(PDOException $exeption){
          $this->error=$exeption->getMessage();
          echo $this->error;
      }

    }
    public function query($sql){        
       return $this->stmt = $this->dbh->prepare($sql);
    }

    private function bind($parametro, $valor, $tipo = null){
        
        if(is_null($tipo)){
            switch(true){
              case is_int($valor);
                $tipo = PDO::PARAM_INT;
                break;
              case is_bool($valor);
                $tipo =PDO::PARAM_BOOL;
                break;
              case is_null($valor);
                $tipo =PDO::PARAM_NULL;
                break;
              default:
                $tipo= PDO::PARAM_STR;
               break;  
            }
        }
        return $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    public function excute(){
        return $this->stmt->excute();
    }

    public function registers(){    
        $this->excute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function register(){
        $this->excute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function roCount(){
        $this->excute();
        return $this->stmt->rowCount;
    }

    }