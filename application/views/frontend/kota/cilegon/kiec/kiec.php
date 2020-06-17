<div class="row" style="margin-top: -15px;">
    <div class="col-12" style="margin-bottom: -10px;">
      <div class="card p-1 border text-center bg-col">
        <h6><b>KIEC (<?php foreach($aqmispukiec as $datekiec) : ?> <?= date('d-m-Y', strtotime($datekiec['waktu'])) ?> <?php endforeach ?>)</b></h6>
      </div>
    </div>
    <div class="col-12">
        <canvas id="ispukiec_chart" width="100" height="27"></canvas>
    </div>
    <div class="col-12">
        <?php foreach($weatherkiec as $wkiec) : ?>
            <div class="row">
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 12px; margin-top: 0px;"><b>WS</b></a>
                        <h6 class="text-center" style="font-size: 16px"><b><?= $wkiec['ws'] ?></b></h6>
                        <a class="text-center" style="font-size: 12px; margin-bottom: 0px;">[km/h]</a>
                    </div>
                    <div class="card p-1 border bg-col" style="margin-top: -10px;">
                        <div class="text-center">
                        <img src="<?= base_url('assets/backend/img/dashboard/weather/wind_speed.png') ?>" width="25">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 12px; margin-top: 0px;"><b>WD</b></a>
                        <h6 class="text-center" style="font-size: 16px"><b><?= $wkiec['wd'] ?></b></h6>
                        <a class="text-center" style="font-size: 12px; margin-bottom: 0px;">&nbsp;</a>
                    </div>
                    <div class="card p-1 border bg-col" style="margin-top: -10px;">
                        <div class="text-center">
                        <img src="<?= base_url('assets/backend/img/dashboard/weather/wind_direction.png') ?>" width="25">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 12px; margin-top: 0px;"><b>Hum</b></a>
                        <h6 class="text-center" style="font-size: 16px"><b><?= $wkiec['humidity'] ?></b></h6>
                        <a class="text-center" style="font-size: 12px; margin-bottom: 0px;">[%]</a>
                    </div>
                    <div class="card p-1 border bg-col" style="margin-top: -10px;">
                        <div class="text-center">
                        <img src="<?= base_url('assets/backend/img/dashboard/weather/humidity.png') ?>" width="25">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 12px; margin-top: 0px;"><b>Temp</b></a>
                        <h6 class="text-center" style="font-size: 16px"><b><?= $wkiec['temperature'] ?></b></h6>
                        <a class="text-center" style="font-size: 12px; margin-bottom: 0px;">[°C]</a>
                    </div>
                    <div class="card p-1 border bg-col" style="margin-top: -10px;">
                        <div class="text-center">
                        <img src="<?= base_url('assets/backend/img/dashboard/weather/temperature.png') ?>" width="25">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 12px; margin-top: 0px;"><b>Press</b></a>
                        <h6 class="text-center" style="font-size: 16px"><b><?= $wkiec['pressure'] ?></b></h6>
                        <a class="text-center" style="font-size: 12px; margin-bottom: 0px;">[mBar]</a>
                    </div>
                    <div class="card p-1 border bg-col" style="margin-top: -10px;">
                        <div class="text-center">
                        <img src="<?= base_url('assets/backend/img/dashboard/weather/pressure.png') ?>" width="25">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 12px; margin-top: 0px;"><b>SR</b></a>
                        <h6 class="text-center" style="font-size: 16px"><b><?= $wkiec['sr'] ?></b></h6>
                        <a class="text-center" style="font-size: 12px; margin-bottom: 0px;">[watt/m<sup>2</sup>]</a>
                    </div>
                    <div class="card p-1 border bg-col" style="margin-top: -10px;">
                        <div class="text-center">
                        <img src="<?= base_url('assets/backend/img/dashboard/weather/solar.png') ?>" width="25">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 12px; margin-top: 0px;"><b>Rainfall</b></a>
                        <h6 class="text-center" style="font-size: 16px"><b><?= $wkiec['rain_intensity'] ?></b></h6>
                        <a class="text-center" style="font-size: 12px; margin-bottom: 0px;">[mm/jam]</a>
                    </div>
                    <div class="card p-1 border bg-col" style="margin-top: -10px;">
                        <div class="text-center">
                        <img src="<?= base_url('assets/backend/img/dashboard/weather/rain_intensity.png') ?>" width="25">
                        </div>
                    </div>
                </div>                          
            </div>
        <?php endforeach ?>
    </div>

</div>
<script>
    $(function() {
      const data = [
        <?php foreach($aqmispukiec as $ispukiec) : ?>
            <?= $ispukiec['pm25'] > 350 ? '350' : $ispukiec['pm25'] ?>,
            <?= $ispukiec['so2'] > 350 ? '350' : $ispukiec['so2'] ?>,
            <?= $ispukiec['co'] > 350 ? '350' : $ispukiec['co'] ?>,
            <?= $ispukiec['o3'] > 350 ? '350' : $ispukiec['o3'] ?>,
            <?= $ispukiec['no2'] > 350 ? '350' : $ispukiec['no2'] ?>
        <?php endforeach ?>
      ];
      const colours = data.map((value) => value > 0 && value <= 50 ? '#28a745' : value > 50 && value <= 100 ? '#007bff' : value > 100 && value <= 200 ? '#ffc107' : value > 200 && value <= 300 ? '#dc3545' : value > 300 ? '#343a40' : '#28a745');

      var color = Chart.helpers.color;
      var UserVsMyAppsData = {
          labels: ["PM2.5", "SO2", "CO", "O3", "NO2"],
          datasets: [{
              label: '# ISPU',
              // backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
              // borderColor: window.chartColors.blue,
              backgroundColor: colours,
              borderColor: colours,
              borderWidth: 1,
              data: data
          }]
   
      };
   
      var UserVsMyAppsCtx = document.getElementById('ispukiec_chart').getContext('2d');
      var UserVsMyApps = new Chart(UserVsMyAppsCtx, {
          type: 'bar',
          data: UserVsMyAppsData,
          options: {
              responsive: true,
              legend: {
                  position: 'top',
                  display: true,
   
              },
              "hover": {
                "animationDuration": 0
              },
               "animation": {
                    "duration": 1,
                    "onComplete": function() {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;

                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function(dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function(bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
              },
              title: {
                  display: false,
                  text: ''
              },
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true,
                    suggestedMin: 0,
                    stepSize: 50,
                    suggestedMax: 350,
                    fontColor: '#ffffff',
                  }
                }],
                xAxes: [{
                  ticks: {
                    fontSize: 18,
                    fontColor: '#ffffff',
                  }
                }]
              }
          }
      });
    });
</script>