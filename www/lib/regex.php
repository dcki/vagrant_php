<?php

namespace Lib;

class Regex {

   private $regex;
   private $pattern;

   public function __construct($pattern, $method, $line) {
   // Implement http://php.net/manual/en/language.oop5.typehinting.php#83442
   //public function __construct(string $pattern, string $method, string $line) {

      $this->pattern = $pattern;

      $pattern2 = preg_replace('/\//', '\\/', $pattern);

      if ($pattern2 === null) {

         throw new PregException($pattern, $method, $line);
      }

      $this->regex = '/'.$pattern2.'/';
   }

   public function __toString() {

      return $this->regex;
   }

   public function __get($property_name) {

      if ($property_name === 'pattern') {
         return $pattern;
      }
   }
}
