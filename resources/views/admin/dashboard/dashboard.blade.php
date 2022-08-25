@extends("layouts.app")
@section("style")
<link href="{{  asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
<link href="{{  asset('assets/plugins/highcharts/css/highcharts.css')}}" rel="stylesheet" />
@endsection



    @section("wrapper")
        <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                <!--div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                         
                            <div id="chart8"></div>
                        </div>
                    </div>
                </div-->
               
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div id="chart6"></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div id="chart7"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--end row-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                
            </div>
            <!--end row-->
            <!--end row-->
            
            <!--end row-->
            
            <!--end row-->
           
        </div>
    </div>
    @endsection


@section("script")
<!-- Vector map JavaScript -->
<script src="{{  asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- highcharts js -->
<script src="{{asset('assets/plugins/highcharts/js/highcharts.js')}}"></script>
<script src="{{asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>

<script>
   
    $(function() {
      
        
        e = {
            series: [{
                name: "Total Users",
                data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
            }],
            chart: {
                type: "bar",
                height: 65,
                toolbar: {
                    show: !1
                },
                zoom: {
                    enabled: !1
                },
                dropShadow: {
                    enabled: !0,
                    top: 3,
                    left: 14,
                    blur: 4,
                    opacity: .12,
                    color: "#17a00e"
                },
                sparkline: {
                    enabled: !0
                }
            },
            markers: {
                size: 0,
                colors: ["#17a00e"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "45%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                show: !0,
                width: 0,
                curve: "smooth"
            },
            colors: ["#17a00e"],
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                theme: "dark",
                fixed: {
                    enabled: !1
                },
                x: {
                    show: !1
                },
                y: {
                    title: {
                        formatter: function(e) {
                            return ""
                        }
                    }
                },
                marker: {
                    show: !1
                }
            }
        };
        //new ApexCharts(document.querySelector("#chart2"), e).render();
        e = {
            series: [{
                name: "Page Views",
                data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
            }],
            chart: {
                type: "bar",
                height: 65,
                toolbar: {
                    show: !1
                },
                zoom: {
                    enabled: !1
                },
                dropShadow: {
                    enabled: !0,
                    top: 3,
                    left: 14,
                    blur: 4,
                    opacity: .12,
                    color: "#f41127"
                },
                sparkline: {
                    enabled: !0
                }
            },
            markers: {
                size: 0,
                colors: ["#f41127"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "45%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                show: !0,
                width: 0,
                curve: "smooth"
            },
            colors: ["#f41127"],
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                theme: "dark",
                fixed: {
                    enabled: !1
                },
                x: {
                    show: !1
                },
                y: {
                    title: {
                        formatter: function(e) {
                            return ""
                        }
                    }
                },
                marker: {
                    show: !1
                }
            }
        };
      //  new ApexCharts(document.querySelector("#chart3"), e).render();
        e = {
            series: [{
                name: "Avg. Session Duration",
                data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
            }],
            chart: {
                type: "bar",
                height: 65,
                toolbar: {
                    show: !1
                },
                zoom: {
                    enabled: !1
                },
                dropShadow: {
                    enabled: !0,
                    top: 3,
                    left: 14,
                    blur: 4,
                    opacity: .12,
                    color: "#0d6efd"
                },
                sparkline: {
                    enabled: !0
                }
            },
            markers: {
                size: 0,
                colors: ["#0d6efd"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "45%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                show: !0,
                width: 0,
                curve: "smooth"
            },
            colors: ["#0d6efd"],
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                theme: "dark",
                fixed: {
                    enabled: !1
                },
                x: {
                    show: !1
                },
                y: {
                    title: {
                        formatter: function(e) {
                            return ""
                        }
                    }
                },
                marker: {
                    show: !1
                }
            }
        };
     //   new ApexCharts(document.querySelector("#chart4"), e).render();
     arrDespacho
     var barra = <?php echo json_encode($dataDash); ?>;
     var serie = <?php echo json_encode($dataS); ?>;
     var dataUser = <?php echo json_encode($user); ?>;
     var dataProces = <?php echo json_encode($procesos); ?>;

     var dataPuntos = <?php echo json_encode($puntos); ?>;
     var arrDespacho = <?php echo json_encode($arrDespacho); ?>;
     var dataP = <?php echo  ($procesos); ?>;

     e = {
            series: [{
                name: "Bounce Rate",
                data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
            }],
            chart: {
                type: "bar",
                height: 65,
                toolbar: {
                    show: !1
                },
                zoom: {
                    enabled: !1
                },
                dropShadow: {
                    enabled: !0,
                    top: 3,
                    left: 14,
                    blur: 4,
                    opacity: .12,
                    color: "#ffb207"
                },
                sparkline: {
                    enabled: !0
                }
            },
            markers: {
                size: 0,
                colors: ["#ffb207"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "45%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                show: !0,
                width: 0,
                curve: "smooth"
            },
            colors: ["#ffb207"],
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                theme: "dark",
                fixed: {
                    enabled: !1
                },
                x: {
                    show: !1
                },
                y: {
                    title: {
                        formatter: function(e) {
                            return ""
                        }
                    }
                },
                marker: {
                    show: !1
                }
            }
        };
         Highcharts.chart("chart6", {
            chart: {
                height: 350,
                type: "column",
                styledMode: !0
            },
            credits: {
                enabled: !1
            },
            title: {
                text: "Porcentaje de Procesos por Departamento, 2020"
            },
            accessibility: {
                announceNewData: {
                    enabled: !0
                }
            },
            xAxis: {
                type: "category"
            },
            yAxis: {
                title: {
                    text: "Total percent market share"
                }
            },
            legend: {
                enabled: !1
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: !0,
                        format: "{ y:.1f}%"
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },
            series: [{
                name: "Porcentaje de Procesos por Juzgados",
                colorByPoint: !0,
               data:dataPuntos
               // data: 
            }],
            drilldown: {
                series: [{
                    name: "Chrome",
                    id: "Chrome",
                    data: [
                        ["v65.0", .1],
                        ["v64.0", 1.3],
                        ["v63.0", 53.02],
                        ["v62.0", 1.4],
                        ["v61.0", .88],
                        ["v60.0", .56],
                        ["v59.0", .45],
                        ["v58.0", .49],
                        ["v57.0", .32],
                        ["v56.0", .29],
                        ["v55.0", .79],
                        ["v54.0", .18],
                        ["v51.0", .13],
                        ["v49.0", 2.16],
                        ["v48.0", .13],
                        ["v47.0", .11],
                        ["v43.0", .17],
                        ["v29.0", .26]
                    ]
                }, {
                    name: "Firefox",
                    id: "Firefox",
                    data: [
                        ["v58.0", 1.02],
                        ["v57.0", 7.36],
                        ["v56.0", .35],
                        ["v55.0", .11],
                        ["v54.0", .1],
                        ["v52.0", .95],
                        ["v51.0", .15],
                        ["v50.0", .1],
                        ["v48.0", .31],
                        ["v47.0", .12]
                    ]
                }, {
                    name: "Internet Explorer",
                    id: "Internet Explorer",
                    data: [
                        ["v11.0", 6.2],
                        ["v10.0", .29],
                        ["v9.0", .27],
                        ["v8.0", .47]
                    ]
                }, {
                    name: "Safari",
                    id: "Safari",
                    data: [
                        ["v11.0", 3.39],
                        ["v10.1", .96],
                        ["v10.0", .36],
                        ["v9.1", .54],
                        ["v9.0", .13],
                        ["v5.1", .2]
                    ]
                }, {
                    name: "Edge",
                    id: "Edge",
                    data: [
                        ["v16", 2.6],
                        ["v15", .92],
                        ["v14", .4],
                        ["v13", .1]
                    ]
                }, {
                    name: "Opera",
                    id: "Opera",
                    data: [
                        ["v50.0", .96],
                        ["v49.0", .82],
                        ["v12.1", .14]
                    ]
                }]
            }
        }), Highcharts.chart("chart7", {
            chart: {
                height: 350,
                type: "column",
                styledMode: !0
            },
            credits: {
                enabled: !1
            },
            title: {
                text: "Porcentaje de Procesos por Juzgados"
            },
            accessibility: {
                announceNewData: {
                    enabled: !0
                }
            },
            xAxis: {
                type: "category"
            },
            yAxis: {
                title: {
                    text: "Total percent market share"
                }
            },
            legend: {
                enabled: !1
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: !0,
                        format: "{point.y:.1f}%"
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },
            series: [{
                name: "Traffic Sources",
                colorByPoint: !0,
                data:  arrDespacho
            }],
            drilldown: {
                series: [{
                    name: "Chrome",
                    id: "Chrome",
                    data: [
                        ["v65.0", .1],
                        ["v64.0", 1.3],
                        ["v63.0", 53.02],
                        ["v62.0", 1.4],
                        ["v61.0", .88],
                        ["v60.0", .56],
                        ["v59.0", .45],
                        ["v58.0", .49],
                        ["v57.0", .32],
                        ["v56.0", .29],
                        ["v55.0", .79],
                        ["v54.0", .18],
                        ["v51.0", .13],
                        ["v49.0", 2.16],
                        ["v48.0", .13],
                        ["v47.0", .11],
                        ["v43.0", .17],
                        ["v29.0", .26]
                    ]
                }, {
                    name: "Firefox",
                    id: "Firefox",
                    data: [
                        ["v58.0", 1.02],
                        ["v57.0", 7.36],
                        ["v56.0", .35],
                        ["v55.0", .11],
                        ["v54.0", .1],
                        ["v52.0", .95],
                        ["v51.0", .15],
                        ["v50.0", .1],
                        ["v48.0", .31],
                        ["v47.0", .12]
                    ]
                }, {
                    name: "Internet Explorer",
                    id: "Internet Explorer",
                    data: [
                        ["v11.0", 6.2],
                        ["v10.0", .29],
                        ["v9.0", .27],
                        ["v8.0", .47]
                    ]
                }, {
                    name: "Safari",
                    id: "Safari",
                    data: [
                        ["v11.0", 3.39],
                        ["v10.1", .96],
                        ["v10.0", .36],
                        ["v9.1", .54],
                        ["v9.0", .13],
                        ["v5.1", .2]
                    ]
                }, {
                    name: "Edge",
                    id: "Edge",
                    data: [
                        ["v16", 2.6],
                        ["v15", .92],
                        ["v14", .4],
                        ["v13", .1]
                    ]
                }, {
                    name: "Opera",
                    id: "Opera",
                    data: [
                        ["v50.0", .96],
                        ["v49.0", .82],
                        ["v12.1", .14]
                    ]
                }]
            }
        }), Highcharts.chart("chart8", {
            chart: {
                type: "bar",
                styledMode: !0
            },
            credits: {
                enabled: !1
            },
            exporting: {
                buttons: {
                    contextButton: {
                        enabled: !1
                    }
                }
            },
            title: {
                text: "Visitor by Gender"
            },
            xAxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May","Junio","Julio","Agosto","Sept","Octubre","Noviembre","Diciembre"],
                min: 0,
                title: {
                    text: "Visitor by Genders",
                    style: {
                        display: "none"
                    }
                }
            },
            legend: {
                reversed: !1
            },
            plotOptions: {
                series: {
                    stacking: "normal"
                }
            },
            series: [{
                name: "Male",
                data: [15, 3, 4, 7, 2,2,4,6,5,4,8,7]
            }, {
                name: "Female",
                data: [2, 2, 3, 2, 1]
            }, {
                name: "Others",
                data: [3, 4, 4, 2, 5]
            }]
        });
        e = {
            series: [42, 47, 52, 58, 65],
            chart: {
                height: 340,
                type: "polarArea"
            },
            labels: ["Chrome", "Firefox", "Edge", "Opera", "Safari"],
            fill: {
                opacity: 1
            },
            stroke: {
                width: 1,
                colors: void 0
            },
            colors: ["#17a00e", "#0dcaf0", "#f41127", "#ffc107", "#0d6efd"],
            yaxis: {
                show: !1
            },
            dataLabels: {
                enabled: !1
            },
            legend: {
                show: !1,
                position: "bottom"
            },
            plotOptions: {
                polarArea: {
                    rings: {
                        strokeWidth: 0
                    }
                }
            }
        };
        
        
       // new PerfectScrollbar('.dashboard-top-countries');
        
        
        
        
        
    });
</script>
@endsection
