<?php

    class signUpController extends Controller
    {
        function display_signUp($web)
        {
            $signup = $this -> model("eventSelect");
            $show_signup = $signup -> select_signup($web);
            
            $success = $this -> model("participantSelect");
            $show_success = $success -> participant($web);
            $this -> view("signUp",$show_signup,$show_success);    
        }
        
        function signUp($web)
        {
            $employeeID = $_POST["employeeID"];
            $bringNumber = $_POST["bringNumber"];
            $signup = $_POST["signup"];
            $eventID = $_POST["eventID"];
            
            $test = $this -> comparison($web,$employeeID);
            
            if(isset($signup))
            {
                $insert = $this -> model("participantSQL");
                $insert -> insert($eventID,$test,$bringNumber);
                
                header("Location:/challenges/active/signUp/display_signUp/$web");
            }
  
        }
        
        function comparison($web,$employeeID)
        {
            $participant = $this -> model("eventSelect");
            $people = $participant -> select_signup($web);
            foreach($people as $all)
            {
                $join = $all['participant'];
            }
            
            $str_join = explode(",",$join);
            
            foreach($str_join as $employee)
            {
                $each_can = explode(":",$employee);
                for($i=0;$i<count($each_can);$i++)
                {
                    if(($i/2) == 0)
                        $each[] = $each_can[$i];
                }
            }
            
            foreach($each as $employeeID_can)
            {
                if($employeeID_can = $employeeID)
                {
                    return $employeeID_can;
                    break;
                }
                else 
                {
                    return "fail";    
                }
            }

        }
    }
?>