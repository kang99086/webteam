<?php
include 'lun2sol_test.php';
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

$Holidays = Array();
$Holidays[] = array(0 => '1-1', 1 => '신정');
$Holidays[] = array(0 => '3-1', 1 => '삼일절');
$Holidays[] = array(0 => '5-5', 1 => '어린이날');
$Holidays[] = array(0 => '6-6', 1 => '현충일');
$Holidays[] = array(0 => '7-17', 1 => '제헌절');
$Holidays[] = array(0 => '8-15', 1 => '광복절');
$Holidays[] = array(0 => '10-3', 1 => '개천절');
$Holidays[] = array(0 => '10-9', 1 => '한글날');
$Holidays[] = array(0 => '12-25', 1 => '성탄절');



$tmp = LunarToSola($year."0101")[time];  //설날
$Holidays[] = array(0 => date("n-j", ($tmp - (3600 * 24))), 1 => '');
$Holidays[] = array(0 => date("n-j", $tmp), 1 => '설날');
$Holidays[] = array(0 => date("n-j", ($tmp + (3600 * 24))), 1 => '');

$tmp = LunarToSola($year."0408")[time];  //석가탄신일
$Holidays[] = array(0 => date("n-j", $tmp), 1 => '석탄일');

$tmp = LunarToSola($year."0815")[time]; //추석
$Holidays[] = array(0 => date("n-j", ($tmp - (3600 * 24))), 1 => '');
$Holidays[] = array(0 => date("n-j", $tmp), 1 => '추석');
$Holidays[] = array(0 => date("n-j", ($tmp + (3600 * 24))), 1 => '');

// 어린이날 대체공휴일 검사 : 어린이날은 토요일, 일요일인 경우 그 다음 평일을 대체공유일로 지정
$childdayChk = isWeekend($year."-05-05");
if($childdayChk == 0) $Holidays[] = array(0 => date("n-j", strtotime($year."-05-06")), 1 => '대체공휴일');
if($childdayChk == 6) $Holidays[] = array(0 => date("n-j", strtotime($year."-05-07")), 1 => '대체공휴일');

// 설날 대체공휴일 검사
if(isWeekend(LunarToSola($year."0101")) == 0)
	$Holidays[] = array(0 => date("n-j", strtotime(LunarToSola($year."0103"))), 1 => '');
if(isWeekend(LunarToSola($year."0101")) == 1)
	$Holidays[] = array(0 => date("n-j", strtotime(LunarToSola($year."0103"))), 1 => '');
if(isWeekend(LunarToSola($year."0102")) == 0)
	$Holidays[] = array(0 => date("n-j", strtotime(LunarToSola($year."0103"))), 1 => '');


// 추석 대체공휴일 검사
if(isWeekend(LunarToSola($year."0814")) == 0)
	$Holidays[] = array(0 => date("n-j", strtotime(LunarToSola($year."0817"))), 1 => '');
if(isWeekend(LunarToSola($year."0815")) == 0)
	$Holidays[] = array(0 => date("n-j", strtotime(LunarToSola($year."0817"))), 1 => '');
if(isWeekend(LunarToSola($year."0816")) ==0)
	$Holidays[] = array(0 => date("n-j", strtotime(LunarToSola($year."0817"))), 1 => '');

/****************** 휴일 정의 ************************/

function isWeekend($date){
	// 앙력 날짜의 요일을 리턴
	// 일요일 0 토요일 6
	return date("w", strtotime($date));
}
?>
