@extends('Admin.Layout.dashboard')
@php
    $lang = App::getLocale();
@endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('form.role_user')}}</h4>
                <hr>
                <div class="col-sm-6 offset-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{__('form.search')}}" id="role_search">
                    </div>
                </div>
{{--                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-topic">{{__('form.assign_role')}}</button>--}}
                <!-- Add Contact Popup Model -->
                <div id="add-topic" data-backdrop="static" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{__('form.assign_role')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" method="POST" action="{{url('createRoleUser')}}" autocomplete="off">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.role')}}</label>
                                        <div class="col-sm-9" id="options">
                                            <select class="form-control  arcategory" name="role_id" id="">
                                                <option value="">{{__('form.select_role')}}</option>
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$lang=='gb'?$role->role_name:$role->bn_role_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.user')}}</label>
                                        <div class="col-sm-9" id="options">
                                            <select class="form-control  arcategory" name="user_id" id="">
                                                <option value="">{{__('form.select_user')}}</option>
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name.' ( '.$user->email.' )'}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info waves-effect">{{__('form.save')}}</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div id="viewroleuser"></div>
            </div>
        </div>
    </div>
</div>

<div id="edit-roleuser" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('form.update_user_role')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('roleuserUpdate')}}" autocomplete="off">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.role')}}</label>
                        <div class="col-sm-9" id="options">
                            <select class="form-control  arcategory" name="uprole_id" id="uprole">
                                <option value="">{{__('form.role_select')}}</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.user')}}</label>
                        <div class="col-sm-9" id="options">
                            <select class="form-control  arcategory" name="upuser_id" id="upuser" disabled>
                                <option value="">{{__('form.user_select')}}</option>
                                @foreach($user_role as $user)
                                <option value="{{$user->id}}">{{$user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">{{__('form.update')}}</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
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
        SearchUser('all');
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function() {
                    // $('.loading').show();
                    // $('#msg').hide();
                    // $('#viewData').hide();
                    console.log('BEFORE');
                },
                success: function(data) {
                    console.log(data);
                    if (data != '') {
                        $('#viewroleuser').html(data);
                    } else {

                        $('#viewroleuser').html(
                            `<div class="text-center">
                            <p>Questions not available.</p>
                            </div>`
                        );

                    }
                    console.log(data);
                },
                complete: function() {
                    // $('.loading').hide();
                    $('#viewroleuser').show();
                    console.log('COMPLETE');

                }
            })
            // window.history.pushState("", "", url);
        });
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            $('#uid').val($(this).attr('data-id'));
            $('#uprole').val($(this).attr('data-role'));
            $('#upuser').val($(this).attr('data-user'));
            $('#edit-roleuser').modal('show');
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
                        url: "{{url('deleteroleUser')}}/" + id,
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
        $('#role_search').on('keyup',function (){
            var value = $(this).val();
            if (value == ''){
                SearchUser('all');
            }
            else{
                SearchUser(value);
                console.log('Not Empty');
            }

        });

        function SearchUser(keyword){
            $.ajax({
                url:"{{url('rolo-user-search')}}/" + keyword,
                type:"GET",
                success:function (data){
                    $('#viewroleuser').html(data);
                    // addSerialNumber();
                    console.log(data);
                }
            })
        }
        function addSerialNumber () {
            $('table tr').each(function(index) {
                $(this).find('td:nth-child(1)').html(index);
            });
        };


    })
</script>
@endsection
