<?php

function match($pattern, $str) {

   return preg_match('/'.preg_replace('/\//', '\\/', $pattern).'/', $str);
}
