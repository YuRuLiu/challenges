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
}
