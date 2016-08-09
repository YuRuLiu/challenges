<?php

    class AccountController extends Controller
    {
        function displayAccount()// 顯示帳戶列表
        {
            $account = $this->model("AccountSQL");
            $display_account = $account->selectAccount();
            $this->view("account", $display_account);
        }
    
        function displayDetail($user)// 顯示明細列表
        {
            $detail = $this->model("DetailSQL");
            $display_detail = $detail->selectDetail($user);
            $this->view("detail", $display_detail);
        }
    
        function displaySaveMoney($user)// 顯示存款餘額
        {
            $balance = $this->model("AccountSQL");
            $display_balance = $balance->selectBalance($user);
            $this->view("saveMoney", $display_balance);
        }
    
        function displayGetmoney($user)// 顯示提款餘額
        {
            $balance = $this->model("AccountSQL");
            $display_balance = $balance->selectBalance($user);
            $this->view("getMoney", $display_balance);
        }
    
        function getFail()// 餘額不足
        {
            $this->view("getFail");
        }
    
        function saveMoney($user)// 存錢
        {
            $saveInsert = $_POST['saveInsert'];
            $comeIn = $_POST['comeIn'];
            
            $plusDetailID = $this->incrementDetailID($user);
            
            $balance = $this->model("AccountSQL");
            $display_balance = $balance->selectBalance($user);
            $balance_new = $display_balance[0]['balance']+$comeIn;
            
            date_default_timezone_set('Asia/Taipei');// 設置時區
            $changeTime = date("Y-m-d h:i:sa");

            if (isset($saveInsert)) {
                $insert_comeIn = $this->model("DetailSQL");
                $insert_comeIn->insertComeIn($user, $plusDetailID, $comeIn, $balance_new, $changeTime);
                
                $update_balance = $this->model("AccountSQL");
                $update_balance->updateBalance($user, $balance_new);
                
                $url=$display_balance[0]['user'];
                header("location:/challenges/bank/Account/displayDetail/$url");
            }

        }

        function getMoney($user)// 提款
        {
            $getInsert = $_POST['getInsert'];
            $goOut = $_POST['goOut'];
            
            $plusDetailID = $this->incrementDetailID($user);
            
            $getMoney = $this->model("GetMoney");
            $getMoney->getMoneyModel($user, $getInsert, $goOut, $plusDetailID);
            
        }

        function incrementDetailID($user)// 增加detailID
        {
            $select_detailID = $this->model("DetailSQL");
            $detailID_o = $select_detailID->selectDetailID($user);
            $detailID = $detailID_o[0]['detailID'];

            if ($detailID != NULL) {
              $plusdetailNum = $detailID + 1;
              $plusdetailNum = str_pad($plusdetailNum, 3, '0', STR_PAD_LEFT);

              return $plusdetailNum;
            } else
    
                return "001";

        }
    }
