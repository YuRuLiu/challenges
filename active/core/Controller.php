<?php

class Controller {
    public function model($model) 
    {
        require_once "../active/models/$model.php";
        return new $model ();
    }
    
    public function view($view, $data1 = Array(),$data2 = Array(),$data3 = Array(),$data4 = Array(),$data5 = Array(),$data6 = Array(),$data7 = Array(),$data8 = Array(),$data9 = Array(),$data10 = Array(),$data11 = Array()) 
    {
        require_once "../active/views/$view.php";
    }
}

?>