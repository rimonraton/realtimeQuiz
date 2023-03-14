{{--{{$users}}--}}
<option value="">{{__('Select User')}}</option>
<option value="">{{__('Everybody')}}</option>
@foreach($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
@endforeach
