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

$sk[][]=array();
//$ex=explode("\t",$s[5]);
for($i=0;$i<sizeof($s)-1;$i++)
{
    $sk[$i]=explode("\t",$s[$i]);
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
    
    len=x1.length;
    
    
    
    
    document.write("<br><br><br><br><br><br>");
    	window.onload = function () {

		var dps = []; // dataPoints
            
		var chart = new CanvasJS.Chart("chartContainer",{
			title :{
				text: "Live Data from Arduino"
			},			
			data: [{
				type: "line",
				dataPoints: dps 
			}]
		});
            
		var xVal = 0;
		var yVal = 0;	
		var updateInterval = 200000000;
		var dataLength = 800; // number of dataPoints visible at any point
            
		var updateChart = function (count) {
			count = count || 1;
			// count is number of times loop runs to generate random dataPoints.
			
        
			for (var j = 0; j < count ; j++) {	
				yVal = s1[j];
                
				dps.push({
					x: xVal,
					y: yVal
				});
				xVal++;
			};
			if (dps.length > dataLength)
			{
				dps.shift();				
			}
			
			chart.render();		

		};

		// generates first set of dataPoints
		updateChart(dataLength); 

		// update chart after specified time. 
		setInterval(function(){updateChart()}, updateInterval); 

	}    
    
    //document.write(compute.length+"<br>")
    //document.write(compute[1])
    
</script>

<?php
echo "<body>
    
    <div id='chartContainer' style='height: 300px; width:100%;'>
	</div>
</body>";

?>
