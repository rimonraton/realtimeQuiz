<br>
<table class="table table-hover">
	<thead>
		<tr>
			<th>test</th>
			<th>test</th>
			<th>test</th>
			<th>test</th>
			<th>test</th>
		</tr>
	</thead>
	<tbody>
		@foreach($progress as $p)
			@php
				$start_date = new DateTime($p->start_at);
				$since_start = $start_date->diff(new DateTime($p->created_at));
			@endphp

			<tr>
				<td>{{ date('M-d-Y H:i:s', strtotime($p->start_at))  }}</td>
				<td>{{ $since_start->i . ' : ' . $since_start->s }}</td>
				<td>{{ $p->created_at->diffForHumans() }}</td>
				<td>{{ $p->results }}</td>
				<td>@include('includes.stars.'.$progress->count())</td>
			</tr>
		@endforeach
		
	</tbody>
</table>

