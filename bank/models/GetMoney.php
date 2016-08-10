<?php
require_once("Database.php");

class GetMoney extends Database
{
    // 提款
    function getMoneyModel($user, $btnGetMoney, $goOut, $detailId)
    {
        try{
            $this->transaction();

            $sqlSelectAccount = "SELECT `user`,`balance`
                                 FROM `account`
                                 WHERE `user` = '$user' FOR UPDATE";
            $account = $this->select($sqlSelectAccount);

            if (isset($btnGetMoney)) {
                if ($account[0]['balance'] >= $goOut) {
                    $balanceNew = $account[0]['balance'] - $goOut;

                    date_default_timezone_set('Asia/Taipei');
                    $getTime = date("Y-m-d h:i:sa");

                    $sqlInsertGoOut = "INSERT INTO `detail`(`user`,`detailID`,`goOut`,`balance`,`changeTime`)
                                       VALUES('$user','$detailId','$goOut','$balanceNew','$getTime')";
                    $this->insert($sqlInsertGoOut);

                    $sqlUpdateBalance = "UPDATE `account` SET `balance` = '$balanceNew'
                                         WHERE `user` = '$user'";
                    $this->update($sqlUpdateBalance);

                    $this->commit();

                    $url = $account[0]['user'];
                    header("location:/challenges/bank/Account/displayDetail/$url");
                } else {
                    header("location:/challenges/bank/Account/getFail");
                }

            }

        } catch (Exception $e) {
            $this->rollback();
        }

    }
}
