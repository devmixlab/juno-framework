<?php

include_once ('Worker.php');

//$i = 0;
do{
  echo Worker::$count++;
  echo "\n";
  sleep(1);
}while(true);