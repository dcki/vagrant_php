<?php

function match($pattern, $str, $method) {

   $pattern = '/'.preg_replace('/\//', '\\/', $pattern).'/';
   $value = preg_match($pattern, $str);

   if ($value === false) {

      throw new \Lib\PregException($method, $pattern);
   }

   return $value;
}
