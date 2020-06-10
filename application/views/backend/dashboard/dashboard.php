<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php foreach($aqmstasiun as $stasiun) : ?>
          <?php foreach($aqmdata as $data) : ?>
            <?php if($stasiun['id_stasiun'] == $data['id_stasiun']) : ?>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box <?php $date = date('Y-m-d H:i:s', strtotime($data['waktu']) + 60*60) ?> <?= $date < date('Y-m-d H:i:s') ? 'bg-danger' : 'bg-info' ?>">
                  <div class="inner">
                    <h6 style="font-size: 12px;">
                      LAST DATA | <?= $data['waktu'] ?>
                    </h6>

                    <p>KLHK-<?= $stasiun['id_stasiun'] ?></p>
                  </div>
                  <div class="icon">
                    <i class="ion">
                    <img src="<?= base_url('assets/backend/img/dashboard/station.png') ?>"></i>
                  </div>
                  <a href="<?= site_url('aqmdata/'.$stasiun['id_stasiun']) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        <?php endforeach ?>
      </div>

      <?php if($this->fungsi->user_login()->usr_cty_id == '3') : ?>

      <div class="col-sm-12">
        <div class="table-responsive">
          <table border="1" width="100%" class="text-center">
              <thead>
                  <tr>
                      <th>ISPU</th>
                      <th>RANGE NILAI</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Berbahaya &#128567;</td>
                      <td class="text-white bg-dark" style="color: #FFFFFF;"> >300 </td>
                  </tr>                        
                  <tr>
                      <td>Sangat Tidak Sehat &#129319;</td>
                      <td class="text-white bg-danger">201 - 300</td>
                  </tr>    
                  <tr>
                      <td>Tidak Sehat &#128552;</td>
                      <td class="text-white bg-warning">101 - 200</td>
                  </tr> 
                  <tr>
                      <td>Sedang &#128578;</td>
                      <td class="text-white bg-primary">51 - 100</td>
                  </tr>   
                  <tr>
                      <td>Baik &#128515;</td>
                      <td class="text-white bg-success">0 - 50</td>
                  </tr>
              </tbody>
          </table>
        </div>
      </div>

      <div class="d-flex p-2">

        <ul class="nav nav-pills">

        <?php foreach($aqmstasiun as $stasiun) : ?>
          <?php foreach($this->b_aqms_m->get_aqmispu_chart($stasiun['id_stasiun']) as $pci) : ?>
            <li class="nav-item col-lg-3 col-6">
              <a class="nav-link" href="#<?= strtolower($stasiun['id_stasiun']) ?>" data-toggle="tab">
                <div class="row">
                  <div class="col-sm-12 text-center">
                    <h6><?= $stasiun['nama'] ?></h6>
                      <p style="font-size: 14px;"><b>ISPU <?= $stasiun['id_stasiun'] ?>
                        <?= '('.$pci['waktu'].')' ?>
                      </b></p>
                      <canvas id="<?= $stasiun['id_stasiun'] ?>" width="100" height="80"></canvas>
                  </div>
                </div>
              </a>
            </li>
          <?php endforeach ?>
        <?php endforeach ?>

        </ul>
      </div>

      <div class="tab-content"><hr>

        <?php foreach($aqmstasiun as $stasiun) : ?>
          <?php foreach($this->b_aqms_m->get_aqmdata_weather($stasiun['id_stasiun']) as $cilegon) : ?>
            <div class="<?= $stasiun['id_stasiun'] == 'CILEGON_PCI' ? 'active' : '' ?> tab-pane" id="<?= strtolower($stasiun['id_stasiun']) ?>">
              <div class="row">
                <div class="col-sm">
                  <div class="row">
                    <div class="col-sm text-center">
                        <h5><?= $stasiun['nama'] ?> - Weather Station</h5>
                      <div class="row">
                          <div class="col-lg col-4 text-center border">
                            <br><h6>Temperatur</h6><hr>
                            <img src="<?= base_url('assets/backend/img/dashboard/weather/temperature.png') ?>" width="80">
                            <hr><h6><?= $cilegon['temperature'] ?></h6>
                          </div>
                          <div class="col-lg col-4 text-center border">
                            <br><h6>RH</h6><hr>
                            <img src="<?= base_url('assets/backend/img/dashboard/weather/humidity.png') ?>" width="80">
                            <hr><h6><?= $cilegon['humidity'] ?></h6>
                          </div>
                          <div class="col-lg col-4 text-center border">
                            <br><h6>Tekanan</h6><hr>
                            <img src="<?= base_url('assets/backend/img/dashboard/weather/pressure.png') ?>" width="80">
                            <hr><h6><?= $cilegon['pressure'] ?></h6>
                          </div>
                          <div class="col-lg col-4 text-center border">
                            <br><h6>Arah Angin</h6><hr>
                            <img src="<?= base_url('assets/backend/img/dashboard/weather/wind_direction.png') ?>" width="80">
                            <hr><h6><?= $cilegon['wd'] ?></h6>
                          </div>
                          <div class="col-lg col-4 text-center border">
                            <br><h6>Kec. Angin</h6><hr>
                            <img src="<?= base_url('assets/backend/img/dashboard/weather/wind_speed.png') ?>" width="80">
                            <hr><h6><?= $cilegon['ws'] ?></h6>
                          </div>
                          <div class="col-lg col-4 text-center border">
                            <br><h6>Sol. Radiation</h6><hr>
                            <img src="<?= base_url('assets/backend/img/dashboard/weather/solar_radiation.png') ?>" width="80">
                            <hr><h6><?= $cilegon['sr'] ?></h6>
                          </div>
                          <div class="col-lg col-4 text-center border">
                            <br><h6>Rain Intensity</h6><hr>
                            <img src="<?= base_url('assets/backend/img/dashboard/weather/rain_intensity.png') ?>" width="80">
                            <hr><h6><?= $cilegon['rain_intensity'] ?></h6>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        <?php endforeach ?>

      </div>

    <?php endif ?>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(function() {
      const data = [
        <?php foreach($this->b_aqms_m->get_aqmispu_chart('CILEGON_PCI') as $pci) : ?>
          <?= $pci['pm10'] > '350' ? '350' : $pci['pm10'] ?>,
          <?= $pci['so2'] > '350' ? '350' : $pci['so2'] ?>,
          <?= $pci['co'] > '350' ? '350' : $pci['co'] ?>,
          <?= $pci['o3'] > '350' ? '350' : $pci['o3'] ?>,
          <?= $pci['no2'] > '350' ? '350' : $pci['no2'] ?>
        <?php endforeach ?>
      ];
      const colours = data.map((value) => value > 0 && value <= 50 ? '#28a745' : value > 50 && value <= 100 ? '#007bff' : value > 100 && value <= 200 ? '#ffc107' : value > 200 && value <= 300 ? '#dc3545' : value > 300 ? '#343a40' : 'purple');

      var color = Chart.helpers.color;
      var UserVsMyAppsData = {
          labels: ["PM10", "SO2", "CO", "O3", "NO2"],
          datasets: [{
              label: '# ISPU',
              backgroundColor: colours,
              borderColor: colours,
              borderWidth: 1,
              data: data
          }]
   
      };
   
      var UserVsMyAppsCtx = document.getElementById('CILEGON_PCI').getContext('2d');
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
                  }
                }],
                xAxes: [{
                  ticks: {
                    fontSize: 14
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
        <?php foreach($this->b_aqms_m->get_aqmispu_chart('SIMPANG_TIGA') as $simpang) : ?>
          <?= $simpang['pm10'] > '350' ? '350' : $simpang['pm10'] ?>,
          <?= $simpang['so2'] > '350' ? '350' : $simpang['so2'] ?>,
          <?= $simpang['co'] > '350' ? '350' : $simpang['co'] ?>,
          <?= $simpang['o3'] > '350' ? '350' : $simpang['o3'] ?>,
          <?= $simpang['no2'] > '350' ? '350' : $simpang['no2'] ?>
        <?php endforeach ?>
      ];
      const colours = data.map((value) => value > 0 && value <= 50 ? '#28a745' : value > 50 && value <= 100 ? '#007bff' : value > 100 && value <= 200 ? '#ffc107' : value > 200 && value <= 300 ? '#dc3545' : value > 300 ? '#343a40' : 'purple');

      var color = Chart.helpers.color;
      var UserVsMyAppsData = {
          labels: ["PM10", "SO2", "CO", "O3", "NO2"],
          datasets: [{
              label: '# DATA',
              backgroundColor: colours,
              borderColor: colours,
              borderWidth: 1,
              data: data
          }]
   
      };
   
      var UserVsMyAppsCtx = document.getElementById('SIMPANG_TIGA').getContext('2d');
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
                  }
                }],
                xAxes: [{
                  ticks: {
                    fontSize: 14
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
        <?php foreach($this->b_aqms_m->get_aqmispu_chart('MERAK') as $merak) : ?>
          <?= $merak['pm10'] > '350' ? '350' : $merak['pm10'] ?>,
          <?= $merak['so2'] > '350' ? '350' : $merak['so2'] ?>,
          <?= $merak['co'] > '350' ? '350' : $merak['co'] ?>,
          <?= $merak['o3'] > '350' ? '350' : $merak['o3'] ?>,
          <?= $merak['no2'] > '350' ? '350' : $merak['no2'] ?>
        <?php endforeach ?>
      ];
      const colours = data.map((value) => value > 0 && value <= 50 ? '#28a745' : value > 50 && value <= 100 ? '#007bff' : value > 100 && value <= 200 ? '#ffc107' : value > 200 && value <= 300 ? '#dc3545' : value > 300 ? '#343a40' : 'purple');

      var color = Chart.helpers.color;
      var UserVsMyAppsData = {
          labels: ["PM10", "SO2", "CO", "O3", "NO2"],
          datasets: [{
              label: '# ISPU',
              backgroundColor: colours,
              borderColor: colours,
              borderWidth: 1,
              data: data
          }]
   
      };
   
      var UserVsMyAppsCtx = document.getElementById('MERAK').getContext('2d');
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
                  }
                }],
                xAxes: [{
                  ticks: {
                    fontSize: 14
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
        <?php foreach($this->b_aqms_m->get_aqmispu_chart('CIWANDAN') as $ciwandan) : ?>
          <?= $ciwandan['pm10'] > '350' ? '350' : $ciwandan['pm10'] ?>,
          <?= $ciwandan['so2'] > '350' ? '350' : $ciwandan['so2'] ?>,
          <?= $ciwandan['co'] > '350' ? '350' : $ciwandan['co'] ?>,
          <?= $ciwandan['o3'] > '350' ? '350' : $ciwandan['o3'] ?>,
          <?= $ciwandan['no2'] > '350' ? '350' : $ciwandan['no2'] ?>
        <?php endforeach ?>
      ];
      const colours = data.map((value) => value > 0 && value <= 50 ? '#28a745' : value > 50 && value <= 100 ? '#007bff' : value > 100 && value <= 200 ? '#ffc107' : value > 200 && value <= 300 ? '#dc3545' : value > 300 ? '#343a40' : 'purple');

      var color = Chart.helpers.color;
      var UserVsMyAppsData = {
          labels: ["PM10", "SO2", "CO", "O3", "NO2"],
          datasets: [{
              label: '# DATA',
              backgroundColor: colours,
              borderColor: colours,
              borderWidth: 1,
              data: data
          }]
   
      };
   
      var UserVsMyAppsCtx = document.getElementById('CIWANDAN').getContext('2d');
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
                  }
                }],
                xAxes: [{
                  ticks: {
                    fontSize: 14
                  }
                }]
              }
          }
      });
    });
  </script>