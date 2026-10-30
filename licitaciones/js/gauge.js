<script type="text/javascript">


        $(function () {
            $('#container1').highcharts({

                chart: {
                    type: 'gauge',
                    alignTicks: false,
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },

                title: {
                    text: 'Pressure Meter'
                },

                pane: {
                    startAngle: -150,
                    endAngle: 150
                },

                yAxis: [{
                    min: 0,
                    max: 1000,
                    lineColor: '#339',
                    tickColor: '#339',
                    minorTickColor: '#339',
                    offset: -25,
                    lineWidth: 2,
                    labels: {
                        distance: -20,
                        rotation: 'auto'
                    },
                    tickLength: 5,
                    minorTickLength: 5,
                    endOnTick: false
                }, {
                    min: 0,
                    max: 1000,
                    tickPosition: 'outside',
                    lineColor: '#933',
                    lineWidth: 2,
                    minorTickPosition: 'outside',
                    tickColor: '#933',
                    minorTickColor: '#933',
                    tickLength: 5,
                    minorTickLength: 5,
                    labels: {
                        distance: 12,
                        rotation: 'auto'
                    },
                    offset: -20,
                    endOnTick: false
                }],

                series: [{
                    name: 'Pressure',
                    data: [80],
                    dataLabels: {
                        formatter: function () {
                            var psi = this.y,
                                bar = Math.round(psi / 14.50);
                            return '<span style="color:#339">' + psi + ' psi</span><br/>' +
                                '<span style="color:#933">' + bar + ' bar</span>';
                        },
                        backgroundColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, '#DDD'],
                                [1, '#FFF']
                            ]
                        }
                    },
                    tooltip: {
                        valueSuffix: ' psi'
                    }
                }]

            },
        // Add some life
        function (chart) {
            setInterval(function () {

                $.getJSON("S12.aspx", function (data, textStatus) {

                    $.each(data, function (index, wind) {
                        var point = chart.series[0].points[0],
                        newVal = wind;
                        point.update(newVal);
                    });

                });
            }, 3000);
        });
        });


    </script>