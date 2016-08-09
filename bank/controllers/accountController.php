<?php

    class accountController extends Controller
    {
        function displayAccount()
        {
            $account = $this -> model("accountSQL");
            $display_account = $account -> select_account();
            $this -> view("account",$display_account);
        }
        
        function displayDetail($user)
        {
            $detail = $this -> model("detailSQL");
            $display_detail = $detail -> select_detail($user);
            $this -> view("detail",$display_detail);
        }
        
        function displaySaveMoney($user)
        {
            $balance = $this -> model("accountSQL");
            $display_balance = $balance -> select_balance($user);
            $this -> view("saveMoney",$display_balance);  
        }
        
        function displayGetmoney($user)
        {
            $balance = $this -> model("accountSQL");
            $display_balance = $balance -> select_balance($user);
            $this -> view("getMoney",$display_balance);  
        }
        
        function getFail()
        {
            $this -> view("getFail");
        }
        
        function saveMoney($user)
        {
            $saveInsert = $_POST['saveInsert'];
            $comeIn = $_POST['comeIn'];
            
            $plusDetailID = $this -> increment_detailID($user);
            
            $balance = $this -> model("accountSQL");
            $display_balance = $balance -> select_balance($user);
            $balance_new = $display_balance[0]['balance']+$comeIn;
            
            date_default_timezone_set('Asia/Taipei');
            $changeTime = date("Y-m-d h:i:sa");
            
            if(isset($saveInsert))
            {
                $insert_comeIn = $this -> model("detailSQL");
                $insert_comeIn -> insert_comeIn($user,$plusDetailID,$comeIn,$balance_new,$changeTime);
                
                $update_balance = $this -> model("accountSQL");
                $update_balance -> update_balance($user,$balance_new);
                
                $url=$display_balance[0]['user'];
                header("location:/challenges/bank/account/displayDetail/$url");
            }  
        }
        
        function getMoney($user)
        {
            $getInsert = $_POST['getInsert'];
            $goOut = $_POST['goOut'];
            
            $plusDetailID = $this -> increment_detailID($user);
            
            $getMoney = $this -> model("getMoney");
            $getMoney -> getMoney_m($user,$getInsert,$goOut,$plusDetailID);
            
        }
        
        function increment_detailID($user) //增加detailID
        {
            $select_detailID = $this -> model("detailSQL");
            $detailID_o = $select_detailID -> select_detailID($user);
            $detailID = $detailID_o[0]['detailID'];
            
            if($detailID != NULL){
              $plusdetailNum = $detailID + 1;
              $plusdetailNum = str_pad($plusdetailNum,3,'0',STR_PAD_LEFT);
              return $plusdetailNum;
            }
            else
                return "001";
        }
    }





?>