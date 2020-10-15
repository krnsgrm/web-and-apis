<?php

require_once 'vendor/autoload.php';

use App\Time;
use Ramsey\Uuid\Provider\Node\RandomNodeProvider;
use Ramsey\Uuid\Uuid;

$nodeProvider = new RandomNodeProvider();
$time = new Time();

$uuid = Uuid::uuid1($nodeProvider->getNode());

echo $time->getTime();
echo $uuid->getDateTime()->format('d M Y, D, h:m:s') . PHP_EOL;