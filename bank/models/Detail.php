<?php

require_once("Database.php");

class Detail extends Database
{
    function selectDetail($user)
    {
        $sqlSelectDetail = "SELECT `detailID`,`goOut`,`comeIn`,`balance`,`changeTime`
                            FROM `detail`
                            WHERE `user` = :user";
        $stmtSelectDetail = $this->prepare($sqlSelectDetail);

        $stmtSelectDetail->bindParam(':user', $user, PDO::PARAM_STR);

        $stmtSelectDetail->execute();

        $detail = $stmtSelectDetail->fetchAll();

        return $detail;
    }

    function selectDetailId($user)
    {
        $sqlSelectDetailId = "SELECT `detailID`
                              FROM `detail`
                              WHERE `user` = :user
                              ORDER BY `detailID` DESC
                              LIMIT 1";
        $stmtSelectDetailId = $this->prepare($sqlSelectDetailId);

        $stmtSelectDetailId->bindParam(':user', $user, PDO::PARAM_STR);

        $stmtSelectDetailId->execute();

        $detailId = $stmtSelectDetailId->fetchAll();

        return $detailId;
    }
}
