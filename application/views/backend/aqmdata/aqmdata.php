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
            <li class="breadcrumb-item active"><?= $idstasiun['id_stasiun'] ?></li>
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
          <div class="card-header"><h3 class="card-title"><?= $idstasiun['id_stasiun'] ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">

            <table id="aqmdata" class="table table-bordered table-striped" width="100%">
              <thead>
                <tr class="text-center">
                  <th>NO</th>
                  <th>ID STATION</th>
                  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WAKTU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>PM10</th>
                  <th>PM25</th>
                  <th>SO2</th>
                  <th>CO</th>
                  <th>O3</th>
                  <th>NO2</th>
                  <th>HC</th>
                  <th>VOC</th>
                  <th>NH3</th>
                  <th>NO2</th>
                  <th>H2S</th>
                  <th>CS2</th>
                  <th>WS</th>
                  <th>WD</th>
                  <th>HUMIDITY</th>
                  <th>TEMPERATURE</th>
                  <th>PRESSURE</th>
                  <th>SR</th>
                  <th>RAIN INTENSITY</th>
                </tr>
              </thead>
            <tbody>
            </tbody>
            </table>

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

  <!-- jQuery -->
  <script src="<?= base_url('assets/backend/plugins/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>

  <script src="<?= base_url('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/datatables-buttons/js/jszip.min.js') ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/datatables-buttons/js/pdfmake.min.js') ?>"></script>
  <script src="<?= base_url('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>

<script>
    $(document).ready(function() {
      $('#aqmdata').DataTable({
        "processing": true,
        "serverSide": true,
    "lengthMenu": [ [10, 25, 50, 100, 200, 300, 500, -1], [10, 25, 50, 100, 200, 300, 500, "All"] ],
        "ajax": {
          "url" : "<?= site_url() ?>ajax/aqmdata?id_stasiun=<?= $idstasiun['id_stasiun'] ?>",
          "type" : "POST"
        },
    dom: "lBfrtip",
    buttons: ['excel'],
    "order": [ [2, "desc"]],
    "columnDefs" : [
          {
            "targets" : [0, 1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 16, 17, 18 ,19 ,20, 21],
            "orderable" : false
          }
        ]
      })
    })
  </script>