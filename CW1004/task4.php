<?php
$task = $_GET['task'];
switch($task){
    case 1:{
        $arr = [];
        for ($i=0; $i < 10; $i++) { 
            array_push($arr,rand(10,100));
        }
        echo "<h2> Input array: ";
        array_walk($arr,function ($val)
        {
            echo "$val, ";
        });
        echo "<h2> Reverce array: ";
        array_walk(array_reverse($arr),function ($val)
        {
            echo "$val, ";
        });
        break;}
    case 2:{
        $arr = [];
        for ($i=0; $i < 10; $i++) { 
            array_push($arr,rand(10,100));
        }
        echo "<h2> Input array: ";
        array_walk($arr,function ($val)
        {
            echo "$val, ";
        });
        $num = $_GET['data'];
        if(array_search($num,$arr)===false){
            echo "<p>Number is not find</p>";
        }
        else{
            echo "<p>Nubmer $num was find. Index: ".array_search($num,$arr)."</p>";
        }
        break;}
    case 3:{
        $arr=[
            1=>"img/banner1.jpg",
            2=>"img/banner2.jpg",
            3=>"img/banner3.jpg",
            4=>"img/banner4.jpg",
            5=>"img/banner5.jpg",
        ];
        echo "<img src='".$arr[rand(1,5)]."'/>";
        break;}
    case 4:{
        $arr = [];
        for ($y=0; $y < 5; $y++) { 
            $in_arr = [];
            for ($i=0; $i < 5; $i++) { 
                array_push($in_arr,rand(10,100));
            }
            $arr[]=$in_arr;
        }
        $sortArr = [];
        foreach ($arr as $arrays => $array) {
            echo "<p>";
            foreach ($array as $key => $value) {
                echo "$value, ";
                $sortArr[] = $value;
            }
            echo "</p>";
        }
        sort($sortArr);
        echo "<p>";
        for ($i=1; $i <= count($sortArr); $i++) { 
            if($i%5==0&&$i!=count($sortArr)){
                echo "</p><p>";
            }
            if($i==count($sortArr)) {echo "</p>";}
            echo $sortArr[($i-1)].', ';
        }
        break;}
    case 5:{
        $arr1 = [];
        for ($i=0; $i < 10; $i++) { 
            array_push($arr1,rand(1,100));
        }
        sort($arr1);
        $arr2 = [];
        for ($i=0; $i < 10; $i++) { 
            array_push($arr2,rand(1,100));
        }
        sort($arr2);
        echo "<h2> Input array 1: ";
        array_walk($arr1,function ($val)
        {
            echo "$val, ";
        });
        echo "</h2>";
        echo "<h2> Input array 2: ";
        array_walk($arr2,function ($val)
        {
            echo "$val, ";
        });
        echo "</h2>";
        $mergeArr = array($arr1);
        for ($i=0; $i < count($arr2); $i++) { 
            if(in_array($arr2[$i],$mergeArr)===false){
                $mergeArr[]= $arr2[$i];
            }
        }
        sort($mergeArr);
        echo "<h2> Merge array: ";
        foreach ($mergeArr as $key => $value) {
            echo "$value, ";
        }
        echo "</h2>";
        break; }
    case 6:{
        $arr = [
            3=>5,
            200=>50,
            124=>40,
            134=>100,
            198=>70,
            324=>200,
            345=>320,
            311=>37,
            100=>10,
            28=>60
        ];
        $colors = [
            1=>"red",
            2=>"yellow",
            3=>"green",
            4=>"blue",
            5=>"gray"
        ];

        foreach ($arr as $key => $value) {
            echo "<div style='position:absolute; width:20; height:20; top:$key; left:$value; background-color:".$colors[rand(1,5)]."'></div>";
        }
        break;}
    default:
     echo "incorrect data";
}

?>