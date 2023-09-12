<?php

    class connectDB {
    
        protected $connection;
        private $uname, $pword;
        private $newPword;


        public function __construct($uname, $pword) {
            $this->uname = $uname;
            $this->pword = $pword;
            $this->newPword = '0';
        }


        private function sqlQuery(){
            $selectTb = "SELECT * FROM users";
            $selectUser = "SELECT * FROM users
                                    WHERE uname = '$this->uname'";
            $checkValue = "SELECT * FROM users
                                    WHERE uname = '$this->uname'
                                        AND pword = '$this->pword'";
            $insertTb="INSERT INTO users (uname, pword)
                        VALUES ('$this->uname', '$this->pword')";
            $updateTb = "UPDATE users
                            SET pword = '$this->newPword'
                            WHERE uname = '$this->uname";
            $createDB = "CREATE DATABASE IF NOT EXISTS accounts";
            $descTb = "DESC users";
            $createTb = "CREATE TABLE users
                (   id INT(5) PRIMARY KEY AUTO_INCREMENT,
                    uname VARCHAR(55) NOT NULL,
                    pword VARCHAR(55) NOT NULL
                ) CHARACTER SET utf8 COLLATE utf8_general_ci";
            return array($insertTb, $selectTb, $selectUser, $createDB, $descTb, $createTb, $checkValue, $updateTb);
 
            // 0. insert to table 
            // 1. select all from table
            // 2. select user by name
            // 3. create data base
            // 4. desc table
            // 5. create table
            // 6. check User name and password
            // 7. Modify Password
        }


        private function connectToDBMS(){
            
            require 'mylogin.php'; 
            $this->connection = new mysqli($hn, $un, $pw);
                
            //If connection to the MySQL failed display an error message
            if ($this->connection->connect_error) 
                return FALSE;   
            //If connection to MySQL succeed continue the program 
            else
                return TRUE;   
        }


        // DATABASE CONNECTION
        private function connectToDB(){        
            //Attempt to connect to the Database    
            $check_connect_to_db = mysqli_select_db($this->connection, 'accounts');
            //If connection to the Database fails create the database
            if ($check_connect_to_db === FALSE){
                die("Fatal Error - Failed to connect to the DB  <br/>" . $this->connection->error);
                return  FALSE;
            //If connection to the database succeed 
            }else
                return TRUE;                                                        
        }
        

        // CREATE DATABASE
        private function createDB(){        
           
            $sql= $this->sqlQuery();     
            $create_db = $this->connection->query($sql[3]);
            //If the Database creation fails display an error message  
            if ($create_db === FALSE)
                return FALSE;
            else if ($create_db === FALSE)
                return TRUE;
        }


        // TABLE CONNECTION
        private function connectToTable(){ 
            
            $sql= $this->sqlQuery(); 
            $check_table_exists = $this->connection->query($sql[4]);
                    
            if ($check_table_exists === FALSE){
                return FALSE;
            }
            else 
                return TRUE;
        }


        // CREATE TABLE
        private function createTable(){
            
            $sql= $this->sqlQuery(); 
            $create_table = $this->connection->query($sql[5]);
            
            if ($create_table === FALSE)
                return FALSE;
            else
                return TRUE;
        }


        // FOR FUNCTION insert()
        private function insertToTable(){
            
            $error = $this->errorMessages();        
            $sql= $this->sqlQuery();
            $insert_query = $this->connection->query($sql[0]);
             
            if ($insert_query === FALSE)
                die($error[5] . $this->connection->error);
            else 
                echo "Register Succesfully!";
        }


        // FOR MODIFY PASSWORD
        private function selectbyName(){
           
            $sql= $this->sqlQuery();
            $select_query = $this->connection->query($sql[2]);
            
            if ($select_query === FALSE) {
                return FALSE;
            }
            else {
                $number_of_rows = $select_query->num_rows;
                if ($number_of_rows != 0) {
                    return TRUE;
                }
                else { 
                    return FALSE; 
                }
            }   
            
            $select_query->close();
            $this->connection->close();
        }


        // CHECK USERNAME and PASSWORD
        private function checkExistingValue(){
            
            $error=$this->errorMessages();
            $sql= $this->sqlQuery();
            $select_query = $this->connection->query($sql[6]);
            
            if ($select_query === FALSE) {
                die($error[6] . $this->connection->error);
            }
            else {
                $number_of_rows = $select_query->num_rows;
                if ($number_of_rows != 0) {
                    while ($row = $select_query->fetch_assoc()) {
                        $selectedName = htmlspecialchars($row['uname']);
                        $selectedPword =  htmlspecialchars($row['pword']);
                    }
                    return array($selectedName,$selectedPword);
                }
                else { 
                    echo "there is nothing"; 
                }   
            }   
            
            $select_query->close();
            $this->connection->close();
        }


        // ERROR MESSAGE DISPLAY
        private function errorMessages() {
            $err1="Fatal Error - Failed to CREATE the DB <br/>"; //
            $err2="Fatal Error - Failed to CREATE the Table and Columns <br/>"; //
            $err3="Fatal Error - Failed to CONNECT to the DB  <br/>";
            $err4="Fatal Error - Failed to CONNECT to the Table <br/>"; 
            $err5="Fatal Error - Failede to connect to MySQL <br>";
            $err6="Fatal Error - Failed to INSERT in the Table <br>"; //
            $err7="Fatal Error - Failed to select from the Table"; //
        
            return array($err1,$err2,$err3,$err4,$err5,$err6,$err7);
        }


        // TO REGISTER
        public function insert(){
            
            $error=$this->errorMessages();
                    
            if ($this->connectToDBMS() === TRUE){
                        
                if ($this->connectToDB() === FALSE){
                    
                    if ($this->createDB()=== FALSE){
                        die($error[0] . $this->connection->error);
                    } 
                }  

                $this->connectToDB();

                if ($this->connectToDB() === TRUE){
                    if ($this->connectToTable() === FALSE){
                        if ($this->createTable()=== FALSE){
                            die($error[1] . $this->connection->error);
                        }
                    }
                } else {
                    die($error[3] . $this->connection->error);
                }

                $this->connectToTable();

                // TO INSERT VALUE TO TB
                if ($this->connectToTable() === TRUE){
                
                    $this->insertToTable();    
                } else {
                    die($error[4] . $this->connection->error); 
                }   
            } else {
                die($error[5] . mysqli_connect_error());
            }
        } 


        // public function TO CHECK USERNAME and PASSWORD
        public function checkUser(){
            
            $this->connectToDB();
            if ($this->connectToDB() === TRUE) {
                return $this->checkExistingValue();
            }
            return False;    
        }  


        // public function TO CHECK IF THE USERNAME EXISTS
        public function checkUserbyName(){
            
            $this->connectToDBMS();
            if ($this->connectToDBMS() === TRUE){
                $this->connectToDB();
                if ($this->connectToDB() === TRUE)
                    $this->selectbyName();
            }  
            else {
                echo "Wrong username or password";
            }         
        }  


        // public function TO UPDATE PASSWORD
        public function updateToTb($newPw) {
            
            // $state = $this->checkUserbyName();
            
            // if ($state === FALSE) {
            //     echo "The username doesn't exists";
            // }
            // else{
                $sql= $this->sqlQuery();
                $this->connectToDBMS();
                if ($this->connectToDBMS() === TRUE){
                    $this->connectToDB();
                    if ($this->connectToDB() === TRUE) {
                        
                        $this->newPword = $newPw;
                        $this->connection->query($sql[7]);
                        
                        
                        $this->connection->close();
                    }
               
                
                }
        }
    
       
        // declare destruct function
        function __destruct() { 
            //Close the connection to MySQL when it is opened          
            if ( $this->connection === TRUE){
                $this->connection->close();
            }
        }
    }
    
?>