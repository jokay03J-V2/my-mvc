<?php // Layout loaded when view is rendered ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <!-- Bootstrap and material icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- Load all css -->
    <link rel="stylesheet" href="<?= $ressources->get("css/global.css") ?>">
    <!-- Load css from a view -->
    <?php foreach ($ressources->getCSS() as $key => $cssFile) { ?>
        <link rel="stylesheet" href="<?= $ressources->get($cssFile) ?>">
    <?php } ?>
    <meta name="description" content="Todolist">
</head>

<body>
    <!-- Base layout for you views -->
    <?= $content ?>
    <!-- Load all js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- Load js from a view -->
    <?php foreach ($ressources->getJS() as $key => $jsFile) { ?>
        <script src="<?= $ressources->get($jsFile) ?>"></script>
    <?php } ?>
</body>

</html>