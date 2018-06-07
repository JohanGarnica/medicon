<div class="form-group">
	<label>Nombres</label>
	{!!Form::select('user_id',$usuarios,null,[
		'class'=>'form-control',
		'placeholder'=>'Escoger usuario...'
	])!!}
</div>

<div class="form-group">
	<label>Telefono</label>
	{!!Form::text('telefono',null,[
		'class'=>'form-control',
		'placeholder'=>'Telefono...',
		'required'=>'required'
	])!!}
</div>

<div class="form-group">
	<label>Tarjeta Profesional</label>
	{!!Form::text('tarjeta_prof',null,[
		'class'=>'form-control',
		'placeholder'=>'Su Tarjeta Profesional...',
		'required'=>'required'
	])!!}
</div>

<div class="form-group">
	<label>Servicio</label>
	{!!Form::select('servicio_id',$servicios,null,[
		'class'=>'form-control',
		'placeholder'=>'Escoger servicio...'
	])!!}
</div>

<!-- Botones de guardar y cancelar-->
<div class="form-group text-center">
	<button type="submit" class="btn btn-success">Guardar Medico</button>
	<a class="btn btn-danger" href="{{ route('medicos.index') }}">Cancelar</a>
</div>