<?php
#task 1
#1
function T1_1_1($one, $two){
    return $one>$two?$one:$two;
}
function T1_1_2($one, $two){
    return pow($one,$two);
}
function T1_1_3($one, $two){
    return ($one+$two)/2;
}

#2
function T1_2($number,$num){
    return intval(str_replace(strval($num),"",strval($number)));
}

#3
function T1_3(){
    if(time()>=strtotime("06:00:00")&&time()<strtotime("11:00:00")) return "blue";
    if(time()>=strtotime("11:00:00")&&time()<strtotime("16:00:00")) return "yellow";
    if(time()>=strtotime("16:00:00")&&time()<strtotime("20:00:00")) return "red";
    if(time()>=strtotime("20:00:00")&&time()<strtotime("06:00:00")) return "black";
    return "";
}

#4
function T1_4($num1, $num2=2){
    return ($num1%$num2==0)?true:false;
}

#5
function T1_5($row,$col,$colWidth=50,$rowHeigth=50){
    echo "<table style='border: 1px solid black'><tbody>";
    for ($i=0; $i < $row; $i++) { 
        echo "<tr style='height:".$rowHeigth."px;border: 1px solid black'>";
        for ($y=0; $y < $col; $y++) { 
            echo "<td style='width:".$colWidth."px;border: 1px solid black'>".($i*$col+$y)."</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table>";
}

#6
function T1_6($number){
    echo "<span style='margin:10px'>$number</span>";
    $number--;
    if($number>0){
        T1_6($number);
    }
}
?>

<?php
#task 2
#1
function T2_1($text, $symbol){
    $arr = str_split($text);
    $count = 0;
    foreach ($arr as $symb) {
        if($symbol==$symb){
            $count++;
        }
    }
    return $count;
}

#2
function T2_2($array){
    for ($i=0; $i < 10; $i++) { 
        try {
            $array[] = rand(10,100);
        } catch (\Throwable $th) {
            return false;
        }
    }
    return true;
}

#3
function T2_3($array, $byAsc){
    if($byAsc==0){
        arsort($array);
        return true;
    }
    elseif($byAsc==1){
        sort($array);
        return true;
    }
    else{
        return false;
    }
}

#4
function T2_4($array){
    $rows = ceil(count($array) / 5);
    echo "<table style='border: 1px solid black'><tbody>";
    for ($i = 0; $i < $rows; $i++) {
      echo "<tr style='border: 1px solid black'>";
      for ($j = 0; $j < 5; $j++) {
        $index = $i * 5 + $j;
        if ($index < count($array)) {
          echo "<td style='border: 1px solid black'><input value='" . $array[$index] . "'></td>";
        } else {
          echo "<td style='border: 1px solid black'></td>";
        }
      }
    }
    echo "</tbody></table>";
}

#5
function T2_5(){
    $dice1 = rand(1,6);
    $dice2 = rand(1,6);
    echo "<div>
    <img src='img/dice".$dice1.".png' alt='dice1'>
    <img src='img/dice".$dice2.".png' alt='dice2'>
    </div>";
}
?>