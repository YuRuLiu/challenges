<?php

class AccountController extends Controller
{

    // 顯示帳戶列表
    function displayAccount()
    {
        $account = $this->model("AccountSQL");
        $display_account = $account->selectAccount();
        $this->view("account", $display_account);
    }

    // 顯示明細列表
    function displayDetail($user)
    {
        $detail = $this->model("DetailSQL");
        $display_detail = $detail->selectDetail($user);
        $this->view("detail", $display_detail);
    }

    // 顯示存款餘額
    function displaySaveMoney($user)
    {
        $balance = $this->model("AccountSQL");
        $display_balance = $balance->selectBalance($user);
        $this->view("saveMoney", $display_balance);
    }

    // 顯示提款餘額
    function displayGetmoney($user)
    {
        $balance = $this->model("AccountSQL");
        $display_balance = $balance->selectBalance($user);
        $this->view("getMoney", $display_balance);
    }

    // 餘額不足
    function getFail()
    {
        $this->view("getFail");
    }

    // 存錢
    function saveMoney($user)
    {
        $saveInsert = $_POST['saveInsert'];
        $comeIn = $_POST['comeIn'];
        
        $plusDetailID = $this->incrementDetailID($user);
        
        $balance = $this->model("AccountSQL");
        $display_balance = $balance->selectBalance($user);
        $balance_new = $display_balance[0]['balance'] + $comeIn;
        
        // 設置時區
        date_default_timezone_set('Asia/Taipei');
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

    // 提款
    function getMoney($user)
    {
        $getInsert = $_POST['getInsert'];
        $goOut = $_POST['goOut'];

        $plusDetailID = $this->incrementDetailID($user);

        $getMoney = $this->model("GetMoney");
        $getMoney->getMoneyModel($user, $getInsert, $goOut, $plusDetailID);
    }

    // 增加detailID
    function incrementDetailID($user)
    {
        $select_detailID = $this->model("DetailSQL");
        $detailID_o = $select_detailID->selectDetailID($user);
        $detailID = $detailID_o[0]['detailID'];

        if ($detailID != NULL) {
          $plusdetailNum = $detailID + 1;
          $plusdetailNum = str_pad($plusdetailNum, 3, '0', STR_PAD_LEFT);

          return $plusdetailNum;
        } else {

            return "001";
        }

    }
}
