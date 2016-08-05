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
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="/challenges/active/views/js/jquery.js"></script>
        <script src="/challenges/active/views/js/bootstrap.js"></script>
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
        <!--------------訂單列表---------------->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">活動列表</div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <div class="row">
                                <div class="col-sm-4">
                                    <form method="post" action="/challenges/active/event/create_event">
                                        <button type="submit" class="btn btn-info" name="create_event">
                                            新增活動
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!--顯示活動列表-->
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <!--活動欄位-->
                                <thead>
                                    <tr>
                                        <th>活動名稱</th>
                                        <th>活動內容</th>
                                        <th>開始報名日期/時間</th>
                                        <th>截止報名日期/時間</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <!--欄位內容-->
                                <tbody>    
                                <?php
                                    foreach($data1 as $display_event){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $display_event['eventName']?></td>
                                        <td><?php echo $display_event['content']?></td>
                                        <td><?php echo $display_event['signupDate']?></td>
                                        <td><?php echo $display_event['deadline']?></td>
                                        <td><a href="/challenges/active/signUp/display_signUp/<?php echo $display_event['web']?>" target="_blank">
                                            <button type="button" class="btn btn-sm btn-primary" name="signUp">我要報名</button> 
                                        </a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>