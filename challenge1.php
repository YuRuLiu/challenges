<?php
    
    echo "origin"."<br>";
    $origin = array(
    array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
    array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
    array(0, 0, 0, 1, 1, 1, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0, 1, 1, 1, 1, 0),
    array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    array(1, 1, 1, 0, 1, 0, 1, 1, 1, 1),
    array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
    array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
    array(1, 1, 0, 1, 1, 0, 0, 0, 0, 1)
    );

    foreach ($origin as $x => $array2)
    {
        foreach($array2 as $y => $value)
        {
            echo $value;
        }
        echo "<br>";
    }
    
    echo "<hr>";
    
//---------------------------------------------------------------------------------

    echo "result"."<br>";
    
    /*--判斷相鄰並將區塊存入陣列--*/
    for ($x=0 ; $x<10 ; $x++)
    {
        for ($y=0 ; $y<10 ; $y++)
        {
            if($origin[$x][$y] == 1) //這個陣列值是1
            {
                $key = -1;//$key判斷在哪個shape裡，初始值是-1;
                if($shape == NULL) //shape還沒有新的區塊
                {
                    $shape[0][] = $x.$y;//把值存進shape[0]裡
                }
                else //shape已經有區塊了
                {
                    foreach($shape as $shape_ID => $coordinate) //找出shape的區塊
                    {
                        foreach($coordinate as $coordinate_value)
                        {
                            if( ($x==(substr($coordinate_value,0,1)) && $y==((substr($coordinate_value,-1))+1)) ||
                                ($x==(substr($coordinate_value,0,1)) && $y==((substr($coordinate_value,-1))-1)) ||
                                ($x==((substr($coordinate_value,0,1))+1) && $y==(substr($coordinate_value,-1))) ||
                                ($x==((substr($coordinate_value,0,1))+1) && $y==(substr($coordinate_value,-1))) )
                                //判斷右->左->下->上
                            {
                                if($key<0)//第一次進到shape
                                {
                                    $key = $shape_ID;
                                    $shape[$key][]=$x.$y; //直接放入shape
                                }
                                else //已經進過其他shape
                                {
                                    foreach($shape[$shape_ID] as $n_key => $n_coordinate_value)//找到其他相鄰的shape
                                    {
                                        $shape[$key][]=substr($n_coordinate_value,0,1).substr($n_coordinate_value,-1); //把相鄰的座標拉進之前進的shape
                                        unset($shape[$shape_ID][$n_key]); //移除這個成員
                                    }
                                    
                                    if (count($shape[$shape_ID])==0) {
                                        unset($shape[$shape_ID]); //移除這個shape
                                    }
                                    
                                }
                            }
                        }
                    }
                    if($key<0) //判斷有沒有這個shape，沒有就創新的
                    {
                        $total_shape=count($shape);
                        $key = $total_shape;//領號碼牌
                        $shape[$key][]=$x.$y;//獨立!創新的陣列
                    }
                }
            }
        }
    }
    
    foreach($shape as $shape_ID => $coordinate) 
    {
        $shape_count[$shape_ID] = count(array_unique($coordinate));//計算區塊裡的筆數
    }
    
    $count_ID = array_search(max($shape_count),$shape_count);//找出最大區塊
    
    $unique = array_unique($shape[$count_ID]);//濾掉重複的座標

    /*--顯示結果--*/
    
    foreach ($origin as $x => $array2)
    {
        foreach($array2 as $y => $value)
        {
            foreach($unique as $i => $a)
            {
                $ux=substr($a,0,1);
                $uy=substr($a,-1);
                
                //不是最大區塊的值就歸零
                if(!(($x == $ux) && ($y == $uy)))
                {
                    $origin[$x][$y] = 0;
                }
                else
                {
                    $origin[$x][$y] = 1;
                    break; //比對成功就跳出，不要繼續比對
                }
            } 
            echo $origin[$x][$y];
        }
        echo "<br>";
    }
?>