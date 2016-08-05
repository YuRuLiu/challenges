<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        
        <title>報名</title>
        
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
            <div class="col-lg-5 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">活動</div>
                    <div class="panel-body">
                        <form method="post">
                            <table class="table table-striped table-bordered table-hover">
                            <?php foreach($data1 as $display_signUp){?>
                                <tr>
                                    <td><strong>活動名稱：</strong></td>
                                    <td><?php echo $display_signUp['eventName']?></td>
                                </tr>
                                <tr>
                                    <td><strong>活動內容：</strong></td>
                                    <td><?php echo $display_signUp['content']?></td>
                                </tr>
                                <tr>
                                    <td><strong>攜伴：</strong></td>
                                    <td><?php echo $display_signUp['bring']?></td>
                                </tr>
                                <tr>
                                    <td><strong>開始報名日期/時間：</strong></td>
                                    <td><?php echo $display_signUp['signupDate']?></td>
                                </tr>
                                <tr>
                                    <td><strong>截止報名日期/時間：</strong></td>
                                    <td><?php echo $display_signUp['deadline']?></td>
                                </tr>
                                <tr>
                                    <td><strong>人數限制：</strong></td>
                                    <td><?php echo $display_signUp['totalPeople']?></td>
                                </tr>
                                <tr>
                                    <td><strong>具報名資格：</strong></td>
                                    <td><?php echo $display_signUp['participant']?></td>
                                </tr>
                            <?php }?>
                                <tr>
                                    <td><strong>已報名成功：</strong></td>
                                    <?php foreach($data2 as $display_success){?>
                                    <td><?php echo $display_success['employeeID']."<br>"?></td>
                                    <?php }?>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">我要報名</div>
                    <?php foreach($data1 as $display_signUp){?>
                    <div class="panel-body">
                        <form method="post" action="/challenges/active/signUp/signUp/<?php echo $display_signUp['web'];?>">
                            <table>
                                <tr>
                                    <td><strong>員工編號：</strong></td>
                                    <td><input class="form-control" name="employeeID" placeholder="請輸入員工編號"></td>
                                </tr>
                                <tr>
                                    <td><strong>攜伴人數：</strong></td>
                                    <td><input class="form-control" name="bringNumber" placeholder="請輸入攜伴人數"></td>
                                </tr>
                                <tr>
                                    <input style="visibility:hidden" name="eventID" value="<?php echo $display_signUp['eventID'];?>"/>
                                    <td><input class="btn btn-primary" name="signup" type="submit" value="報名"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <?php }?>
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