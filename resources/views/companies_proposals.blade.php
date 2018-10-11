{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('creation', 'Creation:') !!}
			{!! Form::text('creation') !!}
		</li>
		<li>
			{!! Form::label('match', 'Match:') !!}
			{!! Form::text('match') !!}
		</li>
		<li>
			{!! Form::label('confirmation', 'Confirmation:') !!}
			{!! Form::text('confirmation') !!}
		</li>
		<li>
			{!! Form::label('companies_id', 'Companies_id:') !!}
			{!! Form::text('companies_id') !!}
		</li>
		<li>
			{!! Form::label('proposals_id', 'Proposals_id:') !!}
			{!! Form::text('proposals_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}