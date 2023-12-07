$(document).ready(function () {
    var root = am5.Root.new("ChartCountCreatedEleve");
var chartInstance = null;

am5.ready(function () {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();

    // Call the function with the initial year
    FGetChartEleveCount(currentYear);

    // Attach change event listener to yearpicker
    $('#yearpicker').on('change', function () {
        var year = $(this).val();
        FGetChartEleveCount(year);
    });

    function FGetChartEleveCount(date) {
        // Dispose the existing chartInstance if it exists
        if (chartInstance) {
            chartInstance.dispose();
        }

        $.ajax({
            type: "get",
            url: urlChartCountEleve, // Replace with your actual URL
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
                    // Update the chart data
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

                    // Assign the chart instance for later disposal
                    chartInstance = chart;
                }
            }
        });
    }
});
    /* var chartInstance;
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();

    FGetChartEleveCount(currentYear);
    function FGetChartEleveCount(date)
    {

        if (chartInstance) {
            chartInstance.dispose();
        }
        $.ajax({
            type: "get",
            url: urlChartCountEleve,
            data:
            {
                date : date
            },
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {

                    am5.ready(function()
                    {
                        var root = am5.Root.new("ChartCountCreatedEleve");
                        root.setThemes([
                        am5themes_Animated.new(root)
                        ]);
                        var chart = root.container.children.push(
                        am5xy.XYChart.new(root, {
                            panX: true,
                            panY: true,
                            wheelX: "panX",
                            wheelY: "zoomX",
                            paddingLeft: 5,
                            paddingRight:5
                        })
                        );
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
                        var data =[];
                        $.each(response.data, function (index, value)
                        {
                            data.push({
                                country: value.month,
                                value: value.user_count
                            });

                        });


                        xAxis.data.setAll(data);
                        series.data.setAll(data);

                        series.appear(1000);
                        chart.appear(1000, 100);

                    });
                }
            }
        });
    } */
    /* $('#yearpicker').on('change',function()
    {
        var year = $(this).val();


        FGetChartEleveCount(year);
    }); */
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

    am5.ready(function()
        {
            var root = am5.Root.new("chartdiv");
            root.setThemes([
            am5themes_Animated.new(root)
            ]);

            var chart = root.container.children.push(
                am5percent.PieChart.new(root, {
                    endAngle: 270
                })
            );

            var series = chart.series.push(
                am5percent.PieSeries.new(root, {
                    valueField: "value",
                    categoryField: "category",
                    endAngle: 270
                })
            );

            series.states.create("hidden", {
                endAngle: -90
            });
            series.data.setAll([{
                category: "Lithuania",
                value: 501.9
            },
            {
                category: "Czechia",
                value: 301.9
            },
            {
                category: "Ireland",
                value: 201.1
            },
            {
                category: "Germany",
                value: 165.8
            },
            {
                category: "Australia",
                value: 139.9
            },
            {
                category: "Austria",
                value: 128.3
            },
            {
                category: "UK",
                value: 99
            }]);
            series.appear(1000, 100);

        });
});


        /************** */
        am5.ready(function()
        {
            var root = am5.Root.new("chartColumn");
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "none",
                wheelY: "none",
                paddingLeft: 0
            }));
            chart.zoomOutButton.set("forceHidden", true);
            var xRenderer = am5xy.AxisRendererX.new(root,
            {
                minGridDistance: 30,
                minorGridEnabled: true
            });
            xRenderer.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: 0,
                paddingRight: 15
            });
            xRenderer.grid.template.set("visible", false);

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "country",
                renderer: xRenderer
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                min: 0,
                renderer: am5xy.AxisRendererY.new(root, {})
            }));

            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                categoryXField: "country"
            }));


            series.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5,
                strokeOpacity: 0
            });


            series.columns.template.adapters.add("fill", function (fill, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", function (stroke, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });
            series.bullets.push(function ()
            {
                return am5.Bullet.new(root, {
                    locationY: 1,
                    sprite: am5.Label.new(root, {
                    text: "{valueYWorking.formatNumber('#.')}",
                    fill: root.interfaceColors.get("alternativeText"),
                    centerY: 0,
                    centerX: am5.p50,
                    populateText: true
                    })
                });
            });


            // Set data
                var data = [{
                "country": "USA",
                "value": 2025
            }, {
                "country": "China",
                "value": 1882
            }, {
                "country": "Japan",
                "value": 1809
            }, {
                "country": "Germany",
                "value": 1322
            }, {
                "country": "UK",
                "value": 1122
            }, {
                "country": "France",
                "value": 1114
            }, {
                "country": "India",
                "value": 984
            }, {
                "country": "Spain",
                "value": 711
            }, {
                "country": "Netherlands",
                "value": 665
            }, {
                "country": "South Korea",
                "value": 443
            }, {
                "country": "Canada",
                "value": 441
            }];

            xAxis.data.setAll(data);
            series.data.setAll(data);

            // update data with random values each 1.5 sec
            setInterval(function () {
                updateData();
            }, 1500)

            function updateData()
            {
                am5.array.each(series.dataItems, function (dataItem)
                {
                    var value = dataItem.get("valueY") + Math.round(Math.random() * 300 - 150);
                    if (value < 0)
                    {
                        value = 10;
                    }
                    // both valueY and workingValueY should be changed, we only animate workingValueY
                    dataItem.set("valueY", value);
                    dataItem.animate({
                        key: "valueYWorking",
                        to: value,
                        duration: 600,
                        easing: am5.ease.out(am5.ease.cubic)
                    });
                })

                sortCategoryAxis();
            }



            function getSeriesItem(category)
            {
                for (var i = 0; i < series.dataItems.length; i++)
                {
                    var dataItem = series.dataItems[i];
                    if (dataItem.get("categoryX") == category)
                    {
                        return dataItem;
                    }
                }
            }



            function sortCategoryAxis()
            {

                // Sort by value
                series.dataItems.sort(function (x, y) {
                    return y.get("valueY") - x.get("valueY"); // descending
                    //return y.get("valueY") - x.get("valueY"); // ascending
                })

                // Go through each axis item
                am5.array.each(xAxis.dataItems, function (dataItem)
                {
                    // get corresponding series item
                    var seriesDataItem = getSeriesItem(dataItem.get("category"));

                    if (seriesDataItem)
                    {
                        // get index of series data item
                        var index = series.dataItems.indexOf(seriesDataItem);
                        // calculate delta position
                        var deltaPosition = (index - dataItem.get("index", 0)) / series.dataItems.length;
                        // set index to be the same as series data item index
                        dataItem.set("index", index);
                        // set deltaPosition instanlty
                        dataItem.set("deltaPosition", -deltaPosition);
                        // animate delta position to 0
                        dataItem.animate({
                            key: "deltaPosition",
                            to: 0,
                            duration: 1000,
                            easing: am5.ease.out(am5.ease.cubic)
                        })
                    }
                });
                xAxis.dataItems.sort(function (x, y)
                {
                    return x.get("index") - y.get("index");
                });
            }
            series.appear(1000);
            chart.appear(1000, 100);

        });


