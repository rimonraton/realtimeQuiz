@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">
{{--                        {{ dd(Permission::can('createNewUser')) }}--}}
                        {{__('form.user_list')}}
                        @if(Permission::can('createNewUser'))
                        <button type="button" class="btn btn-info btn-rounded m-t-8 mb-2 float-right add" data-toggle="modal" data-role_id="0">
                            {{__('form.add_user')}}
                        </button>
                            @endif
                    </h4>
                    <hr>
                </div>
            </div>
<div class="row justify-content-center">
    <!-- Column -->
    @foreach($role_wise_user as $rws)
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card bg-success">
                        <div class="card-body text-white">
                            <div class="d-flex flex-row">
                                <div class="align-self-center display-6">
                                    <i class="fas fa-address-card"></i>
                                </div>
                                <div class="p-2 align-self-center">
                                    <h4 class="mb-0 text-white">{{$lang=='gb'?$rws->role_name:$rws->bn_role_name}}</h4>
                                    <!-- <span>Income</span> -->
                                </div>
                                <div class="ml-auto align-self-center">
                                    <!-- <h2 class="font-weight-medium mb-0 text-white">$2900</h2> -->
                                    <a data-role_id="{{$rws->id}}" style="cursor:pointer;" class="text-white add"><i class="fas fa-plus"></i> {{__('form.add_new')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($rws->users)
                        <div class="table-responsive">

                            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr role="row">
                                                <th style="width: 0px;">{{__('form.sl')}}</th>
                                                <th style="width: 0px;">{{__('form.user')}}</th>
                                                <th style="width: 0px;">{{__('form.email')}}</th>
                                                <th style="width: 0px;">{{__('form.mobile')}}</th>
                                                <th style="width: 0px;">{{__('form.action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $roleUsers = $rws->users->paginate(15)  @endphp
                                            @foreach($roleUsers as $user)
                                                @if($user->user)
                                                    <tr>
                                                        <td>{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                                                        <th>{{$user->user->name}}</th>
                                                        <th>{{$user->user->email}}</th>
                                                        <th>{{$user->user->info?$user->user->info->mobile:''}}</th>
                                                        <th>
                                                            <a class="edit" href="" data-id="{{$user->user_id}}" data-name="{{$user->user->name}}" data-email="{{$user->user->email}}" data-role="{{$user->role_id}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                            <a class="delete text-danger" style="cursor: pointer;" data-id="{{$user->user_id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                                            <a class="text-info send-message" style="cursor: pointer;" data-id="{{$user->user_id}}" href="" title="Send Mail">
                                                                <i class="fas fa-paper-plane"></i>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                                                <th rowspan="1" colspan="1">{{__('form.user')}}</th>
                                                <th rowspan="1" colspan="1">{{__('form.email')}}</th>
                                                <th rowspan="1" colspan="1">{{__('form.mobile')}}</th>
                                                <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                                            </tr>
                                            </tfoot>
                                        </table>
{{--                                        <div class="row mt-4 justify-content-center" id="topic_pagination">--}}
{{--                                            {{$roleUsers->links()}}--}}
{{--                                        </div>--}}
                                        <!-- <div class="text-center">
                                            <p>
                                                No Data Found..
                                            </p>
                                        </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                    <div class="text-center">
                        @if(count($rws->users) > 15)
                        <a class="btn btn-warning border border-warning rounded-lg" href="{{route('roleWiseUsers', $rws->id)}}" data-role="{{$rws->id}}" data-roleName="{{ $lang== 'gb' ? $rws->role_name : $rws->bn_role_name }}">{{__('form.show_all') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{--        </div>--}}
{{--    </div>--}}


    <div id="add-user" data-backdrop="static" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{__('form.new_user')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('create-new-user') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="admin_id" id="" value="{{$admin_id}}">
                        <div class="form-group row">
                            <label for="category" class="col-md-4 text-right control-label col-form-label">{{__('form.role')}}</label>
                            <div class="col-md-6" id="options">
                                <select class="form-control" name="role_id" id="selected_role">
                                    <option value="0">{{__('form.select_role')}}</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$lang=='gb'?$role->role_name:$role->bn_role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('form.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('form.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('form.password') }}</label>

                            <div class="col-md-6 input-group">
                                <input id="password" type="password"  value="{{$random}}" class="form-control @error('password') is-invalid @enderror" name="password" required  autocomplete="new-password">
                                {{--                                                    <input id="password" type="text"  value="{{$random}}">--}}
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-append">
                                    <button class="btn btn-success copy"  type="button"><i class="far fa-copy" data-pass="{{$random}}"></i></button>
                                    <div class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Click Copy icon to fill the confirm password field.If you want to give custom password,first remove password form password field then type custom password."><i class="fas fa-info-circle"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('form.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div id="CheckPasswordMatch"></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ __('form.add_user') }}
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                {{ __('form.cancel') }}
                            </button>
                        </div>

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="edit-user" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{__('form.role_update')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('update-new-user') }}" autocomplete="off">
                        @csrf
                        {{--<input type="hidden" name="admin_id" id="" value="{{$admin_id}}">--}}
                        <input type="hidden" name="id" id="uid">
                        <div class="form-group row">
                            <label for="category" class="col-md-4 text-right control-label col-form-label">{{__('form.role')}}</label>
                            <div class="col-md-6" id="options">
                                <select class="form-control" name="role_id" id="select_role">
                                    <option value="0">{{__('form.select_role')}}</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$lang=='gb'?$role->role_name:$role->bn_role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('form.name') }}</label>

                            <div class="col-md-6">
                                <input id="upname" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('form.email') }}</label>

                            <div class="col-md-6">
                                <input id="upemail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="uppassword" class="col-md-4 col-form-label text-md-right">{{ __('form.password') }}</label>

                            <div class="col-md-6">
                                <input type="password" id="uppassword"  class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                {{--                                                    <input id="password" type="text"  value="{{$random}}">--}}
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
{{--                                <div class="input-group-append">--}}
{{--                                    <button class="btn btn-success copy"  type="button"><i class="far fa-copy" data-pass="{{$random}}"></i></button>--}}
{{--                                </div>--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="uppassword-confirm" class="col-md-4 col-form-label text-md-right">{{ __('form.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="uppassword-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ __('form.update') }}
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                {{ __('form.cancel') }}
                            </button>
                        </div>

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $("#password-confirm").keyup(checkPasswordMatch);
            function checkPasswordMatch() {
                var password = $("#password").val();
                var confirmPassword = $("#password-confirm").val();
                if (password != confirmPassword)
                    $("#CheckPasswordMatch").html("<p class='text-danger'>Passwords does not match!</p>");
                else
                    $("#CheckPasswordMatch").html("<p class='text-success'>Passwords match.</p>");
            }


            $('#password').keyup(function (){
                $('#password').attr('value',$(this).val());
            })
            $('.send-message').on('click',function (e){
                e.preventDefault();
                var $this = $(this);
                var id = $(this).data('id');
                $.ajax({
                    url:"{{url('send-email')}}/"+id,
                    type:"Get",
                    beforeSend:function (){
                        console.log('Before Send');
                        $this.html('<i class="fas fa-spinner fa-spin"></i>');
                    },
                    success:function (data){
                        console.log(data);
                    },
                    complete:function (){
                        console.log('Completed');
                        $this.html('<i class="fas fa-paper-plane"></i> <i class="fas fa-check text-success"></i>');
                    }
                })
            })

            async function cp(){
                const text = event.target.dataset.pass
                if (!navigator.clipboard) {
                    // Clipboard API not available
                    writeText(text);
                    return
                }
                console.log(event.target);
                console.log(text);
                await navigator.clipboard.writeText(text)
                console.log(text);
                $('#password-confirm').val(text)
            }
            function writeText(str) {
                return new Promise(function(resolve, reject) {
                    var success = false;
                    function listener(e) {
                        e.clipboardData.setData("text/plain", str);
                        e.preventDefault();
                        success = true;
                    }
                    document.addEventListener("copy", listener);
                    document.execCommand("copy");
                    document.removeEventListener("copy", listener);
                    success ? resolve(): reject();
                    $('#password-confirm').val(str);
                });
            };
            $('.copy').on('click',function (){
                cp();
              // var pass =  $('#password').val();
              // writeText(pass);
            });

            $(document).on('click', '.edit', function(e) {
                e.preventDefault();
                $('#uid').val($(this).attr('data-id'));
                $('#select_role').val($(this).attr('data-role'));
                $('#upname').val($(this).attr('data-name'));
                $('#upemail').val($(this).attr('data-email'));
                $('#edit-user').modal('show');
            })

            $(document).on('click', ".delete", function() {
                Swal.fire({
                    title: '{{__('form.are_you_sure')}}',
                    text: "{{__('form.no_revert')}}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText:"{{__('form.cancel')}}",
                    confirmButtonText: '{{__('form.yes_delete_it')}}!'
                }).then((result) => {
                    if (result.value) {
                        var $this = $(this);
                        var id = $this.attr('data-id');
                        $.ajax({
                            url: "{{url('/user-remove')}}/" + id,
                            type: "GET",
                            success: function(data) {
                                // $(this).parent().parent().remove();
                                // alert($this.parent().parent());
                                $this.closest("tr").remove();
                                Swal.fire({
                                    text: data,
                                    type: 'success',
                                    timer: 1000,
                                    showConfirmButton: false
                                })
                            }
                        })

                    }
                })
            });

            $('.add').on('click',function (){
                var role_id = $(this).data('role_id');
                $('#selected_role').val(role_id);
                $('#add-user').modal('show');
            })
        })
    </script>
@endsection
