@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-contact">{{__('form.add_game_mode')}}</button>
                <h4 class="card-title text-center">{{__('form.game_mode_list')}}</h4>
                <hr>
                <div class="col-sm-6 offset-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{__('form.search')}}" id="game_search">
                    </div>
                </div>
                <div id="showgame">

                </div>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{__('form.new_game_mood')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" method="POST" action="{{url('game/gamemode/save')}}" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" name="gb_game_name" placeholder="{{__('form.game_mode_en_placeholder')}}" require>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" name="bd_game_name" placeholder="{{__('form.game_mode_bn_placeholder')}}" require>
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

            </div>
        </div>
    </div>
</div>

<div id="edit-gamemode" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('form.update_game_mode')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('game/gamemode/update')}}">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editgb" name="gb_game_name" placeholder="Type Game Mode in English">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editbd" name="bd_game_name" placeholder="Type Game Mode in Bangla">
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
        allCategory();
        $(document).on('click','.edit', function(e) {
            e.preventDefault();
            $('#uid').val($(this).attr('data-id'));
            $('#editgb').val($(this).attr('data-gb'));
            $('#editbd').val($(this).attr('data-bd'));
            $('#edit-gamemode').modal('show');
        })

        $(document).on('click',".delete",function() {
            Swal.fire({
                title: '{{__('form.are_you_sure')}}',
                text: "{{__('form.no_revert')}}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText:'{{__('form.cancel')}}',
                confirmButtonText: '{{__('form.yes_delete_it')}}!'
            }).then((result) => {
                if (result.value) {
                    var $this = $(this);
                    var id = $this.attr('data-id');
                    $.ajax({
                        url: "{{url('game/gamemode/delete')}}/" + id,
                        type: "GET",
                        success: function(data) {
                            // $(this).parent().parent().remove();
                            // alert($this.parent().parent());
                            $this.closest("tr").remove();
                            toastr.success(data, {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                timeOut: 1000
                            });
                            // Swal.fire({
                            //     text: data,
                            //     type: 'success',
                            //     timer: 1000,
                            //     showConfirmButton: false
                            // })
                        }
                    })

                }
            })
        });
        $(document).on('keyup','#game_search',function (){
            let keyword = $(this).val();
            if (keyword != '')
            {
                $.ajax({
                    url:"{{url('search_game_cat')}}/" + keyword,
                    type:"GET",
                    success:function (data){
                        $('#showgame').html(data);
                    }
                })
            }
            else {
                allCategory();
            }
        });

        function allCategory(){
            $.ajax({
                url:"{{url('search_game_cat')}}/" + 'all',
                type:"GET",
                success:function (data){
                    $('#showgame').html(data);
                }
            })
        }
    })
</script>
@endsection
