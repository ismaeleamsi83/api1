<?php

include ('DBconn.php');

class ConsultaBD extends DBconn{
    function getOrders(){
    
        $result = $this->connect()->query('SELECT * FROM orders');
    
        return $result;
    }

    function getOrdersDate($date){
    
        $result = $this->connect()->query('SELECT * FROM orders WHERE date="'.$date.'"');
    
        return $result;
    }

    function getOrdersCompany($compa){
    
        $result = $this->connect()->query('SELECT * FROM orders WHERE company="'.$compa.'"');
    
        return $result;
    }

}
