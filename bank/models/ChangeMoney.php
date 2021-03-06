<?php
require_once("Database.php");

class ChangeMoney extends Database
{
    function getMoneyModel($user, $btnGetMoney, $goOut, $detailId)
    {
        try{
            $this->transaction();

            $sqlSelectAccount = "SELECT `user`,`balance`
                                 FROM `account`
                                 WHERE `user` = :user LOCK IN SHARE MODE";
            $stmtSelectAccount = $this->prepare($sqlSelectAccount);

            $stmtSelectAccount->bindParam(':user', $user, PDO::PARAM_STR);

            $stmtSelectAccount->execute();

            $account = $stmtSelectAccount->fetchAll();

            if (isset($btnGetMoney)) {
                if ($account[0]['balance'] >= $goOut) {
                    $balanceNew = $account[0]['balance'] - $goOut;

                    date_default_timezone_set('Asia/Taipei');
                    $getTime = date("Y-m-d h:i:sa");


                    $sqlUpdateBalance = "UPDATE `account` SET `balance` = :balance
                                         WHERE `user` = :user";
                    $stmtUpdateBalance = $this->prepare($sqlUpdateBalance);

                    $stmtUpdateBalance->bindParam(':user', $user, PDO::PARAM_STR);
                    $stmtUpdateBalance->bindParam(':balance', $balanceNew, PDO::PARAM_INT);

                    $stmtUpdateBalance->execute();


                    $sqlInsertGoOut = "INSERT INTO `detail`(`user`,`detailID`,`goOut`,`balance`,`changeTime`)
                                       VALUES(:user, :detailID, :goOut, :balance, :changeTime)";
                    $stmtInsertGoOut = $this->prepare($sqlInsertGoOut);

                    $stmtInsertGoOut->bindParam(':user', $user, PDO::PARAM_STR);
                    $stmtInsertGoOut->bindParam(':detailID', $detailId, PDO::PARAM_STR);
                    $stmtInsertGoOut->bindParam(':goOut', $goOut, PDO::PARAM_INT);
                    $stmtInsertGoOut->bindParam(':balance', $balanceNew, PDO::PARAM_INT);
                    $stmtInsertGoOut->bindParam(':changeTime', $getTime, PDO::PARAM_STR);

                    $stmtInsertGoOut->execute();


                    $this->commit();


                    $url = $account[0]['user'];
                    header("location:/challenges/bank/Account/displayDetail/$url");
                }

                header("location:/challenges/bank/Account/getFail");
            }
        } catch (Exception $e) {
            $this->rollback();
        }
    }

    function saveMoneyModel($user, $btnSaveMoney, $comeIn, $detailId)
    {
        try{
            $this->transaction();

            $sqlSelectAccount = "SELECT `user`,`balance`
                                 FROM `account`
                                 WHERE `user` = :user LOCK IN SHARE MODE";
            $stmtSelectAccount = $this->prepare($sqlSelectAccount);

            $stmtSelectAccount->bindParam(':user', $user, PDO::PARAM_STR);

            $stmtSelectAccount->execute();

            $account = $stmtSelectAccount->fetchAll();

            if (isset($btnSaveMoney)) {
                $balanceNew = $account[0]['balance'] + $comeIn;

                date_default_timezone_set('Asia/Taipei');
                $saveTime = date("Y-m-d h:i:sa");

                $sqlUpdateBalance = "UPDATE `account` SET `balance` = :balance
                                     WHERE `user` = :user";
                $stmtUpdateBalance = $this->prepare($sqlUpdateBalance);

                $stmtUpdateBalance->bindParam(':user', $user, PDO::PARAM_STR);
                $stmtUpdateBalance->bindParam(':balance', $balanceNew, PDO::PARAM_INT);

                $stmtUpdateBalance->execute();

                $sqlInsertComeIn = "INSERT INTO `detail`(`user`,`detailID`,`comeIn`,`balance`,`changeTime`)
                                    VALUES(:user, :detailID, :comeIn, :balance, :changeTime)";
                $stmtInsertComeIn = $this->prepare($sqlInsertComeIn);

                $stmtInsertComeIn->bindParam(':user', $user, PDO::PARAM_STR);
                $stmtInsertComeIn->bindParam(':detailID', $detailId, PDO::PARAM_STR);
                $stmtInsertComeIn->bindParam(':comeIn', $comeIn, PDO::PARAM_INT);
                $stmtInsertComeIn->bindParam(':balance', $balanceNew, PDO::PARAM_INT);
                $stmtInsertComeIn->bindParam(':changeTime', $saveTime, PDO::PARAM_STR);

                $stmtInsertComeIn->execute();

                $this->commit();

                $url = $account[0]['user'];
                header("location:/challenges/bank/Account/displayDetail/$url");
            }
        } catch (Exception $e) {
            $this->rollback();
        }
    }
}
