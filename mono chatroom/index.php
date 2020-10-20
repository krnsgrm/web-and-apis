<?php

require_once 'DataStorages.php';
require_once 'User.php';
require_once 'Message.php';
require_once 'MessageStorage.php';

session_start();

$data = new DataStorages();
$messages = new MessageStorage();

if (isset($_POST['pin']) && $data->getByPin($_POST['pin']) != null) {
    $_SESSION['user'] = $data->getByPin($_POST['pin'])->getName();
}

if (isset($_POST['message'])) {
    $messages->addMessage(new Message($data->getByName($_SESSION['user'])->getID(), $_POST['message']));
}

if (isset($_POST['logout'])) {
    session_unset();
}
?>

<html>
<body>
<style>
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

    .header {
        font-weight: bold;
        font-size: 20px;
        margin-left: 20px;
    }

    .paragraph {
        font-size: 18px;
        margin-left: 20px;
    }
</style>
<form method="post" action="/">
    <label class="header">Enter your PIN code: </label>
    <input type="text" name="pin">
    <button class="button" type="submit">Submit</button>
    <br>
</form>
<?php if (isset($_SESSION['user'])) : ?>

    <?= "<p class='paragraph'> Person found: {$_SESSION['user']} </p>"; ?>
    <form method="post" action="/">
        <label class="paragraph">Enter your message: </label>
        <input type="text" name="message">
        <button class="button" type="submit">Send message</button>
        <br>
        <form method="post" action="/">
            <button class="button" type="submit" name="logout">LOG OUT</button>
        </form>
    </form>

<?php elseif (isset($_POST['pin']) && $data->getByPin($_POST['pin']) == null): ?>
    <?= "<p class='paragraph'> Person not found in our database, please try again</p>"; ?>
<?php endif; ?>
</body>
</html>
