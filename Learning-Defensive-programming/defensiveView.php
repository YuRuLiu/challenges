<?php
    require_once("Defensive.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Defensive programming</title>
    </head>
    <body>
        <form method="post" action="Defensive.php">
            <table>
                <tr>
                    <td><strong>活動名稱：</strong></td>
                    <td><input name="eventName" placeholder="請輸入活動名稱"></td>
                </tr>
                <tr>
                    <td><strong>活動內容：</strong></td>
                    <td><textarea cols="50" rows="5" name="content" placeholder="請輸入詳細內容"></textarea></td>
                </tr>
                <tr>
                    <td><strong>攜伴：</strong></td>
                    <td>
                        <label>
                            <input type="radio" name="bring" value="可" checked="true"><strong>可</strong>
                        </label>
                        <label>
                            <input type="radio" name="bring" value="否"><strong>否</strong>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><strong>開始報名日期：</strong></td>
                    <td>
                        <input type="text" id="signupDate" name="signupDate" placeholder="例:2016-08-17"/>
                    </td>
                </tr>
                <tr>
                    <td><strong>截止報名日期：</strong></td>
                    <td>
                        <input type='text' name='deadline' id="deadline" placeholder="例:2016-08-18">
                    </td>
                </tr>
                <tr>
                    <td><strong>人數限制：</strong></td>
                    <td>
                        <input type="text" name="totalPeople" placeholder="請輸入人數">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" value="新增" name="insertEvent">
                    </td>
                    <td>
                        <input type="reset" value="取消">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>