<?php

namespace Lib;

class Regex {

   private $regex;
   private $pattern;

   public function __construct($pattern) {
   // Implement http://php.net/manual/en/language.oop5.typehinting.php#83442
   //public function __construct(string $pattern) {

      $this->pattern = $pattern;

      $pattern2 = preg_replace('/\//', '\\/', $pattern);

      if ($pattern2 === null) {

         throw new PregException($pattern);
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
