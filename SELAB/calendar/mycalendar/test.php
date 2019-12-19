<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

    $year = isset($_GET['year']) ? $_GET['year'] : date('Y'); // 값을 받았다면 입력받은 값을, 없다면 현재 년(월)
    $month = isset($_GET['month']) ? $_GET['month'] : date('m');
    $today = date('j');
    $date = "$year-$month-01"; //현재 날짜
    $time = strtotime($date); //현재 날짜의 타임 스탬프
    $start_week = date(w, $time); // 시작 요일
    $total_day = date(t, $time); // 현재 달의 총 날짜
    $total_week = ceil(($start_week + $total_day) / 7); // 몇 주가 있는지

    // echo ("$date $time $start_week $total_day $total_week");
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calendar</title>
        <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
        <style>
            font {font-family: sans-serif;;font-size: 12px;color: #505050;}
            font.black {font-family: sans-serif; font-size:22px; color: rgb(0, 0, 0);}
            font.blue {font-family: sans-serif; font-size:22px; color: rgb(10, 42, 175);}
            font.red {font-family: sans-serif; font-size:22px; color: rgb(209, 16, 16);}
            font.gray {font-family: sans-serif; font-size : 22px; color: rgb(113, 120, 117);}
            td#boxblack {border : 1px solid black;}
            .today {background: #0b0809; color : #ffffff;}
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function(){
            // alert('되냐?');
            document.getElementById('day').onclick = function(){
                day.onclick = function() {
                    alert('클릭');
                    day.onclick = null;
                }
            }
        });
        </script>
    </head>
    <body>
        <?php echo("$month 월 $year"); ?>
        <?php if($month == 1) : ?>
            <a href="/calendar/test.php?year=<?php echo $year-1 ?>&month=12">이전 달</a>
        <?php else : ?>
            <a href="/calendar/test.php?year=<?php echo $year?>&month=<?php echo $month-1?>">이전 달</a>
        <?php endif ?>

        <?php if($month == 12) : ?>
            <a href="/calendar/test.php?year=<?php echo $year+1 ?>&month=1">다음 달</a>
        <?php else : ?>
            <a href="/calendar/test.php?year=<?php echo $year?>&month=<?php echo $month+1?>">다음 달</a>
        <?php endif ?>

        <table>
            <tr>
                <th style="width:14%;text-align:center;">일</td>
                <th style="width:14%;text-align:center;">월</th>
                <th style="width:14%;text-align:center;">화</th>
                <th style="width:14%;text-align:center;">수</th>
                <th style="width:14%;text-align:center;">목</th>
                <th style="width:14%;text-align:center;">금</th>
                <th style="width:14%;text-align:center;">토</th>
            </tr>
            <tr height = 70;>

        <?php
            include "holiday.php"; // 휴일정보 파일

            $date = 1;
            $offset = 0;
            $ck_row = 0;
            $boxstyle = "boxblack";
            //프레임 사이즈 조절을 위한 체크인자

            while ($date <= $total_day) {
                $mday = $date;

                if ($date == '1') {
        			// 시작 요일 구하기 : date("w", strtotime($year."-".$month."-01"));
                    $offset = date('w', mktime(0, 0, 0, $month, $date, $year)); // 0: 일요일, 6: 토요일
                    SkipOffset($offset, mktime(0, 0, 0, $month, $date, $year));
                }
                if ($offset == 0)
                    $style = "red"; // 일요일 빨간색으로 표기
        		else if($offset == 6)
        			$style = "blue"; // 토요일 빨간색 또는 파란색
                else
                    $style = "black";

                // 법적 공휴일
        		for ($i = 0; $i < count($Holidays); $i++) {
                    if ($Holidays[$i][0] == "$month-$date") {
                        $style = "red";
                        $mday = "$date";
                        $holidata = $Holidays[$i][1];
                        break;
                    }
                }

                if ($date == $today && $year == date('Y') && $month == date('n')) { // 오늘 날짜
                    echo "<td valign=top id='$boxstyle'>";

                } else {
                    echo "<td valign=top id='$boxstyle'>";
		        }
			    CalendarPrint($style,$mday,$holidata);
                echo "</td>\n";

        		// 출력후 값 초기화
                $holidata = "";

                $date++; // 날짜 증가
                $offset++;
                if ($offset == 7) {
                    echo "</tr>";
                    if ($date <= $total_day) {
                        echo "<tr height=70>";
                        $ck_row++;
                    }
                    $offset = 0;
                }

            }// end of while
            if ($offset != 0) {
                SkipOffset((7 - $offset), '', mktime(0, 0, 0, $month + 1, 1, $year));
                echo "</tr>\n";
            }
            echo("</td>\n");

            function ErrorMsg($msg) {
                echo " <script>window.alert('$msg');history.go(-1);</script>";
                exit;
            }

            function CalendarPrint($style,$mday,$holidata=''){
                echo "<font class=".$style.">$mday</font><br/>";
                if(strlen($holidata)>0) echo "<font class=red>$holidata</font><br/>";
            }

            function SkipOffset($no, $sdate = '', $edate = '') {
                for ($i = 1; $i <= $no; $i++) {
                    $ck = $no - $i + 1;
                    if ($sdate)
                        $num = date('j', $sdate - (3600 * 24) * $ck);
                    if ($edate)
                        $num = date('j', $edate + (3600 * 24) * ($i - 1));

                    echo "<td valign=top><font class=gray>$num</font></td>";
                }
            }
        ?>
        </table>
    </body>
</html>
