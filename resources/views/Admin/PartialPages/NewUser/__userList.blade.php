{{--{{$users}}--}}
@if(count($users) > 0)
@foreach($users as $user)
<p class="list-group-item list-group-item-action userItem" style="cursor: pointer" data-id="{{$user->id}}" data-name="{{$user->name}}">{{$user->name}}</p>
@endforeach
@else
    <p class="list-group-item list-group-item-action userItem">No user found.</p>
@endif
{{--<a href="#" class="list-group-item list-group-item-action">Item 2</a>--}}
{{--<a href="#" class="list-group-item list-group-item-action">Item 3</a>--}}
