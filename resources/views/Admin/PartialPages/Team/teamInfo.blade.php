
@foreach($team_result as $tr)
    @php
        $results = collect(json_decode($tr->results))
    @endphp
    @foreach($results as $result)
        {{$result->name}}
    @endforeach
@endforeach
