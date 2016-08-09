<?php
    require_once("Database.php");
    
    class getMoney extends Database
    {
        function getMoney_m($user,$getInsert,$goOut,$plusDetailID)
        {
            try{
                $this -> transaction();
                
                $balance = " SELECT `user`,`balance`
                             FROM `account`
                             WHERE `user`='$user' FOR UPDATE";
                $display_balance = $this -> select($balance);
                
                if (isset($getInsert)) 
                {
                    if($display_balance[0]['balance'] >= $goOut)
                    {
                        $balance_new = $display_balance[0]['balance']-$goOut;
                        
                        date_default_timezone_set('Asia/Taipei');
                        $changeTime = date("Y-m-d h:i:sa");
                        
                        $insert_goOut = " INSERT INTO `detail`(`user`,`detailID`,`goOut`,`balance`,`changeTime`) 
                                          VALUES('$user','$plusDetailID','$goOut','$balance_new','$changeTime')";
                        $this -> insert($insert_goOut);
                        
                        $update_balance = " UPDATE `account` SET `balance`='$balance_new' 
                                            WHERE `user`= '$user'";    
                        $this -> update($update_balance); 

                        $this -> commit();
                        
                        $url=$display_balance[0]['user'];
                        header("location:/challenges/bank/account/displayDetail/$url");
                    }
                    else
                        header("location:/challenges/bank/account/getFail");
                }
                
            }
            
            catch (Exception $e) {
                $this -> rollback();
            }

        }
    }

?>