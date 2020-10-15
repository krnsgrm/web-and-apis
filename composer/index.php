<?php

require_once 'vendor/autoload.php';

use Ramsey\Uuid\Provider\Node\RandomNodeProvider;
use Ramsey\Uuid\Uuid;

$nodeProvider = new RandomNodeProvider();

$uuid = Uuid::uuid1($nodeProvider->getNode());

echo 'Today\'s date and time is: ';
echo $uuid->getDateTime()->format('d M Y, D, h:m:s') . PHP_EOL;