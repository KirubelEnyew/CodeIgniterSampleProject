<?php
Header('Access-Control-Allow-Origin: *');
Header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class RestController extends REST_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('PizzaModel');
    }
    function pizza_get()
    {
        $data = $this->db->get('pizzas_table')->result();
        $this->response(array(
            'data' => $data,
            'message' => "Pizza successfully fetched",
            'status' => 200,
        ), REST_Controller::HTTP_OK);
    }
    function pizza_post()
    {
        $name = $this->post('pizzaName');
        $ing = $this->post('ingredients');
        $queryTerm = "INSERT INTO pizzas_table (pizzaName,ingredients) VALUES ('$name','$ing')";
        $this->PizzaModel->executeQuery($queryTerm);
        $this->response(array(
                'message' => "New Pizza Added",
                'status' => 200
            ), REST_Controller::HTTP_OK);
    }
    function pizza_delete($id)
    {
        $queryTerm = "DELETE FROM pizzas_table WHERE id=$id";
        $this->PizzaModel->executeQuery($queryTerm);
        $this->response(array(
            'message' => "Pizza successfully deleted",
            'status' => 200,
        ), REST_Controller::HTTP_OK);
    }
    function pizza_put($idToEdit)
    {
        $data = json_decode(file_get_contents("php://input"));
        $name = $this->put('pizzaName');
        $ingredients = $this->put('ingredients');
        $queryTerm = "UPDATE pizzas_table SET pizzaName='$name',ingredients='$ingredients' WHERE id=$idToEdit";
        $this->PizzaModel->executeQuery($queryTerm);
        $this->response(array(
            'message' => "Successfully Updated",
            'status' => 200
        ), REST_Controller::HTTP_OK);
    }
}
