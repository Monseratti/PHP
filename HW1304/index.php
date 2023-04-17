<?php
#Task 1
#1
function T1_1($num1, $num2, $operator){
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            if($num2==0) 
                throw new Exception("Division by 0", -2);
            return $num1 / $num2;
        default:
            throw new Exception("Invalid operator set", -1);
    }
}

#2
function T1_2($tag, $class="", $value=""){
    if($tag!="input"){
        echo "<$tag class='$class'>$value</$tag>";
    }
    else{
        echo "<$tag class='$class' value='$value'>";
    }
}

#3
function T1_3($arr)
{
    echo "<ul>";
    foreach ($arr as $val) {
        echo "<li class='item'>$val</li>";
    }
    echo "</ul>";
}

#4
function T1_4()
{
    return "#".dechex(mt_rand(0,16777215));
}

#5
function setChessFigure($i,$r, $x,$y,$figure)
{
    if($i==$x&&$r==$y) return ";background-image:url(img/$figure.png);background-repeat:no-repeat; background-position: center center;";
    return "";
}
function T1_5($x,$y,$figure)
{
    echo '<table>';
        for ($i=0; $i < 8; $i++) { 
            echo '<tr>';
            for ($r=0; $r < 8; $r++) { 
                if($i==0||$i%2==0){
                    if($r==0||$r%2==0){
                        echo "<td style='width:50px;height:50px;background-color:white".setChessFigure($i,$r, $x,$y,$figure)."'></td>";
                    }
                    else{
                        echo "<td style='width:50px;height:50px;background-color:brown".setChessFigure($i,$r, $x,$y,$figure)."'></td>";
                    }
                }
                else{
                    if($r==0||$r%2==0){
                        echo "<td style='width:50px;height:50px;background-color:brown".setChessFigure($i,$r, $x,$y,$figure)."'></td>";
                    }
                    else{
                        echo "<td style='width:50px;height:50px;background-color:white".setChessFigure($i,$r, $x,$y,$figure)."'></td>";
                    }
                }
            }
            echo '</tr>';
        }
    echo '</table>';
}

#Task 2
#1
function T2_1($array){
    foreach ($array as $val) {
        try {
            echo "<span ".($val<0?"style='color:red'":"").">$val</span>";
        } catch (\Throwable $th) {
            return false;
        }
    }
    return true;
}

#2
function T2_2($num)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}

#3
function T2_3($count=10)
{
    echo "<div style='width:20px; height:20px; background-color:blue; position:absolute; top:".rand(0,300).";left:".rand(0,300)."'></div>";
    $count--;
    if($count>0){
        T2_3($count);
    }
}

#4
function T2_4($name, $image, $price){
    echo "<div>
    <img scr='$image' alt='$name'>
    <div><b>$name</b></div>
    <div>$price</div>
    <button>Buy</button>
    </div>";
}

#5
function T2_5($card){
    $newCard = [];
    foreach ($card as $item) {
        if(array_key_exists($item[0],$newCard)){
            $newCard[$item[0]]["count"] = $newCard[$item[0]]["count"] + $item[2];
            $newCard[$item[0]]["total_price"] = $newCard[$item[0]]["total_price"] + $item[3];
        }
        else{
            $newCard[$item[0]] = ["image"=>$item[1], "count"=>$item[2], "total_price"=>$item[3]];
        }
    }
    return $newCard;
}
?>
