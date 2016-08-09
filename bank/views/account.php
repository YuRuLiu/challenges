<!DOCTYPE html>
<html>
    <head>
        <title>帳戶</title>
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
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">選擇交易</div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <!--顯示帳戶列表-->
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <!--顯示欄位-->
                                <thead>
                                    <tr>
                                        <th>帳戶名稱</th>
                                        <th>餘額</th> 
                                        <th>交易</th>
                                    </tr>
                                </thead>
                                <!--欄位內容-->
                                <tbody>
                                <?php foreach($data1 as $display_account){?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $display_account['user'];?></td>
                                        <td><?php echo $display_account['balance'];?></td>
                                        <td>
                                            <form method="post" action="/challenges/bank/account/displayDetail/<?php echo $display_account['user'];?>">
                                                <a href="/challenges/bank/account/displayDetail/<?php echo $display_account['user'];?>">
                                                    <button type="submit" class="btn btn-info" name="detail">明細</button>
                                                </a>
                                            </form>
                                            <form method="post" action="/challenges/bank/account/displaySaveMoney/<?php echo $display_account['user'];?>">
                                                <a href="/challenges/bank/account/displaySaveMoney/<?php echo $display_account['user'];?>">
                                                    <button type="submit" class="btn btn-success" name="save_money">存款</button>
                                                </a>
                                            </form>
                                            <form method="post" action="/challenges/bank/account/displayGetMoney/<?php echo $display_account['user'];?>">
                                                <a href="/challenges/bank/account/displayGetMoney/<?php echo $display_account['user'];?>">
                                                    <button type="submit" class="btn btn-warning" name="get_money">提款</button>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }?>    
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>