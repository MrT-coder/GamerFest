<table>
<thead>
<tr>
<th>#</th>
@foreach ($columnas_seleccionadas as $columna)
<th>{{ $columna }}</th>
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