<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table .table {
            background-color: #fff;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .table-borderless th,
        .table-borderless td,
        .table-borderless thead th,
        .table-borderless tbody+tbody {
            border: 0;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-hover tbody tr:hover {
            color: #212529;
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table-primary,
        .table-primary>th,
        .table-primary>td {
            background-color: #b8daff;
        }

        .table-primary th,
        .table-primary td,
        .table-primary thead th,
        .table-primary tbody+tbody {
            border-color: #7abaff;
        }

        .table-hover .table-primary:hover {
            background-color: #9fcdff;
        }

        .table-hover .table-primary:hover>td,
        .table-hover .table-primary:hover>th {
            background-color: #9fcdff;
        }

        .table-secondary,
        .table-secondary>th,
        .table-secondary>td {
            background-color: #d6d8db;
        }

        .h3 {
            font-size: 1.5rem;
        }

    </style>
</head>

<body class="font-sans antialiased">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="h1">Reporte de tabla: {{ $tabla_seleccionada }}</h3>
        {{-- <img src="{{ asset('img/logoGamerFest.png') }}" class="img-fluid d-block" alt="Logo GamerFest"
            style="max-height: 100px"> --}}
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                @foreach ($columnas_seleccionadas as $columna)
                <th class="text-center">{{ $columna }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse($resultadosConsulta as $row)
            <tr>
                <th scope="row">{{ $loop->iteration }}</td>
                    @foreach ($columnas_seleccionadas as $columna)
                <td class="align-middle">{{ $row->$columna }}</td>
                @endforeach
            </tr>
            @empty
            <tr>
                <td colspan="{{ count($columnas_seleccionadas) + 1 }}" class="text-center">No hay datos
                    disponibles</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>