<div class="row" style="margin-top: -15px;">
    <div class="col-12">
      <div class="card p-1 border text-center bg-col">
        <h6><b>CIWANDAN (<?php foreach($aqmispuciwandan as $dateciwandan) : ?> <?= date('d-m-Y', strtotime($dateciwandan['waktu'])) ?> <?php endforeach ?>)</b></h6>
      </div>
    </div>
    <div class="col-10">
        <canvas id="ispuciwandan_chart" width="100" height="40"></canvas>
    </div>
    <div class="col-2">
        <div class="card p-1 bg-col" style="margin-top: 100px;">
            <h6>VOC</h6>
            <h1 class="text-center"><?php foreach($weatherciwandan as $vocciwandan) : ?> <?= $vocciwandan['voc'] ?> <?php endforeach ?> </h1>
        </div>
    </div>
    <div class="col-12">
        <?php foreach($weatherciwandan as $wciwandan) : ?>
            <div class="row">
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 8px; margin-top: 0px;"><b>WS</b></a>
                        <h6 class="text-center" style="font-size: 12px"><b><?= $wciwandan['ws'] ?></b></h6>
                        <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[km/h]</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 8px; margin-top: 0px;"><b>WD</b></a>
                        <h6 class="text-center" style="font-size: 12px"><b><?= $wciwandan['wd'] ?></b></h6>
                        <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">&nbsp;</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 8px; margin-top: 0px;"><b>Hum</b></a>
                        <h6 class="text-center" style="font-size: 12px"><b><?= $wciwandan['humidity'] ?></b></h6>
                        <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[%]</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 8px; margin-top: 0px;"><b>Temp</b></a>
                        <h6 class="text-center" style="font-size: 12px"><b><?= $wciwandan['temperature'] ?></b></h6>
                        <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[°C]</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 8px; margin-top: 0px;"><b>Press</b></a>
                        <h6 class="text-center" style="font-size: 12px"><b><?= $wciwandan['pressure'] ?></b></h6>
                        <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[mBar]</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 8px; margin-top: 0px;"><b>SR</b></a>
                        <h6 class="text-center" style="font-size: 12px"><b><?= $wciwandan['sr'] ?></b></h6>
                        <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[watt/m<sup>2</sup>]</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-1 border bg-col">
                        <a style="font-size: 8px; margin-top: 0px;"><b>Rainfall</b></a>
                        <h6 class="text-center" style="font-size: 12px"><b><?= $wciwandan['rain_intensity'] ?></b></h6>
                        <a class="text-center" style="font-size: 10px; margin-bottom: 0px;">[mm/jam]</a>
                    </div>
                </div>                          
            </div>
        <?php endforeach ?>
    </div>

</div>
<script>
    $(function() {
      const data = [
        <?php foreach($aqmispuciwandan as $ispuciwandan) : ?>
            <?= $ispuciwandan['pm10'] > 350 ? '350' : $ispuciwandan['pm10'] ?>,
            <?= $ispuciwandan['so2'] > 350 ? '350' : $ispuciwandan['so2'] ?>,
            <?= $ispuciwandan['co'] > 350 ? '350' : $ispuciwandan['co'] ?>,
            <?= $ispuciwandan['o3'] > 350 ? '350' : $ispuciwandan['o3'] ?>,
            <?= $ispuciwandan['no2'] > 350 ? '350' : $ispuciwandan['no2'] ?>,
        <?php endforeach ?>
      ];
      const colours = data.map((value) => value > 0 && value <= 50 ? '#28a745' : value > 50 && value <= 100 ? '#007bff' : value > 100 && value <= 200 ? '#ffc107' : value > 200 && value <= 300 ? '#dc3545' : value > 300 ? '#343a40' : '#28a745');

      var color = Chart.helpers.color;
      var UserVsMyAppsData = {
          labels: ["PM10", "SO2", "CO", "O3", "NO2"],
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
   
      var UserVsMyAppsCtx = document.getElementById('ispuciwandan_chart').getContext('2d');
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