<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="card-title">
              <a href="<?= site_url(''.$controllers.'/list') ?>" ><button type="button" class="btn btn-block btn-primary"><i class="fas fa-list"></i> <?= $title_menu; ?></button></a>
            </h3>
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
      <div class="row">
        <!-- left column -->
        <div class="container">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title_header; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= site_url(''.$controllers.'/add') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">                
                <div class="form-group">
                  <input type="Text" name="id_stasiun" class="form-control <?= form_error('id_stasiun') == TRUE ? 'is-invalid' : ''; ?>" placeholder="Enter ID Station *">
                  <a style="color: red;"><?= form_error('id_stasiun') ?></a>
                </div>
                <div class="form-group">
                  <input type="Text" name="nama" class="form-control <?= form_error('nama') == TRUE ? 'is-invalid' : ''; ?>" placeholder="Enter Station Name *">
                  <a style="color: red;"><?= form_error('nama') ?></a>
                </div>
                <div class="form-group">
                  <input type="Text" name="lat" class="form-control" placeholder="Enter Latitude">
                </div>
                <div class="form-group">
                  <input type="Text" name="lon" class="form-control" placeholder="Enter Longitude">
                </div>
                <div class="form-group">
                    <textarea name="alamat" class="form-control" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                  <input type="Text" name="kota" class="form-control" placeholder="Enter City">
                </div>
                <div class="form-group">
                  <input type="Text" name="provinsi" class="form-control" placeholder="Enter Province">
                </div>
                <div class="form-group">
                  <select name="cty_id" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option value="">++ Select Cities Group ++</option>
                    <?php foreach ($cities as $city): ?>
                      <?php if ($city['cty_id'] == $cities['cty_id']): ?>
                        <option value="<?= $city['cty_id']; ?>" selected="selected"><?= $city['cty_name']; ?></option>
                      <?php else : ?>
                        <option value="<?= $city['cty_id']; ?>"><?= $city['cty_name']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <button type="Submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                  <button type="Reset" class="btn btn-default"><i class="fas fa-sync-alt"></i> Reset</button>
                </div>
              </div>
              <!-- /.card-body -->
            </form>
          </div>
          <!-- /.card -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->