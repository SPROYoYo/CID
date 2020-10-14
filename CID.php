<?php
class CID {
	private static $array = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');	
	
	private static function place($x) {
		$count = count(self::$array);
		for($i=0;$i<$count;$i++) {
			if(self::$array[$i] === $x) {
				return $i;
				break;
			}
		}
	}
	
	public static function NEW($last_key_used) {
		if($last_key_used === NULL) {
			$CID = self::$array[0];
		}
		else {
			$split = str_split(strrev($last_key_used));
			$new_key = array();
			$plus = true;
			$count_last = 0;
			for($i=0;$i<=count($split)-1;$i++) {
				
				if(!in_array($split[$i], self::$array)) {
					return 'Oops! I think there are invalid characters in the string provided. Can you check, please?';
					break;
				}
				
				$this_char = $last_char = $split[$i];
				
				if(self::place($this_char) === (count(self::$array)-1)) {
					$count_last++;
				}
				
				if($plus) {
					$plus = false;
					if(self::place($this_char) === (count(self::$array)-1)) {
						$this_char = self::$array[0];
						$plus = true;
					}
					else {
						$this_char = self::$array[self::place($this_char)+1];
					}
				}
				$new_key[] = $this_char;
				
				if($i == (count($split)-1) && self::place($last_char) === (count(self::$array)-1) && $count_last === count($split)) {
					$new_key[] = self::$array[0];
				}
				
			}
			$CID = strrev(implode($new_key));
		}
		return $CID;
	}
}
?>
