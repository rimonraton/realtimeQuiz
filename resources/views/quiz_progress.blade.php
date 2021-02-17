<br>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Time</th>
			<th>Started At</th>
			<th>End At</th>
			<th>Star</th>
		</tr>
	</thead>
	<tbody>
		@foreach($progress as $p)
			@php
				$start_date = new DateTime($p->start_at);
				$since_start = $start_date->diff(new DateTime($p->created_at));
			@endphp

			<tr>
				<td>{{ $p->created_at->diffForHumans()   }}</td>
				<td>{{ $p->start_at }}</td>
				<td>{{ $p->created_at }}</td>
				<td>@include('includes.stars.1')</td>
			</tr>
		@endforeach

	</tbody>
</table>

