@foreach($subtopic as $st)
@if($loop->first)
<option value="">Select Sub Topic</option>
@endif
<option value="{{$st->id}}">{{$st->name}}</option>
@endforeach