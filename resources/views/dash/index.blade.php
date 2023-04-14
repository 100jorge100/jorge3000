@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h3 class="text-center">Cantidad de Proyectos Aperturados Por Mes</h3>
                        <div class=" col-ld-12" style="display: block; width: 100%; height: 400px">
                            <canvas id="myChart1"></canvas>
                        </div>
                    </div>
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
                    <h3>Numero de Proyectos Por Cantones</h3>
                    <canvas id="myChart2" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3>Numero de Proyectos Por Categorias</h3>
                    <canvas id="myChart3" class="my-custom-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .my-custom-canvas {
        width: 400px; /* ajusta el ancho del canvas según tus necesidades */
        height: 250px;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const nombresDelMes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var data = {
    labels: nombresDelMes,
    datasets: [
        {
        label: "Cantidad de Proyectos Iniciando el presente mes:",
        data: {!! json_encode(array_values($cantidadPorMes)) !!},
        backgroundColor: "rgba(75, 192, 192, 0.2)", // color de fondo de las barras
        borderColor: "rgba(75, 192, 192, 1)", // color del borde de las barras
        borderWidth: 1, // ancho del borde de las barras
        type: "bar" // tipo de gráfico: barras
        },
        {
        label: "Cantidad de Proyectos Iniciando el presente mes:",
        data: {!! json_encode(array_values($cantidadPorMes)) !!},
        borderColor: "rgba(255, 99, 132, 1)", // color del borde de la línea
        fill: false, // no rellenar el área bajo la línea
        type: "line" // tipo de gráfico: línea
        }
    ]
    };
    var ctx = document.getElementById("myChart1").getContext("2d");
    var myChart = new Chart(ctx, {
    type: "bar", // tipo de gráfico: barras
    data: data,
    options: {
                plugins: {
                    title: {
                        display: false,
                    },
                    legend: {
                        position: 'right'
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
    });


</script>

<script>
    $(document).ready(function() {
        const cData = JSON.parse(`<?php echo json_encode($data1['data1']); ?>`);
        // console.log(cData);
        const ctx = document.getElementById('myChart2').getContext('2d');

        const mychart = new Chart(ctx, {
            type: 'doughnut',
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
                        display: false,
                    },
                    legend: {
                        position: 'right'
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
        const ctx = document.getElementById('myChart3').getContext('2d');

        const mychart = new Chart(ctx, {
            type: 'doughnut',
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
                        display: false,
                    },
                    legend: {
                        position: 'right'
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

@stop
