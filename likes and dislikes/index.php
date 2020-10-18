<?php

require_once 'Photo.php';

$file = fopen("photos.csv", "r");
$photos = [];

while (!feof($file)) {
    $csvLine = fgetcsv($file);
    if (count($csvLine) == 2) {
        $photos[$csvLine[0]] = new Photo($csvLine[0], $csvLine[1]);
    }
}

if (isset($_POST['like'])) {
    $photos[$_POST['like']]->like();
}
if (isset($_POST['dislike'])) {
    $photos[$_POST['dislike']]->dislike();
}

fclose($file);

$file = fopen("photos.csv", "w");

foreach ($photos as $photo) {
    fputcsv($file, array($photo->getURL(), $photo->getLikeCount()));
}
fclose($file);
?>

<html>
<divy>
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

        .image {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            height: auto;
        }

        body {
            text-align: center;
        }

        .text {
            font-weight: bold;
        }
    </style>
    <div>
        <?php foreach ($photos as $photo): ?>
            <form action="/" method="post">
                <img class="image" src="<?= $photo->getURL() ?>" alt="photo"/>
                <button class="button" name="like" value="<?= $photo->getURL() ?>">Like</button>
                <button class="button" name="dislike" value="<?= $photo->getURL() ?>">Dislike</button>
                <label class="text">Likes: <?= $photo->getLikeCount() ?></label>
            </form>
        <?php endforeach; ?>
    </div>
</html>
