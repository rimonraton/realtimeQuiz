@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-contact">{{__('form.add_new_type')}}</button>
                <h4 class="card-title text-center">{{__('form.questions_type')}}</h4>
                <hr>
                <div class="col-sm-6 offset-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{__('form.search')}}" id="type_search">
                    </div>
                </div>

                <div id="dataview">

                </div>

                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{__('form.new_ques_type')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" method="POST" action="{{url('questionTypesave')}}" autocomplete="off">
                                    @csrf
                                    <!-- <div class="form-group row">
                                        <div class="col-6 m-b-20">
                                            <h5 class="text-center">Bangla</h5>
                                        </div>
                                        <div class="col-6 m-b-20">
                                            <h5 class="text-center">Bangla</h5>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <div class="col-6 m-b-20">
                                            <input type="text" class="form-control" name="name" placeholder="{{__('form.question_type_en_placholder')}}" require>
                                        </div>
                                        <div class="col-6 m-b-20">
                                            <input type="text" class="form-control" name="bn_name" placeholder="{{__('form.question_type_bn_placholder')}}">
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

<div id="edit-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('form.q_type_update_header')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('questionTypeupdate')}}">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="d-flex justify-content-around">
                        <p>{{__('form.question_type_en')}}</p>
                        <p>{{__('form.question_type_bn')}}</p>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-6">
                            <input type="text" class="form-control text-center" id="editName" name="name" placeholder="">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control text-center" id="editbnName" name="bn_name" placeholder="">
                        </div>
                    </div>
                        <div class="modal-footer">
{{--                            <button type="submit" class="btn btn-info waves-effect">{{__('form.update')}}</button>--}}
                            <button type="button" class="btn btn-info waves-effect upt">{{__('form.update')}}</button>
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
        searchQuestionType('all');
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
                        $('#showCategory').html(data);
                    } else {

                        $('#showCategory').html(
                            `<div class="text-center">
                            <p>Questions not available.</p>
                            </div>`
                        );

                    }
                    console.log(data);
                },
                complete: function() {
                    // $('.loading').hide();
                    $('#showCategory').show();
                    console.log('COMPLETE');

                }
            })
            // window.history.pushState("", "", url);
        });
        $(document).on('click','.edit', function(e) {
            e.preventDefault();
            $('#uid').val($(this).attr('data-id'));
            $('#editName').val($(this).attr('data-name'));
            $('#editbnName').val($(this).attr('data-bnname'));
            $('#edit-category').modal('show');
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
                        url: "{{url('questionTypedelete')}}/" + id,
                        type: "GET",
                        success: function(data) {
                            // $(this).parent().parent().remove();
                            // alert($this.parent().parent());
                            $this.closest("tr").remove();
                            Swal.fire({
                                text: '{{__('form.delete_success')}}',
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

    function deleteCategory(id) {
        $.ajax({
            url: "{{url('question/updatecategory')}}/" + id,
            type: "GET",
            success: function() {
                $(this).parent().parent().remove();
            }
        })
    }

    $(document).on('keyup','#type_search',function (){
        let keyword = $(this).val();
        if (keyword != '')
        {
            searchQuestionType(keyword);
        }
        else {
            searchQuestionType('all');
        }
    });
    function searchQuestionType(keyword){
        $.ajax({
            url:"{{url('search_Q_type')}}/" + keyword,
            type:"GET",
            success:function (data){
                $('#dataview').html(data);
            }
        })
    }

    $('.upt').on('click',function (){
        let uid = $('#uid').val();
        let name = $('#editName').val();
        let bn_name = $('#editbnName').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:"{{url('questionTypeupdate')}}",
            type:"POST",
            data:{
                _token:_token,
                id:uid,
                name:name,
                bn_name:bn_name
            },
            success:function (data){
                $('#btn_'+uid).attr('data-name',data.name).attr('data-bnname',data.bn_name);
                $('#name_'+uid).html(data.name);
                $('#bn_name_'+uid).html(data.bn_name);
                $('#edit-category').modal('hide');
                console.log(data);

            }
        })
    })
</script>
@endsection
