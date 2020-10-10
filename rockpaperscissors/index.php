<?php

require_once 'ElementInterface.php';
require_once 'Rock.php';
require_once 'Paper.php';
require_once 'Scissors.php';
require_once 'Lizard.php';
require_once 'Spock.php';
require_once 'WinResult.php';
require_once 'LoseResult.php';
require_once 'TieResult.php';
require_once 'Result.php';

$photos = [
    'rock' => "photos/rock.jpg",
    'paper' => "photos/paper.jpg",
    'scissors' => "photos/scissors.jpg",
    'lizard' => "photos/lizard.webp",
    'spock' => "photos/spock.jpg"
];

$elements = array_keys($photos);
$playersChoice = $_POST["playersChoice"];

$message = "";
$doBattle = isset($playersChoice) && class_exists($playersChoice);
if ($doBattle) {
    $pcChoice = $elements[rand(0, count($elements) - 1)];
    $result = (new $playersChoice())->beats(new $pcChoice);
    $message = $result->getMessage();
}
?>

<html lang="eng">
<head>
    <style>
        h1 {
            text-align: center;
            font-size: 35px;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            font-size: 25px;
        }

        body {
            background-color: #e5e5ff;
        }

        p {
            text-align: center;
            font-size: 20px;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        img {
            height: 195px;
            width: 195px;
        }

        .button img {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .buttonReset {
            height: 50px;
            width: 100px;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .battle {
            margin: 10px;
        }

        .playerName {
            margin-right: 175px;
        }

        .pcName {
            margin-left: 25px;
        }
    </style>
</head>
<body>
<h1>ROCK, PAPER, SCISSORS, LIZARD, SPOCK</h1>

<?php if ($doBattle): ?>
    <div class="center">
        <span class="playerName">Player</span>
        <span class="pcName">PC</span>
    </div>
    <div class="center">
        <span class="battle"><img src="<?= $photos[$playersChoice] ?>" alt="playersChoice"></span> VS
        <span class="battle"><img src="<?= $photos[$pcChoice] ?>" alt="pcChoice">
    </span>
    </div>
    <h2><?= $message ?></h2>
<?php else: ?>
    <p>Choose your fighter: </p>
<?php endif; ?>

<form action="/" method="post">
    <div class="center">
        <?php foreach ($elements as $element):?>
            <button type="submit" name="playersChoice" value="<?= $element ?>">
                <img src="<?= $photos[$element] ?>" alt="<?= $element ?>" class="button">
            </button>
        <?php endforeach; ?>
    </div>
    <?php if ($doBattle): ?>
        <div class="buttonReset, center">
            <button type="submit" name="playersChoice" value="" class="buttonReset">
                Reset
            </button>
        </div>
    <?php endif; ?>
</body>
</html>
