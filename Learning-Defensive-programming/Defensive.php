<?php
header("Content-Type:text/html; charset=utf-8");
require_once("Database.php");

$eventName = $_POST['eventName'];
$content = $_POST['content'];
$bring = $_POST['bring'];
$signupDate = $_POST['signupDate'];
$deadline = $_POST['deadline'];
$totalPeople = $_POST['totalPeople'];
$insertEvent = $_POST['insertEvent'];

if (isset($insertEvent)) {
    $eventID = increment_eventID();
    $eventName = stringCheck($eventName);
    $content = stringCheck($content);

    $signupDate = dateCheck($signupDate);
    $deadline = dateCheck($deadline);
    $date = compareDate($signupDate, $deadline);

    $signupDate = $date[0];
    $deadline = $date[1];

    $totalPeople = numCheck($totalPeople);

    $rowEffect = insertEvent($eventID, $eventName, $content, $bring, $signupDate, $deadline, $totalPeople);

    if ($rowEffect > 0) {
        echo "活動名稱：".$eventName."<br>";
        echo "活動內容：".$content."<br>";
        echo "攜伴：".$bring."<br>";
        echo "開始報名日期：".$signupDate."<br>";
        echo "報名截止日期：".$deadline."<br>";
        echo "可報名人數：".$totalPeople."<br>";
        echo "新增成功！";
    } else {
        echo "新增失敗";
    }
}

function stringCheck($string)
{
    if (!is_string($string) || $string == NULL) {
        echo $string . "欄位請勿為空白！";
        exit();
    }

    return $string;
}

function numCheck($number)
{
    if (!is_numeric($number)) {
        echo $number . "需要為一個數字！";
        exit();
    }

    return $number;
}

function dateCheck($date)
{
    $date_regex = '/^(\d{2}(([02468][048])|([13579][26]))\-((((0[13578])|(1[02]))\-((0[1-9])|([1-2][0-9])|(3[01])))|(((0[469])|(11))\-((0[1-9])|([1-2][0-9])|(30)))|(02\-((0[1-9])|([1-2][0-9])))))|(\d{2}(([02468][1235679])|([13579][01345789]))\-((((0[13578])|(1[02]))\-((0[1-9])|([1-2][0-9])|(3[01])))|(((0[469])|(11))\-((0[1-9])|([1-2][0-9])|(30)))|(02\-((0[1-9])|(1[0-9])|(2[0-8])))))$/';

    if (!preg_match($date_regex, $date)) {
        echo '輸入的格式不符合日期格式！';
        exit();
    }

    return $date;
}

function compareDate($date1, $date2)
{
    if (strtotime($date1) < strtotime($date2)) {
        $date[0] = $date1;
        $date[1] = $date2;
        return $date;
    }

    echo '截止報名日期不可以晚於開始報名日期！';
    exit();
}

function insertEvent($eventID, $eventName, $content, $bring, $signupDate, $deadline, $totalPeople)
{
    $database = new Database();
    $sqlInsertEvent = "INSERT INTO `event`(`eventID`,`eventName`, `content`, `totalPeople`, `bring`, `signupDate`, `deadline`)
                       VALUES(:eventID, :eventName, :content, :totalPeople, :bring, :signupDate, :deadline)";
    $stmtInsertEvent = $database->prepare($sqlInsertEvent);

    $stmtInsertEvent->bindParam(':eventID', $eventID, PDO::PARAM_STR);
    $stmtInsertEvent->bindParam(':eventName', $eventName, PDO::PARAM_STR);
    $stmtInsertEvent->bindParam(':content', $content, PDO::PARAM_STR);
    $stmtInsertEvent->bindParam(':totalPeople', $totalPeople, PDO::PARAM_INT);
    $stmtInsertEvent->bindParam(':bring', $bring, PDO::PARAM_STR);
    $stmtInsertEvent->bindParam(':signupDate', $signupDate, PDO::PARAM_STR);
    $stmtInsertEvent->bindParam(':deadline', $deadline, PDO::PARAM_STR);

    $rowEffect = $stmtInsertEvent->execute();

    return $rowEffect;
}

function increment_eventID()
{
    $database = new Database();
    $sqlSelectEventId = "SELECT `eventID`
                         FROM `event`
                         ORDER BY `eventID` DESC
                         LIMIT 1";
    $eventID = $database->select($sqlSelectEventId);
    $eventID = $eventID[0]['eventID'];

    $eventDate = substr("$eventID",0,-3);
    $eventNum = substr("$eventID",8,3);
    date_default_timezone_set('Asia/Taipei');
    $now = date("Ymd");

    if ($now == $eventDate) {
       $plusEventNum = $eventNum + 1;
       $plusEventNum = str_pad($plusEventNum,3,'0',STR_PAD_LEFT);
       return $now.$plusEventNum;
    } else {
        return $now."001";
    }
}
