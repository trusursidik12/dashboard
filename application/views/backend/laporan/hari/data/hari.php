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
                <form class="form-inline"  method="post" action="<?= site_url('laporan/data/hari') ?>">
                  <div class="form-group">
                    <label for="fromdate">&emsp;ID STASIUN : &nbsp;</label>
                    <select name="idstasiun" class="form-control" required>
                      <option value="" selected>-- Pilih Id Stasiun --</option>
                      <?php foreach($idstasiun as $seletidstasiun) : ?>
                        <option value="<?= $seletidstasiun['id_stasiun'] ?>"><?= $seletidstasiun['id_stasiun'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="fromdate">&emsp;TANGGAL : &nbsp;</label>
                    <input type="date"  name="hari" value="<?= date('Y-m-d') ?>" class="form-control"  placeholder="FROM DATE" required>
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
                  <h2 class="text-center">LAPORAN HARIAN<br>
                    Data Monitoring di Stasiun Pemantau</h2>

                    <div class="row">
                      <div class="col-6">
                        <table border="1" class="table table-bordered table-striped text-center" width="100%">
                          <tbody>
                            <tr>
                              <td>Tanggal</td>
                              <td>:</td>
                              <td>
                                  <?php foreach($aqmdataday as $tanggal) : ?>
                                      <?= date('d F Y', strtotime($tanggal['waktu'])) ?>
                                    <?php break; ?>
                                  <?php endforeach ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Kota</td>
                              <td>:</td>
                              <td>
                                <?php foreach($idstasiun as $idkota) : ?>
                                  <?php foreach($aqmdataday as $kota) : ?>
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
                                <?php foreach($aqmdataday as $kota) : ?>
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

              <?php if(empty($aqmdataday)) : ?>
                <table class="table table-bordered table-striped text-center" width="100%">
                    <tr>
                      <td>DATA TIDAK DITEMUKAN</td>
                    </tr>
                </table>
              <?php else : ?>
                <table class="table table-bordered table-striped text-center" width="100%">
                  <thead>
                    <?php foreach($aqmdataday as $dataharian) : ?>
                      <tr class="text-center">                        
                        <th class="text-center" width="200">WAKTU</th>
                        <?php if($dataharian['pm10'] != null) {
                          echo "<th>PM10</th>";
                        } ?>
                        <?php if($dataharian['pm25'] != '-1' && $dataharian['pm25'] != null) {
                          echo "<th>PM2.5</th>";
                        } ?>
                        <?php if($dataharian['so2'] != null) {
                          echo "<th>SO2</th>";
                        } ?>
                        <?php if($dataharian['co'] != null) {
                          echo "<th>CO</th>";
                        } ?>
                        <?php if($dataharian['o3'] != null) {
                          echo "<th>O3</th>";
                        } ?>
                        <?php if($dataharian['no2'] != null) {
                          echo "<th>NO2</th>";
                        } ?>
                        <?php if($dataharian['voc'] != '-1' && $dataharian['voc'] != null) {
                          echo "<th>VOC</th>";
                        } ?>
                        <?php if($dataharian['id_stasiun'] == 'SKH_RUM' || $dataharian['id_stasiun'] == 'SKH_GUPIT' || $dataharian['id_stasiun'] == 'SKH_PLESAN' || $dataharian['id_stasiun'] == 'CEMS_RUM') {
                          echo "<th>H2S</th>";
                        } ?>
                        <?php if($dataharian['id_stasiun'] == 'SKH_RUM' || $dataharian['id_stasiun'] == 'SKH_GUPIT' || $dataharian['id_stasiun'] == 'SKH_PLESAN' || $dataharian['id_stasiun'] == 'CEMS_RUM') {
                          echo "<th>CS2</th>";
                        } ?>
                      </tr>
                      <?php break; ?>
                    <?php endforeach ?>
                  </thead>
                  <tbody>
                    <?php foreach($aqmdataday as $dataharian) : ?>
                      <tr class="text-center">                        
                        <td class="text-center"><?= date('H:i', strtotime($dataharian['waktu'])) ?></td>
                        <?php if($dataharian['pm10'] != null) {
                          echo "<td>".$dataharian['pm10']."</td>";
                        } ?>
                        <?php if($dataharian['pm25'] != '-1' && $dataharian['pm25'] != null) {
                          echo "<td>".$dataharian['pm25']."</td>";
                        } ?>
                        <?php if($dataharian['so2'] != null) {
                          echo "<td>".$dataharian['so2']."</td>";
                        } ?>
                        <?php if($dataharian['co'] != null) {
                          echo "<td>".$dataharian['co']."</td>";
                        } ?>
                        <?php if($dataharian['o3'] != null) {
                          echo "<td>".$dataharian['o3']."</td>";
                        } ?>
                        <?php if($dataharian['no2'] != null) {
                          echo "<td>".$dataharian['no2']."</td>";
                        } ?>
                        <?php if($dataharian['voc'] != '-1' && $dataharian['voc'] != null) {
                          echo "<td>".$dataharian['voc']."</td>";
                        } ?>
                        <?php if($dataharian['id_stasiun'] == 'SKH_RUM' || $dataharian['id_stasiun'] == 'SKH_GUPIT' || $dataharian['id_stasiun'] == 'SKH_PLESAN' || $dataharian['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".$dataharian['h2s']."</td>";
                        } ?>
                        <?php if($dataharian['id_stasiun'] == 'SKH_RUM' || $dataharian['id_stasiun'] == 'SKH_GUPIT' || $dataharian['id_stasiun'] == 'SKH_PLESAN' || $dataharian['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".$dataharian['cs2']."</td>";
                        } ?>
                      </tr>
                    <?php endforeach ?>
                    <?php foreach($aqmdataday as $dataharianminpm10) : ?>
                      <tr>
                        <td>Min</td>
                        <?php if($dataharianminpm10['pm10'] != null) {
                          echo "<td>".$minpm10."</td>";
                        } ?>
                        <?php if($dataharianminpm10['pm25'] != '-1' && $dataharianminpm10['pm25'] != null) {
                          echo "<td>".$minpm25."</td>";
                        } ?>
                        <?php if($dataharianminpm10['so2'] != null) {
                          echo "<td>".$minso2."</td>";
                        } ?>
                        <?php if($dataharianminpm10['co'] != null) {
                          echo "<td>".$minco."</td>";
                        } ?>
                        <?php if($dataharianminpm10['o3'] != null) {
                          echo "<td>".$mino3."</td>";
                        } ?>
                        <?php if($dataharianminpm10['no2'] != null) {
                          echo "<td>".$minno2."</td>";
                        } ?>
                        <?php if($dataharianminpm10['pm25'] != '-1' && $dataharianminpm10['voc'] != null) {
                          echo "<td>".$minvoc."</td>";
                        } ?>
                        <?php if($dataharianminpm10['id_stasiun'] == 'SKH_RUM' || $dataharianminpm10['id_stasiun'] == 'SKH_GUPIT' || $dataharianminpm10['id_stasiun'] == 'SKH_PLESAN' || $dataharianminpm10['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".$minh2s."</td>";
                        } ?>
                        <?php if($dataharianminpm10['id_stasiun'] == 'SKH_RUM' || $dataharianminpm10['id_stasiun'] == 'SKH_GUPIT' || $dataharianminpm10['id_stasiun'] == 'SKH_PLESAN' || $dataharianminpm10['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".$mincs2."</td>";
                        } ?>
                      </tr>
                      <?php break ?>
                    <?php endforeach ?>
                    <?php foreach($aqmdataday as $dataharianavgpm10) : ?>
                      <tr>
                        <td>Mean</td>
                        <?php if($dataharianavgpm10['pm10'] != null) {
                          echo "<td>".round($sumpm10/48, 0)."</td>";
                        } ?>
                        <?php if($dataharianavgpm10['pm25'] != '-1' && $dataharianavgpm10['pm25'] != null) {
                          echo "<td>".round($sumpm25/48, 0)."</td>";
                        } ?>
                        <?php if($dataharianavgpm10['so2'] != null) {
                          echo "<td>".round($sumso2/48, 0)."</td>";
                        } ?>
                        <?php if($dataharianavgpm10['co'] != null) {
                          echo "<td>".round($sumco/48, 0)."</td>";
                        } ?>
                        <?php if($dataharianavgpm10['o3'] != null) {
                          echo "<td>".round($sumo3/48, 0)."</td>";
                        } ?>
                        <?php if($dataharianavgpm10['no2'] != null) {
                          echo "<td>".round($sumno2/48, 0)."</td>";
                        } ?>
                        <?php if($dataharianavgpm10['voc'] != '-1' && $dataharianavgpm10['voc'] != null) {
                          echo "<td>".round($sumvoc/48, 0)."</td>";
                        } ?>
                        <?php if($dataharianavgpm10['id_stasiun'] == 'SKH_RUM' || $dataharianavgpm10['id_stasiun'] == 'SKH_GUPIT' || $dataharianavgpm10['id_stasiun'] == 'SKH_PLESAN' || $dataharianavgpm10['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".round($sumh2s/48, 0)."</td>";
                        } ?>
                        <?php if($dataharianavgpm10['id_stasiun'] == 'SKH_RUM' || $dataharianavgpm10['id_stasiun'] == 'SKH_GUPIT' || $dataharianavgpm10['id_stasiun'] == 'SKH_PLESAN' || $dataharianavgpm10['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".round($sumcs2/48, 0)."</td>";
                        } ?>
                      </tr>
                      <?php break ?>
                    <?php endforeach ?>
                    <?php foreach($aqmdataday as $dataharianmaxpm10) : ?>
                      <tr>
                        <td>Max</td>
                        <?php if($dataharianmaxpm10['pm10'] != null) {
                          echo "<td>".$maxpm10."</td>";
                        } ?>
                        <?php if($dataharianmaxpm10['pm25'] != '-1' && $dataharianmaxpm10['pm25'] != null) {
                          echo "<td>".$maxpm25."</td>";
                        } ?>
                        <?php if($dataharianmaxpm10['so2'] != null) {
                          echo "<td>".$maxso2."</td>";
                        } ?>
                        <?php if($dataharianmaxpm10['co'] != null) {
                          echo "<td>".$maxco."</td>";
                        } ?>
                        <?php if($dataharianmaxpm10['o3'] != null) {
                          echo "<td>".$maxo3."</td>";
                        } ?>
                        <?php if($dataharianmaxpm10['no2'] != null) {
                          echo "<td>".$maxno2."</td>";
                        } ?>
                        <?php if($dataharianmaxpm10['voc'] != '-1' && $dataharianmaxpm10['voc'] != null) {
                          echo "<td>".$maxvoc."</td>";
                        } ?>
                        <?php if($dataharianmaxpm10['id_stasiun'] == 'SKH_RUM' || $dataharianmaxpm10['id_stasiun'] == 'SKH_GUPIT' || $dataharianmaxpm10['id_stasiun'] == 'SKH_PLESAN' || $dataharianmaxpm10['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".$maxh2s."</td>";
                        } ?>
                        <?php if($dataharianmaxpm10['id_stasiun'] == 'SKH_RUM' || $dataharianmaxpm10['id_stasiun'] == 'SKH_GUPIT' || $dataharianmaxpm10['id_stasiun'] == 'SKH_PLESAN' || $dataharianmaxpm10['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".$maxcs2."</td>";
                        } ?>
                      </tr>
                      <?php break ?>
                    <?php endforeach ?>
                    <?php foreach($aqmdataday as $dataharianp95pm10) : ?>
                      <tr>
                        <td>P95</td>
                        <?php if($dataharianp95pm10['pm10'] != null) {
                          echo "<td>".round((100-((48-$countpm10)/$countpm10*100))*100/95, 2)."</td>";
                        } ?>
                        <?php if($dataharianp95pm10['pm25'] != '-1' && $dataharianp95pm10['pm25'] != null) {
                          echo "<td>".round((100-((48-$countpm25)/$countpm25*100))*100/95, 2)."</td>";
                        } ?>
                        <?php if($dataharianp95pm10['so2'] != null) {
                          echo "<td>".round((100-((48-$countso2)/$countso2*100))*100/95, 2)."</td>";
                        } ?>
                        <?php if($dataharianp95pm10['co'] != null) {
                          echo "<td>".round((100-((48-$countco)/$countco*100))*100/95, 2)."</td>";
                        } ?>
                        <?php if($dataharianp95pm10['o3'] != null) {
                          echo "<td>".round((100-((48-$counto3)/$counto3*100))*100/95, 2)."</td>";
                        } ?>
                        <?php if($dataharianp95pm10['no2'] != null) {
                          echo "<td>".round((100-((48-$countno2)/$countno2*100))*100/95, 2)."</td>";
                        } ?>
                        <?php if($dataharianp95pm10['voc'] != '-1' && $dataharianp95pm10['voc'] != null) {
                          echo "<td>".round((100-((48-$countvoc)/$countvoc*100))*100/95, 2)."</td>";
                        } ?>
                        <?php if($dataharianp95pm10['id_stasiun'] == 'SKH_RUM' || $dataharianp95pm10['id_stasiun'] == 'SKH_GUPIT' || $dataharianp95pm10['id_stasiun'] == 'SKH_PLESAN' || $dataharianp95pm10['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".round((100-((48-$counth2s)/$counth2s*100))*100/95, 2)."</td>";
                        } ?>
                        <?php if($dataharianp95pm10['id_stasiun'] == 'SKH_RUM' || $dataharianp95pm10['id_stasiun'] == 'SKH_GUPIT' || $dataharianp95pm10['id_stasiun'] == 'SKH_PLESAN' || $dataharianp95pm10['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".round((100-((48-$countcs2)/$countcs2*100))*100/95, 2)."</td>";
                        } ?>
                      </tr>
                      <?php break ?>
                    <?php endforeach ?>
                    <?php foreach($aqmdataday as $dataharianp98pm10) : ?>
                      <tr>
                        <td>P98</td>
                        <?php if($dataharianp98pm10['pm10'] != null) {
                          echo "<td>".round((100-((48-$countpm10)/$countpm10*100))*100/98, 2)."</td>";
                        } ?>
                        <?php if($dataharianp98pm10['pm25'] != '-1' && $dataharianp98pm10['pm25'] != null) {
                          echo "<td>".round((100-((48-$countpm25)/$countpm25*100))*100/98, 2)."</td>";
                        } ?>
                        <?php if($dataharianp98pm10['so2'] != null) {
                          echo "<td>".round((100-((48-$countso2)/$countso2*100))*100/98, 2)."</td>";
                        } ?>
                        <?php if($dataharianp98pm10['co'] != null) {
                          echo "<td>".round((100-((48-$countco)/$countco*100))*100/98, 2)."</td>";
                        } ?>
                        <?php if($dataharianp98pm10['o3'] != null) {
                          echo "<td>".round((100-((48-$counto3)/$counto3*100))*100/98, 2)."</td>";
                        } ?>
                        <?php if($dataharianp98pm10['no2'] != null) {
                          echo "<td>".round((100-((48-$countno2)/$countno2*100))*100/98, 2)."</td>";
                        } ?>
                        <?php if($dataharianp98pm10['voc'] != '-1' && $dataharianp98pm10['voc'] != null) {
                          echo "<td>".round((100-((48-$countvoc)/$countvoc*100))*100/98, 2)."</td>";
                        } ?>
                        <?php if($dataharianp98pm10['id_stasiun'] == 'SKH_RUM' || $dataharianp98pm10['id_stasiun'] == 'SKH_GUPIT' || $dataharianp98pm10['id_stasiun'] == 'SKH_PLESAN' || $dataharianp98pm10['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".round((100-((48-$counth2s)/$counth2s*100))*100/98, 2)."</td>";
                        } ?>
                        <?php if($dataharianp98pm10['id_stasiun'] == 'SKH_RUM' || $dataharianp98pm10['id_stasiun'] == 'SKH_GUPIT' || $dataharianp98pm10['id_stasiun'] == 'SKH_PLESAN' || $dataharianp98pm10['id_stasiun'] == 'CEMS_RUM') {
                          echo "<td>".round((100-((48-$countcs2)/$countcs2*100))*100/98, 2)."</td>";
                        } ?>
                      </tr>
                      <?php break ?>
                    <?php endforeach ?>
                  </tbody>
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
<!-- /.content-wrapper -->