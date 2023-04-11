<?php
$task = $_GET['task'];
switch($task){
    case 1:{
        $arr = [];
        for ($i=0; $i < 10; $i++) { 
            array_push($arr,rand(1,100));
        }
        echo "<h2> Input array: ";
        array_walk($arr,function ($val)
        {
            echo "$val, ";
        });
        echo "</h2>";
        echo "<h2> Pair elements: ";
        array_walk($arr,function ($val)
        {
            if($val%2==0){
                echo "$val, ";
            }
        });
        echo "</h2>";
        echo "<h2> MAX: ".max($arr).", MIN: ".min($arr)."</h2>";
        echo "<h2> Sorted array: ";
        sort($arr);
        array_walk($arr,function ($val)
        {
            echo "$val, ";
        });
        echo "</h2>";
        break;
    }
    case 2:{
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
                array_push($mergeArr,$arr2[$i]);
            }
        }
        sort($mergeArr);
        echo "<h2> Merge array: ";
        array_walk($mergeArr,function ($val)
        {
            echo "$val, ";
        });
        echo "</h2>";
        break; }
    case 3:{
        $arr = [];
        for ($i=0; $i < 10; $i++) { 
            array_push($arr,rand(1,10));
        }
        echo "<h2> Input array: ";
        array_walk($arr,function ($val)
        {
            echo "$val, ";
        });
        echo "</h2>";
        $arrMap = [];
        for ($i=0; $i < count($arr); $i++) { 
            if(array_key_exists($arr[$i],$arrMap)===false){
                $arrMap[$arr[$i]] = 1;
            }
            else{
                $arrMap[$arr[$i]] += 1;
            }
        }
        arsort($arrMap);
        foreach ($arrMap as $key => $value) {
            if($value==1){
                echo "<p style='font-size:20px; color: red'><b>$key</b>-$value</p>";
            }
            else{
                echo "<p style='font-size:20px; color: blue'><b>$key</b>-$value</p>";
            }
        }
        break;}
    case 4:{
        $fruitArr = [
            "Orange"=>["Type"=>"Citrus", "Price"=>20, "Amount"=>2],
            "Banana"=>["Type"=>"Fruit", "Price"=>10, "Amount"=>6],
            "Lemon"=>["Type"=>"Citrus", "Price"=>10, "Amount"=>7],
            "Apple"=>["Type"=>"Fruit", "Price"=>15, "Amount"=>3],
            "Kiwi"=>["Type"=>"Fruit", "Price"=>5, "Amount"=>1]
        ];
        echo "<h2>All</h2>";
        echo "<table><tr>";
        foreach ($fruitArr as $name => $params) {
            echo "<td style='background-color:green'>
            <div><b>$name</b></div>
            <div>Type: ".$params['Type']."; Price: ".$params['Price']."</div>
            <div>Amount: ".$params['Amount']."</div>
            <div>Total price: ".($params['Price']*$params['Amount'])."</div>
            </td>";
        }
        echo "</tr></table>";
        echo "<h2>Citrus</h2>";
        echo "<table><tr>";
        foreach ($fruitArr as $name => $params) {
            if($params['Type']=="Citrus"){
            echo "<td style='background-color:orange'>
            <div><b>$name</b></div>
            <div>Type: ".$params['Type']."; Price: ".$params['Price']."</div>
            <div>Amount: ".$params['Amount']."</div>
            <div>Total price: ".($params['Price']*$params['Amount'])."</div>
            </td>";}
        }
        echo "</tr></table>";
        $total = 0;
        foreach ($fruitArr as $name => $params) {
            $total+=$params['Price']*$params['Amount'];
        }
        echo "<h2>Total: $total</h2>";
        break;}
    case 5:{
        $arrCountry=[
            "UA"=>"Ukraine",
            "UK"=>"United Kingdom",
            "AO"=>"Angola",
            "BB"=>"Barbados"
        ];
        echo "<select>";
        foreach ($arrCountry as $code => $country) {
            echo "<option value='$code'>$country</option>";
        }
        echo "</select>";
        break;}
    case 6:{
        $arr=[
            "Fb"=>["img"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoP9hm4heDxdgJBt3BIKhfEjWTtMP-5EoA6Q&usqp=CAU",
                    "site"=>"https://uk-ua.facebook.com/",
                    "alt"=>"Facebook"],
            "Google"=>["img"=>"https://img.freepik.com/free-psd/google-icon-isolated-3d-render-illustration_47987-9777.jpg",
                    "site"=>"https://www.google.com.ua/",
                    "alt"=>"Google"],
            "YB"=>["img"=>"https://www.iconpacks.net/icons/2/free-youtube-logo-icon-2431-thumb.png",
                    "site"=>"https://www.youtube.com/",
                    "alt"=>"YouTube"],
            "GM"=>["img"=>"https://cdn-icons-png.flaticon.com/512/5968/5968534.png",
                    "site"=>"https://mail.google.com/",
                    "alt"=>"GMail"],
        ];
        echo "<div style='display:flex'>";
        foreach ($arr as $key => $props) {
            echo "<div style='border-radius:50%'><a href=".$props['site'].">
            <img src='".$props['img']."'width='50' height='50' alt = '".$props['alt']."'/>
            </a></div>";
        }
        echo "</div>";
        break;}
    default:
        echo "Incorrect data";
}
?>