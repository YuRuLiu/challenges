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

    function insertComeIn($user, $detailId, $comeIn, $balance, $saveTime)
    {
        $sqlInsertComeIn = "INSERT INTO `detail`(`user`,`detailID`,`comeIn`,`balance`,`changeTime`)
                            VALUES(:user, :detailID, :comeIn, :balance, :changeTime)";
        $stmtInsertComeIn = $this->prepare($sqlInsertComeIn);

        $stmtInsertComeIn->bindParam(':user', $user, PDO::PARAM_STR);
        $stmtInsertComeIn->bindParam(':detailID', $detailId, PDO::PARAM_STR);
        $stmtInsertComeIn->bindParam(':comeIn', $comeIn, PDO::PARAM_INT);
        $stmtInsertComeIn->bindParam(':balance', $balance, PDO::PARAM_INT);
        $stmtInsertComeIn->bindParam(':changeTime', $saveTime, PDO::PARAM_STR);

        $stmtInsertComeIn->execute();
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
