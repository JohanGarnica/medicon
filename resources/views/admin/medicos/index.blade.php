@extends('admin.template')
@section('titulo','Medicos')

@section('titulocontenido')
	<h1>Medicos <small>Listado</small></h1>
@endsection

@section('contenido')
	<div class="container box box-success">
		<br>
			<a class="btn btn-primary" href="{{ route('medicos.create') }}">Crear Nuevo</a>
			<hr>	
		@if(\Session::has('mensaje'))
			<div class="alert alert-success alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			   {{\Session::get('mensaje')}}
			</div>
		@endif
			
			
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="text-center">Nombres</th>
					<th class="text-center">telefono</th>
					<th class="text-center">Tarjeta Prfesional</th>
					<th class="text-center">Servicio</th>
					<th class="text-center">Editar</th>
					<th class="text-center">Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($medicos as $medico)
					<tr>
						<td>{{$medico->user->name}}</td>
						<td>{{$medico->telefono}}</td>
						<td>{{$medico->tarjeta_prof}}</td>
						<td>{{$medico->servicios->nombre}}</td>
						<td class="text-center"><a class="btn btn-warning" href="{{ route('medicos.edit',$medico->id) }}">Editar</a></td>
						<td class="text-center">
							<form method="post" action="{{ route('medicos.destroy',$medico->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-danger" type="submit" onClick="return confirm('¿Desea Inhabilitar el usuario?')">Borrar</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<hr>
		
		<div class="text-center">
			{{$medicos->links()}}
		</div>	
		
	</div>
@endsection