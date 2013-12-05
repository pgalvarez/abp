<script type="text/javascript">
$(function () {
        $('#container_chart').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Incidencias Anuales'
            },
            subtitle: {
                text: 'Incidencias de Personal'
            },
            xAxis: {
                categories: [
                    'Ene',
                    'Feb',
                    'Mar',
                    'Abr',
                    'May',
                    'Jun',
                    'Jul',
                    'Ago',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dic'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Incidencias'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Profesorado - Tutorias',
                data: [19,17,10,10,11,14,5,2,12,14,11,12]
    
            }, {
                name: 'Becarios',
                data: [12,10,3,2,5,7,8,3,2,2,9]
    
            }, {
                name: 'Profesorado - Clases',
                data: [9,2,2,4,3,0,4,0,2,3,2,1]
    
            }]
        });
    });
</script>
<div id="container_chart" style="max-width: 960px; height: 400px; margin: 0 auto"></div>
<center><a href="">Exportar</a></center>
<div><center><a href="/abp">Volver</a></center></div>
