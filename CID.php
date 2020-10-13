<?php
class CID {
  private static $array = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','-','_');
  
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
    $split = str_split(strrev($last_key_used));
    $new_key = array();
    $plus = true;
    for($i=0;$i<=count($split)-1;$i++) {
      $this_char = $split[$i];
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
    }
    return strrev(implode($new_key));
  }
}
?>
