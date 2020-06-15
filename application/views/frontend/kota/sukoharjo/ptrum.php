  <section class="content bg-col">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card bg-col">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body bg-col" style="margin-top: -40px">
                <!-- Aqms -->
                <div class="row d-flex align-items-stretch text-light">

                  <div class="col-sm-6 p-2 p-2" id="cemsrum">
                    <?php $this->view('frontend/kota/sukoharjo/cemsrum') ?>
                  </div>

                  <div class="col-sm-6 p-2 p-2" id="camsrum">
                    <?php $this->view('frontend/kota/sukoharjo/camsrum') ?>
                  </div>

                  <div class="col-sm-6 p-2 p-2" id="camsgupit">
                    <?php $this->view('frontend/kota/sukoharjo/camsgupit') ?>
                  </div>

                  <div class="col-sm-6 p-2 p-2" id="camsplesan">
                    <?php $this->view('frontend/kota/sukoharjo/camsplesan') ?>
                  </div>

                </div>
                <!-- /.Aqms -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">
      function startTime() {
        $('#cemsrum').load('<?= site_url('b_sukoharjo/cemsrum') ?>', function(){})
        $('#camsrum').load('<?= site_url('b_sukoharjo/camsrum') ?>', function(){})
        $('#camsgupit').load('<?= site_url('b_sukoharjo/camsgupit') ?>', function(){})
        $('#camsplesan').load('<?= site_url('b_sukoharjo/camsplesan') ?>', function(){})
        var t = setTimeout(startTime, 500);
      }
    </script>