<?php

function match($pattern, $str) {

   $regex = new Lib\Regex($pattern);

   $value = preg_match($regex, $str);

   if ($value === false) {

      throw new Lib\PregException($pattern);
   }

   return $value;
}

function stack_trace() {

   // DEBUG_BACKTRACE_IGNORE_ARGS satiates debug_backtrace's ravenous memory hunger.
   // See stackoverflow.com/questions/5175969/why-is-debug-backtrace-using-so-much-memory#answer-5176108
   $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
   array_shift($trace);

   $str = '';

   foreach ($trace as $call) {

      if (!empty($call['file']))     { $str .= $call['file'].' '; }
      if (!empty($call['line']))     { $str .= "line {$call['line']} "; }
      if (!empty($call['class']))    { $str .= $call['class']; }
      if (!empty($call['type']))     { $str .= $call['type']; }
      if (!empty($call['function'])) { $str .= $call['function']; }
      $str .= "\n";
   }

   return $str;
}
