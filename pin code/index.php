<?php

require_once 'Pin.php';

session_start();

$pin = new Pin();
$pin->choosePin('0000');


if (isset($_POST['button'])) {
    $_SESSION['button'] .= $_POST['button'];
}
$pin = $_SESSION['button'] ?? '';

if (strlen($pin) >= 4) {
    unset($_POST['pin']);
    unset($_SESSION['pin']);
}

?>

<html>
<body>
<style>
    .button {
        text-align: center;
        padding: 40px 80px;
        background-color: #e7e7e7;
        color: black;
        font-size: 16px;
        border-radius: 4px;
    }

    .container {
        height: 100px;
        position: relative;

    }

    .center {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .unlocked {
        font-weight: bold;
        text-align: center;
        margin-top: 120px;
    }

    .click {
        font-weight: bold;
        font-size: 20px;
        text-align: center;
    }

    body {
        text-align: center;
    }

    .pin {
        display: grid;
        font-weight: bold;
        font-size: 20px;
    }
</style>

<?php if (strlen($pin) < 4): ?>
    <?= 'Enter PIN code: '; ?>
<?php elseif (strlen($pin) == 4): ?>
    <?= ($pin == $pin->getPin()) ? 'UNLOCKED' : 'LOCKED'; ?>
<?php endif; ?>

<p><?php str_repeat('*', strlen($pin)); ?> </p>

<?php if (isset($_SESSION['button'])) {
    for ($i = 0; $i < strlen($_SESSION['button']); $i++) {
        echo '*';
    }
} ?>
<!---->
<?php if (isset($unlocked)) {
    echo $unlocked;
}
?>
<form action="" method="post">
    <div class="center">
        <div class="container">
            <button type="submit" value="1" name="button" class="button">1</button>
            <button type="submit" value="2" name="button" class="button">2</button>
            <button type="submit" value="3" name="button" class="button">3</button>
            <br>
            <button type="submit" value="4" name="button" class="button">4</button>
            <button type="submit" value="5" name="button" class="button">5</button>
            <button type="submit" value="6" name="button" class="button">6</button>
            <br>
            <button type="submit" value="7" name="button" class="button">7</button>
            <button type="submit" value="8" name="button" class="button">8</button>
            <button type="submit" value="9" name="button" class="button">9</button>
            <br>
            <button type="submit" value="0" name="button" class="button">0</button>
        </div>
    </div>
</form>
</body>
</html>