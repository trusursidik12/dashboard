<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="card-title">
            <a href="<?= site_url() ?>"><button type="button" class="btn btn-block btn-primary"><i class="fas fa-th"></i> <?= $controllers; ?></button></a>
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
          <div class="card-header">
            <h3 class="card-title">
              <div class="form-group">
                <select class="form-control" name="forma" onchange="location = this.value;">
                  <?php foreach ($idstasiunloop as $stasiun) : ?>
                    <?php foreach ($aqmispu as $data) : ?>
                      <?php if ($stasiun['id_stasiun'] == $data['id_stasiun']) : ?>
                        <option value="<?= site_url('aqmispu/' . $stasiun['id_stasiun']) ?>" <?= $idstasiun['id_stasiun'] == $stasiun['id_stasiun'] ? 'selected' : ''; ?>><?= $stasiun['id_stasiun'] ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  <?php endforeach ?>
                  <?php if ($this->fungsi->user_login()->usr_cty_id == '3') : ?>
                    <?php foreach ($aqmstasiunkiec as $kiec) : ?>
                      <option value="<?= site_url('aqmispu/kiec/' . $kiec['id_stasiun']) ?>" <?= $idstasiun['id_stasiun'] == $kiec['id_stasiun'] ? 'selected' : ''; ?>><?= $kiec['id_stasiun'] ?></option>
                    <?php endforeach ?>
                  <?php endif ?>
                </select>
              </div>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <div class="row">
              <div class="col-md-10 col-md-offset-2">
                <form class="form-inline" method="post">
                  <div class="form-group">
                    <label for="fromdate">&emsp;FROM DATE : </label>
                    <input type="date" id="datepicker1" value="<?php echo set_value('fromdate'); ?>" class="form-control" placeholder="FROM DATE" required>
                  </div>
                  <div class="form-group">
                    <label for="todate">&emsp;TO DATE : </label>
                    <input type="date" id="datepicker2" value="<?php echo set_value('todate'); ?>" class="form-control" placeholder="TO DATE" required>
                  </div>
                  <div class="form-group">
                    &emsp;<button type="submit" id="search" class="btn btn-primary">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
                    &nbsp;<a href="#" type="reset" id="search" onclick="location.reload();" class="btn btn-secondary">&nbsp;<i class="fa fa-sync-alt"></i>&nbsp;</a>
                  </div>
                </form>
              </div>
            </div>

            <table id="aqmispu" class="table table-bordered table-striped text-center" width="100%">
              <thead>
                <tr class="text-center">
                  <th>NO</th>
                  <th>ID STASIUN</th>
                  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WAKTU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>PM10</th>
                  <th>PM2.5</th>
                  <th>SO2</th>
                  <th>CO</th>
                  <th>O3</th>
                  <th>NO2</th>
                  <th>HC</th>
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

<script>
  $(document).ready(function() {

    var dataTable = $('#aqmispu').DataTable({
      language: {
        searchPlaceholder: "Input Disini .."
      },
      processing: true,
      serverSide: true,
      "language": {
        "infoFiltered": ""
      },
      "lengthMenu": [
        [10, 25, 50, 100, 200, 300, 500, -1],
        [10, 25, 50, 100, 200, 300, 500, "All"]
      ],
      "ajax": {
        "url": "<?= site_url() ?>ajax/aqmispu?id_stasiun=<?= $idstasiun['id_stasiun'] ?>",
        "type": "POST",
        "data": function(data) {
          data.from = $('#datepicker1').val();
          data.to = $('#datepicker2').val();
        },
      },
      dom: "lBfrtip",
      buttons: [{
          extend: 'copyHtml5',
          exportOptions: {
            columns: [0, ':visible']
          }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: ':visible'
          }
        },
        'colvis'
      ],
      "order": [
        [2, "desc"]
      ],
    });

    $('#search').on('click change', function(event) {
      event.preventDefault();

      if ($('#datepicker1').val() == "") {
        $('#datepicker1').focus();
      } else if ($('#datepicker2').val() == "") {
        $('#datepicker2').focus();
      } else {
        dataTable.draw();
      }

    });

  });
</script>