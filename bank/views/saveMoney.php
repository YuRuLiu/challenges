<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        
        <title>存入</title>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <!-- Bootstrap Core CSS -->
        <link href="/challenges/bank/views/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- MetisMenu CSS -->
        <link href="/challenges/bank/views/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    
        <!-- Custom CSS -->
        <link href="/challenges/bank/views/dist/css/sb-admin-2.css" rel="stylesheet">
    
        <!-- Custom Fonts -->
        <link href="/challenges/bank/views/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="/challenges/bank/views/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="/challenges/bank/views/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="/challenges/bank/views/dist/css/jquery.datetimepicker.css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="/challenges/bank/views/js/jquery.js"></script>
        <script src="/challenges/bank/views/js/bootstrap.js"></script>
    
    </head>
    
    <body>
        <div class="row">
            <div class="col-lg-7 col-md-offset-3">
                <div class="panel panel-success">
                    <div class="panel-heading">存入</div>
                    <div class="panel-body">
                        <form method="post" action="/challenges/bank/account/saveMoney/<?php echo $data1[0]['user'];?>">
                            <table>
                                <tr>
                                    <td><strong>帳戶餘額：</strong></td>
                                    <td><?php echo $data1[0]['balance'];?></td>
                                </tr>
                                <tr>
                                    <td><strong>存入金額：</strong></td>
                                    <td><input class="form-control" name="comeIn" placeholder="請輸入金額"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" value="存入" name="saveInsert">    
                                    </td>
                                    <td>
                                        <input type="reset" class="btn btn-outline btn-primary" value="清除">    
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>