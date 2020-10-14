<?php

require_once 'TaskStorage.php';

$task = $_POST['task'] ?? 'wash dishes';
$tasks = new TaskStorage();
$tasks->add($task);

if (isset($_POST['num'])) {
    $tasks->delete($_POST['num']);
}

?>

<html>
<body>
<style>
    .header {
        font-weight: bold;
        font-size: 20px;
        margin-left: 40px;
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
</style>
<h1 class="header">TO-DO LIST</h1>
<form action="" method="post">
    <label for="add">Add to to-do list: </label>
    <input type="text" id="add" name="add"/><br>
    <button class="button" type="submit">Submit</button>
</form>
<h1 class="header">NEXT TO-DO: </h1>
<?php if (isset($_POST['add'])) : ?>
    <?php foreach ($tasks->getTasks() as $num => $task) : ?>
        <?= $num . ". " . $task; ?>
        <form action="" method="post">
            <button class="button" type="submit" name="num" value="<?= $num; ?>">DONE!</button>
        </form>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>
