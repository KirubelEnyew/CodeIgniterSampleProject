<?php
    class PizzaModel extends CI_Model{
        public function __construct(){
            parent::__construct();
            
        }
        //to return for get request 
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