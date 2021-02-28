@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">{{__('form.user_list')}}</h4>
                    <hr>
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-topic">
                        {{__('form.add_user')}}</button>
                    <!-- Add Contact Popup Model -->
                    <div id="add-topic" data-backdrop="static" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                <select class="form-control" name="role_id" id="">
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
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('form.confirm_password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                    <div class="table-responsive" style="overflow-x: hidden">

                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr role="row">
                                            <th style="width: 0px;">{{__('form.sl')}}</th>
                                            <th style="width: 0px;">{{__('form.user')}}</th>
                                            <th style="width: 0px;">{{__('form.email')}}</th>
                                            <th style="width: 0px;">{{__('form.role')}}</th>
                                            <th style="width: 0px;">{{__('form.action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                                                <th>{{$user->name}}</th>
                                                <th>{{$user->email}}</th>
                                                <th>{{$user->roleuser?$user->roleuser->role->role_name:''}}</th>
                                                <th>
                                                    <a class="edit" href="" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-role="{{$user->roleuser?$user->roleuser->role->id:''}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                    <a class="delete text-danger" style="cursor: pointer;" data-id="{{$user->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                                    <a class="text-info" style="cursor: pointer;" data-id="{{$user->id}}" href="{{url('send-email/'.$user->id)}}" title="Send Mail"><i class="fas fa-paper-plane"></i></a>

                                                </th>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.user')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.email')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.role')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                {{$users->links()}}
                                <!-- <div class="text-center">
                                    <p>
                                        No Data Found..
                                    </p>
                                </div> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('form.password') }}</label>

                            <div class="col-md-6">
                                <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('form.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
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
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        var $this = $(this);
                        var id = $this.attr('data-id');
                        $.ajax({
                            url: "{{url('deleteMenu')}}/" + id,
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
        })
    </script>
@endsection
