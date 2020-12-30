<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?= base_url() ?>assets/frontend/images/trusur.png);"></a>
          <div id="status">
            <?php $this->view('frontend/kota/sukoharjo3/status') ?>
          </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
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
        
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
        
              <div class="item active">
                <div class="row">
                  <div class="col" id="cemsrum">
                    <?php $this->view('frontend/kota/sukoharjo3/cemsrum') ?>
                  </div>
                </div>
              </div>
          
            </div>
          </div>
        </div>

        <script type="text/javascript">
          function startTime() {
            $('#cemsrum').load('<?= site_url('indoor/sukoharjo3/cemsrum') ?>', function(){})
            $('#status').load('<?= site_url('indoor/sukoharjo3/status') ?>', function(){})
            var t = setTimeout(startTime, 10000);
          }
        </script>