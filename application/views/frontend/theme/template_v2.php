<!doctype html>
<html lang="en">
  <head>
  	<title>PT. Rayon Utama Makmur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/backend/dist/css/adminlte.min.css"> -->
    <!-- <script src="<?= base_url() ?>assets/backend/plugins/jquery/jquery.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?=base_url() ?>assets/frontend/css/font-awesome/4.7.0/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url() ?>assets/frontend/css/bootstrap/3.4.1/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url() ?>assets/frontend/css/style.css">
    <style>
      .carousel-inner > .item > img,
      .carousel-inner > .item > a > img {
        width: 100%;
        margin: auto;
      }
      * {
      cursor: none;
      }
    </style>
    <script src="<?= base_url('assets/frontend/js/jschart/chart/chart.min.js'); ?>"></script>
    <script src="<?= base_url('assets/frontend/js/jschart/chart/utils.js'); ?>"></script>

    <!-- <script src="<?= base_url() ?>assets/frontend/js/jschart/jquery.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>assets/frontend/js/bootstrap.bundle.min.js"></script> -->
  </head>
  <body onload="startTime()">
        
        <?= $contentsfrontend2 ?>
      
      </div>
	</div>

    <script src="<?= base_url() ?>assets/frontend/js/3.5.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/frontend/js/popper.js"></script>
    <script src="<?= base_url() ?>assets/frontend/js/3.4.1/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/frontend/js/main.js"></script>
    <script>
      $(document).ready(function(){
        // Activate Carousel
        $("#myCarousel").carousel();
          
        // Enable Carousel Indicators
        $(".item1").click(function(){
          $("#myCarousel").carousel(0);
        });
        $(".item2").click(function(){
          $("#myCarousel").carousel(1);
        });
        $(".item3").click(function(){
          $("#myCarousel").carousel(2);
        });
        $(".item4").click(function(){
          $("#myCarousel").carousel(3);
        });
        $(".item5").click(function(){
          $("#myCarousel").carousel(4);
        });
        $(".item6").click(function(){
          $("#myCarousel").carousel(5);
        });
      });
    </script>

    <script>
    function TimeAndDate() {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth();
      var YY = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      h = checkTime(h);
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('calendar').innerHTML = dd + " " + bulan(mm) + " " + YY + "&nbsp;";
      document.getElementById('clock').innerHTML = h + ":" + m;
      var t = setTimeout(TimeAndDate, 500);
    }
    function bulan(i) {
      if(i == 0) return "JANUARI";
      if(i == 1) return "FEBRUARI";
      if(i == 2) return "MARET";
      if(i == 3) return "APRIL";
      if(i == 4) return "MEI";
      if(i == 5) return "JUNI";
      if(i == 6) return "JULI";
      if(i == 7) return "AGUSTUS";
      if(i == 8) return "SEPTEMBER";
      if(i == 9) return "OKTOBER";
      if(i == 10) return "NOVEMBER";
      if(i == 11) return "DESEMBER";
    }
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }
    TimeAndDate();
    </script>
    
  </body>
</html>