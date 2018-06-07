<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>listado de usuarios</h1>
	<table>
			<thead>
				<tr>
					<th >Nombres</th>
					<th >Email</th>
					<th >Perfil</th>
					<th >Estado</th>
				
				</tr>
			</thead>
			<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{$usuario->name}}</td>
						<td>{{$usuario->email}}</td>
						<td>{{$usuario->perfil->nombre}}</td>
						<td>{{$usuario->estado->nombre}}</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>
	
</body>
</html>