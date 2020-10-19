<?php

require_once 'Persons.php';
require_once 'PersonStorage.php';

$data = new PersonStorage();
$number = $_POST['search'] ?? '0000';
if ($data->getByNumber($number)) {
    $person = $data->getByNumber($number);
    $result = $person->getName() . $person->getSurname();
} else {
    echo 'Person was not found in our database!';
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

    .text {
        font-weight: bold;
        font-size: 17px;
        margin-left: 50px;
    }
</style>
<p class="header">Search our database</p>
<form method="post" action="/">
    <label for="search">Type in number:</label>
    <input type="text" id="search" name="search"/><br><br>
    <button class="button" type="submit">Search</button>
    <br>

    <p class="text"><?php if (isset($_POST['search'])) {
            if ($_POST['search'] != null) {
                echo 'Person found: ' . $result;
            }
        } ?></p>
</form>
</body>
</html>