<?php 
    
    class LoginController extends Controller
    {
        function index()
        {
            $this -> view("Login");
        }
        
        function login()
        {
            $userName = $_POST["userName"];
            $userPW = $_POST["userPW"];
            $btnlogin = $_POST["btnlogin"];
            
            $login = $this -> model("check_log");
            $pressLogin = $login -> check_user($btnlogin,$userName,$userPW);
            $name = $this -> model("check_log");
            $session_name = $name -> name();
            $this -> view($pressLogin,$session_name);
        }
        
        function logout()
        {
            $btnlogout = $_POST["logout"];
            
            $logout = $this -> model("check_log");
            $pressLogout = $logout -> logout($btnlogout);
            $this -> view($pressLogout);
        }
        
        function calendar()
        {
            $name = $this -> model("check_log");
            $session_name = $name -> name();
            $this -> view("calendar",$session_name);
        }
    }
?>