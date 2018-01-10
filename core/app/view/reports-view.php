<?php
$today_visits = Viewer::countAllFromToday();

?>
<section class="content">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="">
                            LICORstore <small>Vision general de ventas</small>
                        </h1>
                        
                    </div>
                </div>
               
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class=""><i class="fa fa-bar-chart-o fa-fw"></i> Ventas  (Ultimos 30 dias)</h3>
                            </div>
                            <div class="box-body">

<div id="graph" class="animate" data-animate="fadeInUp" ></div>

<script>

<?php 
echo "var c=0;";
echo "var dates=Array();";
echo "var data=Array();";
echo "var total=Array();";
for($i=0;$i<30;$i++){
  echo "dates[c]=\"".date("Y-m-d",time()-60*60*24*$i)."\";";
  echo "data[c]=\"".Viewer::countAllFromDay(date("Y-m-d",time()-60*60*24*$i))."\";";
  echo "total[c]={x: dates[c],y: data[c]};";
  echo "c++;";
}
?>
// Use Morris.Area instead of Morris.Line
Morris.Area({
  element: 'graph',
  data: total,
  xkey: 'x',
  ykeys: ['y',],
  labels: ['Y']
}).on('click', function(i, row){
  console.log(i, row);
});
</script>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

</section>

  