<?php
session_start();
include_once "config.php";
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
    echo "No connection database!";
    exit();
    }
function fetchAll($sql){
    global $conn;
    $arr = [];
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        echo 'Ошибка: '.mysqli_errno($conn).': '.mysqli_error($conn);
        exit();
    }
    if (mysqli_num_rows($res) == 0) {
    
        return false;
    } else {
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $arr[] = $row;
        }
        
        return $arr;
    }
}
function fetchOne($sql){
    global $conn;
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        echo 'Ошибка: '.mysqli_errno($conn).': '.mysqli_error($conn);
        exit();
    }
    if (mysqli_num_rows($res) == 0) {
    
        return false;
    } else {
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        
        return $row;
    }
}
function InsertRow($sql){
	global $conn;
	$res = mysqli_query($conn, $sql);
	if (!$res) {
		echo 'Ошибка: '.mysqli_errno($conn).': '.mysqli_error($conn);
	exit();
	}
	$id = mysqli_insert_id($conn);
	return $id;
}
function UpdateRow($sql){
	global $conn;
	$res = mysqli_query($conn, $sql);
	if (!$res) {
		echo 'Ошибка: '.mysqli_errno($conn).': '.mysqli_error($conn);
	exit();
	}
	$count = mysqli_affected_rows($conn);
	return $count;
}

function utf8_str_split($str) { 
  // place each character of the string into and array 
  $split=1; 
  $array = array(); 
  for ( $i=0; $i < strlen( $str ); ){ 
    $value = ord($str[$i]); 
    if($value > 127){ 
      if($value >= 192 && $value <= 223) 
        $split=2; 
      elseif($value >= 224 && $value <= 239) 
        $split=3; 
      elseif($value >= 240 && $value <= 247) 
        $split=4; 
    }else{ 
      $split=1; 
    } 
      $key = NULL; 
    for ( $j = 0; $j < $split; $j++, $i++ ) { 
      $key .= $str[$i]; 
    } 
    array_push( $array, $key ); 
  } 
  return $array; 
} 
/** 
 * Функция вырезки
 * @param <string> $str 
 * @return <string> 
 */ 
function ClearStr($str){ 
        $sru = 'ёйцукенгшщзхъфывапролджэячсмитьбю'; 
        $s1 = array_merge(utf8_str_split($sru), utf8_str_split(strtoupper($sru)), range('A', 'Z'), range('a','z'), range('0', '9'), array('&',' ','#',';','%','?',':','(',')','-','_','=','+','[',']',',','.','/','\\')); 
        $codes = array(); 
        for ($i=0; $i<count($s1); $i++){ 
                $codes[] = ord($s1[$i]); 
        } 
        $str_s = utf8_str_split($str); 
        for ($i=0; $i<count($str_s); $i++){ 
                if (!in_array(ord($str_s[$i]), $codes)){ 
                        $str = str_replace($str_s[$i], '', $str); 
                } 
        } 
        return $str; 
}