{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('companies_id', 'Companies_id:') !!}
			{!! Form::text('companies_id') !!}
		</li>
		<li>
			{!! Form::label('skills_id', 'Skills_id:') !!}
			{!! Form::text('skills_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}