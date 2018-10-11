{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('titre', 'Titre:') !!}
			{!! Form::text('titre') !!}
		</li>
		<li>
			{!! Form::label('type', 'Type:') !!}
			{!! Form::text('type') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::text('description') !!}
		</li>
		<li>
			{!! Form::label('companies_id', 'Companies_id:') !!}
			{!! Form::text('companies_id') !!}
		</li>
		<li>
			{!! Form::label('frequence', 'Frequence:') !!}
			{!! Form::text('frequence') !!}
		</li>
		<li>
			{!! Form::label('heure', 'Heure:') !!}
			{!! Form::text('heure') !!}
		</li>
		<li>
			{!! Form::label('debut', 'Debut:') !!}
			{!! Form::text('debut') !!}
		</li>
		<li>
			{!! Form::label('fin', 'Fin:') !!}
			{!! Form::text('fin') !!}
		</li>
		<li>
			{!! Form::label('sub_skills_id', 'Sub_skills_id:') !!}
			{!! Form::text('sub_skills_id') !!}
		</li>
		<li>
			{!! Form::label('is_valid', 'Is_valid:') !!}
			{!! Form::text('is_valid') !!}
		</li>
		<li>
			{!! Form::label('expiration', 'Expiration:') !!}
			{!! Form::text('expiration') !!}
		</li>
		<li>
			{!! Form::label('besoin', 'Besoin:') !!}
			{!! Form::text('besoin') !!}
		</li>
		<li>
			{!! Form::label('cout', 'Cout:') !!}
			{!! Form::text('cout') !!}
		</li>
		<li>
			{!! Form::label('lieu', 'Lieu:') !!}
			{!! Form::text('lieu') !!}
		</li>
		<li>
			{!! Form::label('materiel', 'Materiel:') !!}
			{!! Form::text('materiel') !!}
		</li>
		<li>
			{!! Form::label('deplacement', 'Deplacement:') !!}
			{!! Form::text('deplacement') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}