<?php foreach($aqmdatacemsrum as $cemsrum) : ?>
  <div class="row">

    <div class="col-12">
      <div class="card p-1 border text-center bg-col">
        <h5><b>STASIUN CEMS RUM</b></h5>
      </div>
    </div>

    <div class="col-6">
      <div class="card p-3 border bg-col">
        <h5><b>H2S</b></h5>
        <h1 class="text-center"><b><?= $cemsrum['h2s'].'<a style="font-size: 14px;">[μg]</a>' ?> | <?= round($cemsrum['h2s'] / 1500, 3).'<a style="font-size: 14px;">[ppm]</a>' ?></b></h1>
      </div>
    </div>
    <div class="col-6">
      <div class="card p-3 border bg-col">
        <h5><b>CS2</b></h5>
        <h1 class="text-center"><b><?= $cemsrum['cs2'].'<a style="font-size: 14px;">[μg]</a>' ?> | <?= round($cemsrum['cs2'] / 3130, 3).'<a style="font-size: 14px;">[ppm]</a>' ?></b></h1>
      </div>
    </div>

    <div class="col-6">
      <div class="card p-3 border bg-col">
        <h5><b>Velocity</b></h5>
        <h1 class="text-center"><b><?= $cemsrum['ws'].'<a style="font-size: 14px;">[km/h]</a>' ?></b></h1>
      </div>
    </div>
    <div class="col-6">
      <div class="card p-3 border bg-col">
        <h5><b>Temperature</b></h5>
        <h1 class="text-center"><b><?= $cemsrum['temperature'].'<a style="font-size: 14px;">[°C]</a>' ?></b></h1>
      </div>
    </div>

  </div>
<?php endforeach ?>