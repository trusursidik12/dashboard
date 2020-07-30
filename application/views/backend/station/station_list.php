<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="card-title">
              <a href="<?= site_url(''.$controllers.'/add') ?>" ><button type="button" class="btn btn-block btn-primary"><i class="fas fa-plus-square"></i> <?= $title_menu; ?></button></a>
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
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header"><h3 class="card-title"><?= $title_header; ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table id="example" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>ID Station</th>
                <th>Name</th>
                <th>City</th>
                <th>Province</th>
                <th>Group City</th>
                <th width="30">Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach($stations as $data) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['id_stasiun'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['kota'] ?></td>
                    <td><?= $data['provinsi'] ?></td>
                    <td><?= $data['cty_name'] ?></td>
                    <td>
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>"><i class="fas fa-eye"></i></a>
                        <a href="<?= site_url('/stations/edit/'.encrypt_url($data['id'])) ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

            <?php foreach($stations as $data) : ?>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">View Detail</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="d-flex">
                        <div class="col-sm-4"><p>ID Station</p></div>
                        <div class="col-sm-8"><p>: <?= $data['id_stasiun'] ?></p></div>
                      </div>
                      <div class="d-flex">
                        <div class="col-sm-4"><p>Station Name</p></div>
                        <div class="col-sm-8"><p>: <?= $data['nama'] ?></p></div>
                      </div>
                      <div class="d-flex">
                        <div class="col-sm-4"><p>Latitude</p></div>
                        <div class="col-sm-8"><p>: <?= $data['lat'] ?></p></div>
                      </div>
                      <div class="d-flex">
                        <div class="col-sm-4"><p>Longitude</p></div>
                        <div class="col-sm-8"><p>: <?= $data['lon'] ?></p></div>
                      </div>
                      <div class="d-flex">
                        <div class="col-sm-4"><p>Address</p></div>
                        <div class="col-sm-8"><p>: <?= $data['alamat'] ?></p></div>
                      </div>
                      <div class="d-flex">
                        <div class="col-sm-4"><p>City</p></div>
                        <div class="col-sm-8"><p>: <?= $data['kota'] ?></p></div>
                      </div>
                      <div class="d-flex">
                        <div class="col-sm-4"><p>Province</p></div>
                        <div class="col-sm-8"><p>: <?= $data['provinsi'] ?></p></div>
                      </div>
                      <div class="d-flex">
                        <div class="col-sm-4"><p>Geojson</p></div>
                        <div class="col-sm-8"><p>: <?= $data['geojson'] ?></p></div>
                      </div>
                      <div class="d-flex">
                        <div class="col-sm-4"><p>Group City</p></div>
                        <div class="col-sm-8"><p>: <?= $data['cty_name'] ?></p></div>
                      </div><hr class="hr">
                      <div class="d-flex">
                        <div class="col-sm-4"><p>Created At</p></div>
                        <div class="col-sm-8"><p>: <?= $data['xtimetimes'] ?></p></div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>

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
