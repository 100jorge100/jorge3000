@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Numero De Proyectos Por Comunidades</h1>
@stop


@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Canton Peñas</h4><button id="openModalBtnA" class="btn btn-success"><i class="fas fa-chart-pie"></i></button>
                    <canvas id="myChart1" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Canton Batallas</h4><button id="openModalBtnB" class="btn btn-success"><i class="fas fa-chart-pie"></i></button>
                    <canvas id="myChart2" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Canton Villa San Juan de Chachacomani</h4><button id="openModalBtnC" class="btn btn-success"><i class="fas fa-chart-pie"></i></button>
                    <canvas id="myChart3" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Canton Kerani</h4><button id="openModalBtnD" class="btn btn-success"><i class="fas fa-chart-pie"></i></button>
                    <canvas id="myChart4" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Canton Huayna Potosi de Palcoco</h4><button id="openModalBtnE" class="btn btn-success"><i class="fas fa-chart-pie"></i></button>
                    <canvas id="myChart6" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Canton Villa Remedios de Calasaya</h4><button id="openModalBtnF" class="btn btn-success"><i class="fas fa-chart-pie"></i></button>
                    <canvas id="myChart7" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Canton Villa Asuncion de Tuquia</h4><button id="openModalBtnG" class="btn btn-success"><i class="fas fa-chart-pie"></i></button>
                    <canvas id="myChart8" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Canton Karhuiza</h4><button id="openModalBtnH" class="btn btn-success"><i class="fas fa-chart-pie"></i></button>
                    <canvas id="myChart5" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Canton Huancane</h4> <button id="openModalBtnI" class="btn btn-success"><i class="fas fa-chart-pie"></i></button>
                    <canvas id="myChart9" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ----------------------------------------------------------------------------------------------- --}}
{{-- Ventana modal con contenido de canton peñas inicio --}}
<div class="modal fade" id="myModalA" tabindex="-1" role="dialog" aria-labelledby="myModalALabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Numero de Proyectos por Categorias</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <canvas id="chartCanvasA"></canvas>
        </div>
      </div>
    </div>
</div>
{{-- Ventana modal con contenido de canton peñas final --}}

{{-- Ventana modal con contenido de canton batallas inicio --}}
<div class="modal fade" id="myModalB" tabindex="-1" role="dialog" aria-labelledby="myModalBabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Numero de Proyectos por Categorias</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <canvas id="chartCanvasB"></canvas>
        </div>
      </div>
    </div>
</div>
{{-- Ventana modal con contenido de canton batallas final --}}

{{-- Ventana modal con contenido de Canton Villa San Juan de Chachacomani inicio --}}
<div class="modal fade" id="myModalC" tabindex="-1" role="dialog" aria-labelledby="myModalALabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Numero de Proyectos por Categorias</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <canvas id="chartCanvasC"></canvas>
        </div>
      </div>
    </div>
</div>
{{-- Ventana modal con contenido de Canton Villa San Juan de Chachacomani final --}}

{{-- Ventana modal con contenido de Canton Kerani inicio --}}
<div class="modal fade" id="myModalD" tabindex="-1" role="dialog" aria-labelledby="myModalBabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Numero de Proyectos por Categorias</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <canvas id="chartCanvasD"></canvas>
        </div>
      </div>
    </div>
</div>
{{-- Ventana modal con contenido de Canton Kerani final --}}

{{-- Ventana modal con contenido de Canton Huayna Potosi de Palcoco inicio --}}
<div class="modal fade" id="myModalE" tabindex="-1" role="dialog" aria-labelledby="myModalALabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Numero de Proyectos por Categorias</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <canvas id="chartCanvasE"></canvas>
        </div>
      </div>
    </div>
</div>
{{-- Ventana modal con contenido de Canton Huayna Potosi de Palcoco final --}}

{{-- Ventana modal con contenido de Canton Villa Remedios de Calasaya inicio --}}
<div class="modal fade" id="myModalF" tabindex="-1" role="dialog" aria-labelledby="myModalBabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Numero de Proyectos por Categorias</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <canvas id="chartCanvasF"></canvas>
        </div>
      </div>
    </div>
</div>
{{-- Ventana modal con contenido de Canton Villa Remedios de Calasaya final --}}

{{-- Ventana modal con contenido de Canton Villa Asuncion de Tuquia inicio --}}
<div class="modal fade" id="myModalG" tabindex="-1" role="dialog" aria-labelledby="myModalALabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Numero de Proyectos por Categorias</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <canvas id="chartCanvasG"></canvas>
        </div>
      </div>
    </div>
</div>
{{-- Ventana modal con contenido de Canton Villa Asuncion de Tuquia final --}}

{{-- Ventana modal con contenido de Canton Karhuiza inicio --}}
<div class="modal fade" id="myModalH" tabindex="-1" role="dialog" aria-labelledby="myModalBabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Numero de Proyectos por Categorias</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <canvas id="chartCanvasH"></canvas>
        </div>
      </div>
    </div>
</div>
{{-- Ventana modal con contenido de Canton Karhuiza final --}}

{{-- Ventana modal con contenido de Canton Huancane inicio --}}
<div class="modal fade" id="myModalI" tabindex="-1" role="dialog" aria-labelledby="myModalBabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Numero de Proyectos por Categorias</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <canvas id="chartCanvasI"></canvas>
        </div>
      </div>
    </div>
</div>
{{-- Ventana modal con contenido de Canton Huancane final --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- Enlace a los archivos de Chart.js y Bootstrap inicio --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{--Enlace a los archivos de Chart.js y Bootstrap final  --}}
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Enlace a los archivos de Chart.js y Bootstrap inicio -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Enlace a los archivos de Chart.js y Bootstrap final -->

    <script>
        $(document).ready(function() {
            const cData = JSON.parse(`<?php echo json_encode($data1['data1']); ?>`);
            // console.log(cData);
            const ctx = document.getElementById('myChart1').getContext('2d');

            const mychart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: cData.label1,
                    datasets: [{
                        label: 'Numero de proyectos:',
                        data: cData.data1,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],

                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Canton Peñas',
                            fontSize: 24
                        },
                        legend: {
                            position: 'left'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,

                            }
                        }]
                    }
                }
            })
        });
    </script>

    <script>
        $(document).ready(function() {

            const cData = JSON.parse(`<?php echo json_encode($data2['data2']); ?>`);
            // console.log(cData);
            const ctx = document.getElementById('myChart2').getContext('2d');


            const mychart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: cData.label2,
                    datasets: [{
                        label: 'Numero de proyectos:',
                        data: cData.data2,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],

                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Canton Batallas',
                            fontSize: 24
                        },
                        legend: {
                            position: 'left'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,

                            }
                        }]
                    }
                }
            })
        });
    </script>

    <script>
        $(document).ready(function() {

            const cData = JSON.parse(`<?php echo json_encode($data3['data3']); ?>`);
            // console.log(cData);
            const ctx = document.getElementById('myChart3').getContext('2d');

            const mychart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: cData.label3,
                    datasets: [{
                        label: 'Numero de proyectos:',
                        data: cData.data3,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],

                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Canton Villa San Juan de Chachacomani',
                            fontSize: 24
                        },
                        legend: {
                            position: 'left'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,

                            }
                        }]
                    }
                }
            })
        });
    </script>

<script>
    $(document).ready(function() {

        let data4 = `<?php echo json_encode($data4['data4']); ?>`;
            // // console.log(ddd);
        const cData = JSON.parse(data4);
            // console.log("asdasd asd asdas");
            // console.log("data3", cData);
        const ctx = document.getElementById('myChart4').getContext('2d');


        const mychart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: cData.label4,
                datasets: [{
                    label: 'Numero de proyectos:',
                    data: cData.data4,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Canton Kerani',
                        fontSize: 24
                    },
                    legend: {
                        position: 'left'
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,

                        }
                    }]
                }
            }
        })
    });
</script>

<script>
    $(document).ready(function() {

        let data6 = `<?php echo json_encode($data6['data6']); ?>`;
            // // console.log(ddd);
        const cData = JSON.parse(data6);
            // console.log("asdasd asd asdas");
            // console.log("data3", cData);
        const ctx = document.getElementById('myChart6').getContext('2d');


        const mychart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: cData.label6,
                datasets: [{
                    label: 'Numero de proyectos:',
                    data: cData.data6,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Canton Huayna Potosi de Palcoco',
                        fontSize: 24
                    },
                    legend: {
                        position: 'left'
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,

                        }
                    }]
                }
            }
        })
    });
</script>

<script>
    $(document).ready(function() {

        let data7 = `<?php echo json_encode($data7['data7']); ?>`;
            // // console.log(ddd);
        const cData = JSON.parse(data7);
            // console.log("asdasd asd asdas");
            // console.log("data3", cData);
        const ctx = document.getElementById('myChart7').getContext('2d');


        const mychart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: cData.label7,
                datasets: [{
                    label: 'Numero de proyectos:',
                    data: cData.data7,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Canton Villa Remedios de Calasaya',
                        fontSize: 24
                    },
                    legend: {
                        position: 'left'
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,

                        }
                    }]
                }
            }
        })
    });
</script>

<script>
    $(document).ready(function() {

        let data8 = `<?php echo json_encode($data8['data8']); ?>`;
            // // console.log(ddd);
        const cData = JSON.parse(data8);
            // console.log("asdasd asd asdas");
            // console.log("data3", cData);
        const ctx = document.getElementById('myChart8').getContext('2d');


        const mychart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: cData.label8,
                datasets: [{
                    label: 'Numero de proyectos:',
                    data: cData.data8,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Canton Villa Asuncion de Tuquia',
                        fontSize: 24
                    },
                    legend: {
                        position: 'left'
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,

                        }
                    }]
                }
            }
        })
    });
</script>

<script>
    $(document).ready(function() {

        let data5 = `<?php echo json_encode($data5['data5']); ?>`;
            // // console.log(ddd);
        const cData = JSON.parse(data5);
            // console.log("asdasd asd asdas");
            // console.log("data3", cData);
        const ctx = document.getElementById('myChart5').getContext('2d');


        const mychart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: cData.label5,
                datasets: [{
                    label: 'Numero de proyectos:',
                    data: cData.data5,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Canton Karhuiza',
                        fontSize: 24
                    },
                    legend: {
                        position: 'left'
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,

                        }
                    }]
                }
            }
        })
    });
</script>

<script>
    $(document).ready(function() {

        let data9 = `<?php echo json_encode($data9['data9']); ?>`;
            // // console.log(ddd);
        const cData = JSON.parse(data9);
            // console.log("asdasd asd asdas");
            // console.log("data3", cData);
        const ctx = document.getElementById('myChart9').getContext('2d');


        const mychart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: cData.label9,
                datasets: [{
                    label: 'Numero de proyectos:',
                    data: cData.data9,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Canton Huancane ',
                        fontSize: 24
                    },
                    legend: {
                        position: 'left'
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,

                        }
                    }]
                }
            }
        })
    });
</script>

<!-- JavaScript para manejar la ventana modal y el gráfico -->

<script>
    const cDataA = JSON.parse(`<?php echo json_encode($dataA['dataA']); ?>`);
    // Obtener el botón y el elemento canvas
    var openModalBtnA = document.getElementById('openModalBtnA');
    var chartCanvasA = document.getElementById('chartCanvasA');

    // Configurar el evento de clic del botón
    openModalBtnA.addEventListener('click', function() {
      // Mostrar la ventana modal
      $('#myModalA').modal('show');

      // Crear el gráfico de tipo "Pie"
      var chart = new Chart(chartCanvasA, {
        type: 'pie',
        data: {
          labels: cDataA.labelA,
          datasets: [{
            data: cDataA.dataA,
            backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
          }]
        },
        options: {
          // Configurar opciones del gráfico
          // ...
        }
      });
    });
</script>

<script>
    const cDataB = JSON.parse(`<?php echo json_encode($dataB['dataB']); ?>`);
    // Obtener el botón y el elemento canvas
    var openModalBtnB = document.getElementById('openModalBtnB');
    var chartCanvasB = document.getElementById('chartCanvasB');

    // Configurar el evento de clic del botón
    openModalBtnB.addEventListener('click', function() {
      // Mostrar la ventana modal
      $('#myModalB').modal('show');

      // Crear el gráfico de tipo "Pie"
      var chart = new Chart(chartCanvasB, {
        type: 'pie',
        data: {
          labels: cDataB.labelB,
          datasets: [{
            data: cDataB.dataB,
            backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
          }]
        },
        options: {
          // Configurar opciones del gráfico
          // ...
        }
      });
    });
</script>

<script>
    const cDataC = JSON.parse(`<?php echo json_encode($dataC['dataC']); ?>`);
    // Obtener el botón y el elemento canvas
    var openModalBtnC = document.getElementById('openModalBtnC');
    var chartCanvasC = document.getElementById('chartCanvasC');

    // Configurar el evento de clic del botón
    openModalBtnC.addEventListener('click', function() {
      // Mostrar la ventana modal
      $('#myModalC').modal('show');

      // Crear el gráfico de tipo "Pie"
      var chart = new Chart(chartCanvasC, {
        type: 'pie',
        data: {
          labels: cDataC.labelC,
          datasets: [{
            data: cDataC.dataC,
            backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
          }]
        },
        options: {
          // Configurar opciones del gráfico
          // ...
        }
      });
    });
</script>

<script>
    const cDataD = JSON.parse(`<?php echo json_encode($dataD['dataD']); ?>`);
    // Obtener el botón y el elemento canvas
    var openModalBtnD = document.getElementById('openModalBtnD');
    var chartCanvasD = document.getElementById('chartCanvasD');

    // Configurar el evento de clic del botón
    openModalBtnD.addEventListener('click', function() {
      // Mostrar la ventana modal
      $('#myModalD').modal('show');

      // Crear el gráfico de tipo "Pie"
      var chart = new Chart(chartCanvasD, {
        type: 'pie',
        data: {
          labels: cDataD.labelD,
          datasets: [{
            data: cDataD.dataD,
            backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
          }]
        },
        options: {
          // Configurar opciones del gráfico
          // ...
        }
      });
    });
</script>

<script>
    const cDataE = JSON.parse(`<?php echo json_encode($dataE['dataE']); ?>`);
    // Obtener el botón y el elemento canvas
    var openModalBtnE = document.getElementById('openModalBtnE');
    var chartCanvasE = document.getElementById('chartCanvasE');

    // Configurar el evento de clic del botón
    openModalBtnE.addEventListener('click', function() {
      // Mostrar la ventana modal
      $('#myModalE').modal('show');

      // Crear el gráfico de tipo "Pie"
      var chart = new Chart(chartCanvasE, {
        type: 'pie',
        data: {
          labels: cDataE.labelE,
          datasets: [{
            data: cDataE.dataE,
            backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
          }]
        },
        options: {
          // Configurar opciones del gráfico
          // ...
        }
      });
    });
</script>

<script>
    const cDataF = JSON.parse(`<?php echo json_encode($dataF['dataF']); ?>`);
    // Obtener el botón y el elemento canvas
    var openModalBtnF = document.getElementById('openModalBtnF');
    var chartCanvasF = document.getElementById('chartCanvasF');

    // Configurar el evento de clic del botón
    openModalBtnF.addEventListener('click', function() {
      // Mostrar la ventana modal
      $('#myModalF').modal('show');

      // Crear el gráfico de tipo "Pie"
      var chart = new Chart(chartCanvasF, {
        type: 'pie',
        data: {
          labels: cDataF.labelF,
          datasets: [{
            data: cDataF.dataF,
            backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
          }]
        },
        options: {
          // Configurar opciones del gráfico
          // ...
        }
      });
    });
</script>

<script>
    const cDataG = JSON.parse(`<?php echo json_encode($dataG['dataG']); ?>`);
    // Obtener el botón y el elemento canvas
    var openModalBtnG = document.getElementById('openModalBtnG');
    var chartCanvasG = document.getElementById('chartCanvasG');

    // Configurar el evento de clic del botón
    openModalBtnG.addEventListener('click', function() {
      // Mostrar la ventana modal
      $('#myModalG').modal('show');

      // Crear el gráfico de tipo "Pie"
      var chart = new Chart(chartCanvasG, {
        type: 'pie',
        data: {
          labels: cDataG.labelG,
          datasets: [{
            data: cDataG.dataG,
            backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
          }]
        },
        options: {
          // Configurar opciones del gráfico
          // ...
        }
      });
    });
</script>

<script>
    const cDataH = JSON.parse(`<?php echo json_encode($dataH['dataH']); ?>`);
    // Obtener el botón y el elemento canvas
    var openModalBtnH = document.getElementById('openModalBtnH');
    var chartCanvasH = document.getElementById('chartCanvasH');

    // Configurar el evento de clic del botón
    openModalBtnH.addEventListener('click', function() {
      // Mostrar la ventana modal
      $('#myModalH').modal('show');

      // Crear el gráfico de tipo "Pie"
      var chart = new Chart(chartCanvasH, {
        type: 'pie',
        data: {
          labels: cDataH.labelH,
          datasets: [{
            data: cDataH.dataH,
            backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
          }]
        },
        options: {
          // Configurar opciones del gráfico
          // ...
        }
      });
    });
</script>

<script>
    const cDataI = JSON.parse(`<?php echo json_encode($dataI['dataI']); ?>`);
    // Obtener el botón y el elemento canvas
    var openModalBtnI = document.getElementById('openModalBtnI');
    var chartCanvasI = document.getElementById('chartCanvasI');

    // Configurar el evento de clic del botón
    openModalBtnI.addEventListener('click', function() {
      // Mostrar la ventana modal
      $('#myModalI').modal('show');

      // Crear el gráfico de tipo "Pie"
      var chart = new Chart(chartCanvasI, {
        type: 'pie',
        data: {
          labels: cDataI.labelI,
          datasets: [{
            data: cDataI.dataI,
            backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],

                    borderWidth: 1
          }]
        },
        options: {
          // Configurar opciones del gráfico
          // ...
        }
      });
    });
</script>

@stop
