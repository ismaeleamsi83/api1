<?php

include('consultabd.php');

class ApiConsulta{
    function getAll(){
        $consultaOrder = new ConsultaBD();
        $consultaOrders = array();
        $consultaOrders['register'] = array();

        if(isset($_GET['date'])){
            $fecha = $_GET['date'];
            $result = $consultaOrder->getOrdersDate($fecha);
        } else if (isset($_GET['company'])) {
            $compa = $_GET['company'];
            $result = $consultaOrder->getOrdersCompany($compa);
        }else{
            $result = $consultaOrder->getOrders();  
        }
        

        if($result->rowCount()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $register = array(
                    'id_order' => $row['id_order'],
                    'company' => $row['company'],
                    'date' => $row['date'],
                    'qty' => $row['qty'],
                );
                array_push($consultaOrders['register'], $register);
            }
            http_response_code(200);
            echo json_encode($consultaOrders);
        }else{
            http_response_code(404);
            echo json_encode(array('message' => 'Element not found'));
        }
        
    
    }


}

$api = new ApiConsulta();
$api->getAll();

?>