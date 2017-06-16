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
	echo "<table class='table1' style='text-align:center' border=1>
					<tr>
					<td><strong>Type trame</strong></td>
					<td><strong>N° objet</strong></td>
					<td><strong>Type requête</strong></td>
					<td><strong>Type capteur</strong></td>
					<td><strong>Numéro capteur</strong></td>
					<td><strong>Valeur remontée</strong></td>
					<td><strong>N° trame</strong></td>
					<td><strong>Checksum</strong></td>
					<td><strong>Date</strong></td>
					</tr>";
for($i=0, $size=count($data_tab); $i<$size-1; $i++)
{
	$trame = $data_tab[$i];
	// décodage avec des substring
	$t = substr($trame,0,1);
	$o = substr($trame,1,4);
	$r = substr($trame,5,1);
	$c = substr($trame,6,1);
	$n = substr($trame,7,2);
	$v = substr($trame,9,4);
	$a = substr($trame,13,4);
	$x = substr($trame,17,2);
	$year = substr($trame,19,4);
	$month = substr($trame,23,2);
	$day = substr($trame,25,2);
	$hour = substr($trame,27,2);
	$min = substr($trame,29,2);
	$sec = substr($trame,31,2);
	// décodage avec sscanf
	list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
		sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
	echo "<tr>
	<td>". $t . "</td>
	<td>". $o . "</td>
	<td>". $r . "</td>
	<td>". $c . "</td>
	<td>". $n . "</td>
	<td>". $v . "</td>
	<td>". $a . "</td>
	<td>". $x . "</td>
	<td>". $day . "/" . $month . "/" . $year ." à " . $hour . ":" . $min . ":" . $sec ."</td>";

}



