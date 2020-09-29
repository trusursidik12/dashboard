<?php if($this->fungsi->user_login()->usr_cty_id != '8') : ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-sm">
            <!-- general form elements -->
            <div class="card card-light">
              <div class="row p-3">
                <div class="col-sm-12 p-3">
                <h3 class="card-title">404 Page Not Found</h3>
                <hr style="margin-top: 30px; margin-bottom: 0px;">
              </div>
                <div class="col-sm-12 p-3">
                <h3 class="card-title">The page you requested was not found. <a href="javascript:history.go(-1)" type="button" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i>Back</a></h3>
              </div>
              </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php else : ?>
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
        <?php foreach($aqmstasiunmtr as $stasiun) : ?>
          <?php foreach($aqmdata as $data) : ?>
            <?php $date = date('Y-m-d H:i:s', strtotime($data['waktu']) + 60*60) ?>
            <?php if($stasiun['id_stasiun'] == $data['id_stasiun'] && $date < date('Y-m-d H:i:s')) : ?>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
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
                  <a href="<?= site_url('monitoring/aqmdata/'.$stasiun['id_stasiun']) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <?php endif ?>            
          <?php endforeach ?>
        <?php endforeach ?>
      </div>

      <div class="row">
        <?php foreach($aqmstasiunmtr as $stasiun) : ?>
          <?php foreach($aqmdata as $data) : ?>
            <?php if($stasiun['id_stasiun'] == $data['id_stasiun'] && $data['wd'] == '0' && $data['humidity'] == '0' && $data['temperature'] == '0' && $data['pressure'] == '0') : ?>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
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
                  <a href="<?= site_url('monitoring/aqmdata/'.$stasiun['id_stasiun']) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        <?php endforeach ?>
      </div>

      <div class="row">
        <?php foreach($aqmstasiunmtr as $stasiun) : ?>
          <?php foreach($aqmdata as $data) : ?>
            <?php $date = date('Y-m-d H:i:s', strtotime($data['waktu']) + 60*60) ?>
            <?php if($stasiun['id_stasiun'] == $data['id_stasiun'] && $date >= date('Y-m-d H:i:s')) : ?>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
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
                  <a href="<?= site_url('monitoring/aqmdata/'.$stasiun['id_stasiun']) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        <?php endforeach ?>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php endif ?>