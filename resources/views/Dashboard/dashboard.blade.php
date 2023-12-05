@extends('Dashboard.index')
@section('navsidebar')
<?php
    use Carbon\Carbon;
    $today = Carbon::now();
    $formattedDate = ucfirst(trans($today->format('l'))) . ' ' . ucfirst(trans($today->format('F'))) . ' ' . $today->format('j, Y, H:i:s');
    $name = $formattedDate . ' GMT' . '-' . ($today->offset / 3600);
?>
    <div class="row">
        <div class="col-12">
            <div class="container">
                <h1 class="text-uppercase">Dashboard</h1>
                <h3 class="text-primary">{{$name}}</h3>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="container">
            <div class="container">
                <div class="card shadow " style="background: transparent;border-radius: 20px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-xl-6 p-4">
                                <h3 class="text-primary" >Welcome back, your dashboard is ready !</h3>
                                <p class="text-dark fs-2">Greate job your blabla bla jkhjhjkhjkhskkjsdlqqqqqqqqqqqqqqqqqqqqqqqqqq
                                    dfsffffffffffffffffffffffffffffffffffff
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6 p-4 ">
                                <img class="ImageDashboard" src="{{asset('image/ImageDashboard.svg')}}" height="250px" alt="" srcset="" >
                            </div>
                        </div>
                    </div>
                    <div>
                        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                            <defs>
                                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                            </defs>
                            <g class="parallax">
                                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(185,239,248,0.7" />
                                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(136,226,242,0.7)" />
                                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                                <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(111,178,190,0.7)" />
                            </g>
                        </svg>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-md-3 col-xl-3">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/professor.svg')}}"  width="90px" height="90px" alt="" srcset="">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">Professeur</h5>
                                </div>
                                <h5>50</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-xl-3">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/professor.svg')}}"  width="90px" height="90px" alt="" srcset="">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">Eleve</h5>
                                </div>
                                <h5>50</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-xl-3">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/professor.svg')}}"  width="90px" height="90px" alt="" srcset="">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">test 1</h5>
                                </div>
                                <h5>50</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-xl-3">
                        <div class="card" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/professor.svg')}}"  width="90px" height="90px" alt="" srcset="">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">test 2</h5>
                                </div>
                                <h5>50</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="card" style="border-radius: 20px">
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="card shadow">
                            <div class="bg-light text-primary p-3">
                                <h3>inshalhe hada floas ki roz</h3>
                            </div>
                            <div class="card-body">

                                <div class="card-text">
                                    <div id="chartColumn"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>

    </div>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>

    <script>
        am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(
  am5percent.PieChart.new(root, {
    endAngle: 270
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
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

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([{
  category: "Lithuania",
  value: 501.9
}, {
  category: "Czechia",
  value: 301.9
}, {
  category: "Ireland",
  value: 201.1
}, {
  category: "Germany",
  value: 165.8
}, {
  category: "Australia",
  value: 139.9
}, {
  category: "Austria",
  value: 128.3
}, {
  category: "UK",
  value: 99
}]);

series.appear(1000, 100);

}); // end am5.ready()
    </script>
    <script>
        am5.ready(function() {


// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartColumn");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: true,
  panY: true,
  wheelX: "none",
  wheelY: "none",
  paddingLeft: 0
}));

// We don't want zoom-out button to appear while animating, so we hide it
chart.zoomOutButton.set("forceHidden", true);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, {
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


// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  categoryXField: "country"
}));

// Rounded corners for columns
series.columns.template.setAll({
  cornerRadiusTL: 5,
  cornerRadiusTR: 5,
  strokeOpacity: 0
});

// Make each column to be of a different color
series.columns.template.adapters.add("fill", function (fill, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", function (stroke, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

// Add Label bullet
series.bullets.push(function () {
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

function updateData() {
  am5.array.each(series.dataItems, function (dataItem) {
    var value = dataItem.get("valueY") + Math.round(Math.random() * 300 - 150);
    if (value < 0) {
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


// Get series item by category
function getSeriesItem(category) {
  for (var i = 0; i < series.dataItems.length; i++) {
    var dataItem = series.dataItems[i];
    if (dataItem.get("categoryX") == category) {
      return dataItem;
    }
  }
}


// Axis sorting
function sortCategoryAxis() {

  // Sort by value
  series.dataItems.sort(function (x, y) {
    return y.get("valueY") - x.get("valueY"); // descending
    //return y.get("valueY") - x.get("valueY"); // ascending
  })

  // Go through each axis item
  am5.array.each(xAxis.dataItems, function (dataItem) {
    // get corresponding series item
    var seriesDataItem = getSeriesItem(dataItem.get("category"));

    if (seriesDataItem) {
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

  // Sort axis items by index.
  // This changes the order instantly, but as deltaPosition is set,
  // they keep in the same places and then animate to true positions.
  xAxis.dataItems.sort(function (x, y) {
    return x.get("index") - y.get("index");
  });
}


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

});
    </script>
    <style>
        #chartColumn {
  width: 100%;
  height: 500px;
}
#chartdiv {
  width: 80%;
  height: 400px;
  margin-left:50px;
}
        @import url(//fonts.googleapis.com/css?family=Lato:300:400);


        .ImageDashboard
        {
            position: absolute;
            display: flex;
            justify-content: center;
            justify-items: center;
            align-items: center;
            text-align: center;
        /*  margin: auto; */
            z-index: 9999;
            margin-left: 10%;
            padding-bottom: 1%;

        }
        .waves {
        position:relative;
        width: 100%;
        height:15vh;
        margin-bottom:-7px; /*Fix for safari gap*/
        min-height:100px;
        max-height:150px;
        }



        /* Animation */

        .parallax > use {
        animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
        }
        .parallax > use:nth-child(1) {
        animation-delay: -2s;
        animation-duration: 7s;
        }
        .parallax > use:nth-child(2) {
        animation-delay: -3s;
        animation-duration: 10s;
        }
        .parallax > use:nth-child(3) {
        animation-delay: -4s;
        animation-duration: 13s;
        }
        .parallax > use:nth-child(4) {
        animation-delay: -5s;
        animation-duration: 20s;
        }
        @keyframes move-forever {
        0% {
        transform: translate3d(-90px,0,0);
        }
        100% {
            transform: translate3d(85px,0,0);
        }
        }
        /*Shrinking for mobile*/
        @media (max-width: 768px) {
        .waves {
            height:40px;
            min-height:40px;
        }
        .content {
            height:30vh;
        }
        h1 {
            font-size:24px;
        }
        }
    </style>
@endsection
