<?php

function match($pattern, $str, $method, $line) {

   $regex = new Lib\Regex($pattern, $method.' > '.__METHOD__, $line.' > '.__LINE__);

   $value = preg_match($regex, $str);

   if ($value === false) {

      throw new Lib\PregException($pattern, $method.' > '.__METHOD__, $line.' > '.__LINE__);
   }

   return $value;
}
