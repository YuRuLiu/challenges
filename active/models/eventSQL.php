<?php
    require_once("connect.php");
    
    class eventSQL extends DB
    {
        function insert($eventID,$eventName,$content,$bring,$signupDate,$deadline,$totalPeople,$participant,$web)
        {
            $sql_insert = " INSERT INTO `event`(`eventID`,`eventName`, `content`, `totalPeople`, `bring`, `signupDate`, `deadline`,`participant`,`web`) 
                            VALUES('$eventID','$eventName','$content','$totalPeople','$bring','$signupDate','$deadline','$participant','$web')";
            $row_insert = $this -> connect($sql_insert);   
        }
        
        
    }





?>