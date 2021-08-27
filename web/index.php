<?php

require '../bootstrap.php';
require '../EmployeeApplication.php';

$app = new EmployeeApplication(true);
$app->run();