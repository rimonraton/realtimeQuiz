@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('css')
<style>
    .divscroll {
        height: 500px;
        overflow: auto;
    }

    a:hover,
    a:focus {
        text-decoration: none;
        outline: none;
    }

    #accordion .panel {
        border: none;
        border-radius: 3px;
        box-shadow: none;
        margin-bottom: 15px;
    }

    #accordion .panel-heading {
        padding: 0;
        border: none;
        border-radius: 3px;
    }

    #accordion .panel-title a {
        display: block;
        padding: 12px 15px;
        background: #fff;
        font-size: 18px;
        font-weight: 400;
        color: #f81ac1;
        /*border: 1px solid #ececec;*/
        box-shadow: 0 0 10px rgba(0, 0, 0, .05);
        position: relative;
        transition: all 0.5s ease 0s;
        box-shadow: 0 1px 2px rgba(43, 59, 93, 0.30);
    }

    #accordion .panel-title a.collapsed {
        box-shadow: none;
        color: #676767;
        box-shadow: 0 1px 2px rgba(43, 59, 93, 0.30);
    }

    #accordion .panel-title a:before,
    #accordion .panel-title a.collapsed:before {
        content: "\f067";
        font-family: "Font Awesome 5 Free";
        width: 25px;
        height: 25px;
        line-height: 28px;
        font-size: 15px;
        font-weight: 900;
        color: #f81ac1;
        text-align: center;
        position: absolute;
        top: 8px;
        right: 15px;
        transform: rotate(135deg);
        transition: all 0.3s ease 0s;
    }

    #accordion .panel-title a.collapsed:before {
        color: #676767;
        transform: rotate(0);
    }

    #accordion .panel-title a:after {
        content: "";
        width: 1px;
        height: 100%;
        background: #ececec;
        position: absolute;
        top: 0;
        right: 55px;
    }

    #accordion .panel-body {
        padding: 0px 15px;
        border: none;
        font-size: 15px;
        color: #615f5f;
        line-height: 27px;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('form.menu_list')}}</h4>
                <hr>
                <form action="{{url('savemenuPermission')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.role')}}</label>
                        <div class="col-md-6 col-sm-7" id="options">
                            <select class="form-control" name="role_id" id="selectedrole">
                                <option value="">{{__('form.select_role')}}</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$lang=='gb'?$role->role_name:$role->bn_role_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-2">
                            <button class="btn btn-success" type="submit">{{__('form.submit')}}</button>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <input type="checkbox" value="" id="child" name="menu[]" class="material-inputs checkAll">
                        <label for="child">{{__('form.check_all')}}</label>
                    </div>
                    <!-- start -->
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-sm-12 divscroll">
                            <ul class="list-group">
                                @foreach($menu as $m)
                                <li class="list-group-item">
                                    <!-- <div class="col-md-12"> -->
                                    <input type="checkbox" value="{{$m->id}}" id="child{{$m->id}}" name="menu[]" class="material-inputs child">
                                    <label for="child{{$m->id}}">{{$lang=='gb'?$m->name:$m->bn_name}}</label>
                                    @if(count($m->childs))
                                    @foreach($m->childs as $mc)
                                    <ul class="list-group m-3">
                                        <li class="list-group-item">
                                            <!-- <div class="col-md-12"> -->
                                            <input type="checkbox" value="{{$mc->id}}" id="child{{$mc->id}}" name="menu[]" class="material-inputs child">
                                            <label for="child{{$mc->id}}">{{$lang=='gb'?$mc->name:$mc->bn_name}}</label>
                                            <!-- </div> -->
                                            @if(count($mc->childs))
                                                @foreach($mc->childs as $mcc)
                                                    <ul class="list-group m-3">
                                                        <li class="list-group-item">
                                                            <!-- <div class="col-md-12"> -->
                                                            <input type="checkbox" value="{{$mcc->id}}" id="child{{$mcc->id}}" name="menu[]" class="material-inputs child">
                                                            <label for="child{{$mcc->id}}">{{$lang=='gb'?$mcc->name:$mcc->bn_name}}</label>
                                                            <!-- </div> -->
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        </li>
                                    </ul>
                                    @endforeach
                                    @endif
                                    <!-- </div> -->
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- end -->
                </form>
            </div>
        </div>
    </div>
</div>

<div id="edit-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('form.menu_update')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('menuUpdate')}}" autocomplete="off">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editName" name="menu" pattern="^[a-zA-Z0-9 ]+$" placeholder="{{__('form.menu_placholder_en')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editbanglaName" name="bn_menu" placeholder="{{__('form.menu_placholder_bn')}}">
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
        $(".checkAll").on('click', function() {
            var child = $(this).attr('id');
            $("." + child).not(this).prop('checked', this.checked);
        });
        $('.child').on('click', function() {
            if (!$(this).parent().parent().siblings("input[type='checkbox']").is(':checked')) {
                $(this).parent().parent().siblings("input[type='checkbox']").prop('checked', this.checked);
            }
            // else{
            //     $(this).parent().parent().siblings("input[type='checkbox']").prop('checked', false);
            // }
            $(this).siblings('ul')
                .find("input[type='checkbox']")
                .not(this).prop('checked', this.checked);
        });
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            $('#uid').val($(this).attr('data-id'));
            $('#editName').val($(this).attr('data-name'));
            $('#editbanglaName').val($(this).attr('data-bnname'));
            $('#edit-category').modal('show');
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

        $('#selectedrole').on('change',function (){
            var role_id = $(this).val();
            if(role_id != ''){
                $.ajax({
                    url:"{{url('selectedMenu')}}/" + role_id,
                    type:'GET',
                    success:function (data){
                        $.each(data,function (key,value){
                            console.log(value);
                            $('.child').each(function(k, v) {
                                if(value == v.value){
                                    $(this).prop('checked', true);
                                }
                            });
                        })
                    }
                })
            }
            else{
                $('.child').prop('checked', false);
            }

        })
    })





</script>
@endsection
