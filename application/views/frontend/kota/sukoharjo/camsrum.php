<?php foreach($aqmdatarum as $rum) : ?>
    <div class="row">
      
      <div class="col-12">
        <div class="card p-1 border text-center bg-col">
          <h5><b>STASIUN CAMS RUM (<?= date('d-m-Y H:i', strtotime($rum['waktu'])) ?>)</b></h5>
        </div>
      </div>
      <div class="col-6">
        <div class="card p-3 border bg-col">
          <h6><b>H2S</b></h6>
          <h6 class="text-center"><b><?= $rum['h2s'].'<a style="font-size: 14px;">[μg]</a>' ?> | <?= round($rum['h2s'] / 1500, 3).'<a style="font-size: 14px;">[ppm]</a>' ?></b></h6>
        </div>
      </div>
      <div class="col-6">
        <div class="card p-3 border bg-col">
          <h6><b>CS2</b></h6>
          <h6 class="text-center"><b><?= $rum['cs2'].'<a style="font-size: 14px;">[μg]</a>' ?> | <?= round($rum['cs2'] / 3130, 3).'<a style="font-size: 14px;">[ppm]</a>' ?></b></h6>
        </div>
      </div>
      <div class="col-12">
        <div class="row">
          <div class="col">
            <div class="card p-2 border bg-col">
              <a style="font-size: 8px; margin-top: 0px;"><b>WS</b></a>
              <h6 class="text-center" style="font-size: 12px;"><b><?= $rum['ws'] ?></b></h6>
              <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[km/h]</a>
            </div>
            <div class="card p-1 border bg-col">
              <div class="text-center">
                <img src="<?= base_url('assets/backend/img/dashboard/weather/wind_speed.png') ?>" width="25">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card p-2 border bg-col">
              <a style="font-size: 8px; margin-top: 0px;"><b>WD</b></a>
              <h6 class="text-center" style="font-size: 12px;"><b><?= $rum['wd'] ?></b></h6>
              <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">&nbsp;</a>
            </div>
            <div class="card p-1 border bg-col">
              <div class="text-center">
                <img src="<?= base_url('assets/backend/img/dashboard/weather/wind_direction.png') ?>" width="25">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card p-2 border bg-col">
              <a style="font-size: 8px; margin-top: 0px;"><b>Hum</b></a>
              <h6 class="text-center" style="font-size: 12px;"><b><?= $rum['humidity'] ?></b></h6>
              <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[%]</a>
            </div>
            <div class="card p-1 border bg-col">
              <div class="text-center">
                <img src="<?= base_url('assets/backend/img/dashboard/weather/humidity.png') ?>" width="25">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card p-2 border bg-col">
              <a style="font-size: 8px; margin-top: 0px;"><b>Temp</b></a>
              <h6 class="text-center" style="font-size: 12px;"><b><?= $rum['temperature'] ?></b></h6>
              <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[°C]</a>
            </div>
            <div class="card p-1 border bg-col">
              <div class="text-center">
                <img src="<?= base_url('assets/backend/img/dashboard/weather/temperature.png') ?>" width="25">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card p-2 border bg-col">
              <a style="font-size: 8px; margin-top: 0px;"><b>Press</b></a>
              <h6 class="text-center" style="font-size: 12px;"><b><?= $rum['pressure'] ?></b></h6>
              <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[mBar]</a>
            </div>
            <div class="card p-1 border bg-col">
              <div class="text-center">
                <img src="<?= base_url('assets/backend/img/dashboard/weather/pressure.png') ?>" width="25">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card p-2 border bg-col">
              <a style="font-size: 8px; margin-top: 0px;"><b>SR</b></a>
              <h6 class="text-center" style="font-size: 12px;"><b><?= $rum['sr'] ?></b></h6>
              <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[watt/m<sup>2</sup>]</a>
            </div>
            <div class="card p-1 border bg-col">
              <div class="text-center">
                <img src="<?= base_url('assets/backend/img/dashboard/weather/solar.png') ?>" width="25">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card p-2 border bg-col">
              <a style="font-size: 8px; margin-top: 0px;"><b>Rainfall</b></a>
              <h6 class="text-center" style="font-size: 12px;"><b><?= $rum['rain_intensity'] ?></b></h6>
              <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[mm/jam]</a>
            </div>
            <div class="card p-1 border bg-col">
              <div class="text-center">
                <img src="<?= base_url('assets/backend/img/dashboard/weather/rain.png') ?>" width="25">
              </div>
            </div>
          </div>                          
        </div>
      </div>

    </div>
<?php endforeach ?>