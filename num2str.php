<?php

function num2str($value){
	$value = sprintf('%01.2f', $value);
	$x1 = ['', 'viens', 'divi', 'trīs', 'četri', 'pieci', 'seši', 'septiņi', 'astoņi', 'deviņi'];
	$x2 = ['', 'vien', 'div', 'trīs', 'četr', 'piec', 'seš', 'septiņ', 'astoņ', 'deviņ'];
	list($num, $dec) = explode('.', $value);
	$out = '';
	$tmp = '';
	$numLen = strlen($num);
	while($numLen != 0){
		$current = substr($num, strlen($num) - $numLen, 1);
		if($numLen == 6){
			$out .= $x1[ $current ];
			$out .= $current > 1 ? ' simti ' : ' simts ';
		}
		if($numLen == 5){
			if($current > 0) $out .= $x2[ $current ] . 'desmit ';
		}
		if($numLen == 4){
			if($current > 0) $out .= $x1[ $current ];
			$out .= $current == 1 ? ' tūkstotis ' : ' tūkstoši ';
		}
		if($numLen == 3){
			if($current > 1) $out .= $x1[ $current ];
			if($current > 0) $out .= $current > 1 ? ' simti ' : ' simts ';
		}
		if($numLen == 2){
			if($current > 0){
				if($current == 1) $tmp = $current;
				else $out .= $x2[ $current ] . 'desmit ';
			}
		}
		if($numLen == 1){
			if($tmp && $current > 0) $out .= $x2[ $current ] . 'padsmit ';
			elseif($tmp && $current == 0) $out .= 'desmit ';
			else $out .= $x1[ $current ] . ' ';
		}
		$numLen--;
	}
	if($num == 0) $out .= '0';
	if($value == 0) $out .= 'nulle ';
	$out .= 'eiro un ' . $dec . ' centi';

	return $out;
}