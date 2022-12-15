<?php 

/* 
    * PDO Database Class
    * Connect to databse
    * Create Prepared Statement
    * Bind Values
    * Returns Rows and results 

*/

class Database{
    private $host = DB_HOST;
    private $port = PORT;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;


    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        // create dsn
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname";
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        );

        // INIT PDO 

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare Statement with query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);

    }

    //Bind values 
    public function bind($param , $value, $type = null ){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default : 
                    $type = PDO::PARAM_STR;
            }
        }


        $this->stmt->bindValue($param, $value, $type);

    }

    //execute prepared statement
    public function execute()
    {
       return $this->stmt->execute();
    }


    // Get results and set an array of results
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }


    // Get single record
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}