<?php

    class PizzaModel extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();
            if(!$this->load->database()){
                echo "Connecting to database failed";
            }
        }
        //to return Associated Array for get request 
        function fetchData(){
            $sqlTerm = "SELECT id,pizzaName,ingredients FROM pizzas_table ORDER BY time_created";
            $query = $this->db->query($sqlTerm);
            return $query->result();
        }
        //for crud requests
        function executeQuery($queryTerm){
            $this->db->query($queryTerm);
        }
    }

?>