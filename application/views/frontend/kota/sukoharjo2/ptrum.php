<img src="<?= base_url() ?>assets/frontend/images/UNDER_MAINTENANCE.jpg" alt="pt trusur unggul teknusa under maintenance" class="rounded mx-auto d-block img-fluid pt-5" width="40%">
<!-- <div class="row"> -->
<div class="col text-center">
  <div id="calendar"></div>
  <div id="clock"></div>
</div>
<!-- </div> -->
<!-- <div class="wrapper d-flex align-items-stretch">
  <nav id="sidebar">
    <div class="p-4 pt-5">
      <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?= base_url() ?>assets/frontend/images/trusur.png);"></a>
      <div id="status">
        <?php //$this->view('frontend/kota/sukoharjo2/status') 
        ?>
      </div>

    </div>
  </nav>

  <div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

        <div>
          <img src="<?= base_url() ?>assets/frontend/images/ptrum.png" alt="PT Rayon Utama Makmur" width="40">
        </div>

        <div style="margin-top: 10px">
          <h1><b>&nbsp;PT. Rayon Utama Makmur</b></h1>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
<div id="calendar" style="font-size:28px;"></div>
<div id="clock" style="font-size:28px;"></div>
</ul>
</div>
</div>
</nav>

<br>

<div class="" style="margin-left:0px; margin-right:0px;width:100%">
  <div id="myCarousel" class="carousel slide">

    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <div class="row">
          <div class="col" id="cemsrum">
            <?php //$this->view('frontend/kota/sukoharjo2/cemsrum') 
            ?>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="row">
          <div class="col" id="camsrum">
            <?php //$this->view('frontend/kota/sukoharjo2/camsrum') 
            ?>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="row">
          <div class="col" id="camsgupit">
            <?php //$this->view('frontend/kota/sukoharjo2/camsgupit') 
            ?>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="row">
          <div class="col" id="camsplesan">
            <?php //$this->view('frontend/kota/sukoharjo2/camsplesan') 
            ?>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="row">
          <div class="col" id="camscelep">
            <?php //$this->view('frontend/kota/sukoharjo2/camscelep') 
            ?>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="row">
          <div class="col" id="camspengkol">
            <?php //$this->view('frontend/kota/sukoharjo2/camspengkol') 
            ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  function startTime() {
    $('#cemsrum').load('<?php //site_url('indoor/sukoharjo2/cemsrum') 
                        ?>', function() {})
    $('#camsrum').load('<?php //site_url('indoor/sukoharjo2/camsrum') 
                        ?>', function() {})
    $('#camsgupit').load('<?php //site_url('indoor/sukoharjo2/camsgupit') 
                          ?>', function() {})
    $('#camsplesan').load('<?php //site_url('indoor/sukoharjo2/camsplesan') 
                            ?>', function() {})
    $('#camscelep').load('<?php //site_url('indoor/sukoharjo2/camscelep') 
                          ?>', function() {})
    $('#camspengkol').load('<?php //site_url('indoor/sukoharjo2/camspengkol') 
                            ?>', function() {})
    $('#status').load('<?php //site_url('indoor/sukoharjo2/status') 
                        ?>', function() {})
    var t = setTimeout(startTime, 10000);
  }
</script> -->