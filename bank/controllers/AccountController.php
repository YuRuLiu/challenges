<?php

class AccountController extends Controller
{
    function displayAccount()
    {
        $account = $this->model("Account");
        $displayAccount = $account->selectAccountAll();
        $this->view("account", $displayAccount);
    }

    function displayDetail($user)
    {
        $detail = $this->model("Detail");
        $displayDetail = $detail->selectDetail($user);
        $this->view("detail", $displayDetail);
    }

    function displaySaveMoney($user)
    {
        $account = $this->model("Account");
        $balance = $account->selectAccount($user);
        $this->view("saveMoney", $balance);
    }

    function displayGetmoney($user)
    {
        $account = $this->model("Account");
        $balance = $account->selectAccount($user);
        $this->view("getMoney", $balance);
    }

    function getFail()
    {
        $this->view("getFail");
    }

    function saveMoney($user)
    {
        $btnSaveMoney = $_POST['btnSaveMoney'];
        $comeIn = $_POST['comeIn'];

        $detailId = $this->incrementDetailId($user);

        $saveMoney = $this->model("ChangeMoney");
        $saveMoney->saveMoneyModel($user, $btnSaveMoney, $comeIn, $detailId);
    }

    function getMoney($user)
    {
        $btnGetMoney = $_POST['btnGetMoney'];
        $goOut = $_POST['goOut'];

        $detailId = $this->incrementDetailId($user);

        $getMoney = $this->model("ChangeMoney");
        $getMoney->getMoneyModel($user, $btnGetMoney, $goOut, $detailId);
    }

    function incrementDetailId($user)
    {
        $detail = $this->model("Detail");
        $detailId = $detail->selectDetailId($user);
        $detailIdNew = $detailId[0]['detailID'];

        if ($detailIdNew != NULL) {
            $plusDetailId = $detailIdNew + 1;
            $plusDetailId = str_pad($plusDetailId, 3, '0', STR_PAD_LEFT);

            return $plusDetailId;
        }

        return "001";
    }
}
