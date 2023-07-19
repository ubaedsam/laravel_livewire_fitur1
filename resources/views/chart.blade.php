<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Highcharts</title>
</head>
<body>

    <div class="" id="chart-container"></div>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        var datas =  <?php echo json_encode($datas) ?>

        Highcharts.chart('chart-container',{
            title:{
                text:'User Baru 2023'
            },
            subtitle:{
                text:'Source: Ubaed S.A.M'
            },
            xAxis:{
                categories:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec']
            },
            yAxis:{
                title:{
                    text:'Nomor Pada User Baru'
                }
            },
            legend:{
                layout:'vertical',
                align:'right',
                verticalAlign:'middle'
            },
            plotOptions:{
                series:{
                    allowPointSelect:true
                }
            },
            series:[{
                name:'User Baru',
                data:datas
            }],
            responsive:{
                rules:[
                    {
                        condition:{
                            maxWidth:500
                        },
                        chartOptions:{
                            legend:{
                                layout:'horizontal',
                                align:'center',
                                verticalAlign:'bottom'
                            }
                        }
                    }
                ]
            }
        })
    </script>
</body>
</html>