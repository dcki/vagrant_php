<?php

//namespace Util;

class PregException extends Exception {

   public function __construct($method, $pattern) {

      $defined_constants = get_defined_constants(true);
      $defined_constants = array_flip($defined_constants['pcre']);
      $preg_error = $defined_constants[preg_last_error()];

      $msg = __CLASS__." in function $method $preg_error $pattern";

      error_log($msg);
      parent::__construct($msg);
   }
}

function match($pattern, $str) {

   $pattern = '/'.preg_replace('/\//', '\\/', $pattern).'/';
   $value = preg_match($pattern, $str);

   if ($value === false) {

      //throw new \Util\PregException();
      throw new PregException(__METHOD__, $pattern);
   }

   return $value;
}
