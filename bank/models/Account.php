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
                             WHERE `user` = '$user'";
        $rowSelectAccount = $this->select($sqlSelectAccount);

        return $rowSelectAccount;
    }

    function updateBalance($user, $balanceNew)
    {
        $sqlUpdateBalance = "UPDATE `account` SET `balance` = '$balanceNew'
                             WHERE `user` = '$user'";
        $this->update($sqlUpdateBalance);
    }
}
