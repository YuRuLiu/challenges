<?php

require_once("Database.php");

class Detail extends Database
{
    function selectDetail($user)
    {
        $sqlSelectDetail = "SELECT `detailID`,`goOut`,`comeIn`,`balance`,`changeTime`
                            FROM `detail`
                            WHERE `user` = '$user'";
        $rowSelectDetail = $this->select($sqlSelectDetail);

        return $rowSelectDetail;
    }

    function insertComeIn($user, $detailID, $comeIn, $balance, $changeTime)
    {
        $sqlInsertComeIn = "INSERT INTO `detail`(`user`,`detailID`,`comeIn`,`balance`,`changeTime`)
                            VALUES('$user','$detailID','$comeIn','$balance','$changeTime')";
        $this->insert($sqlInsertComeIn);
    }

    function selectDetailId($user)
    {
        $sqlSelectDetailId = "SELECT `detailID`
                              FROM `detail`
                              WHERE `user` = '$user'
                              ORDER BY `detailID` DESC
                              LIMIT 1";
        $rowSelectDetailId = $this->select($sqlSelectDetailId);

        return $rowSelectDetailId;
    }
}
