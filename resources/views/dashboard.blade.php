@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container mt-3">
    <div class="row g-4">
        <div class="col-md-4">
            <h3></h3>
            <p>Inscritos</p>
        </div>
        <div class="col-md-4">
            <canvas id="bar-chart" class="w-100"></canvas>
        </div>
        <div class="col-md-4">
            <canvas id="line-chart" class="w-100"></canvas>
        </div>
        <!-- Añadir más filas según sea necesario -->
        <div class="col-md-6">
            <canvas id="bar-chart-horizontal" class="w-100"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="doughnut-chart" class="w-100"></canvas>
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
                    display: true,
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
                    display: true,
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
            display: true,
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
                display: true,
                text: 'Número de personas inscritas por modalidad'
            }
        }
    });

    </script>
@stop
