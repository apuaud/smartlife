<?php
$ch = curl_init();
curl_setopt(
	$ch,
	CURLOPT_URL,
	"http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=9999");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

$data_tab = str_split($data,33);

$trame = $data_tab[1];
$t = substr($trame,0,1);
$o = substr($trame,1,4);
$r = substr($trame,2,1);
$c = substr($trame,3,1);
$n = substr($trame,4,2);
$v = substr($trame,5,4);
$a = substr($trame,6,4);
$x = substr($trame,7,2);
$year = substr($trame,8,4);
$month = substr($trame,9,2);
$day = substr($trame,10,2);
$hour = substr($trame,11,2);
$min = substr($trame,12,2);
$sec = substr($trame,13,2);
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");

?>