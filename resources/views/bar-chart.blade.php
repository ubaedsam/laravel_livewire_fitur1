<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BarChart</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div style="height:400px;width:900px;margin:auto;">
        <canvas id="barChart"></canvas>
    </div>

    <script>
        $(function(){
            var datas = <?php echo json_encode($datas); ?>
            var barCanvas = $("#barChart");
            var barChart = new Chart(barCanvas,{
                type:'bar',
                data:{
                    labels:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'],
                    datasets:[
                        {
                            label:'new User Growth, 2023',
                            data:datas,
                            backgroundColor:['red','orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown'],
                        }
                    ]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        })
    </script>
</body>
</html>