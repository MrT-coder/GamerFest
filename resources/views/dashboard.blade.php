@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="/reportes" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
</div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-4">
            <div class="card bg-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Inscritos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalInscritos }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-4">
            <div class="card bg-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Juegos (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalJuegos }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gamepad fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-4">
            <div class="card bg-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Saldo (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $saldo }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ingresos y Egresos</h6>
                </div>
                <div class="card-body">
                    <canvas id="line-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Inscritos por Carrera</h6>
                </div>
                <div class="card-body">
                    <canvas id="bar-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Inscritos por Juego</h6>
                </div>
                <div class="card-body">
                    <canvas id="bar-chart-horizontal"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Inscritos por Modalidad</h6>
                </div>
                <div class="card-body">
                    <canvas id="doughnut-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
    var ingresos = @json($datosingresos);
        var egresos = @json($datosegresos);

        // Unir las listas de fechas y eliminar duplicados, ordenarlas
        var fechasUnicas = [...new Set([...ingresos.map(item => item.fecha), ...egresos.map(item => item.fecha)])].sort();

        // Crear un objeto para mapear las fechas a los valores
        var ingresosPorFecha = ingresos.reduce((acc, item) => {
            acc[item.fecha] = item.total;
            return acc;
        }, {});

        var egresosPorFecha = egresos.reduce((acc, item) => {
            acc[item.fecha] = item.total;
            return acc;
        }, {});

        new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: fechasUnicas,
                datasets: [{
                        data: fechasUnicas.map(fecha => ingresosPorFecha[fecha] || 0),
                        label: "Ingresos",
                        borderColor: "#3e95cd",
                        fill: true
                    },
                    {
                        data: fechasUnicas.map(fecha => egresosPorFecha[fecha] || 0),
                        label: "Egresos",
                        borderColor: "#c45850",
                        fill: true
                    }
                ]
            },
            options: {
                title: {
                    display: false,
                    text: 'INGRESOS Y EGRESOS'
                }
            }
        });

        var datos = @json($personasPorCarrera);

        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: datos.map(item => item.carrera),
                datasets: [{
                    label: "Inscritos",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: datos.map(item => item.total),
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: false,
                    text: 'Inscritos por Carrera'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });

        var datos = @json($inscritosPorJuego);

new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
        labels: datos.map(item => item.nombre),
        datasets: [{
            label: "Inscritos",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
            data: datos.map(item => item.total),
        }]
    },
    options: {
        legend: {
            display: false
        },
        title: {
            display: false,
            text: 'Inscritos por Juego'
        },
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true,
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                }
            }]
        }
    }
});

var datos = @json($inscritosPorModalidad);

    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: datos.map(item => item.modalidad),
            datasets: [{
                label: "Inscritos",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                data: datos.map(item => item.total)
            }]
        },
        options: {
            title: {
                display: false,
                text: 'Número de personas inscritas por modalidad'
            }
        }
    });

</script>
@stop