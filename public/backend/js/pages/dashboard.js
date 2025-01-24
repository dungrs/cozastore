"use strict";
var Ht = {
    getChartColorsArray: function(id) {
        if ($("#" + id).length > 0) {
            var colors = $("#" + id).attr("data-colors");
            return JSON.parse(colors).map(function(color) {
                var cleanedColor = color.replace(" ", "");
                if (cleanedColor.indexOf(",") === -1) {
                    var computedColor = getComputedStyle(document.documentElement).getPropertyValue(cleanedColor);
                    return computedColor || cleanedColor;
                }
                var splitColor = color.split(",");
                return splitColor.length != 2 ? cleanedColor : "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(splitColor[0]) + "," + splitColor[1] + ")";
            });
        }
    },

    initializeMiniChart: function() {
        var chartBarColors = this.getChartColorsArray("mini-1");
        var options = {
            series: [{
                data: [2, 36, 22, 30, 12, 38]
            }],
            chart: {
                type: "line",
                width: 130,
                height: 55,
                sparkline: {
                    enabled: true
                }
            },
            colors: chartBarColors,
            stroke: {
                curve: "smooth",
                width: 2.5
            },
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function(e) {
                            return ""
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        };
        var chart = new ApexCharts($("#mini-1")[0], options);
        chart.render();
    },

    initializeChartArea: function() {
        var chartBarColors = this.getChartColorsArray("chart-area");
        var options = {
            chart: {
                height: 159,
                type: "area",
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: "smooth",
                width: 2.5
            },
            series: [{
                name: "Previous",
                data: [55, 36, 61, 40, 58]
            }],
            colors: chartBarColors,
            legend: {
                show: false
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    inverseColors: false,
                    opacityFrom: 0.45,
                    opacityTo: 0.05,
                    stops: [20, 100, 100, 100]
                }
            },
            yaxis: {
                show: false
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May"]
            }
        };
        var chart = new ApexCharts($("#chart-area")[0], options);
        chart.render();
    },

    initializeColumnChart: function() {
        var chartBarColors = this.getChartColorsArray("column_chart");
        var options = {
            chart: {
                height: 410,
                type: "bar",
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 3,
                    horizontal: false,
                    columnWidth: "64%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"]
            },
            series: [{
                name: "Net Profit",
                data: [95, 40, 73, 60, 51, 37, 30]
            }, {
                name: "Revenue",
                data: [75, 26, 53, 44, 37, 26, 23]
            }],
            colors: chartBarColors,
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July"]
            },
            grid: {
                borderColor: "#f1f1f1"
            },
            fill: {
                opacity: 1
            },
            legend: {
                show: false
            },
            tooltip: {
                y: {
                    formatter: function(e) {
                        return "$ " + e + " thousands"
                    }
                }
            }
        };
        var chart = new ApexCharts($("#column_chart")[0], options);
        chart.render();
    },

    initializeDonutChart: function() {
        var chartBarColors = this.getChartColorsArray("chart-donut");
        var options = {
            chart: {
                height: 287,
                type: "donut"
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "75%"
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [60, 15, 8],
            labels: ["Completed", "Processing", "Cancel"],
            colors: chartBarColors,
            legend: {
                show: false
            }
        };
        var chart = new ApexCharts($("#chart-donut")[0], options);
        chart.render();
    },

    initializeSparklineCharts: function() {
        var sparklineData = [
            { id: "chart-sparkline1", data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 84] },
            { id: "chart-sparkline2", data: [50, 15, 35, 62, 23, 56, 44, 12, 36, 9, 54, 23] },
            { id: "chart-sparkline3", data: [25, 35, 35, 89, 63, 25, 44, 12, 36, 9, 54, 25] },
            { id: "chart-sparkline4", data: [50, 15, 35, 34, 23, 56, 65, 41, 36, 41, 32, 25] },
            { id: "chart-sparkline5", data: [45, 53, 24, 89, 63, 60, 36, 50, 36, 32, 54, 63] }
        ];

        var self = this;
        sparklineData.forEach(function(sparkline) {
            var chartBarColors = self.getChartColorsArray(sparkline.id);
            var options = {
                series: [{
                    data: sparkline.data
                }],
                chart: {
                    type: "area",
                    width: 120,
                    height: 40,
                    sparkline: {
                        enabled: true
                    }
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 0.45,
                        opacityTo: 0.05,
                        stops: [20, 100, 100, 100]
                    }
                },
                stroke: {
                    curve: "smooth",
                    width: 2
                },
                colors: chartBarColors,
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function(e) {
                                return ""
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                }
            };
            var chart = new ApexCharts($("#" + sparkline.id)[0], options);
            chart.render();
        });
    },

    initializeSalesCountriesChart: function() {
        var options = {
            series: [{
                data: [1040, 1320, 1560, 1280, 1480]
            }],
            chart: {
                type: "bar",
                height: 234,
                toolbar: {
                    show: false
                }
            },
            labels: ["Canada", "Russia", "Brazil", "United States", "Egypt"],
            colors: ["#776acf"],
            plotOptions: {
                bar: {
                    borderRadius: 3,
                    horizontal: true
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ["Canada", "Russia", "Brazil", "US", "Egypt"]
            }
        };
        var chart = new ApexCharts($("#sales-countries")[0], options);
        chart.render();
    },

    initializeWorldMap: function() {
        new jsVectorMap({
            map: "world_merc",
            selector: "#world-map-markers",
            zoomOnScroll: false,
            zoomButtons: false,
            opacity: 1,
            regionStyle: {
                initial: {
                    fill: "#f0f2f3"
                }
            },
            markerStyle: {
                initial: {
                    fill: "#3cbf87"
                },
                selected: {
                    fill: "#3cbf87"
                }
            },
            markers: [{
                name: "Canada",
                coords: [56.1304, -106.3468]
            }, {
                name: "Brazil",
                coords: [-14.235, -51.9253]
            }, {
                name: "Egypt",
                coords: [26.8206, 30.8025]
            }, {
                name: "Russia",
                coords: [61, 105]
            }, {
                name: "United States",
                coords: [37.0902, -95.7129]
            }],
            lines: [{
                from: "Canada",
                to: "Egypt"
            }, {
                from: "Russia",
                to: "Egypt"
            }, {
                from: "Brazil",
                to: "Egypt"
            }, {
                from: "United States",
                to: "Egypt"
            }],
            lineStyle: {
                animation: true,
                strokeDasharray: "6 3 6"
            }
        });
    },

    initializeSwiper: function() {
        new Swiper(".swiper-container", {
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                576: {
                    slidesPerView: 1,
                    spaceBetween: 30
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                1500: {
                    slidesPerView: 2,
                    spaceBetween: 30
                }
            }
        });
    }
};

// Thực thi các phương thức của đối tượng Ht khi tài liệu đã sẵn sàng
$(document).ready(function() {
    Ht.initializeMiniChart();
    Ht.initializeChartArea();
    Ht.initializeColumnChart();
    Ht.initializeDonutChart();
    Ht.initializeSparklineCharts();
    Ht.initializeSalesCountriesChart();
    Ht.initializeWorldMap();
    Ht.initializeSwiper();
});