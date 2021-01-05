<?php foreach($aqmdatacemsrum as $cemsrum) : ?>
    <div class="row" style="margin-left:0px; margin-right:0px">
      <div class="col-12  bg-col">
        <div class="p-1 text-center">
          <h5 style="font-size: 44px"><b>STASIUN CEMS RUM(<?= date('d-m-Y H:i', strtotime($cemsrum['waktu'])) ?>)</b></h5><br>
        </div>
      </div>
    </div>

    <div class="row text-white" style="margin-left:0px; margin-right:0px">
      <div class="col-4 card p-2 border" style="height: 580px">
        <canvas id="chartcemsrumdatah2s" width="100" height="115"></canvas>
      </div>
      <div class="col-4 card p-2 border" style="height: 580px">
        <canvas id="chartcemsrumdatacs2" width="100" height="115"></canvas>
      </div>
      <div class="col-4 card p-2 border bg-info">
        <div class="" style="margin-top: 40px; margin-bottom: 95px">
          <h6 style="font-size: 22px"><b>H2S</b></h6>
          <h6 class="text-center" style="font-size: 42px;"><b><?= $cemsrum['h2s'].'<a style="font-size: 16px;">[μg]</a>' ?> <br> <?= round($cemsrum['h2s'] / 1500, 3).'<a style="font-size: 16px;">[ppm]</a>' ?></b></h6>
        </div><hr style="border: 1px solid white">
        <div class="" style="margin-top: 40px; ">
          <h6 style="font-size: 22px"><b>CS2</b></h6>
          <h6 class="text-center" style="font-size: 42px"><b><?= $cemsrum['cs2'].'<a style="font-size: 16px;">[μg]</a>' ?> <br> <?= round($cemsrum['cs2'] / 3130, 3).'<a style="font-size: 16px;">[ppm]</a>' ?></b></h6>
        </div>
      </div>
    </div>
    <div class="row text-white" style="margin-left:0px; margin-right:0px">
      <div class="col card p-2 border  bg-info">
        <div class="">
          <a style="font-size: 22px; margin-top: 0px;"><b>WS</b></a>
          <h6 class="text-center" style="font-size: 32px;"><b><?= $cemsrum['pm10'] ?></b></h6>
          <a class="text-center" style="font-size: 16px; margin-bottom: 0px;">[km/h]</a>
        </div>
        <div class="card p-1 border  bg-info">
          <div class="text-center">
            <img src="<?= base_url('assets/backend/img/dashboard/weather/wind_speed.png') ?>" width="25">
          </div>
        </div>
      </div>
      <div class="col card p-2 border  bg-info">
        <div class="">
          <a style="font-size: 22px; margin-top: 0px;"><b>Temp</b></a>
          <h6 class="text-center" style="font-size: 32px;"><b><?= $cemsrum['pm25'] ?></b></h6>
          <a class="text-center" style="font-size: 16px; margin-bottom: 0px;">[°C]</a>
        </div>
        <div class="p-1 border  bg-info">
          <div class="text-center">
            <img src="<?= base_url('assets/backend/img/dashboard/weather/temperature.png') ?>" width="25">
          </div>
        </div>
      </div>
    </div>
<?php endforeach ?>

<script>
    $(function() {
       const data = [
        <?php foreach($aqmdatacemsrum as $chartcemsrum) : ?>
          <?= $chartcemsrum['h2s'] ?>
        <?php endforeach ?>
      ];
      const colours = data.map((value) => value > 0 && value <= 50 ? '#28a745' : value > 50 && value <= 100 ? '#28a745' : value > 100 && value <= 200 ? '#28a745' : value > 200 && value <= 300 ? '#28a745' : value > 300 ? '#28a745' : '#28a745');

      var color = Chart.helpers.color;
      var UserVsMyAppsData = {
          labels: ["H2S"],
          datasets: [{
              label: '# DATA',
              backgroundColor: colours,
              borderColor: colours,
              borderWidth: 1,
              data: data
          }]
   
      };
   
      var UserVsMyAppsCtx = document.getElementById('chartcemsrumdatah2s').getContext('2d');
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
                    // stepSize: 100000,
                    suggestedMax: 1500000,
                  }
                }],
                xAxes: [{
                  ticks: {
                    fontSize: 36,
                    // fontWeight: "bold"
                  }
                }]
              }
          }
      });
    });
  </script>

<script>
    $(function() {
       const data = [
        <?php foreach($aqmdatacemsrum as $chartcemsrum) : ?>
          <?= $chartcemsrum['cs2'] ?>
        <?php endforeach ?>
      ];
      const colours = data.map((value) => value > 0 && value <= 50 ? '#28a745' : value > 50 && value <= 100 ? '#28a745' : value > 100 && value <= 200 ? '#28a745' : value > 200 && value <= 300 ? '#28a745' : value > 300 ? '#28a745' : '#28a745');

      var color = Chart.helpers.color;
      var UserVsMyAppsData = {
          labels: ["CS2"],
          datasets: [{
              label: '# DATA',
              backgroundColor: colours,
              borderColor: colours,
              borderWidth: 1,
              data: data
          }]
   
      };
   
      var UserVsMyAppsCtx = document.getElementById('chartcemsrumdatacs2').getContext('2d');
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
                    // stepSize: 50,
                    suggestedMax: 40000,
                  }
                }],
                xAxes: [{
                  ticks: {
                    fontSize: 36,
                    // fontWeight: "bold"
                  }
                }]
              }
          }
      });
    });
  </script>