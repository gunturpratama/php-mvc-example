<?php 


Class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    private $handler;
    private $state;


    public function __construct()
    {
        $source = 'mysql:host='.$this->host.';dbname='. $this->db_name;
        $opt = [
            PDO::ATTR_PERSISTENT,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            //code...
            $this->handler = new PDO($source,$this->user,$this->pass,$opt);
        } catch (PDOException $e) {
            //throw $th;
            die($e->getMessage());
        }
    }

    public function query($query){
        $this->state = $this->handler->prepare($query);
    }

    public function bind($params,$value,$type = NULL){

        if (is_null($type)) {
            # code...
            switch (true) {
                case is_int($value):
                    # code...
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    # code...
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    # code...
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    # code...
                    $type = PDO::PARAM_STR;
                    break;
            }
        }


        $this->state->bindValue($params,$value,$type);



    }

    public function execute()
    {
        $this->state->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->state->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->state->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        return $this->state->rowCount();
    }

   


}