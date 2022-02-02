<?php 
function encode($string, $key = "", $url_safe = TRUE) {
      $ret = $string;

      if ($url_safe) {
          $ret = strtr($ret, array('+' => '.', '=' => '-', '/' => '~'));
      }

      return $ret;
  }

  function decode($string) {
      $string = strtr($string, array('.' => '+', '-' => '=', '~' => '/'));

      return $string;
  } 