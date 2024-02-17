$(document).ready(function ()
{


    var root = am5.Root.new("ChartCountCreatedEleve");
    var chartInstance = null;

    am5.ready(function ()
    {
        var currentDate = new Date();
        var currentYear = currentDate.getFullYear();
        FGetChartEleveCount(currentYear);
        $('#yearpicker').on('change', function () {
            var year = $(this).val();
            FGetChartEleveCount(year);
        });

        function FGetChartEleveCount(date)
        {

            if (chartInstance)
            {
                chartInstance.dispose();
            }

            $.ajax({
                type: "get",
                url: urlChartCountEleve,
                data: {
                    date: date
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == 200) {
                        // Clear the container before pushing a new chart
                        root.container.children.clear();

                        // Rest of your chart creation code...

                        var chart = root.container.children.push(
                            am5xy.XYChart.new(root, {
                                panX: true,
                                panY: true,
                                wheelX: "panX",
                                wheelY: "zoomX",
                                paddingLeft: 5,
                                paddingRight: 5
                            })
                        );

                        // Rest of your chart creation code...
                        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
                            cursor.lineY.set("visible", false);
                            var xRenderer = am5xy.AxisRendererX.new(root, {
                            minGridDistance: 60,
                            minorGridEnabled: true
                        });

                        var xAxis = chart.xAxes.push(
                            am5xy.CategoryAxis.new(root, {
                                maxDeviation: 0.3,
                                categoryField: "country",
                                renderer: xRenderer,
                                tooltip: am5.Tooltip.new(root, {})
                            })
                        );

                        xRenderer.grid.template.setAll({
                        location: 1
                        })

                        var yAxis = chart.yAxes.push(
                            am5xy.ValueAxis.new(root, {
                                maxDeviation: 0.3,
                                renderer: am5xy.AxisRendererY.new(root, {
                                strokeOpacity: 0.1
                                })
                            })
                        );
                        var series = chart.series.push(
                            am5xy.ColumnSeries.new(root, {
                                name: "Series 1",
                                xAxis: xAxis,
                                yAxis: yAxis,
                                valueYField: "value",
                                sequencedInterpolation: true,
                                categoryXField: "country"
                            })
                        );
                        series.columns.template.setAll({
                            width: am5.percent(120),
                            fillOpacity: 0.9,
                            strokeOpacity: 0
                        });
                        series.columns.template.adapters.add("fill", (fill, target) => {
                            return chart.get("colors").getIndex(series.columns.indexOf(target));
                        });
                        series.columns.template.adapters.add("stroke", (stroke, target) => {
                            return chart.get("colors").getIndex(series.columns.indexOf(target));
                        });
                        series.columns.template.set("draw", function(display, target) {
                            var w = target.getPrivate("width", 0);
                            var h = target.getPrivate("height", 0);
                            display.moveTo(0, h);
                            display.bezierCurveTo(w / 4, h, w / 4, 0, w / 2, 0);
                            display.bezierCurveTo(w - w / 4, 0, w - w / 4, h, w, h);
                        });

                        var data = [];
                        $.each(response.data, function (index, value) {
                            data.push({
                                country: value.month,
                                value: value.user_count
                            });
                        });

                        xAxis.data.setAll(data);
                        series.data.setAll(data);

                        series.appear(1000);
                        chart.appear(1000, 100);
                        chartInstance = chart;
                    }
                }
            });
        }
    });

    // get yeary in select 1
    $.ajax({
        type: "get",
        url: urlStartAndEnd,
        dataType: "json",
        success: function (response) {
            if (response.status == 200)
            {
                let startYear = parseInt(response.yearStart);
                let endYear = parseInt(response.yearend);


                for (let i = endYear; i >= startYear; i--) {
                    $('#yearpicker').append($('<option />').val(i).html(i));

                }
            }
        }
    });
    // get year in select 2
    $.ajax({
        type: "get",
        url: urlStartPayement,
        dataType: "json",
        success: function (response) {
            if (response.status == 200)
            {
                let startYear = parseInt(response.yearStart);
                let endYear = parseInt(response.yearend);


                for (let i = endYear; i >= startYear; i--)
                {

                    $('#yearpicker2').append($('<option />').val(i).html(i));
                }
                 // Get the current year
            let currentYear = (new Date()).getFullYear();

            // Select the current year
            $('#yearpicker2').val(currentYear);
            }
        }
    });

    /********** Chart Column Peyement */
    /************** */

    /********************************* Chart Maps Eleve  */
    GetChartByCountry();
    function GetChartByCountry()
    {
        am5.ready(function()
        {
            $.ajax({
                type: "get",
                url: urlChartCountByCountry,
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        var data =[];
                        $.each(response.data, function (index, value)
                        {
                            data.push({
                                id : value.pays,
                                name : value.country_name,
                                value : value.number
                            });
                        });

                        var root = am5.Root.new("chartMaps");
                        root.setThemes([am5themes_Animated.new(root)]);

                        var chart = root.container.children.push(am5map.MapChart.new(root, {}));

                        var polygonSeries = chart.series.push(
                            am5map.MapPolygonSeries.new(root, {
                                geoJSON: am5geodata_worldLow,
                                exclude: ["AQ"]
                            })
                        );
                        var bubbleSeries = chart.series.push(
                        am5map.MapPointSeries.new(root, {
                            valueField: "value",
                            calculateAggregates: true,
                            polygonIdField: "id"
                        })
                        );

                        var circleTemplate = am5.Template.new({});
                        bubbleSeries.bullets.push(function(root, series, dataItem)
                        {
                            var container = am5.Container.new(root, {});

                            var circle = container.children.push(
                                am5.Circle.new(root, {
                                radius: 10,
                                fillOpacity: 0.7,
                                fill: am5.color(0xff0000),
                                cursorOverStyle: "pointer",
                                tooltipText: `{name}: [bold]{value}[/]`
                                }, circleTemplate)
                            );

                            var countryLabel = container.children.push(
                                am5.Label.new(root, {
                                text: "{name}",
                                paddingLeft: 5,
                                populateText: true,
                                fontWeight: "bold",
                                fontSize: 13,
                                centerY: am5.p50
                                })
                            );

                            circle.on("radius", function(radius)
                            {
                                countryLabel.set("x", radius);
                            })

                            return am5.Bullet.new(root,
                            {
                                sprite: container,
                                dynamic: true
                            });
                        });
                        bubbleSeries.bullets.push(function(root, series, dataItem)
                        {
                            return am5.Bullet.new(root, {
                                sprite: am5.Label.new(root, {
                                text: "{value.formatNumber('#.')}",
                                fill: am5.color(0xffffff),
                                populateText: true,
                                centerX: am5.p50,
                                centerY: am5.p50,
                                textAlign: "center"
                                }),
                                dynamic: true
                            });
                        });

                        bubbleSeries.set("heatRules",
                        [
                            {
                                target: circleTemplate,
                                dataField: "value",
                                min: 10,
                                max: 50,
                                minValue: 0,
                                maxValue: parseInt(response.maxValue),
                                key: "radius"
                            }
                        ]);
                        bubbleSeries.data.setAll(data);
                    }
                }
            });
        });
    }


























    var chartInstanceMoney = null;

    am5.ready(function() {

    var root = am5.Root.new("chartMoney");
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();

    FGetChartMoeny(currentYear);

    $('#yearpicker2').on('change', function ()
    {
        var year = $(this).val();

        FGetChartMoeny(year);
    });

    function FGetChartMoeny(datee)
    {
        if (chartInstanceMoney) {
            chartInstanceMoney.dispose();
        }



        $.ajax({
            type: "get",
            url: urlChartMoney,
            data: {
                date: datee
            },
           /*  contentType: false,
            cache: false,
            processData: false, */
            dataType: "json",
            success: function (response) {
                if (response.status == 200)
                {
                    root.container.children.clear();
                    root.setThemes([
                        am5themes_Animated.new(root)
                    ]);

                    var chart = root.container.children.push(am5xy.XYChart.new(root, {
                        panX: true,
                        panY: true,
                        wheelX: "panX",
                        wheelY: "zoomX",
                        pinchZoomX: true,
                        paddingLeft:0,
                        paddingRight:1
                    }));

                    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
                    cursor.lineY.set("visible", false);

                    var xRenderer = am5xy.AxisRendererX.new(root, {
                        minGridDistance: 30,
                        minorGridEnabled: true
                    });

                    xRenderer.labels.template.setAll({
                        rotation: -90,
                        centerY: am5.p50,
                        centerX: am5.p100,
                        paddingRight: 15
                    });

                    xRenderer.grid.template.setAll({
                        location: 1
                    });

                    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                        maxDeviation: 0.3,
                        categoryField: "country",
                        renderer: xRenderer,
                        tooltip: am5.Tooltip.new(root, {})
                    }));

                    var yRenderer = am5xy.AxisRendererY.new(root, {
                        strokeOpacity: 0.1
                    });

                    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                        maxDeviation: 0.3,
                        renderer: yRenderer
                    }));

                    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                        name: "Series 1",
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: "value",
                        sequencedInterpolation: true,
                        categoryXField: "country",
                        tooltip: am5.Tooltip.new(root, {
                            labelText: "{valueY}"+' €'
                        })
                    }));

                    series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
                    series.columns.template.adapters.add("fill", function (fill, target) {
                        return chart.get("colors").getIndex(series.columns.indexOf(target));
                    });

                    series.columns.template.adapters.add("stroke", function (stroke, target) {
                        return chart.get("colors").getIndex(series.columns.indexOf(target));
                    });
                    var data = [];
                    $.each(response.data, function (index, value) {
                        data.push({
                            country: value.month,
                            value: parseFloat(value.total)
                        });
                    });

                    xAxis.data.setAll(data);
                    series.data.setAll(data);
                    series.appear(1000);
                    chart.appear(1000, 100);
                }
            }
        });
    }
});

    /////////





});





