<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class RestController extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PizzaModel');
    }
    function pizza_get(){
        $data = $this->db->get('pizzas_table')->result();
        $this->response(array(
            'data' => $data,
            'message'=> "Pizza successfully added",
            'status' => 200,
        ),REST_Controller::HTTP_OK);
    }
    function pizza_post(){
        
        $data = json_decode(file_get_contents("php://input"));
        $input = array(
            'pizzaName' => $data->pizzaName,
            'ingredients' => $data->ingredients
        );
        $this->db->set($input);
        $this->db->insert('pizzas_table');
        $this->response(['new pizza added'],REST_Controller::HTTP_OK);
    }
    function pizza_delete($id){
        $queryTerm = "DELETE FROM pizzas_table WHERE id=$id";
        $this->PizzaModel->executeQuery($queryTerm);
        $this->response(array(
            'message' => "Pizza successfully deleted",
            'status' => 200,
        ),REST_Controller::HTTP_OK);
    }
    function pizza_put($idToEdit){
        $data = json_decode(file_get_contents("php://input"));
        $name = $data->pizzaName;
        $ingredients = $data->ingredients;
        $queryTerm = "UPDATE pizzas_table SET pizzaName='$name',ingredients='$ingredients' WHERE id=$idToEdit";
        $this->PizzaModel->executeQuery($queryTerm);
        $this->response(array(
            'message' => "Successfully Updated",
            'status' => 200
        ),REST_Controller::HTTP_OK);
    }
}
