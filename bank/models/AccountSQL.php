<?php

    require_once("Database.php");
    
    class AccountSQL extends Database
    {
        function selectAccount()
        {
            $sql_select_account = " SELECT `user`,`balance`
                                    FROM `account`";
            $row_select_account = $this->select($sql_select_account);
            return $row_select_account;
        }
    
        function selectBalance($user)
        {
            $sql_select_balance = " SELECT `user`,`balance`
                                    FROM `account`
                                    WHERE `user`='$user'";
            $row_select_balance = $this->select($sql_select_balance);
            return $row_select_balance;
        }
    
        function updateBalance($user, $balance_new)
        {
            $sql_update_balance = " UPDATE `account` SET `balance`='$balance_new'
                                    WHERE `user`= '$user'";    
            $row_update_balance = $this->update($sql_update_balance);
        }
    }
