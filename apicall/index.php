<?php

require_once 'Person.php';
require_once 'DataStorage.php';

$dataStorage = new DataStorage();
$name = $_POST['name'] ?? 'Karina';

$person = $dataStorage->getByName($name);

?>

<html lang="eng">
<style>
    .text {
        font-weight: bold;
        font-size: 16px;
        margin-left: 20px;
    }

    .input {
        font-weight: lighter;
        font-size: 15px;
        margin-left: 30px;
    }

    .header {
        font-size: 18px;
        margin-top: 40px;
        margin-left: 30px;
    }
</style>
<h1 class="header">Type in your name: </h1>
<form action="/" method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name"/>
    <button type="submit">Submit</button>
</form>
<?php if (isset($_POST['name'])) : ?>
    <p class="text">Person's name is: </p>
    <p class="input"><?php echo $person->getName() ?> </p>
    <p class="text">Age is: </p>
    <p class="input"><?php echo $person->getAge() ?> </p>
    <p class="text">Teslas owned: </p>
    <p class="input"><?php echo $person->getCount() ?> </p>
<?php endif; ?>
</body>
</html>