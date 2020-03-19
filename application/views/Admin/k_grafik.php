  <?php
  ?>

  <?php

if($data2 > 0) {
        foreach($data2 as $data2){
            $januari=$data2->januari;
            $februari=$data2->februari;
            $maret = $data2->maret;
            $april = $data2->april;
            $mei = $data2->mei;
            $juni = $data2->juni;
            $juli = $data2->juli;
            $agustus = $data2->agustus;
            $september = $data2->september;
            $oktober = $data2->oktober;
            $november = $data2->november;
            $desember = $data2->desember;
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
        $merk2 = ['januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'];
$grafik2=array_merge($stok1,$stok2,$stok3,$stok4,$stok5,$stok6,$stok7,$stok8,$stok9,$stok10,$stok11,$stok12) ;
    ?>

 
    <!--Load chart js-->
    <script type="text/javascript" src="<?php echo base_url().'assets/chart.js'?>"></script>
    <script>
            var lineChartData = {
                labels : <?php echo json_encode($merk2);?>,
                datasets : [
                     
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($grafik2);?>
                    }
 
                ]
                 
            }
 
            var myLine = new Chart(document.getElementById("canvas2").getContext("2d")).Bar(lineChartData);
         
    </script>

<?php
}else{ echo "tidak ada data";}
?>