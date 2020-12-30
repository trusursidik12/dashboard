<?php foreach($aqmdatacemsrum as $cemsrum) : ?>
<div class="row" style="margin-left: 0px; margin-right: 0px;">
    <div class="col card border text-dark text-center <?php $datecemsrum = date('Y-m-d H:i:s', strtotime($cemsrum['waktu']) + 60*60) ?> <?= $datecemsrum < date('Y-m-d H:i:s') ? 'bg-danger' : 'bg-success' ?>">
    <h1 style="color: white; margin-top: 15px; margin-bottom: 15px;">STASIUN<br>CEMS RUM</h1>
    </div>
</div>
<?php endforeach ?>