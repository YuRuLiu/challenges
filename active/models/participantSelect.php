<?php
    require_once("selectRow.php");
    
    class participantSelect extends selectRow
    {
        function participant($web)
        {
            $sql_participant = " SELECT `employeeID` 
                                 FROM `participant` 
                                 WHERE `eventID` = (SELECT `eventID` FROM `event` WHERE `web` = '$web')";
            $row_participant = $this -> select($sql_participant);
            return $row_participant;
        }
    }
?>