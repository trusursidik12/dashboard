<!DOCTYPE html>
<html>
<head>
  <title>SUKOHARJO</title>
  <link rel="icon" href="<?=base_url('assets/backend/img/dashboard/logo.png')?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/dist/css/adminlte.min.css">

  <style type="text/css">
    .bg-col{
      background-color: #333344;
    }
    body {
      overflow: hidden; /* Hide scrollbars */
    }
  </style>
  
</head>
<body class="bg-col" onload="startTime()">

  <?= $contentsfrontend ?>

  <script src="<?= base_url('assets/backend/plugins/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>