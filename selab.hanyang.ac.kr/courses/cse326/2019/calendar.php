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

include 'mycalendar/dbconnect.php'; // DB 연결

$thisdate = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
$nextdate = date("Y-m-d", mktime(0, 0, 0, $month+1, 1, $year));
$user_id = "123";

$sql = "SELECT * FROM tbl_events where (start between '$thisdate' and '$nextdate') and user_id=$user_id";
$result = mysqli_query($dbconn, $sql);
while ($R = mysqli_fetch_array($result)) {
    $schedule[] = array(0 => date("n-j", strtotime($R['start'])),1 => $R['title'],2 => $R['id']);
}

$sql = "SELECT * FROM attendance_check where student_id=$user_id";
$result = mysqli_query($dbconn, $sql);
while ($R = mysqli_fetch_array($result)) {
    $attend[] = array(0 => date("n-j", strtotime($R['attendance_date'])), 1 => $R['student_id']);
}
?>

<div class="calendar">
<table class="table table-bordered table-responsive">
  <tr align="center" >
    <td>
        <a href=<?php echo '?year='.$pre_year.'&month='.$month.'&day=1'; ?>>◀◀</a>
    </td>
    <td>
        <a href=<?php echo '?year='.$prevyear.'&month='.$prevmonth . '&day=1'; ?>>◀</a>
    </td>
    <td height="50" bgcolor="#FFFFFF" colspan="3">
        <a href=<?php echo 'courses/cse326/2019/?year=' . $thisyear . '&month=' . $thismonth . '&day=1'; ?>>
        <?php echo "&nbsp;&nbsp;" . $year . '년 ' . $month . '월 ' . "&nbsp;&nbsp;"; ?></a>
    </td>
    <td>
        <a href=<?php echo '?year='.$nextyear.'&month='.$nextmonth.'&day=1'; ?>>▶</a>
    </td>
    <td>
        <a href=<?php echo '?year='.$next_year.'&month='.$month.'&day=1'; ?>>▶▶</a>
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
  <tr height=<?=$cellh?>>

<?php
    $date = 1;
    $offset = 0;
    $ck_row = 0;
    //프레임 사이즈 조절을 위한 체크인자

    $Holidays = Array();
    $Holidays[] = array(0 => '1-1');
    $Holidays[] = array(0 => '3-1');
    $Holidays[] = array(0 => '5-5');
    $Holidays[] = array(0 => '6-6');
    $Holidays[] = array(0 => '7-17');
    $Holidays[] = array(0 => '8-15');
    $Holidays[] = array(0 => '10-3');
    $Holidays[] = array(0 => '10-9');
    $Holidays[] = array(0 => '12-25');
    //공휴일 데이터

    while ($date <= $last_day) {
        $mday = $date;
        $class = "";

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
                break;
            }
        }

        //event
        $dType1 = array();
        for ($i = 0; $i < count($schedule); $i++) {
            if ($schedule[$i][0] == "$month-$date") {
                $dType1[] = array(0=>$schedule[$i][1],1=>$schedule[$i][2]);
            }
        }
        for ($i = 0; $i < count($attend); $i++) {
            if ($attend[$i][0] == "$month-$date") {
                $class = "attend";
            }
        }

        if ($date == $today && $year == $thisyear && $month == $thismonth) { ?>
            <td class='active <?=$class?>' valign=top id=<?php echo "$year-$month-$mday"?>>
        <?php } else {?>
            <td class=<?=$class?>valign=top id=<?php echo "$year-$month-$mday"?>>
		<?php }
			CalendarPrint($style,$mday,$dType1);
			echo "</td>\n";
        ?>
        <script>
            var tdGroup = []; // td의 id값을 저장
            var tabnum = <?= $last_day ?>;
            $(document).ready(function() {
                var a = document.getElementById("<?php echo "$year\-$month\-$mday"?>");
                tdGroup[<?php echo $mday-1 ?>] = document.getElementById("<?php echo "$year\-$month\-$mday"?>");
            });
        </script>
        <?php

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

	function CalendarPrint($style,$mday,$dType1=''){
		echo "<font class=".$style.">$mday</font><br/>";
        if(count($dType1)>0) { // 배열 출력
			for ($i = 0; $i < count($dType1); $i++) {
				echo "<font class=event_num uid=".$dType1[$i][1].">".$dType1[$i][0]."</font><br/>";
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
        clickedDate1.classList.add('active');
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
    			url : 'mycalendar/add-event.php',
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
$(".event_num").click(function(e){
    var val=$(this).attr("uid");
    var deleteMsg = confirm("정말 삭제하시겠습니까?");
    if(deleteMsg){
        $.ajax({
            url : 'mycalendar/delete-event.php',
            type : 'POST',
            data :{id:val},
            success: function (data) {
                if(data == 1){
                    location.reload();
                } else if (data == 0) {
                    alert('삭제에 실패했습니다.');
                }
            }
        });
    }
});

function attend(){
    var user_id = <?=$user_id?>;
    $.ajax({
        url : 'mycalendar/attendance.php',
        type : 'POST',
        data : {id:user_id},
        success: function(data) {
            if(data == 1){
                alert("출석 완료.");
                location.reload();
            } else {
                alert("에러!");
            }

        },
        error: function(jqXHR, textStatus, errorThrown){
            alert("arjax error : " + textStatus + "\n" + errorThrown);
        }
    })
}

</script>
</body>
</html>

<!-- 로그인을 하면 로그인의 db를 가져온다. id값을 가져와서 user_id의 변수에 저장한다.
    user_id변수는 $ajax에서 data를 보낼때 user_id값도 함께 보낸다.
    보여주기 위해 sql에서 가져오는 데이터에서도 user_id변수값과 tbl_events에 있는 user_id속성의 값과 일치하는지
    확인한 뒤 데이터를 가져온다.-->
