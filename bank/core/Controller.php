<?php

class Controller
{
    public function model($model)
    {
        require_once "../bank/models/$model.php";

        return new $model();
    }

    public function view($view, $data1 = array())
    {
        require_once "../bank/views/$view.php";
    }
}
