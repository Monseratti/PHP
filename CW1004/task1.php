<?php
$task = $_GET['task'];
switch($task){
    case 1:
        echo $_GET['data']%2==0?'<p>True</p>':'<p>False</p>';
        break;
    case 2:
        echo $_GET['num1']>$_GET['num2']?'<p>'.$_GET['num1'].'</p>':'<p>'.$_GET['num2'].'</p>';
        break;
    case 3:
        echo $_GET['data']>0?'<p>'.$_GET['data'].'</p>':'<p>'.abs($_GET['data']).'</p>';
        break;
    case 4:
        if($_GET['A']>=$_GET['B']){
            echo '<p>Incorrect data. A is greater than or equal to B</p>';
            break;
        }
        if($_GET['data']>=$_GET['A']&&$_GET['data']<=$_GET['B']):
            echo '<p>'.pow($_GET['data'],2).'</p>';
        elseif($_GET['data']<$_GET['A']):
            echo '<p> Data lower than A by '.($_GET['A']-$_GET['data']).'</p>';
        else:
            echo '<p> Data biggest than B by '.($_GET['data']-$_GET['B']).'</p>';
        endif;       
        break;
    case 5:
        if($_GET['data']>=1&&$_GET['data']<=6):
            echo '<h'.$_GET['data'].'>Header value '.$_GET['data'].'</h'.$_GET['data'].'>';
        else:
            echo "Incorrect data. Variable must be between 1 and 6";
        endif;
        break;
    case 6:
        if(isIncorrectData($_GET['day'],$_GET['month'])):
            echo 'You input incorrect data';
        else:
            echo 'Is a '.findSeason($_GET['month']).', '.findMonth($_GET['month']).'. '.findPartOfMonth($_GET['day'],$_GET['month']).' half of month';
        endif;
        break;
    case 7:
        $dataArr=[
            0=>'B',
            10=>'KiB',
            20=>'MiB',
            30=>'GiB',
            40=>'TiB',
            50=>'PiB',
            60=>'EiB',
            70=>'ZiB',
            80=>'YiB',
        ];
        echo $_GET['input_number'].' '.$dataArr[$_GET['from']].' = '.(($_GET['input_number']*pow(2,$_GET['from']))/pow(2,$_GET['to'])).' '.$dataArr[$_GET['to']];
        break;
    default:
        echo "Fail data";
}

    function isIncorrectData($day,$month)
    {
        $months = [
            1=>31,
            2=>28,
            3=>31,
            4=>30,
            5=>31,
            6=>30,
            7=>31,
            8=>31,
            9=>30,
            10=>31,
            11=>30,
            12=>31
        ];
        if($day<1||$day>31||$month<1||$month>12) return true;
        if($day>$months[$month]) return true;
        return false;
    }
    function findSeason($month)
    {
        if($month<=2||$month==12) return "Winter";
        if($month>=3&&$month<=5) return "Spring";
        if($month>=6&&$month<=8) return "Summer";
        if($month>=9&&$month<=11) return "Authumn";
        return "Incorrect data";
    }
    function findMonth($month)
    {
        $months = [
            1=>"January",
            2=>"February",
            3=>"Marth",
            4=>"April",
            5=>"May",
            6=>"June",
            7=>"July",
            8=>"August",
            9=>"September",
            10=>"October",
            11=>"November",
            12=>"December"
        ];
        return $months[$month];
    }
    function findPartOfMonth($day,$month)
    {
        $months = [
            1=>31,
            2=>28,
            3=>31,
            4=>30,
            5=>31,
            6=>30,
            7=>31,
            8=>31,
            9=>30,
            10=>31,
            11=>30,
            12=>31
        ];
        return $day<($months[$month]/2)?"First":"Last";
    }
?>