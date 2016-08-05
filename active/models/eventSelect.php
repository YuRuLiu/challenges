<?php
    require_once("selectRow.php");
    
    class eventSelect extends selectRow
    {
        function select_eventID() //最後一筆資料的eventID
        {
            $sql_select_eventID = " SELECT `eventID` 
                                    FROM `event` 
                                    ORDER BY `eventID` DESC 
                                    LIMIT 1";
            $row_select_eventID = $this -> select($sql_select_eventID);
            return $row_select_eventID;
        }
        
        function select_event($now) //截止日期還沒到的活動
        {
            $sql_select_event = " SELECT `eventName`,`content`,`signupDate`,`deadline`,`web` 
                                  FROM `event`
                                  WHERE `deadline` >= '$now'";
            $row_select_event = $this -> select($sql_select_event);
            return $row_select_event;
        }
        
        function select_signup($web) //單筆活動的資訊
        {
            $sql_select_signup = " SELECT `eventID`,`eventName`,`content`,`bring`,`signupDate`,`deadline`,`totalPeople`,`participant`,`web` 
                                   FROM `event`
                                   WHERE `web`='$web'";
            $row_select_signup = $this -> select($sql_select_signup);
            return $row_select_signup;
        }
        
        
    }





?>