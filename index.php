<?php require_once __DIR__ . "/my-counter.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Multiple instances of a counter web component" />
  <title>Counters</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: space-around;
      align-items: center;
      height: 100dvh;
      margin: 0;
    }
  </style>
</head>

<body>
  <?= $myCounter(-10); ?>
  <?= $myCounter(-5); ?>
  <?= $myCounter(0); ?>
  <?= $myCounter(5); ?>
  <?= $myCounter(10); ?>
</body>

</html>