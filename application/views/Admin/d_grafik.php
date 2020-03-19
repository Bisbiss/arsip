  <?php
  ?>

  <?php

if($data3 > 0) {
        foreach($data3 as $data3){
            $januari=$data3->januari;
            $februari=$data3->februari;
            $maret = $data3->maret;
            $april = $data3->april;
            $mei = $data3->mei;
            $juni = $data3->juni;
            $juli = $data3->juli;
            $agustus = $data3->agustus;
            $september = $data3->september;
            $oktober = $data3->oktober;
            $november = $data3->november;
            $desember = $data3->desember;
        }
        $stok1[] = $januari;
        $stok2[] = $februari;
        $stok3[] = $maret;
        $stok4[] = $april;
        $stok5[] = $mei;
        $stok6[] = $juni;
        $stok7[] = $juli;
        $stok8[] = $agustus;
        $stok9[] = $september;
        $stok10[] = $oktober;
        $stok11[] = $november;
        $stok12[] = $desember;
        $merk3 = ['januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'];
$grafik3=array_merge($stok1,$stok2,$stok3,$stok4,$stok5,$stok6,$stok7,$stok8,$stok9,$stok10,$stok11,$stok12) ;
    ?>

 
    <!--Load chart js-->
    <script type="text/javascript" src="<?php echo base_url().'assets/chart.js'?>"></script>
    <script>
            var lineChartData = {
                labels : <?php echo json_encode($merk3);?>,
                datasets : [
                     
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($grafik3);?>
                    }
 
                ]
                 
            }
 
            var myLine = new Chart(document.getElementById("canvas3").getContext("2d")).Bar(lineChartData);
         
    </script>

<?php
}else{ echo "tidak ada data";}
?>