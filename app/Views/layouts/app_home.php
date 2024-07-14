<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layouts/_header') ?>
</head>

<body x-data="{ openSurvey: false }">

    <?= $this->renderSection('content') ?>

    <?= $this->include('layouts/_script') ?>

    <?= $this->renderSection('script') ?>

</body>

</html>