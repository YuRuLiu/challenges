<?php

class AccountController extends Controller
{
    // 顯示帳戶列表
    function displayAccount()
    {
        $account = $this->model("Account");
        $displayAccount = $account->selectAccountAll();
        $this->view("account", $displayAccount);
    }

    // 顯示明細列表
    function displayDetail($user)
    {
        $detail = $this->model("Detail");
        $displayDetail = $detail->selectDetail($user);
        $this->view("detail", $displayDetail);
    }

    // 顯示存款餘額
    function displaySaveMoney($user)
    {
        $account = $this->model("Account");
        $balance = $account->selectAccount($user);
        $this->view("saveMoney", $balance);
    }

    // 顯示提款餘額
    function displayGetmoney($user)
    {
        $account = $this->model("Account");
        $balance = $account->selectAccount($user);
        $this->view("getMoney", $balance);
    }

    // 餘額不足
    function getFail()
    {
        $this->view("getFail");
    }

    // 存錢
    function saveMoney($user)
    {
        $btnSaveMoney = $_POST['btnSaveMoney'];
        $comeIn = $_POST['comeIn'];

        $detailId = $this->incrementDetailId($user);

        $saveMoney = $this->model("ChangeMoney");
        $saveMoney->saveMoneyModel($user, $btnSaveMoney, $comeIn, $detailId);
    }

    // 提款
    function getMoney($user)
    {
        $btnGetMoney = $_POST['btnGetMoney'];
        $goOut = $_POST['goOut'];

        $detailId = $this->incrementDetailId($user);

        $getMoney = $this->model("ChangeMoney");
        $getMoney->getMoneyModel($user, $btnGetMoney, $goOut, $detailId);
    }

    // 增加detailID
    function incrementDetailId($user)
    {
        $detail = $this->model("Detail");
        $detailId = $detail->selectDetailId($user);
        $detailIdNew = $detailId[0]['detailID'];

        if ($detailIdNew != NULL) {
            $plusDetailId = $detailIdNew + 1;
            $plusDetailId = str_pad($plusDetailId, 3, '0', STR_PAD_LEFT);

            return $plusDetailId;
        } else {

            return "001";
        }

    }
}
