<?php
$task = $_GET['task'];
switch($task){
    case 1:
        $arr =[]; 
        for($i=1;$i<=23;$i++){
            if($i%2==0){
                echo "<span style='color:green;font-size:".($i*5)."px'>$i</span>";
                array_push($arr,$i);
            }
        }
        echo '<div> SUM = '.array_sum($arr).'</div><div> AVG = '.array_sum($arr)/count($arr).'</div>';
        break;
    case 2:
        $isPrime = true;
        for($i=$_GET['data']-1;$i>1;$i--){
            if($_GET['data']%$i==0){
                $isPrime = false;
                break;
            }
        }
        echo $isPrime==false?'<p>Number '.$_GET['data'].' is not prime</p>':'<p>Number '.$_GET['data'].' is prime</p>';
        break;
    case 3:
        for($i=0;$i<10;$i++){
            echo "<div style='width:".(20+15*$i)."; height:".(20+15*$i).";
                position: absolute;
                top: 200px;
                left:200px;
                border: 1px solid red;
                border-radius: 50%;'></div>"; 
        }
        break;
    case 4:
        $countDiff = 0;
        $countOdd = 0;
        for($i=1000;$i<10000;$i++){
            $arr = array_map('intval',str_split($i));
            if($arr[0]==$arr[1]&&$arr[1]==$arr[2]&&$arr[2]==$arr[3]) $countOdd++;
            if( $arr[0]!=$arr[1]&&
                $arr[0]!=$arr[2]&&
                $arr[0]!=$arr[3]&&
                $arr[1]!=$arr[2]&&
                $arr[1]!=$arr[3]&&
                $arr[2]!=$arr[3]) 
                $countDiff++;
        }
        echo "<div>Count diff: $countDiff</div><div>Count odd: $countOdd</div>";
        break;
    case 5:
        $bin = 0;
        // $pos = 1;
        // $num = $_GET['data'];
        // while ($num !=0) {
        //     $rem = intval($num%2);
        //     $bin+=$rem*$pos;
        //     $pos*=10;
        //     $num/=2;
        // }
        $bin = decbin($_GET['data']);
        echo '<p>Number: '.$_GET['data'].'</p><p>Converted: '.$bin.'</p>';
        break;
    case 6:
        echo '<table>';
        for ($i=0; $i < 8; $i++) { 
            echo '<tr>';
            for ($y=0; $y < 8; $y++) { 
                if($i==0||$i%2==0){
                    if($y==0||$y%2==0){
                        echo "<td style='width:50px;height:50px;background-color:white'></td>";
                    }
                    else{
                        echo "<td style='width:50px;height:50px;background-color:black'></td>";
                    }
                }
                else{
                    if($y==0||$y%2==0){
                        echo "<td style='width:50px;height:50px;background-color:black'></td>";
                    }
                    else{
                        echo "<td style='width:50px;height:50px;background-color:white'></td>";
                    }
                }
            }
            echo '</tr>';
        }
        echo '</table>';
        break;
    case 7:
        echo '<table>';
        for ($i=0; $i < 8; $i++) { 
            echo '<tr>';
            for ($y=0; $y < 8; $y++) { 
                if($i==0||$i%2==0){
                    if($y==0||$y%2==0){
                        echo "<td style='width:50px;height:50px;background-color:white".setChessFigure($i,$y)."'></td>";
                    }
                    else{
                        echo "<td style='width:50px;height:50px;background-color:brown".setChessFigure($i,$y)."'></td>";
                    }
                }
                else{
                    if($y==0||$y%2==0){
                        echo "<td style='width:50px;height:50px;background-color:brown".setChessFigure($i,$y)."'></td>";
                    }
                    else{
                        echo "<td style='width:50px;height:50px;background-color:white".setChessFigure($i,$y)."'></td>";
                    }
                }
            }
            echo '</tr>';
        }
        echo '</table>';
        break;
    default:
        echo "Fail data";
}

function setChessFigure($i,$y)
{
    if($i==0&&($y==0||$y==7)) return ";background-image:url(img/brock.png);background-repeat:no-repeat; background-position: center center;";
    if($i==0&&($y==1||$y==6)) return ";background-image:url(img/bknight.png);background-repeat:no-repeat; background-position: center center;";
    if($i==0&&($y==2||$y==5)) return ";background-image:url(img/bbishop.png);background-repeat:no-repeat; background-position: center center;";
    if($i==0&&$y==3) return ";background-image:url(img/bqueen.png);background-repeat:no-repeat; background-position: center center;";
    if($i==0&&$y==4) return ";background-image:url(img/bking.png);background-repeat:no-repeat; background-position: center center;";
    if($i==1) return ";background-image:url(img/bpawn.png);background-repeat:no-repeat; background-position: center center;";
    if($i==6) return ";background-image:url(img/wpawn.png);background-repeat:no-repeat; background-position: center center;";
    if($i==7&&($y==0||$y==7)) return ";background-image:url(img/wrock.png);background-repeat:no-repeat; background-position: center center;";
    if($i==7&&($y==1||$y==6)) return ";background-image:url(img/wknight.png);background-repeat:no-repeat; background-position: center center;";
    if($i==7&&($y==2||$y==5)) return ";background-image:url(img/wbishop.png);background-repeat:no-repeat; background-position: center center;";
    if($i==7&&$y==3) return ";background-image:url(img/wqueen.png);background-repeat:no-repeat; background-position: center center;";
    if($i==7&&$y==4) return ";background-image:url(img/wking.png);background-repeat:no-repeat; background-position: center center;";
    return "";
}
?>