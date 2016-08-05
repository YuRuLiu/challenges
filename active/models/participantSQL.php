<?php
    require_once("connect.php");
    
    class participantSQL extends DB
    {
        function insert($eventID,$employeeID,$bringNumber)
        {
            $sql_insert = " INSERT INTO `participant`(`eventID`, `employeeID`, `bringNumber`) 
                            VALUES ('$eventID','$employeeID','$bringNumber')";
            $row_insert = $this -> connect($sql_insert);
        }
    }




?>