<section class="content bg-col">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-white">
                <div class="table-responsive">
                    <table border="1" width="100%" class="text-center">
                        <thead>
                            <tr>
                                <th>ISPU</th>
                                <th>RANGE NILAI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Berbahaya &#128567;</td>
                                <td class="text-white bg-dark" style="color: #FFFFFF;"> >300 </td>
                            </tr>                        
                            <tr>
                                <td>Sangat Tidak Sehat &#129319;</td>
                                <td class="text-white bg-danger">201 - 300</td>
                            </tr>    
                            <tr>
                                <td>Tidak Sehat &#128552;</td>
                                <td class="text-white bg-warning">101 - 200</td>
                            </tr> 
                            <tr>
                                <td>Sedang &#128578;</td>
                                <td class="text-white bg-primary">51 - 100</td>
                            </tr>   
                            <tr>
                                <td>Baik &#128515;</td>
                                <td class="text-white bg-success">0 - 50</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="bg-col">
                <div class="card-body bg-col">
                    <!-- Aqms -->
                    <div class="row d-flex align-items-stretch text-light">

                    <div class="col-sm-6 p-2 p-2" id="pci">
                        <?php $this->view('frontend/kota/cilegon/pci') ?>
                    </div>

                    <div class="col-sm-6 p-2 p-2" id="simpang">
                        <?php $this->view('frontend/kota/cilegon/simpang') ?>
                    </div>

                    <div class="col-sm-6 p-2 p-2" id="ciwandan">
                        <?php $this->view('frontend/kota/cilegon/ciwandan') ?>
                    </div>

                    <div class="col-sm-6 p-2 p-2" id="merak">
                        <?php $this->view('frontend/kota/cilegon/merak') ?>
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
        $('#pci').load('<?= site_url('indoor/cilegon/pci') ?>', function(){})
        $('#simpang').load('<?= site_url('indoor/cilegon/simpang') ?>', function(){})
        $('#ciwandan').load('<?= site_url('indoor/cilegon/ciwandan') ?>', function(){})
        $('#merak').load('<?= site_url('indoor/cilegon/merak') ?>', function(){})
        var t = setTimeout(startTime, 600000);
      }
    </script>