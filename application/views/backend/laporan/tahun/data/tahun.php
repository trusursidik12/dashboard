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
                <form class="form-inline"  method="post" action="<?= site_url('laporan/data/tahun') ?>">
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
                    <label for="fromdate">&emsp;TAHUN : &nbsp;</label>
                    <select name="tahun" class="form-control" required>
                      <option value="" selected>-- Pilih Tahun --</option>
                      <option value="2015">Tahun 2015</option>
                      <option value="2016">Tahun 2016</option>
                      <option value="2017">Tahun 2017</option>
                      <option value="2018">Tahun 2018</option>
                      <option value="2019">Tahun 2019</option>
                      <option value="2020">Tahun 2020</option>
                      <option value="2021">Tahun 2021</option>
                      <option value="2022">Tahun 2022</option>
                      <option value="2023">Tahun 2023</option>
                    </select>
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
                  <h2 class="text-center">LAPORAN TAHUNAN<br>
                    Data Monitoring di Stasiun Pemantau</h2>

                    <div class="row">
                      <div class="col-6">
                        <table border="1" class="table table-bordered table-striped text-center" width="100%">
                          <tbody>
                            <tr>
                              <td>Tahun</td>
                              <td>:</td>
                              <td>
                                  <?php foreach($aqmdatayear as $tanggal) : ?>
                                      <?= date('Y', strtotime($tanggal['waktu'])) ?>
                                    <?php break; ?>
                                  <?php endforeach ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Kota</td>
                              <td>:</td>
                              <td>
                                <?php foreach($idstasiun as $idkota) : ?>
                                  <?php foreach($aqmdatayear as $kota) : ?>
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
                                <?php foreach($aqmdatayear as $kota) : ?>
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

              <?php if(empty($aqmdatayear)) : ?>

                <table class="table table-bordered table-striped text-center" width="100%">
                    <tr>
                      <td>DATA TIDAK DITEMUKAN</td>
                    </tr>
                </table>

              <?php else : ?>
                <?php $bln = '12'; ?>
                <?php for($m=1; $m<=$bln;$m++) : ?>

                  <div class="row">
                    <div class="col-2">
                      <table class="table table-bordered table-striped text-center" width="100%">
                        <tr>
                          <td>Parameter</td>
                          <td>:</td>
                          <td><b><?= strtoupper($params) ?></b></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-2">
                      <table class="table table-bordered table-striped text-center" width="100%">
                        <tr>
                          <td>Bulan</td>
                          <td>:</td>
                          <td><b><?= date("F", mktime(0, 0, 0, $m, 10)); ?></b></td>
                        </tr>
                      </table>
                    </div>
                  </div>

                  <table border="1" class="table table-bordered table-striped text-center" width="100%">
                    <tr>
                      <th rowspan="2" style="padding-top: 40px;"><b>WAKTU</b></th>
                      <th colspan="<?= $bulan[$m] ?>"><b>Hari Ke</b></th>
                    </tr>
                    <tr>
                      <?php for($x=1;$x<=$bulan[$m];$x++): ?>
                          <td><?=$x;?></td>
                      <?php endfor ?>
                    </tr>
                    <?php for($x=0;$x<count($jam);$x++): ?>
                      <tr>
                        <td><?=$jam[$x];?></td>
                        <?php for($y=1;$y<=$bulan[$m];$y++): ?>
                          <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                            <?php $idx = date('Y-0'.$m.'-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT)." ".$jam[$x]; ?>
                              <td><?=empty($nilai[$idx]) ? '' : $nilai[$idx];?></td>
                          <?php endif ?>
                        <?php endfor ?>
                      </tr>
                    <?php endfor ?>
                    <tr>
                      <td>Min</td>
                      <?php for($y=1;$y<=$bulan[$m];$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-0'.$m.'-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT); ?>
                            <td><?=empty($min[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)]) ? '' : $min[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)];?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                    <tr>
                      <td>Mean</td>
                      <?php for($y=1;$y<=$bulan[$m];$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-0'.$m.'-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT); ?>
                            <td><?=empty($total[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)]) ? '' : round($total[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)] / 48);?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                    <tr>
                      <td>Max</td>
                      <?php for($y=1;$y<=$bulan[$m];$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-0'.$m.'-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT); ?>
                            <td><?=empty($min[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)]) ? '' : $min[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)];?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                    <tr>
                      <td>P95</td>
                      <?php for($y=1;$y<=$bulan[$m];$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-0'.$m.'-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT); ?>
                            <td><?=empty($extdata[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)]) ? '' : round((100-((48 - $extdata[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)])/$extdata[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)]*100))*100/95, 2);?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                    <tr>
                      <td>P98</td>
                      <?php for($y=1;$y<=$bulan[$m];$y++): ?>
                        <?php if($tanggal[$params] != '-1' && $tanggal[$params] != null) : ?>
                          <?php $idx = date('Y-0'.$m.'-', strtotime($tanggal['waktu'])).str_pad($y,2,'0',STR_PAD_LEFT); ?>
                            <td><?=empty($extdata[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)]) ? '' : round((100-((48 - $extdata[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)])/$extdata[str_pad($m,2,'0',STR_PAD_LEFT)][str_pad($y,2,'0',STR_PAD_LEFT)]*100))*100/98, 2);?></td>
                        <?php endif ?>
                      <?php endfor ?>
                    </tr>
                  </table>

                <?php endfor ?>

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
<!-- /.content-wrapper -->