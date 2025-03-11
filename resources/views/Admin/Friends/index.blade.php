@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp

@section('css')
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center"> Friends </h4>
          <hr>
          <div class="table-responsive" style="overflow-x: hidden">

            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-striped table-bordered">
                    <thead>
                    <tr role="row">
                      <th class="text-center" width="8%">{{__('form.sl')}}</th>
                      <th class="text-center" width="30%">{{ __('form.name') }}</th>
                      <th class="text-center" >{{__('form.email')}}</th>
                      <th class="text-center" style="width: 20%">{{__('form.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td class="text-center">{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                        <td class="text-center">
                          @if(strlen($user->name) > 30)
                            {{ substr($user->name, 0, 30) . '...'}}
                          @else
                            {{$user->name}}
                          @endif
                        </td>
                        <td>{{$user->email}}</td>

                        <td class="text-center">
                          @if(count($user->friendsFrom) > 0)
                            @if($user->friendsFrom[0]->pivot->status === 'accepted')
                              <button
                                class="unfriend btn btn-xs btn-info"
                                data-id="{{$user->friendsFrom[0]->pivot->id}}"
                                title="Unfriend Request"
                              >
                                Unfriend
                              </button>
                            @else
                              <button
                                class="removeFriend btn btn-xs btn-outline-danger"
                                data-id="{{$user->friendsFrom[0]->pivot->id}}"
                                title="Remove Request">
                                <i class="fas fa-trash"></i>
                                Cancel
                              </button>
                              <button class="btn btn-xs btn-outline-info"
                                      title="Friend Requested">
                                Requested
                              </button>
                            @endif
                          @elseif(count($user->friendsTo) > 0)
                            @if($user->friendsTo[0]->pivot->status == 'accepted')
                              <button
                                class="unfriend btn btn-xs btn-info"
                                data-id="{{$user->friendsTo[0]->pivot->id}}"
                                title="Unfriend Request"
                              >
                                Unfriend
                              </button>
                            @else
                              <button
                                class="removeFriend btn btn-xs btn-outline-danger"
                                data-id="{{$user->friendsTo[0]->pivot->id}}"
                                title="Remove Request">
                                <i class="fas fa-trash"></i>
                                Cancel
                              </button>
                              <button
                                class="acceptFriend btn btn-xs btn-outline-primary"
                                data-id="{{$user->friendsTo[0]->pivot->id}}"
                                title="Accept Request">
                                <i class="fas fa-check"></i>
                                Confirm
                              </button>
                            @endif
                          @else
                            <button class="addFriend btn btn-xs btn-outline-info"
                                    data-id="{{$user->id}}"
                                    title="Add Friend">
                              <i class="mdi mdi-account-plus"></i>
                              Add Friend
                            </button>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {{$users->links()}}
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <form action="{{ route('friends.send') }}" method="POST" id="formFriendRequest">
    @csrf
    <input type="hidden" name="receiver_id" id="receiverId">
  </form>

@endsection

@section('js')

  <script>
    $(function(){
      $('.addFriend').click(function (){
        let receiver_id = $(this).data('id');
        $(this).text('Requested').removeClass('addFriend')
        $.ajax({
          url: "{{ route('friends.send') }}",
          type: 'POST',
          data: {'receiver_id': receiver_id },
          success: function (data){
            if(data['status'] === 'success') {
              Swal.fire({
                text: data['msg'],
                type: 'success',
                timer: 3000,
                showConfirmButton: false
              })
            }else{
              Swal.fire({
                text: data['msg'],
                type: 'error',
                timer: 3000,
                showConfirmButton: false
              })
            }
            setTimeout(() =>{
              location.reload();
            }, 3000)

          }
        })
      })

      $('.acceptFriend').click(function (){
        let friend_id = $(this).data('id');
        $.ajax({
          url: "{{ url('friendAccept') }}/"+ friend_id,
          type: 'POST',
          success: function (data) {
            Swal.fire({
              text: data,
              type: 'success',
              timer: 3000,
              showConfirmButton: false
            })
            setTimeout(() =>{
              location.reload();
            }, 3000)

          }
        })
      })

      $('.removeFriend, .unfriend').click(function (){
        let friend_id = $(this).data('id');
        $.ajax({
          url: "{{ url('friendCancel') }}/"+ friend_id,
          type: 'POST',
          success: function (data) {
            Swal.fire({
              text: data,
              type: 'success',
              timer: 3000,
              showConfirmButton: false
            })
            setTimeout(() =>{
              location.reload();
            }, 3000)

          }
        })
      })


    });
  </script>

@endsection

