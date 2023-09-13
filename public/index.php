<?php
include_once('../bootstrap.php');

use Juno\Kernel;

$kernel = $app->get(Kernel::class);
$kernel->run();