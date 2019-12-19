<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
if (!isset($cellh))
    $cellh = 70; // date cell height
if (!isset($tablew))
    $tablew = 650; //table width
$cellw = 130;
//---- 오늘 날짜
$thisyear = date('Y'); // 4자리 연도
$thismonth = date('n'); // 0을 포함하지 않는 월
$today = date('j'); // 0을 포함하지 않는 일

// $year, $month 값이 없으면 현재 날짜
$year = isset($_GET['year']) ? $_GET['year'] : $thisyear;
$month = isset($_GET['month']) ? $_GET['month'] : $thismonth;
$day = isset($_GET['day']) ? $_GET['day'] : $today;

$last_day = date('t', mktime(0, 0, 0, $month, 1, $year)); // 해당월의 총일수 구하기

$prevmonth = $month - 1;
$nextmonth = $month + 1;
$prevyear = $nextyear = $year;
if ($month == 1) {
    $prevmonth = 12;
    $prevyear = $year - 1;
} elseif ($month == 12) {
    $nextmonth = 1;
    $nextyear = $year + 1;
}
$pre_year = $year - 1;
$next_year = $year + 1;


include_once 'holiday.php';  //양력.음력 변환 인클루드
include 'dbconnect.php'; // DB 연결

$thisdate = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
$nextdate = date("Y-m-d", mktime(0, 0, 0, $month+1, 1, $year));
$user_id = "123";

$sql = "SELECT * FROM tbl_events where (start between '$thisdate' and '$nextdate') and user_id=$user_id ";
$result = mysqli_query($dbconn, $sql);
while ($R = mysqli_fetch_array($result)) {
    $schedule[] = array(0 => date("n-j", strtotime($R['start'])), 1 =>date("n-j", strtotime($R['end'])) ,2 => $R['title'],3 => $R['id']);
}


?>

<!DOCTYPE html>
<html lang="ko">
<head>
<title>PHP Calendar</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style>
	body{margin-top: 20px; }
	.all {border-width: 1;border-color: #cccccc;border-style: solid;}
	font {font-family: 굴림체;font-size: 12px;color: #505050;	}
	font.title {font-family: 굴림체;font-size: 12px;font-weight: bold;color: #2579CF;	}
	font.week {font-family: 돋움,돋움체;color: #ffffff;font-size: 8pt;	letter-spacing: -1;}
	font.holy {font-family: tahoma;font-size: 22px;color: #FF6C21;}
    font.blue {font-family: tahoma;font-size: 22px;color: #0000FF;}
    font.black {font-family: tahoma;font-size: 22px;color: #000000;}
	font.lunar {font-family: tahoma;font-size: 14px;color: #0000bb;}
	font.gangi {font-family: tahoma;font-size: 14px;color: #424242;}
	font.sblue {font-family: tahoma;font-size: 14px;color: blue;	}
	font.green {font-family: tahoma;font-size: 14px;color: green;	}
	font.red {font-family: tahoma;font-size: 14px;color: red;}
	font.num {font-family: tahoma;font-size: 14px;background-color: #DBA901;}
	font.gray {font-family: tahoma;font-size: 14px;color: #8e8989;}
	.main {float: left;width: 70%;border: 5px solid #ccc;background-color: #fff;m }
	.right {float: right;width: 20%;background-color: #fff;border: 5px solid #eee;}
    . {border : 1px solid blue;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div style=float:right;>
        <input type='text' name='events' placeholder='Input the Event.' id="event">
        <button type="submit" name="event" onclick="add_event()">Submit</button>
    </div>
<table class="table table-bordered table-responsive">
  <tr align="center" >
    <td>
        <a href=<?php echo 'calendar.php?year='.$pre_year.'&month='.$month . '&day=1'; ?>>◀◀</a>
    </td>
    <td>
        <a href=<?php echo 'calendar.php?year='.$prevyear.'&month='.$prevmonth . '&day=1'; ?>>◀</a>
    </td>
    <td height="50" bgcolor="#FFFFFF" colspan="3">
        <a href=<?php echo 'calendar.php?year=' . $thisyear . '&month=' . $thismonth . '&day=1'; ?>>
        <?php echo "&nbsp;&nbsp;" . $year . '년 ' . $month . '월 ' . "&nbsp;&nbsp;"; ?></a>
    </td>
    <td>
        <a href=<?php echo 'calendar.php?year='.$nextyear.'&month='.$nextmonth.'&day=1'; ?>>▶</a>
    </td>
    <td>
        <a href=<?php echo 'calendar.php?year='.$next_year.'&month='.$month.'&day=1'; ?>>▶▶</a>
    </td>
  </tr>
  <tr class="info">
    <th style="width:14%;text-align:center;">일</th>
    <th style="width:14%;text-align:center;">월</th>
    <th style="width:14%;text-align:center;">화</th>
    <th style="width:14%;text-align:center;">수</th>
    <th style="width:14%;text-align:center;">목</th>
    <th style="width:14%;text-align:center;">금</th>
    <th style="width:14%;text-align:center;">토</th>
  </tr>
  <tr height=<?php echo $cellh;?>>

<?php
    $date = 1;
    $offset = 0;
    $ck_row = 0;
    //프레임 사이즈 조절을 위한 체크인자

    while ($date <= $last_day) {
        $mday = $date;

        if ($date == '1') {
			// 시작 요일 구하기 : date("w", strtotime($year."-".$month."-01"));
            $offset = date('w', mktime(0, 0, 0, $month, $date, $year)); // 0: 일요일, 6: 토요일
            SkipOffset($offset, mktime(0, 0, 0, $month, $date, $year));
        }
        if ($offset == 0)
            $style = "holy"; // 일요일 빨간색으로 표기
		else if($offset == 6)
			$style = "blue"; // 토요일 빨간색 또는 파란색
        else
            $style = "black";

        // 법적 공휴일
		for ($i = 0; $i < count($Holidays); $i++) {
            if ($Holidays[$i][0] == "$month-$date") {
                $style = "holy";
                $mday = "$date";
                $holidata = $Holidays[$i][1];
                break;
            }
        }

        //event
        $dType1 = array();
        for ($i = 0; $i < count($schedule); $i++) {
            if ($schedule[$i][0] == "$month-$date") {
                $dType1[] = array(0=>$schedule[$i][2],1=>$schedule[$i][3]);
            }
        }

        if ($date == $today && $year == $thisyear && $month == $thismonth) { ?>
            <td class='active' valign=top id=<?php echo "$year-$month-$mday"?>>
        <?php } else {?>
            <td valign=top id=<?php echo "$year-$month-$mday"?>>
		<?php }
			CalendarPrint($style,$mday,$holidata,$dType1);
			echo "</td>\n";
        ?>
        <script>
            var tdGroup = []; // td의 id값을 저장
            var tabnum = <?php echo $last_day ?>;
            $(document).ready(function() {
                var a = document.getElementById("<?php echo "$year\-$month\-$mday"?>");
                tdGroup[<?php echo $mday-1 ?>] = document.getElementById("<?php echo "$year\-$month\-$mday"?>");
            });
        </script>
        <?php
		// 출력후 값 초기화
        $holidata = "";
		$memorialdata ="";

        $date++; // 날짜 증가
        $offset++;
        if ($offset == 7) {
            echo "</tr>";
            if ($date <= $last_day) {
                echo "<tr height=$cellh>";
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

	function CalendarPrint($style,$mday,$holidata='',$dType1=''){
		echo "<font class=".$style.">$mday</font><br/>";
		if(strlen($holidata)>0) echo "<font class=red>$holidata</font><br/>";
        if(count($dType1)>0) { // 배열 출력
			for ($i = 0; $i < count($dType1); $i++) {
				echo "<font class=num uid=".$dType1[$i][1].">".$dType1[$i][0]."</font><br/>";
			}
		}
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
    </tr>
</table>
</div>
<script>
$(document).ready(function() {
    for(let i=0; i<tabnum; i++){ //click하면 changeToday로 넘어간다.
        tdGroup[i].addEventListener('click', changeToday);
    }
    function changeToday(e){
        for(let i = 0; i < tabnum; i++){
            if(tdGroup[i].classList.contains('active')){ //tdGroup에 active한 classList가 있다면 remove한다.
                tdGroup[i].classList.remove('active');
            }
        }
        clickedDate1 = e.currentTarget;
        clickedDate1.className = 'active';
    }
});
function add_event(){
    var title = document.getElementById("event").value;
    var user_id = <?php echo $user_id ?>;
    for(let i = 0; i < tabnum; i++){
        if(tdGroup[i].classList.contains('active')){ //tdGroup에 active한 classList가 있다면 remove한다.
            var val = tdGroup[i].getAttribute('id');
            var date = val.split('-');
    		var year = date[0];
    		var month = date[1];
    		var day = date[2];
            var check = title.replace(/\s/gi,"");
            $.ajax({
    			url : 'add-event.php',
    			type : 'POST',
    			data :{year:date[0],month:date[1],day:date[2],title:title,user_id:user_id},
    			success : function(data){
    				if(!check || data == 0){
    					alert('등록에 실패했습니다.');
    				} else {
                        alert('등록되었습니다.')
                        location.reload();
    				}
    			},
    			error: function(jqXHR, textStatus, errorThrown){
    				alert("arjax error : " + textStatus + "\n" + errorThrown);
    			}
    		});
        }
    }
}
// event 삭제
$(".num").click(function(e){
    var val=$(this).attr("uid");
    var deleteMsg = confirm("정말 삭제하시겠습니까?");
    if(deleteMsg){
        $.ajax({
            url : 'delete-event.php',
            type : 'POST',
            data :{id:val},
            success: function (data) {
                if(data == 1){
                    location.reload();
                } else if(data == 0) {
                    alert('삭제에 실패했습니다.');
                }
            }
        });
    }
});
</script>
</body>
</html>

<!-- 로그인을 하면 로그인의 db를 가져온다. id값을 가져와서 user_id의 변수에 저장한다.
    user_id변수는 $ajax에서 data를 보낼때 user_id값도 함께 보낸다.
    보여주기 위해 sql에서 가져오는 데이터에서도 user_id변수값과 tbl_events에 있는 user_id속성의 값과 일치하는지
    확인한 뒤 데이터를 가져온다.-->
