<?php
  
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");
    header("Access-Control-Allow-Methods: POST, GET, PATCH, OPTIONS");
    header("Access-Control-Max-Age: 3600");
    date_default_timezone_set("Asia/Manila");
    define("SERVER", "localhost");
    define("DBASE", "hospital_test"); 
    define("USER", "root");
    define("PWORD", "");
    define("TOKEN_KEY", "C45CFE993B4AD9DCF22A4937AAE13");
   
    class Connection {
        protected $connectionString = "mysql:host=" . SERVER . ";dbname=" .DBASE. ";charset=utf8";
        protected $options = [
          \PDO::ATTR_ERRMODE =>\PDO::ERRMODE_EXCEPTION,  
          \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
          \PDO::ATTR_EMULATE_PREPARES => false
        ];
        public function connect(){
          return new \PDO($this->connectionString, USER, PWORD, $this->options);
        }
    }
?>