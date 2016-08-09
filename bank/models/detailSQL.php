<?php

    require_once("Database.php");
    class detailSQL extends Database
    {
        function select_detail($user)
        {
            $sql_select_detail = " SELECT `detailID`,`goOut`,`comeIn`,`balance`,`changeTime`
                                   FROM `detail`
                                   WHERE `user` = '$user'";
            $row_select_detail = $this -> select($sql_select_detail);
            return $row_select_detail;
        }
        
        function insert_comeIn($user,$detailID,$comeIn,$balance,$changeTime)
        {
            $sql_insert_comeIn = " INSERT INTO `detail`(`user`,`detailID`,`comeIn`,`balance`,`changeTime`) 
                                   VALUES('$user','$detailID','$comeIn','$balance','$changeTime')";
            $row_insert_comeIn = $this -> insert($sql_insert_comeIn);
        }
        
        function insert_goOut($user,$detailID,$goOut,$balance,$changeTime)
        {
            $sql_insert_goOut = " INSERT INTO `detail`(`user`,`detailID`,`goOut`,`balance`,`changeTime`) 
                                  VALUES('$user','$detailID','$goOut','$balance','$changeTime')";
            $row_insert_goOut = $this -> insert($sql_insert_goOut);
        }
        
        function select_detailID($user)
        {
            $sql_select_detailID = " SELECT `detailID`
                                     FROM `detail`
                                     WHERE `user` = '$user'
                                     ORDER BY `detailID` DESC
                                     LIMIT 1";
            $row_select_detailID = $this -> select($sql_select_detailID);
            return $row_select_detailID;
        }
    }

?>