<?php 
    
    class eventController extends Controller
    {
        function displayEvent()
        {
            date_default_timezone_set('Asia/Taipei');
            $now = date("Y-m-d H:i:s");
            
            $paging = $this -> model("eventSelect");
            $display_event = $paging -> select_event($now);
            $this -> view("active",$display_event);
        }
        
        function insertEvent()
        {
            $insertEvent = $_POST["insertEvent"];
            $eventName = $_POST["eventName"];
            $content = $_POST["content"];
            $bring = $_POST["bring"];
            $signupDate = $_POST["signupDate"];
            $deadline = $_POST["deadline"];
            $totalPeople = $_POST["totalPeople"];
            $participant = $_POST["participant"];
            
            $web = $this -> rand_webside();
            $plusEventID = $this -> increment_eventID();
            
            if(isset ($insertEvent))
            {         
                $insert = $this -> model("eventSQL");
                $insert -> insert($plusEventID,$eventName,$content,$bring,$signupDate,$deadline,$totalPeople,$participant,$web);
                
                header("Location:/challenges/active/event/displayEvent");
            }
        }
        
        function increment_eventID() //增加eventID
        {
            $select_eventID = $this -> model("eventSelect");
            $eventID_o = $select_eventID -> select_eventID();
            $eventID = $eventID_o[0]['eventID'];
            
            $eventDate = substr("$eventID",0,-3);
            $eventNum = substr("$eventID",8,3);
            date_default_timezone_set('Asia/Taipei');
            $now = date("Ymd");
            
            if($now == $eventDate)
            {
               $plusEventNum = $eventNum + 1;
               $plusEventNum = str_pad($plusEventNum,3,'0',STR_PAD_LEFT);
               return $now.$plusEventNum;
            }
            else
                return $now."001";
        }
        
        function rand_webside()
        {
            $rand = str_pad(rand(0,99999999),8,'0',STR_PAD_LEFT);
            return $rand;
        }
        
        function create_event()
        {
            $this -> view(createEvent);
        }
    }
?>