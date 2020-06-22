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
            <h3 class="card-title"><?= empty($title_header) ? 'Laporan ISPU Bulanan' : ''.$title_header ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <div class="row">
              <div class="col-md-10 col-md-offset-2">
                <form class="form-inline"  method="post" action="<?= site_url('laporan/ispu/bulan') ?>">
                  <div class="form-group">
                    <label for="fromdate">&emsp;ID STASIUN : &nbsp;</label>
                    <select name="idstasiun" class="form-control" required>
                        <option value="" selected>-- Pilih Id Stasiun --</option>
                      <?php foreach($idstasiun as $seletidstasiun) : ?>
                        <option value="<?= $seletidstasiun['id_stasiun'] ?>"><?= $seletidstasiun['id_stasiun'] ?></option>
                      <?php endforeach ?>
                      <?php if($this->fungsi->user_login()->usr_cty_id == '3') : ?>
                        <?php foreach($idstasiunkiec as $kiec) : ?>
                          <option value="<?= $kiec['id_stasiun'] ?>"><?= $kiec['id_stasiun'] ?></option>
                        <?php endforeach ?>
                      <?php endif ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="fromdate">&emsp;BULAN : &nbsp;</label>
                    <input type="month"  name="bulan" value="<?= date('Y-m') ?>" class="form-control"  placeholder="FROM DATE" required>
                  </div>
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                      &emsp;<button type="submit" name="submit" class="btn btn-primary">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
                      </h3>&nbsp;&nbsp;&nbsp;<a href="#" <?php if(empty($maxispu)) { echo 'onclick="return confirm('."'Silakan Pilih ID Stasiun Dan Tanggal Terlebih Dahulu'".')"'; }else{ echo 'onclick="printContent()"';} ?> class="btn btn-info" type="button"><i class="fa fa-print" style="color: white"> Print</i></a>
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
                  <h3 class="text-center">INDEX STANDAR PENCEMARAN UDARA (ISPU)<br>POLLUTANT STANDARD INDEX (PSI)</h3>

                    <div class="row">
                      <div class="col-12">
                        <table border="1" class="table table-bordered table-striped text-center" width="100%">
                          <tbody>
                            <tr>
                              <td>
                                <?php if(empty($maxispu)) : ?>
                                  <?= "<b>Nama Stasiun</b>" ?>
                                <?php else : ?>
                                  <?php foreach($idstasiun as $idkota) : ?>
                                    <?php foreach($maxispu as $kota) : ?>
                                      <?php if($idkota['id_stasiun'] == $kota['id_stasiun']) : ?>
                                        <?= '<b>'.$idkota['nama'].'</b>' ?>
                                      <?php endif ?>
                                      <?php break; ?>
                                    <?php endforeach ?>
                                  <?php endforeach ?>

                                  <?php if($this->fungsi->user_login()->usr_cty_id == '3') : ?>
                                    <?php foreach($idstasiunkiec as $idkota) : ?>
                                      <?php foreach($maxispu as $kota) : ?>
                                        <?php if($idkota['id_stasiun'] == $kota['id_stasiun']) : ?>
                                          <?= '<b>'.$idkota['nama'].'</b>' ?>
                                        <?php endif ?>
                                        <?php break; ?>
                                      <?php endforeach ?>
                                    <?php endforeach ?>
                                  <?php endif ?>
                                  
                                <?php endif ?>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <?php if(!empty($maxispu)) : ?>
                                  <?php foreach($maxispu as $berlaku) : ?>
                                    <?= date('F Y', strtotime($berlaku['waktu'])) ?>
                                    <?php break ?>
                                  <?php endforeach ?>
                                <?php else : ?>
                                  <?= "Bulan" ?>
                                <?php endif ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>                        
                      </div>
                    </div>
                </div>
                <div class="col-2 text-center">
                  <img src="<?= base_url('assets/backend/img/report/biru.png') ?>">
                </div>
              </div>

              <table class="table table-bordered table-striped text-center" width="100%">
                <thead>
                    <tr class="text-center">
                      <th width='180'>WAKTU</th>
                      <th width='130'>PM10</th>
                      <th width='130'>SO2</th>
                      <th width='130'>CO</th>
                      <th width='130'>O3</th>
                      <th width='130'>NO2</th>
                      <th>Critical&nbsp;Component</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if(empty($maxispu) || $maxispu == null) : ?>
                    <tr>
                      <td colspan="7">DATA TIDAK DITEMUKAN</td>
                    </tr>
                  <?php else : ?>
                    <?php foreach($maxispu as $maxispuparams) : ?>
                      <tr class="text-center">
                        <td class='green'><?= date('d/m/Y', strtotime($maxispuparams['waktu'])) ?></td>
                        <?php if($maxispuparams['pm10'] >= 0 && $maxispuparams['pm10'] <= 50) : ?>
                          <td class='green'><?= $maxispuparams['pm10'] ?></td>
                        <?php elseif($maxispuparams['pm10'] > 50 && $maxispuparams['pm10'] <= 100) : ?>
                          <td class='blue'><?= $maxispuparams['pm10'] ?></td>
                        <?php elseif($maxispuparams['pm10'] > 100 && $maxispuparams['pm10'] <= 199) : ?>
                          <td class='yellow text-dark'><?= $maxispuparams['pm10'] ?></td>
                        <?php elseif($maxispuparams['pm10'] > 199 && $maxispuparams['pm10'] <= 299) : ?>
                          <td class='red'><?= $maxispuparams['pm10'] ?></td>
                        <?php elseif($maxispuparams['pm10'] > 299) : ?>
                          <td class='black'><?= $maxispuparams['pm10'] ?></td>
                        <?php endif ?>
                         <?php if($maxispuparams['so2'] >= 0 && $maxispuparams['so2'] <= 50) : ?>
                          <td class='green'><?= $maxispuparams['so2'] ?></td>
                        <?php elseif($maxispuparams['so2'] > 50 && $maxispuparams['so2'] <= 100) : ?>
                          <td class='blue'><?= $maxispuparams['so2'] ?></td>
                        <?php elseif($maxispuparams['so2'] > 100 && $maxispuparams['so2'] <= 199) : ?>
                          <td class='yellow text-dark'><?= $maxispuparams['so2'] ?></td>
                        <?php elseif($maxispuparams['so2'] > 199 && $maxispuparams['so2'] <= 299) : ?>
                          <td class='red'><?= $maxispuparams['so2'] ?></td>
                        <?php elseif($maxispuparams['so2'] > 299) : ?>
                          <td class='black'><?= $maxispuparams['so2'] ?></td>
                        <?php endif ?>
                         <?php if($maxispuparams['co'] >= 0 && $maxispuparams['co'] <= 50) : ?>
                          <td class='green'><?= $maxispuparams['co'] ?></td>
                        <?php elseif($maxispuparams['co'] > 50 && $maxispuparams['co'] <= 100) : ?>
                          <td class='blue'><?= $maxispuparams['co'] ?></td>
                        <?php elseif($maxispuparams['co'] > 100 && $maxispuparams['co'] <= 199) : ?>
                          <td class='yellow text-dark'><?= $maxispuparams['co'] ?></td>
                        <?php elseif($maxispuparams['co'] > 199 && $maxispuparams['co'] <= 299) : ?>
                          <td class='red'><?= $maxispuparams['co'] ?></td>
                        <?php elseif($maxispuparams['co'] > 299) : ?>
                          <td class='black'><?= $maxispuparams['co'] ?></td>
                        <?php endif ?>
                         <?php if($maxispuparams['o3'] >= 0 && $maxispuparams['o3'] <= 50) : ?>
                          <td class='green'><?= $maxispuparams['o3'] ?></td>
                        <?php elseif($maxispuparams['o3'] > 50 && $maxispuparams['o3'] <= 100) : ?>
                          <td class='blue'><?= $maxispuparams['o3'] ?></td>
                        <?php elseif($maxispuparams['o3'] > 100 && $maxispuparams['o3'] <= 199) : ?>
                          <td class='yellow text-dark'><?= $maxispuparams['o3'] ?></td>
                        <?php elseif($maxispuparams['o3'] > 199 && $maxispuparams['o3'] <= 299) : ?>
                          <td class='red'><?= $maxispuparams['o3'] ?></td>
                        <?php elseif($maxispuparams['o3'] > 299) : ?>
                          <td class='black'><?= $maxispuparams['o3'] ?></td>
                        <?php endif ?>
                         <?php if($maxispuparams['no2'] >= 0 && $maxispuparams['no2'] <= 50) : ?>
                          <td class='green'><?= $maxispuparams['no2'] ?></td>
                        <?php elseif($maxispuparams['no2'] > 50 && $maxispuparams['no2'] <= 100) : ?>
                          <td class='blue'><?= $maxispuparams['no2'] ?></td>
                        <?php elseif($maxispuparams['no2'] > 100 && $maxispuparams['no2'] <= 199) : ?>
                          <td class='yellow text-dark'><?= $maxispuparams['no2'] ?></td>
                        <?php elseif($maxispuparams['no2'] > 199 && $maxispuparams['no2'] <= 299) : ?>
                          <td class='red'><?= $maxispuparams['no2'] ?></td>
                        <?php elseif($maxispuparams['no2'] > 299) : ?>
                          <td class='black'><?= $maxispuparams['no2'] ?></td>
                        <?php endif ?>
                          <td><?= $maxispuparams['maxvalueparams'] == '0' ? '-' : $maxispuparams['maxnameparams'] ?></td>
                      </tr>
                    <?php endforeach ?>
                  <?php endif ?>
                </tbody>
              </table>

              <table class="table table-bordered table-striped text-center" width="100%">
                <tr>
                  <td colspan="5">Scale Due to norm: KEP-107/KABAPEDAL/11/1997</td>
                </tr>
                <tr>
                  <td width="200" class="green"> 0-50 <br><br> BAIK <br><br> GOOD </td>
                  <td width="200" class="blue"> 51-100 <br><br> SEDANG <br><br> MODERATE </td>
                  <td width="200" class="yellow text-dark"> 101-199 <br><br> TIDAK SEHAT <br><br> UNHEALTHY </td>
                  <td width="200" class="red"> 200-299 <br><br> SANGAT TIDAK SEHAT <br><br> VERY UNHEALTHY </td>
                  <td width="200" class="black"> 300-500 <br><br> BERBAHAYA <br><br> DANGEROUS </td>
                </tr>
              </table>

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