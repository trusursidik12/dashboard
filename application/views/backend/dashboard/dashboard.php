<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= $title_header; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php foreach($aqmstasiun as $stasiun) : ?>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $this->fungsi->count_aqmdata($stasiun['id_stasiun']) ?></h3>

                  <p>KLHK-<?= $stasiun['id_stasiun'] ?></p>
                </div>
                <div class="icon">
                  <i class="ion">
                  <img src="<?= base_url('assets/backend/img/dashboard/station.png') ?>"></i>
                </div>
                <a href="<?= site_url('aqmdata/'.$stasiun['id_stasiun']) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->