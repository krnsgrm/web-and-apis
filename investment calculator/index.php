<?php

require_once 'Calculator.php';

if (isset ($_POST['money'])) {
    $investment = new Calculator($_POST['money'], $_POST['duration'], $_POST['rate']);
}
?>

<html>
<body>
<style>
    .box1 {
        margin-left: 104px;
    }

    .box2 {
        margin-left: 81px;
    }

    .button {
        background-color: black;
        font-size: 20px;
        border-radius: 4px;
        padding: 10px 35px;
        text-align: center;
        transition-duration: 0.7s;
        width: 150px;
        border-color: black;
        color: white;
    }

    .button:hover {
        background-color: white;
        color: black;
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    .after {
        font-weight: bold;
        font-size: 20px;
        margin: 25px;
    }
</style>
<h1>Investment calculator</h1>
<form action="" method="post">
    <label for="money">Money (EUR)</label>
    <input class="box1" type="text" id="money" name="money" min="0"/><br>
    <label for="rate">Increase rate per year (%)</label>
    <input type="text" id="rate" name="rate" min="0"/><br>
    <label for="duration">Duration (years)</label>
    <input class="box2" type="text" id="duration" name="duration" min="0"/><br><br>
    <button class="button" type="submit">Submit</button>
</form>
<?php if (isset($investment)): ?>
    <p1 class="after">Your money after: <?php echo $investment->calculation() ?> EUR</p1>
<?php endif; ?>
</body>
</html>
