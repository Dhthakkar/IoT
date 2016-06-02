<?php

$names=file('data.log');
// To check the number of lines 
//echo count($names).'<br>';

$a=array();
$i=0;
$j=0;
foreach($names as $data)
{
   $array=$data.'<br>';
    $a[$i]=$array;
    $i++;
}
        
echo sizeof($a);
$s=array();
for($i=0,$j=0;$i<sizeof($a);$i++)
{
    if (strpos($a[$i], 'FIFO') !== false) {
        
    }
    else
    {
        $s[$j]=$a[$i];
        $j++;
    }
}
echo sizeof($s);
$sk[][]=array();
//$ex=explode("\t",$s[5]);
for($i=0;$i<sizeof($s)-1;$i++)
{
    $sk[$i]=explode(",",$s[$i]);
}
//for($i=0;$i<sizeof($s);$i++)
//{
//    echo "<br>".$sk[$i][1]." ".$sk[$i][2]." ".$sk[$i][3];
//}
$s1=array();
for($i=0;$i<sizeof($sk);$i++)
{
    $s1[$i]=$sk[$i][1];
}

$s2=array();
for($i=0;$i<sizeof($sk);$i++)
{
    $s2[$i]=$sk[$i][2];
}

$s3=array();
for($i=0;$i<sizeof($sk);$i++)
{
    $s3[$i]=$sk[$i][3];

}
echo sizeof($sk);
echo "$s1";


?>
<script src="canvas.js/canvasjs-1.8.0/canvasjs.min.js">
</script>

<script>
    var x1 =<?php
  echo json_encode($s1);  ?>;
    var x2 =<?php
  echo json_encode($s2);  ?>;
    var x3 =<?php
  echo json_encode($s3);  ?>;    
    
    var s1= new Array();
    var s2= new Array();
    var s3= new Array();
    for(i=0;i<x1.length;i++)
        {
            
            s1[i]=parseInt(x1[i]);
            s2[i]=parseInt(x2[i]);
            s3[i]=parseInt(x3[i]);
        }
    
</script>




<html>
    <head><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script>
        
                google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Ultrasonic', 20],
          ['Gas', 55],
          ['LDR', 68]
        ]);

        var options = {
          width: 800, height: 240,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
          i=0,j=0,k=0;
        setInterval(function() {
          data.setValue(0, 1, s1[i]);
          chart.draw(data, options);i++;
        }, 200);
        setInterval(function() {
          data.setValue(1, 1,s2[j]);
          chart.draw(data, options);j++;
        }, 200);
        setInterval(function() {
          data.setValue(2, 1, s3[k];
          chart.draw(data, options);k++;
        }, 200);
      }
        
        </script>
 </head>
<body>
     <div id="chart_div" style="width: 400px; height: 120px;"></div>
    </body>
        </html>