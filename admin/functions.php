<?php
require "config.php";

/********************************************************************************
** Fungsi untuk mencari nama hari dari tanggal yang di masukkan				   **
********************************************************************************/
function SearchDay($Date){
	//Query Hari
	$qDay = " SELECT DAYNAME('$Date') ";
	$hqDay = mysql_query($qDay);
	list($Day) = mysql_fetch_row($hqDay);
	
	switch($Day){
		case 'Sunday' :
			$Hari = "Minggu";
			break;
		case 'Monday' :
			$Hari = "Senin";
			break;
		case 'Tuesday' :
			$Hari = "Selasa";
			break;
		case 'Wednesday' :
			$Hari = "Rabu";
			break;
		case 'Thursday' :
			$Hari = "Kamis";
			break;
		case 'Friday' :
			$Hari = "Jum'at";
			break;
		case 'Saturday' :
			$Hari = "Sabtu";
			break;
		default :
			$Hari = $Day;
			break;
	}
	return $Hari;
}

/********************************************************************************
** Fungsi untuk Greetings      												   **
********************************************************************************/
function Greetings(){
	$Jam	= date("H");
	switch($Jam){
		case "00" :
		case "01" :
		case "02" :
		case "03" :
		case "04" :
		case "05" :
		case "06" :
		case "07" :
		case "08" :
		case "09" :
		case "10" :
		case "11" :
		case "12" :
			$Salam	= "Pagi";
			break;

		case "13" :
		case "14" :
		case "15" :
			$Salam = "Siang";
			break;

		case "16" :
		case "17" :
		case "18" :
			$Salam = "Sore";
			break;

		case "19" :
		case "20" :
		case "21" :
		case "22" :
		case "23" :
			$Salam = "Malam";
			break;
	}

	return($Salam);
}

/********************************************************************************
** Fungsi untuk merubah format dd/mm/yyyy menjadi TimeStamp 			       **
********************************************************************************/
function ExplodeDate($Tgl){
	$ArrayTanggal = explode("/",$Tgl);
	$Tanggal      = $ArrayTanggal[2]."-".$ArrayTanggal[1]."-".$ArrayTanggal[0]." 000000";

	return($Tanggal);
}
function FlipDate($Tgl){
	$ArrayTanggal = explode("/",$Tgl);
	$Tanggal      = $ArrayTanggal[2]."-".$ArrayTanggal[1]."-".$ArrayTanggal[0];

	return($Tanggal);
}

/********************************************************************************
** Fungsi untuk merubah TimeStamp menjadi format dd/mm/yyyy				       **
********************************************************************************/
function ImplodeDate($Tgl){
	$pos = strpos($Tgl,'/');

	if ($pos === false){
		$Year       = substr($Tgl, 0, 4);
		$Month      = substr($Tgl, 5, 2);
		$Date       = substr($Tgl, 8, 2);

		$Tanggal    = $Date."/".$Month."/".$Year;
	}
	else{
		$Tanggal    = $Tgl;
	}
	if ($Tanggal == '//'){
		$Tanggal = '';
	}

	return($Tanggal);
}

/********************************************************************************
** Fungsi untuk merubah TimeStamp menjadi format dd/mm/yyyy	dan time	       **
********************************************************************************/
function ImplodeDateTime($Tgl){
	$pos = strpos($Tgl,'/');

	if ($pos === false){
		$Year       = substr($Tgl, 0, 4);
		$Month      = substr($Tgl, 5, 2);
		$Date       = substr($Tgl, 8, 2);
		$Jam		= substr($Tgl, 11,8);

		$Tanggal    = $Date."/".$Month."/".$Year." ".$Jam;
	}
	else{
		$Tanggal    = $Tgl;
	}
	if ($Tanggal == '//'){
		$Tanggal = '';
	}

	return($Tanggal);
}

/********************************************************************************
** Fungsi untuk mencari tahun kabisat                    				       **
********************************************************************************/
function IsLeapYear($Thn){
	$LeapY = $Thn % 4;

	if ($LeapY == 0){
		return(true);
	}
	else{
		return(false);
	}
}

/********************************************************************************
** Fungsi untuk mencari hari terakhir                    				       **
********************************************************************************/
function LastDay($Bln,$Thn){
	switch ($Bln){
		case "1":
		case "3":
		case "5":
		case "7":
		case "8" :
		case "10":
		case "12" :
			$Tanggal = 31;
			break;

		case "2" :
			if (IsLeapYear($Thn))
			{
				$Tanggal = 29;
			}
			else
			{
				$Tanggal = 28;
			}
			break;

		case "4" :
		case "6" :
		case "9" :
		case "11" :
			$Tanggal = 30;
			break;
	}

	return($Tanggal);
}

/********************************************************************************
** Fungsi untuk mendapatkan tanggal terakhir dalam satu bulan      		       **
********************************************************************************/
function LastDays($Month,$Year){
	static $lasts   = array( FALSE,31,28,31,30,31,30,31,31,30,31,30,31 );
	if ( $Month <01 || $Month >12 ){
		return( FALSE );
	}
	if ( $Month == 02 ){
		if (checkdate (2,29,$Year)){
			return (29);
		}
		return(28);
	}
	return($lasts[$Month]);
}

/********************************************************************************
** Fungsi untuk merubah format dd/mm/yyyy menjadi TimeStamp 			       **
********************************************************************************/
function ReportDate($Tgl){
	$Year       = substr($Tgl, 0, 4);
	$Month      = substr($Tgl, 5, 2);
	$Date       = substr($Tgl, 8, 2);

	switch($Month){
		case "01" :
			$Month = "Januari";
			break;

		case "02" :
			$Month = "Febuari";
			break;

		case "03" :
			$Month = "Maret";
			break;

		case "04" :
			$Month = "April";
			break;

		case "05" :
			$Month = "Mei";
			break;

		case "06" :
			$Month = "Juni";
			break;

		case "07" :
			$Month = "Juli";
			break;

		case "08" :
			$Month = "Agustus";
			break;

		case "09" :
			$Month = "September";
			break;

		case "10" :
			$Month = "Oktober";
			break;

		case "11" :
			$Month = "November";
			break;

		case "12" :
			$Month = "Desember";
			break;
	}

	$Tanggal    = $Date." ".$Month." ".$Year;

	return($Tanggal);

}

/********************************************************************************
** Fungsi untuk merubah format dd/mm/yyyy menjadi TimeStamp dan waktu	       **
********************************************************************************/
function ReportDateTime($Tgl){
	$Year       = substr($Tgl, 0, 4);
	$Month      = substr($Tgl, 5, 2);
	$Date       = substr($Tgl, 8, 2);
	$Hour		= substr($Tgl, 11, 2);
	$Minute		= substr($Tgl, 14, 2);
	$Second		= substr($Tgl, 17, 2);

	switch($Month){
		case "01" :
			$Month = "Januari";
			break;

		case "02" :
			$Month = "Febuari";
			break;

		case "03" :
			$Month = "Maret";
			break;

		case "04" :
			$Month = "April";
			break;

		case "05" :
			$Month = "Mei";
			break;

		case "06" :
			$Month = "Juni";
			break;

		case "07" :
			$Month = "Juli";
			break;

		case "08" :
			$Month = "Agustus";
			break;

		case "09" :
			$Month = "September";
			break;

		case "10" :
			$Month = "Oktober";
			break;

		case "11" :
			$Month = "November";
			break;

		case "12" :
			$Month = "Desember";
			break;
	}

	$Tanggal    = $Date." ".$Month." ".$Year."  ".$Hour.":".$Minute.":".$Second;

	return($Tanggal);

}

/********************************************************************************
** Fungsi untuk merubah Date to UNIX type			   					       **
********************************************************************************/
function ConvertDateTime($Before){
	$datetime	   = explode(" ",$Before);

	$date_elements = explode("-",$datetime[0]);
	$time_elements = explode(":",$datetime[1]);
	$After = mktime($time_elements[0],$time_elements[1],$time_elements[2],$date_elements[1],$date_elements[2],$date_elements[0]);
	return($After);
}

/********************************************************************************
** Fungsi untuk mengambil Bulan - Tahun				   					       **
********************************************************************************/
function DecodeDate($Before){
	$datetime	   = explode(" ",$Before);
	$date_elements = explode("-",$datetime[0]);
	return($date_elements);
}

/********************************************************************************
** Fungsi untuk Menghitung jumlah hari										   **
********************************************************************************/
function datediff($interval,$datefrom,$dateto,$using_timestamps= false){
	/*
	$interval can be:
	    yyyy - Number of full years
	    q - Number of full quarters
	    m - Number of full months
	    y - Difference between day numbers
	      (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
	    d - Number of full days
	    w - Number of full weekdays
	    ww - Number of full weeks
	    h - Number of full hours
	    n - Number of full minutes
	    s - Number of full seconds (default)
	  */
	if (!$using_timestamps){
		$datefrom = strtotime($datefrom,0);
		$dateto = strtotime($dateto, 0);
	}
	$difference = $dateto - $datefrom; // Difference in seconds

	switch($interval){
		case 'yyyy': // Number of full years
		$years_difference = floor($difference / 31536000);

		if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto)
		{
			$years_difference--;
		}

		if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom)
		{
			$years_difference++;
		}

		$datediff = $years_difference;
		break;

		case "q": // Number of full quarters
		$quarters_difference = floor($difference / 8035200);
		while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto)
		{
			$months_difference++;
		}

		$quarters_difference--;
		$datediff = $quarters_difference;
		break;

		case "m": // Number of full months
		$months_difference = floor($difference / 2678400);
		while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto)
		{
			$months_difference++;
		}

		$months_difference--;
		$datediff = $months_difference;
		break;

		case 'y': // Difference between day numbers
		$datediff = date("z", $dateto) - date("z", $datefrom);
		break;

		case "d": // Number of full days
		$datediff = floor($difference / 86400);
		break;

		case "w": // Number of full weekdays
		$days_difference = floor($difference / 86400);
		$weeks_difference = floor($days_difference / 7); // Complete weeks
		$first_day = date("w", $datefrom);
		$days_remainder = floor($days_difference % 7);
		$odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
		if ($odd_days > 7){ 
			// Sunday
			$days_remainder--;
		}

		if ($odd_days > 6){ 
			// Saturday
			$days_remainder--;
		}

		$datediff = ($weeks_difference * 5) + $days_remainder;
		break;

		case "ww": // Number of full weeks
		$datediff = floor($difference / 604800);
		break;

		case "h": // Number of full hours
		$datediff = floor($difference / 3600);
		break;

		case "n": // Number of full minutes
		$datediff = floor($difference / 60);
		break;

		default: // Number of full seconds (default)
		$datediff = $difference;
		break;
	}
	return $datediff;
}

/********************************************************************************
** Fungsi untuk mengecek nilai NULL											   **
********************************************************************************/
function CekNull($DateValue){
	if (($DateValue <> '0000-00-00') AND (isset($DateValue)))
	{
		return true;
	}
	else
	{
		return false;
	}
}

/********************************************************************************
** Fungsi untuk menambah Hari     				                           **
********************************************************************************/
function DateAdd($v,$d=null , $f="d/m/Y"){
	$d=($d?$d:date("Y-m-d"));
	return date($f,strtotime($v." days",strtotime($d)));
}

/********************************************************************************
** Fungsi untuk merubah format waktu dari HH:MM:SS ke HH:SS
********************************************************************************/
function CutTime($Time, $Format="hm"){
	$Hour	= substr($Time, 0, 2);
	$Minute	= substr($Time, 3, 2);
	$Second	= substr($Time, 6, 2);
	
	switch($Format){
		case 'h' :
				$rTime = $Hour;
				break;
		case 'm' :
				$rTime = $Minute;
				break;
		case 's' :
				$rTime = $Second;
				break;
		case 'hm' :
				$rTime = $Hour.":".$Minute;
				break;
		case 'ms' :
				$rTime = $Minute.":".$Second;
				break;
		default :
				$rTime = $Time;
				break;
	}
	
	return $rTime;
}

/****************************************************************
***** Fungsi untuk mencari nama hari dari tanggal yang dimasukkan
*****************************************************************/
function DateToDay($Date){	
	//Query Hari
	$qDay = " SELECT DAYNAME('$Date')"; 
	$hqDay = mysql_query($qDay);
	list($Hari) = mysql_fetch_row($hqDay);
	
	return $Hari;
}

/****************************************************************
***** Fungsi untuk Memotong String ******************************
*****************************************************************/
function CutString($Strings, $Length){
	$str 	= explode(" ", $Strings);
	$str_r 	= "";
	for($i=0; $i<$Length; $i++){
		$str_r .= $str[$i]." ";
	}
	
	return $str_r;
}

/****************************************************************
***** Fungsi untuk Memotong Time ******************************
*****************************************************************/
function ExplodeTime($Strings){
	$str 	= explode(":", $Strings);
	$str_r 	= "";
	for($i=0; $i<2; $i++){
		$str_r .= $str[$i];
		if($i<1) $str_r .= ":";
	}
	
	return $str_r;
}

/****************************************************************
***** Fungsi untuk Menampilkan Highlight String Pencarian *******
*****************************************************************/
function HighLight($String, $Keyword){
	if($Keyword == null){
		return $String;
	}
	else{
		$chString	= str_split($String);
		$lenKey		= strlen($Keyword);
		$strResult	= $chString;
		
		for($i=0; $i<count($chString); $i++)
		{
			$strKey = "";
			for($a=$i; $a<($i+$lenKey); $a++)
			{
				$strKey .= $chString[$a];
			}
			
			if(strtolower($strKey) == strtolower($Keyword))
			{
				for($b=$i; $b<($i+$lenKey); $b++)
				{
					$strResult[$b] = "<b>".$chString[$b]."</b>";
				}
			}
		}
		
		return implode("", $strResult);
	}
}

/****************************************************************
******** Fungsi untuk Menyaring kata dalam String  **************
*****************************************************************/
function FilterString($String){
	//Yang di filter adalah <img>, <blockquote>
}
?>
