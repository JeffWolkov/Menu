<?
$month =  date("n");
$year = date("Y");
$day = date("j");
$hour = date("G");
if($hour - 7 >= 16){
 $day++;
}
if($day < 10){
 $day = "0" . $day;
}
$fileName = $month . $day . $year . ".pdf";
$path = './pdf/';

  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $fileName . '"');
  readfile($path.$fileName);

?>