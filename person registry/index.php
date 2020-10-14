<?php

require_once 'Person.php';
require_once 'DataStorage.php';


$person = new Person(
    $_POST['name'] ?? 'karina',
    $_POST['surname'] ?? 's',
    $_POST['personalCode'] ?? '0000',
    $_POST['address'] ?? 'area 51'
);


$dataStorage = new DataStorage();
$dataStorage->saveDataCSV($person);

$search = $_POST['search'] ?? '0000';
$result = $dataStorage->search($search);

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
<h1 class="header">Person Registry</h1>
<form action="" method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name"/><br>
    <label for="surname">Surname</label>
    <input type="text" id="surname" name="surname"/><br>
    <label for="personalCode">Personal Code</label>
    <input type="text" id="personalCode" name="personalCode"/><br>
    <label for="address">Address</label>
    <input type="text" id="address" name="address"/><br><br>
    <button class="button" type="submit">Submit</button>
</form>

<p class="header">Search our database</p>
<form method="post" action="/">
    <label for="codeSearch">Type in personal code:</label>
    <input type="text" id="codeSearch" name="codeSearch"/>
    <button class="button" type="submit">Search</button>
</form>

<?php if (isset($_POST['search'])) : ?>
    <?php if ($result != null) : ?>
        <p> <?= $person->getName(); ?></p><br>
        <p>   <?= $person->getSurname(); ?> </p><br>
        <p> <?= $person->getPersonalCode(); ?></p><br>
        <p><?= $person->getAddress(); ?></p><br>
    <?php else : ?>
        <?= "Person not found!"; ?>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>