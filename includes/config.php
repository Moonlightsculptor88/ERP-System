<?php
require __DIR__.'/vendor/autoload.php';


use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount= ServiceAccount::fromJsonFile(__DIR__.'/erp-system-8bd84-firebase-adminsdk-60f19-987f3b7266.json');
$firebase=(new Factory)
->withServiceAccount($serviceAccount)
->withDatabaseuri('https://erp-system-8bd84-default-rtdb.firebaseio.com')
->create();

$database=$firebase->getDatabase();
?>