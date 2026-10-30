<?php

$matriz[0][0] = 1;
$matriz[0][1] = 0;
$matriz[0][2] = 0;
$matriz[0][3] = 0;
$matriz[0][4] = 1;
$matriz[0][5] = 1;

$matriz[1][0] = 2;
$matriz[1][1] = 2;
$matriz[1][2] = 0;
$matriz[1][3] = 0;
$matriz[1][4] = 0;
$matriz[1][5] = 0;

$matriz[2][0] = 3;
$matriz[2][1] = 0;
$matriz[2][2] = 3;
$matriz[2][3] = 1;
$matriz[2][4] = 0;
$matriz[2][5] = 0;

$matriz[3][0] = 4;
$matriz[3][1] = 0;
$matriz[3][2] = 0;
$matriz[3][3] = 4;
$matriz[3][4] = 0;
$matriz[3][5] = 0;

$matriz[4][0] = 5;
$matriz[4][1] = 0;
$matriz[4][2] = 0;
$matriz[4][3] = 1;
$matriz[4][4] = 5;
$matriz[4][5] = 0;

$matriz[5][0] = 6;
$matriz[5][1] = 0;
$matriz[5][2] = 0;
$matriz[5][3] = 1;
$matriz[5][4] = 0;
$matriz[5][5] = 6;


// echo count($matriz)."<br>";

for ($m=0; $m < count($matriz); $m++) { 
	# code...
	for ($v=$m; $v < count($matriz); $v++) { 
		for ($h=0; $h < count($matriz); $h++) { 
			if ($v==$h) {
				# code...
				echo $matriz[$v][$h]."<br>";
			}	
		}
	}
}




?>