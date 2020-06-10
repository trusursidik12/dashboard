<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="card-title">
              <a href="<?= site_url() ?>" ><button type="button" class="btn btn-block btn-primary"><i class="fas fa-th"></i> <?= $controllers; ?></button></a>
            </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?= $title_header ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <div class="row">
              <div class="col-md-10 col-md-offset-2">
                <form class="form-inline"  method="post" action="<?= site_url('laporan/data/bulan') ?>">
                  <div class="form-group">
                    <label for="fromdate">&emsp;ID STASIUN : &nbsp;</label>
                    <select name="idstasiun" class="form-control" required>
                      <option value="" selected>-- Pilih Id Stasiun --</option>
                      <?php if($this->fungsi->user_login()->usr_cty_id == '10') : ?>
                        <option value="CEMS_RUM" > CEMS_RUM </option>
                      <?php else : ?>
                        <?php foreach($idstasiun as $seletidstasiun) : ?>
                          <option value="<?= $seletidstasiun['id_stasiun'] ?>"><?= $seletidstasiun['id_stasiun'] ?></option>
                        <?php endforeach ?>
                      <?php endif ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="fromdate">&emsp;BULAN : &nbsp;</label>
                    <input type="month"  name="bulan" value="<?= date('Y-m') ?>" class="form-control"  placeholder="FROM DATE" required>
                  </div>
                  <div class="form-group">
                    <label for="fromdate">&emsp;PARAMETER : &nbsp;</label>
                    <select name="parameter" class="form-control" required>
                      <option value="" selected>-- Pilih Parameter --</option>
                      <?php if($this->fungsi->user_login()->usr_cty_id == '3') : ?>
                        <option value="pm10"> PM10 </option>
                        <option value="pm25"> PM25 </option>
                        <option value="so2"> SO2 </option>
                        <option value="co"> CO </option>
                        <option value="o3"> O3 </option>
                        <option value="no2"> NO2 </option>
                        <option value="voc"> VOC </option>
                      <?php else : ?>
                        <option value="h2s"> H2S </option>
                        <option value="cs2"> CS2 </option>
                      <?php endif ?>
                    </select>
                  </div>
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                      &emsp;<button type="submit" name="submit" class="btn btn-primary">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
                      </h3>&nbsp;&nbsp;&nbsp;<a href="#" onclick="printContent()" class="btn btn-info" type="button"><i class="fa fa-print" style="color: white"> Print</i></a>
                  </div>
                 </form> 
              </div>
            </div>

            <div id="cetak">

              <div class="row" style="margin-top: 50px;">
                <div class="col-2 text-center">
                  <img src="<?= base_url('assets/backend/img/report/klhk.png') ?>">
                </div>
                <div class="col-8">
                  <h2 class="text-center">LAPORAN BULANAN<br>
                    Data Monitoring di Stasiun Pemantau</h2>

                    <div class="row">
                      <div class="col-6">
                        <table border="1" class="table table-bordered table-striped text-center" width="100%">
                          <tbody>
                            <tr>
                              <td>bulan</td>
                              <td>:</td>
                              <td>
                                  <?php foreach($aqmdatamont as $tanggal) : ?>
                                      <?= date('F Y', strtotime($tanggal['waktu'])) ?>
                                    <?php break; ?>
                                  <?php endforeach ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Kota</td>
                              <td>:</td>
                              <td>
                                <?php foreach($idstasiun as $idkota) : ?>
                                  <?php foreach($aqmdatamont as $kota) : ?>
                                    <?php if($idkota['id_stasiun'] == $kota['id_stasiun']) : ?>
                                      <?= $idkota['kota'] ?>
                                    <?php endif ?>
                                    <?php break; ?>
                                  <?php endforeach ?>
                                <?php endforeach ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>                        
                      </div>
                      <div class="col-6">
                        <table border="1" class="table table-bordered table-striped text-center">
                          <tr>
                            <td>Stasiun</td>
                            <td>:</td>
                            <td>
                              <?php foreach($idstasiun as $idkota) : ?>
                                <?php foreach($aqmdatamont as $kota) : ?>
                                  <?php if($idkota['id_stasiun'] == $kota['id_stasiun']) : ?>
                                    <?= $idkota['nama'] ?>
                                  <?php endif ?>
                                  <?php break; ?>
                                <?php endforeach ?>
                              <?php endforeach ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Satuan Data</td>
                            <td>:</td>
                            <td>µg/m³</td>
                          </tr>
                        </table>                        
                      </div>
                    </div>
                </div>
                <div class="col-2 text-center">
                  <img src="<?= base_url('assets/backend/img/report/biru.png') ?>">
                </div>
              </div>

              <div class="row">
                <div class="col-2">
                  <table class="table table-bordered table-striped text-center" width="100%">
                    <?php if(!empty($aqmdatamont)) : ?>
                      <tr>
                        <td>Parameter</td>
                        <td>:</td>
                        <td><b><?= strtoupper($params) ?></b></td>
                      </tr>
                    <?php endif ?>
                  </table>
                </div>
              </div>

              <?php if(empty($aqmdatamont)) : ?>
                <table class="table table-bordered table-striped text-center" width="100%">
                  <tr>
                    <td>DATA TIDAK DITEMUKAN</td>
                  </tr>
                </table>
              <?php else : ?>
                <table border="1" class="table table-bordered table-striped text-center" width="100%">
                  <tr>
                    <th rowspan="2" style="padding-top: 40px;"><b>WAKTU</b></th>
                    <th colspan="<?= $tgl ?>"><b>Hari Ke</b></th>
                  </tr>
                  <tr>
                    <?php for($x=1;$x<=$tgl;$x++): ?>
                        <td><?=$x;?></td>
                    <?php endfor ?>
                  </tr>
                  <?php for($x=0;$x<count($jam);$x++): ?>
                    <tr>
                      <td><?=$jam[$x];?></td>
                      <?php for($y=1;$y<=$tgl;$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-m-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT)." ".$jam[$x]; ?>
                            <td><?=empty($nilai[$idx]) ? '' : $nilai[$idx];?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                  <?php endfor ?>
                    <tr>
                      <td>Min</td>
                      <?php for($y=1;$y<=$tgl;$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-m-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT); ?>
                            <td><?=empty($min[$idx]) ? '' : $min[$idx];?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                    <tr>
                      <td>Mean</td>
                      <?php for($y=1;$y<=$tgl;$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-m-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT); ?>
                            <td><?=empty($total[$idx]) ? '' : round($total[$idx] / 48);?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                    <tr>
                      <td>Max</td>
                      <?php for($y=1;$y<=$tgl;$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-m-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT); ?>
                            <td><?=empty($max[$idx]) ? '' : $max[$idx];?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                    <tr>
                      <td>P95</td>
                      <?php for($y=1;$y<=$tgl;$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-m-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT); ?>
                            <td><?=empty($extdata[$idx]) ? '' : round((100-((48 - $extdata[$idx])/$extdata[$idx]*100))*100/95, 2);?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                    <tr>
                      <td>P98</td>
                      <?php for($y=1;$y<=$tgl;$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-m-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT); ?>
                            <td><?=empty($extdata[$idx]) ? '' : round((100-((48 - $extdata[$idx])/$extdata[$idx]*100))*100/98, 2);?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                </table>
              <?php endif ?>

            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper