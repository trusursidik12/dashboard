<?php foreach($aqmdatacemsrum as $cemsrum) : ?>
  <div class="row">

    <div class="col-12">
      <div class="card p-1 border text-center bg-col">
        <h6><b>STASIUN CEMS RUM (<?= date('d-m-Y H:i', strtotime($cemsrum['waktu'])) ?>)</b></h6>
      </div>
    </div>

    <div class="col-6">
      <div class="card p-3 border bg-col">
        <h6><b>H2S</b></h6>
        <h6 class="text-center"><b><?= round($cemsrum['h2s'] * 1500).'<a style="font-size: 14px;">[μg]</a>' ?> | <?= $cemsrum['h2s'].'<a style="font-size: 14px;">[ppm]</a>' ?></b></h6>
      </div>
    </div>
    <div class="col-6">
      <div class="card p-3 border bg-col">
        <h6><b>CS2</b></h6>
        <h6 class="text-center"><b><?= round($cemsrum['cs2'] * 3130).'<a style="font-size: 14px;">[μg]</a>' ?> | <?= $cemsrum['cs2'].'<a style="font-size: 14px;">[ppm]</a>' ?></b></h6>
      </div>
    </div>

    <div class="col-6">
      <div class="card p-3 border bg-col">
        <h6><b>Velocity</b></h6>
        <h6 class="text-center"><b><?= $cemsrum['ws'].'<a style="font-size: 14px;">[km/h]</a>' ?></b></h6>
      </div>
    </div>
    <div class="col-6">
      <div class="card p-3 border bg-col">
        <h6><b>Temperature</b></h6>
        <h6 class="text-center"><b><?= $cemsrum['temperature'].'<a style="font-size: 14px;">[°C]</a>' ?></b></h6>
      </div>
    </div>

  </div>
<?php endforeach ?>