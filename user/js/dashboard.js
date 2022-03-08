(function($) {
  'use strict';
  $(function() {
    if ($("#growth-rate-chart").length) {
      var areaData = {
        labels: ["Jun","","Jul","","Aug","","Sep","", "Oct","", "Nov","","Dec"],
        datasets: [
          {
            data: [0, 100, 330, 300, 400, 150, 100, 205, 200, 300, 420, 400, 500],
            borderColor: [
              '#817da1'
            ],
            borderWidth: 1.5,
            fill: false,
            label: "Orders"
          },
          {
            data: [0, 50, 100, 200, 260, 215, 200, 320, 300, 470, 400, 300, 200],
            borderColor: [
              '#0acf97'
            ],
            borderWidth: 1.5,
            fill: false,
            label: "Downloads"
          },
          {
            data: [0, 25, 60, 40, 130,60, 20, 50, 110, 100, 80, 90, 50],
            borderColor: [
              '#f35958'
            ],
            borderWidth: 1.5,
            fill: false,
            label: "Growth"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              display: true,
              padding: 10
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 100,
              min: 0,
              max: 600,
              padding: 18
            },
            gridLines: {
              display: true,
              color: '#f5f5f5',
              zeroLineColor: '#f5f5f5',
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: 0
          },
          point: {
            radius: 0
          }
        }
      }
      var growthRateChartCanvas = $("#growth-rate-chart").get(0).getContext("2d");
      var growthRateChart = new Chart(growthRateChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }

    if ($("#growth-rate-chart-dark").length) {
      var areaData = {
        labels: ["Jun","","Jul","","Aug","","Sep","", "Oct","", "Nov","","Dec"],
        datasets: [
          {
            data: [0, 100, 330, 300, 400, 150, 100, 205, 200, 300, 420, 400, 500],
            borderColor: [
              '#817da1'
            ],
            borderWidth: 1.5,
            fill: false,
            label: "Orders"
          },
          {
            data: [0, 50, 100, 200, 260, 215, 200, 320, 300, 470, 400, 300, 200],
            borderColor: [
              '#0acf97'
            ],
            borderWidth: 1.5,
            fill: false,
            label: "Downloads"
          },
          {
            data: [0, 25, 60, 40, 130,60, 20, 50, 110, 100, 80, 90, 50],
            borderColor: [
              '#f35958'
            ],
            borderWidth: 1.5,
            fill: false,
            label: "Growth"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              display: true,
              padding: 10
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 100,
              min: 0,
              max: 600,
              padding: 18
            },
            gridLines: {
              display: true,
              color: 'rgba(129, 125, 161, 0.17)',
              zeroLineColor: 'rgba(129, 125, 161, 0.17)',
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: 0
          },
          point: {
            radius: 0
          }
        }
      }
      var growthRateChartDarkCanvas = $("#growth-rate-chart-dark").get(0).getContext("2d");
      var growthRateChartDark = new Chart(growthRateChartDarkCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }

    if ($("#revenue-chart").length) {
      var areaData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
        datasets: [{
            data: [80, 140, 105, 200, 115, 190, 50, 100, 0],
            backgroundColor: [
              '#f35958'
            ],
            borderColor: [
              'transparent'
            ],
            borderWidth: 1,
            fill: 'origin',
            label: "purchases"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: false,
            ticks: {
              display: true
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: false,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 100,
              min: 0,
              max: 300
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: .35
          },
          point: {
            radius: 0
          }
        }
      }
      var revenueChartCanvas = $("#revenue-chart").get(0).getContext("2d");
      var revenueChart = new Chart(revenueChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }

    if ($("#revenue-chart-b").length) {
      var areaData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
        datasets: [{
            data: [30, 100, 45, 240, 105, 140, 70, 190, 60],
            backgroundColor: [
              '#f35958'
            ],
            borderColor: [
              'transparent'
            ],
            borderWidth: 1,
            fill: 'origin',
            label: "purchases"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: false,
            ticks: {
              display: true
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: false,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 100,
              min: 0,
              max: 300
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: .35
          },
          point: {
            radius: 0
          }
        }
      }
      var revenueChartBCanvas = $("#revenue-chart-b").get(0).getContext("2d");
      var revenueChartB = new Chart(revenueChartBCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }

    if ($("#downloads-chart").length) {
      var downloadsChartCanvas = $("#downloads-chart").get(0).getContext("2d");
      var downloadsChart = new Chart(downloadsChartCanvas, {
        type: 'bar',
        data: {
          labels: ["Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: 'Profit',
              data: [280, 330, 370, 410, 290, 400, 309],
              backgroundColor: '#fff'
            },
            {
              label: 'Target',
              data: [600, 600, 600, 600, 600, 600, 600],
              backgroundColor: '#a2aaff'
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 20,
              bottom: 0
            }
          },
          scales: {
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                display: true,
                min: 0,
                max: 600,
                stepSize: 100,
                fontColor: "#fff"
              }
            }],
            xAxes: [{
              stacked: true,
              ticks: {
                beginAtZero: true,
                fontColor: "#fff"
              },
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
                display: false
              },
              barPercentage: .4
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
      });
    }

    if ($("#downloads-chart-b").length) {
      var downloadsChartBCanvas = $("#downloads-chart-b").get(0).getContext("2d");
      var downloadsChartB = new Chart(downloadsChartBCanvas, {
        type: 'bar',
        data: {
          labels: ["Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: 'Profit',
              data: [480, 230, 470, 310, 590, 200, 209],
              backgroundColor: '#fff'
            },
            {
              label: 'Target',
              data: [600, 600, 600, 600, 600, 600, 600],
              backgroundColor: '#a2aaff'
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 20,
              bottom: 0
            }
          },
          scales: {
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                display: true,
                min: 0,
                max: 600,
                stepSize: 100,
                fontColor: "#fff"
              }
            }],
            xAxes: [{
              stacked: true,
              ticks: {
                beginAtZero: true,
                fontColor: "#fff"
              },
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
                display: false
              },
              barPercentage: .4
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
      });
    }

    if ($("#users-chart").length) {
      var areaData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        datasets: [{
            data: [130, 135, 200, 140, 150, 100, 102, 120],
            backgroundColor: [
              '#0acf97'
            ],
            borderColor: [
              'transparent'
            ],
            borderWidth: 0,
            fill: 'origin',
            label: "purchases"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: false,
            ticks: {
              display: true
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: false,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 100,
              min: 0,
              max: 200
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: 0
          },
          point: {
            radius: 0
          }
        }
      }
      var usersChartCanvas = $("#users-chart").get(0).getContext("2d");
      var usersChart = new Chart(usersChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }

    if ($("#users-chart-dark").length) {
      var areaData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        datasets: [{
            data: [130, 135, 200, 140, 150, 100, 102, 120],
            backgroundColor: [
              '#0acf97'
            ],
            borderColor: [
              'transparent'
            ],
            borderWidth: 0,
            fill: 'origin',
            label: "purchases"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: false,
            ticks: {
              display: true
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: false,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 100,
              min: 0,
              max: 200
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: 0
          },
          point: {
            radius: 0
          }
        }
      }
      var usersChartCanvas = $("#users-chart-dark").get(0).getContext("2d");
      var usersChart = new Chart(usersChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }

    if ($("#customers-chart").length) {
      var areaData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        datasets: [{
            data: [120, 135, 70, 140, 100, 95, 142, 120],
            backgroundColor: [
              'rgba(255, 181, 72, .2)'
            ],
            borderColor: [
              'rgba(255, 181, 72, 1)'
            ],
            borderWidth: 2,
            fill: 'origin',
            label: "purchases"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: false,
            ticks: {
              display: true
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: false,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 100,
              min: 0,
              max: 200
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: 0
          },
          point: {
            radius: 0
          }
        }
      }
      var customersChartCanvas = $("#customers-chart").get(0).getContext("2d");
      var customersChart = new Chart(customersChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }

    $('#status-report-listing').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
      searching: false, paging: false, info: false
    });

    if ($("#status-chart").length) {
      var statusChartCanvas = document.getElementById('status-chart').getContext('2d');

      var gradient = statusChartCanvas.createLinearGradient(0, 0, 0, 150);
      gradient.addColorStop(0, 'rgba(102, 144, 255, .8)');
      gradient.addColorStop(1, 'rgba(255,255,255,0)');

      var bar_chart = new Chart(statusChartCanvas, {
          type: 'line',
          data: {
              labels: ['a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't','u', 'v', 'w', 'x', 'y', 'z','a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n'],
              datasets: [{
                  label: '# of Status',
                  data: [120, 120, 100, 115, 115, 140, 115, 150, 115, 115, 110, 90, 150, 80, 145, 160, 160, 170, 170, 185, 165, 170, 170, 170, 195, 170, 220, 170, 170, 165, 145, 185, 120, 170, 175, 175, 180, 180, 206, 230 ],
                  backgroundColor: gradient,
                  borderWidth: 2,
                  borderColor: '#6672ff'
              }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            plugins: {
              filler: {
                propagate: false
              }
            },
            scales: {
              xAxes: [{
                display: false,
                ticks: {
                  display: true
                },
                gridLines: {
                  display: false,
                  drawBorder: false,
                  color: 'transparent',
                  zeroLineColor: '#eeeeee'
                }
              }],
              yAxes: [{
                display: false,
                ticks: {
                  display: true,
                  autoSkip: false,
                  maxRotation: 0,
                  stepSize: 100,
                  min: 0,
                  max: 250
                },
                gridLines: {
                  drawBorder: false
                }
              }]
            },
            legend: {
              display: false
            },
            tooltips: {
              enabled: true
            },
            elements: {
              line: {
                tension: 0
              },
              point: {
                radius: 0
              }
            }
          }
      });
    }

    if ($("#chats-chart").length) {
      var chatsChartCanvas = document.getElementById('chats-chart').getContext('2d');

      var gradient = chatsChartCanvas.createLinearGradient(0, 0, 0, 150);
      gradient.addColorStop(0, 'rgba(243, 89, 88, .8)');
      gradient.addColorStop(1, 'rgba(255,255,255,0)');

      var bar_chart = new Chart(chatsChartCanvas, {
          type: 'line',
          data: {
              labels: ['a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't','u', 'v', 'w', 'x', 'y', 'z','a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n'],
              datasets: [{
                  label: '# of Status',
                  data: [230, 206, 180, 180, 175, 175, 170, 120, 185, 145, 165, 170, 170, 220, 170, 195, 170, 170, 170, 165, 185, 170, 170, 160, 160, 145, 80, 150, 90, 110, 115, 115, 150, 115, 140, 115, 115, 100, 120, 120],
                  backgroundColor: gradient,
                  borderWidth: 2,
                  borderColor: 'rgb(243, 89, 88)'
              }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            plugins: {
              filler: {
                propagate: false
              }
            },
            scales: {
              xAxes: [{
                display: false,
                ticks: {
                  display: true
                },
                gridLines: {
                  display: false,
                  drawBorder: false,
                  color: 'transparent',
                  zeroLineColor: '#eeeeee'
                }
              }],
              yAxes: [{
                display: false,
                ticks: {
                  display: true,
                  autoSkip: false,
                  maxRotation: 0,
                  stepSize: 100,
                  min: 0,
                  max: 250
                },
                gridLines: {
                  drawBorder: false
                }
              }]
            },
            legend: {
              display: false
            },
            tooltips: {
              enabled: true
            },
            elements: {
              line: {
                tension: 0
              },
              point: {
                radius: 0
              }
            }
          }
      });
    }

    if ($("#feedbacks-chart").length) {
      var feedbacksChartCanvas = document.getElementById('feedbacks-chart').getContext('2d');

      var gradient = feedbacksChartCanvas.createLinearGradient(0, 0, 0, 150);
      gradient.addColorStop(0, 'rgba(126, 211, 33, .8)');
      gradient.addColorStop(1, 'rgba(255,255,255,0)');

      var bar_chart = new Chart(feedbacksChartCanvas, {
          type: 'line',
          data: {
              labels: ['a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't','u', 'v', 'w', 'x', 'y', 'z','a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n'],
              datasets: [{
                  label: '# of Status',
                  data: [120, 120, 100, 115, 115, 140, 115, 150, 115, 115, 110, 90, 150, 80, 145, 160, 160, 170, 170, 185, 165, 170, 170, 170, 195, 170, 220, 170, 170, 165, 145, 185, 120, 170, 175, 175, 180, 180, 206, 230 ],
                  backgroundColor: gradient,
                  borderWidth: 2,
                  borderColor: 'rgb(126, 211, 33)'
              }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            plugins: {
              filler: {
                propagate: false
              }
            },
            scales: {
              xAxes: [{
                display: false,
                ticks: {
                  display: true
                },
                gridLines: {
                  display: false,
                  drawBorder: false,
                  color: 'transparent',
                  zeroLineColor: '#eeeeee'
                }
              }],
              yAxes: [{
                display: false,
                ticks: {
                  display: true,
                  autoSkip: false,
                  maxRotation: 0,
                  stepSize: 100,
                  min: 0,
                  max: 250
                },
                gridLines: {
                  drawBorder: false
                }
              }]
            },
            legend: {
              display: false
            },
            tooltips: {
              enabled: true
            },
            elements: {
              line: {
                tension: 0
              },
              point: {
                radius: 0
              }
            }
          }
      });
    }

    if ($("#status-chart-dark").length) {
      var statusChartDarkCanvas = document.getElementById('status-chart-dark').getContext('2d');

      var gradient = statusChartDarkCanvas.createLinearGradient(0, 0, 0, 150);
      gradient.addColorStop(0, 'rgba(102, 144, 255, .3)');
      gradient.addColorStop(1, 'rgba(0,0,0,0)');

      var bar_chart = new Chart(statusChartDarkCanvas, {
          type: 'line',
          data: {
              labels: ['a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't','u', 'v', 'w', 'x', 'y', 'z','a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n'],
              datasets: [{
                  label: '# of Status',
                  data: [120, 120, 100, 115, 115, 140, 115, 150, 115, 115, 110, 90, 150, 80, 145, 160, 160, 170, 170, 185, 165, 170, 170, 170, 195, 170, 220, 170, 170, 165, 145, 185, 120, 170, 175, 175, 180, 180, 206, 230 ],
                  backgroundColor: gradient,
                  borderWidth: 2,
                  borderColor: '#6672ff'
              }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            plugins: {
              filler: {
                propagate: false
              }
            },
            scales: {
              xAxes: [{
                display: false,
                ticks: {
                  display: true
                },
                gridLines: {
                  display: false,
                  drawBorder: false,
                  color: 'transparent',
                  zeroLineColor: '#eeeeee'
                }
              }],
              yAxes: [{
                display: false,
                ticks: {
                  display: true,
                  autoSkip: false,
                  maxRotation: 0,
                  stepSize: 100,
                  min: 0,
                  max: 250
                },
                gridLines: {
                  drawBorder: false
                }
              }]
            },
            legend: {
              display: false
            },
            tooltips: {
              enabled: true
            },
            elements: {
              line: {
                tension: 0
              },
              point: {
                radius: 0
              }
            }
          }
      });
    }

    if ($("#chats-chart-dark").length) {
      var chatsChartCanvas = document.getElementById('chats-chart-dark').getContext('2d');

      var gradient = chatsChartCanvas.createLinearGradient(0, 0, 0, 150);
      gradient.addColorStop(0, 'rgba(243, 89, 88, .3)');
      gradient.addColorStop(1, 'rgba(0,0,0,0)');

      var bar_chart = new Chart(chatsChartCanvas, {
          type: 'line',
          data: {
              labels: ['a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't','u', 'v', 'w', 'x', 'y', 'z','a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n'],
              datasets: [{
                  label: '# of Status',
                  data: [230, 206, 180, 180, 175, 175, 170, 120, 185, 145, 165, 170, 170, 220, 170, 195, 170, 170, 170, 165, 185, 170, 170, 160, 160, 145, 80, 150, 90, 110, 115, 115, 150, 115, 140, 115, 115, 100, 120, 120],
                  backgroundColor: gradient,
                  borderWidth: 2,
                  borderColor: 'rgb(243, 89, 88)'
              }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            plugins: {
              filler: {
                propagate: false
              }
            },
            scales: {
              xAxes: [{
                display: false,
                ticks: {
                  display: true
                },
                gridLines: {
                  display: false,
                  drawBorder: false,
                  color: 'transparent',
                  zeroLineColor: '#eeeeee'
                }
              }],
              yAxes: [{
                display: false,
                ticks: {
                  display: true,
                  autoSkip: false,
                  maxRotation: 0,
                  stepSize: 100,
                  min: 0,
                  max: 250
                },
                gridLines: {
                  drawBorder: false
                }
              }]
            },
            legend: {
              display: false
            },
            tooltips: {
              enabled: true
            },
            elements: {
              line: {
                tension: 0
              },
              point: {
                radius: 0
              }
            }
          }
      });
    }

    if ($("#feedbacks-chart-dark").length) {
      var feedbacksChartCanvas = document.getElementById('feedbacks-chart-dark').getContext('2d');

      var gradient = feedbacksChartCanvas.createLinearGradient(0, 0, 0, 150);
      gradient.addColorStop(0, 'rgba(126, 211, 33, .3)');
      gradient.addColorStop(1, 'rgba(0,0,0,0)');

      var bar_chart = new Chart(feedbacksChartCanvas, {
          type: 'line',
          data: {
              labels: ['a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't','u', 'v', 'w', 'x', 'y', 'z','a', 'b' ,'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n'],
              datasets: [{
                  label: '# of Status',
                  data: [120, 120, 100, 115, 115, 140, 115, 150, 115, 115, 110, 90, 150, 80, 145, 160, 160, 170, 170, 185, 165, 170, 170, 170, 195, 170, 220, 170, 170, 165, 145, 185, 120, 170, 175, 175, 180, 180, 206, 230 ],
                  backgroundColor: gradient,
                  borderWidth: 2,
                  borderColor: 'rgb(126, 211, 33)'
              }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            showLines: true,
            plugins: {
              filler: {
                propagate: false
              }
            },
            scales: {
              xAxes: [{
                display: false,
                ticks: {
                  display: true
                },
                gridLines: {
                  display: false,
                  drawBorder: false,
                  color: 'transparent',
                  zeroLineColor: '#eeeeee'
                }
              }],
              yAxes: [{
                display: false,
                ticks: {
                  display: true,
                  autoSkip: false,
                  maxRotation: 0,
                  stepSize: 100,
                  min: 0,
                  max: 250
                },
                gridLines: {
                  drawBorder: false
                }
              }]
            },
            legend: {
              display: false
            },
            tooltips: {
              enabled: true
            },
            elements: {
              line: {
                tension: 0
              },
              point: {
                radius: 0
              }
            }
          }
      });
    }

    if ($("#orders-downloads-chart").length) {
      var areaData = {
        labels: ["Apr","May","Jun","Jul", "Aug", "Sep","Oct"],
        datasets: [
          {
            data: [30, 40, 35, 70, 60, 100, 80 ],
            borderColor: [
              '#7ed321'
            ],
            borderWidth: 4,
            fill: false,
            label: "Orders"
          },
          {
            data: [50, 75, 80, 130, 120, 160, 140 ],
            borderColor: [
              '#6672ff'
            ],
            borderWidth: 4,
            fill: false,
            label: "Downloads"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              display: true,
              padding: 10
            },
            gridLines: {
              display: true,
              drawBorder: false,
              color: '#ebeaea',
              zeroLineColor: '#ebeaea'
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 40,
              min: 0,
              max: 200,
              padding: 18
            },
            gridLines: {
              display: true,
              color: 'transparent',
              zeroLineColor: '#ebeaea',
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: 0.2
          },
          point: {
            radius: 0
          }
        }
      }
      var ordersDownloadsChartCanvas = $("#orders-downloads-chart").get(0).getContext("2d");
      var ordersDownloadsChart = new Chart(ordersDownloadsChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }

    if ($("#orders-downloads-chart-dark").length) {
      var areaData = {
        labels: ["Apr","May","Jun","Jul", "Aug", "Sep","Oct"],
        datasets: [
          {
            data: [30, 40, 35, 70, 60, 100, 80 ],
            borderColor: [
              '#7ed321'
            ],
            borderWidth: 4,
            fill: false,
            label: "Orders"
          },
          {
            data: [50, 75, 80, 130, 120, 160, 140 ],
            borderColor: [
              '#6672ff'
            ],
            borderWidth: 4,
            fill: false,
            label: "Downloads"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              display: true,
              padding: 10
            },
            gridLines: {
              display: true,
              drawBorder: false,
              color: 'rgba(129, 125, 161, 0.17)',
              zeroLineColor: 'rgba(129, 125, 161, 0.17)'
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 40,
              min: 0,
              max: 200,
              padding: 18
            },
            gridLines: {
              display: true,
              color: 'transparent',
              zeroLineColor: 'rgba(129, 125, 161, 0.17)',
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: 0.2
          },
          point: {
            radius: 0
          }
        }
      }
      var ordersDownloadsChartDarkCanvas = $("#orders-downloads-chart-dark").get(0).getContext("2d");
      var ordersDownloadsChartDark = new Chart(ordersDownloadsChartDarkCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }

    if ($("#weekly-sales-chart").length) {
      var areaData = {
        labels: ["Jan", "Feb", "Mar"],
        datasets: [{
            data: [100, 35, 20,45 ],
            backgroundColor: [
              "#6672ff", "#fa5c7c", "#0acf97", "#d8d8d8",
            ],
            borderColor: "rgba(0,0,0,0)"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        segmentShowStroke: false,
        cutoutPercentage: 60,
        elements: {
          arc: {
              borderWidth: 4
          }
        },      
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        legendCallback: function(chart) { 
          var text = [];
          text.push('<div class="report-chart">');
            text.push('<div class="d-flex justify-content-between mx-3 mt-2 pb-2 border-bottom"><div class="d-flex align-items-center"><div class="mr-3" style="width:14px; height:14px; background-color: ' + chart.data.datasets[0].backgroundColor[0] + '"></div><p class="mb-0">Week 1</p></div>');
            text.push('<h5 class="mb-0">883</h5>');
            text.push('</div>');
            text.push('<div class="d-flex justify-content-between mx-3 mt-2 pb-2 border-bottom"><div class="d-flex align-items-center"><div class="mr-3" style="width:14px; height:14px; background-color: ' + chart.data.datasets[0].backgroundColor[1] + '"></div><p class="mb-0">Week 2</p></div>');
            text.push('<h5 class="mb-0">663</h5>');
            text.push('</div>');
            text.push('<div class="d-flex justify-content-between mx-3 mt-2 pb-2 border-bottom"><div class="d-flex align-items-center"><div class="mr-3" style="width:14px; height:14px; background-color: ' + chart.data.datasets[0].backgroundColor[2] + '"></div><p class="mb-0">Week 3</p></div>');
            text.push('<h5 class="mb-0">836</h5>');
            text.push('</div>');
            text.push('<div class="d-flex justify-content-between mx-3 mt-2 pb-2 border-bottom"><div class="d-flex align-items-center"><div class="mr-3" style="width:14px; height:14px; background-color: ' + chart.data.datasets[0].backgroundColor[2] + '"></div><p class="mb-0">Week 4</p></div>');
            text.push('<h5 class="mb-0">740</h5>');
            text.push('</div>');
          text.push('</div>');
          return text.join("");
        },
      }
      var weeklySalesChartCanvas = $("#weekly-sales-chart").get(0).getContext("2d");
      var weeklySalesChart = new Chart(weeklySalesChartCanvas, {
        type: 'doughnut',
        data: areaData,
        options: areaOptions,
      });
      document.getElementById('weekly-sales-legend').innerHTML = weeklySalesChart.generateLegend();
    }


  });
})(jQuery);