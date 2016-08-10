<?php

require_once("Database.php");

class Account extends Database
{
    function selectAccountAll()
    {
        $sqlSelectAccountAll = "SELECT `user`,`balance`
                                FROM `account`";
        $rowSelectAccountAll = $this->select($sqlSelectAccountAll);

        return $rowSelectAccountAll;
    }

    function selectAccount($user)
    {
        $sqlSelectAccount = "SELECT `user`,`balance`
                             FROM `account`
                             WHERE `user` = :user";
        $stmtSelectAccount = $this->prepare($sqlSelectAccount);

        $stmtSelectAccount->bindParam(':user', $user, PDO::PARAM_STR);

        $stmtSelectAccount->execute();

        $account = $stmtSelectAccount->fetchAll();

        return $account;
    }

    function updateBalance($user, $balanceNew)
    {
        $sqlUpdateBalance = "UPDATE `account` SET `balance` = :balance
                             WHERE `user` = :user";
        $stmtUpdateBalance = $this->prepare($sqlUpdateBalance);

        $stmtUpdateBalance->bindParam(':user', $user, PDO::PARAM_STR);
        $stmtUpdateBalance->bindParam(':balance', $balanceNew, PDO::PARAM_INT);

        $stmtUpdateBalance->execute();
    }
}
