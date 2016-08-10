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
                                 WHERE `user` = :user FOR UPDATE";
            $stmtSelectAccount = $this->prepare($sqlSelectAccount);

            $stmtSelectAccount->bindParam(':user', $user, PDO::PARAM_STR);

            $stmtSelectAccount->execute();

            $account = $stmtSelectAccount->fetchAll();

            if (isset($btnGetMoney)) {
                if ($account[0]['balance'] >= $goOut) {
                    $balanceNew = $account[0]['balance'] - $goOut;

                    date_default_timezone_set('Asia/Taipei');
                    $getTime = date("Y-m-d h:i:sa");

                    $sqlInsertGoOut = "INSERT INTO `detail`(`user`,`detailID`,`goOut`,`balance`,`changeTime`)
                                       VALUES(:user, :detailID, :goOut, :balance, :changeTime)";
                    $stmtInsertGoOut = $this->prepare($sqlInsertGoOut);

                    $stmtInsertGoOut->bindParam(':user', $user, PDO::PARAM_STR);
                    $stmtInsertGoOut->bindParam(':detailID', $detailId, PDO::PARAM_STR);
                    $stmtInsertGoOut->bindParam(':goOut', $goOut, PDO::PARAM_INT);
                    $stmtInsertGoOut->bindParam(':balance', $balanceNew, PDO::PARAM_INT);
                    $stmtInsertGoOut->bindParam(':changeTime', $getTime, PDO::PARAM_STR);

                    $stmtInsertGoOut->execute();

                    $sqlUpdateBalance = "UPDATE `account` SET `balance` = :balance
                                         WHERE `user` = :user";
                    $stmtUpdateBalance = $this->prepare($sqlUpdateBalance);

                    $stmtUpdateBalance->bindParam(':user', $user, PDO::PARAM_STR);
                    $stmtUpdateBalance->bindParam(':balance', $balanceNew, PDO::PARAM_INT);

                    $stmtUpdateBalance->execute();

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
