<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        
        <title>活動列表</title>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <!-- Bootstrap Core CSS -->
        <link href="/challenges/active/views/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- MetisMenu CSS -->
        <link href="/challenges/active/views/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    
        <!-- Custom CSS -->
        <link href="/challenges/active/views/dist/css/sb-admin-2.css" rel="stylesheet">
    
        <!-- Custom Fonts -->
        <link href="/challenges/active/views/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="/challenges/active/views/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="/challenges/active/views/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="/challenges/active/views/dist/css/jquery.datetimepicker.css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="/project/projectMingYu_core/views/js/jquery.js"></script>
        <script src="/project/projectMingYu_core/views/js/bootstrap.js"></script>
    
    </head>
    
    <body>
        <!--------------公司名稱---------------->
        <!--<div class="col-md-4 col-md-offset-5">-->
        <!--    <font size="7" face="微軟正黑體"><strong>明昱生命禮儀</strong></font>-->
        <!--</div>-->
        <!--------------功能列---------------->
        <!--<div class="row"> -->
        <!--    <form method="post" action="/challenges/active/Login/logout">-->
        <!--        <div class="col-md-2 col-md-offset-3"><h4>使用者身分：<?php echo $data7;?></h4></div>-->
        <!--        <div class="col-md-2"><button type="submit" class="btn btn-warning " name="logout">登出</button></div>-->
        <!--    </form>-->
        <!--</div>-->
        <!--<hr>-->
        <div class="row">
            <div class="col-lg-7 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">新增活動</div>
                    <div class="panel-body">
                        <form method="post" action="/challenges/active/event/insertEvent">
                            <table>
                                <tr>
                                    <td><strong>活動名稱：</strong></td>
                                    <td><input class="form-control" name="eventName" placeholder="請輸入活動名稱"></td>
                                </tr>
                                <tr>
                                    <td><strong>活動內容：</strong></td>
                                    <td><textarea cols="50" rows="5" class="form-control" name="content" placeholder="請輸入詳細內容"></textarea></td>
                                </tr>
                                <tr>
                                    <td><strong>攜伴：</strong></td>
                                    <td>
                                        <label class="radio-inline">
                                            <input type="radio" name="bring" value="可" checked="true"><strong>可</strong>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="bring" value="否"><strong>否</strong>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>開始報名日期/時間：</strong></td>
                                    <td>
                                        <input class="form-control" type="text" id="signupDate" name="signupDate"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>截止報名日期/時間：</strong></td>
                                    <td>
                                        <input class="form-control" type='text' name='deadline' id="deadline">
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>人數限制：</strong></td>
                                    <td>
                                        <input type="text" class="form-control" name="totalPeople" placeholder="請輸入人數">    
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>可參加的員工：</strong></td>
                                    <td><textarea cols="25" rows="10" class="form-control" name="participant" placeholder="例:2016062010:Betsy_Liu,2016062050:zzz"></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" value="新增" name="insertEvent">    
                                    </td>
                                    <td>
                                        <input type="reset" class="btn btn-outline btn-primary" value="取消">    
                                    </td>
                                </tr>
                                <!--<tr>-->
                                <!--    <td><?php echo str_pad(rand(0,99999999),8,'0',STR_PAD_LEFT);?></td>-->
                                <!--</tr>-->
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    <script src="/challenges/active/views/js/jquery.js"></script>
    <script src="/challenges/active/views/js/jquery.datetimepicker.full.js"></script>
    <script>/*
        window.onerror = function(errorMsg) {
        	$('#console').html($('#console').html()+'<br>'+errorMsg)
        }*/
        $('#signupDate').datetimepicker({
        	formatTime:'H:i',
        	formatDate:'d.m.Y',
        	//defaultDate:'8.12.1986', // it's my birthday
        	defaultDate:'+03.01.1970', // it's my birthday
        	defaultTime:'10:00',
        	timepickerScrollbar:false
        });
        
        $('#deadline').datetimepicker({
        	formatTime:'H:i',
        	formatDate:'d.m.Y',
        	//defaultDate:'8.12.1986', // it's my birthday
        	defaultDate:'+03.01.1970', // it's my birthday
        	defaultTime:'10:00',
        	timepickerScrollbar:false
        });
    </script>
</html>