<?php

function dumpDie($value){
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}