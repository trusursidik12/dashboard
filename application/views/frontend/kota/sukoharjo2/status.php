<?php foreach($aqmdatacemsrum as $cemsrum) : ?>
<div class="row" style="margin-left: 0px; margin-right: 0px;">
    <div class="col card border text-dark text-center <?php $datecemsrum = date('Y-m-d H:i:s', strtotime($cemsrum['waktu']) + 60*60) ?> <?= $datecemsrum < date('Y-m-d H:i:s') ? 'bg-danger' : 'bg-success' ?>">
    <h1 style="color: white; margin-top: 15px; margin-bottom: 15px;">STASIUN<br>CEMS RUM</h1>
    </div>
</div>
<?php endforeach ?>
<br>
<?php foreach($aqmdatarum as $rum) : ?>
<div class="row" style="margin-left: 0px; margin-right: 0px;">
    <div class="col card border text-dark text-center <?php $daterum = date('Y-m-d H:i:s', strtotime($rum['waktu']) + 60*60) ?> <?= $daterum < date('Y-m-d H:i:s') ? 'bg-danger' : 'bg-success' ?>">
    <h1 style="color: white; margin-top: 15px; margin-bottom: 15px;">STASIUN<br>CAMS RUM</h1>
    </div>
</div>
<?php endforeach ?>
<br>
<?php foreach($aqmdatagupit as $gupit) : ?>
<div class="row" style="margin-left: 0px; margin-right: 0px;">
    <div class="col card border text-dark text-center <?php $dategupit = date('Y-m-d H:i:s', strtotime($gupit['waktu']) + 60*60) ?> <?= $dategupit < date('Y-m-d H:i:s') ? 'bg-danger' : 'bg-success' ?>">
    <h1 style="color: white; margin-top: 15px; margin-bottom: 15px;">STASIUN<br>CAMS GUPIT</h1>
    </div>
</div>
<?php endforeach ?>
<br>
<?php foreach($aqmdataplesan as $plesan) : ?>
<div class="row" style="margin-left: 0px; margin-right: 0px;">
    <div class="col card border text-dark text-center <?php $dateplesan = date('Y-m-d H:i:s', strtotime($plesan['waktu']) + 60*60) ?> <?= $dateplesan < date('Y-m-d H:i:s') ? 'bg-danger' : 'bg-success' ?>">
    <h1 style="color: white; margin-top: 15px; margin-bottom: 15px;">STASIUN<br>CAMS PLESAN</h1>
    </div>
</div>
<?php endforeach ?>
<br>
<?php foreach($aqmdatacelep as $celep) : ?>
<div class="row" style="margin-left: 0px; margin-right: 0px;">
    <div class="col card border text-dark text-center <?php $datecelep = date('Y-m-d H:i:s', strtotime($celep['waktu']) + 60*60) ?> <?= $datecelep < date('Y-m-d H:i:s') ? 'bg-danger' : 'bg-success' ?>">
    <h1 style="color: white; margin-top: 15px; margin-bottom: 15px;">STASIUN<br>CAMS CELEP</h1>
    </div>
</div>
<?php endforeach ?>
<br>
<?php foreach($aqmdatapengkol as $pengkol) : ?>
<div class="row" style="margin-left: 0px; margin-right: 0px;">
    <div class="col card border text-dark text-center <?php $datepengkol = date('Y-m-d H:i:s', strtotime($pengkol['waktu']) + 60*60) ?> <?= $datepengkol < date('Y-m-d H:i:s') ? 'bg-danger' : 'bg-success' ?>">
    <h1 style="color: white; margin-top: 15px; margin-bottom: 15px;">STASIUN<br>CAMS PENGKOL</h1>
    </div>
</div>
<?php endforeach ?>