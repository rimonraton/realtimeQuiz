@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('form.questions_type')}}</h4>
                <hr>
                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-contact">{{__('form.add_new_type')}}</button>
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
                <div class="table-responsive" style="overflow-x: hidden">

                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                @if($quizcategory->count() > 0)
                                <table class="table table-striped table-bordered" >
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 0px;">{{__('form.sl')}}</th>
                                            <th style="width: 0px;">{{__('form.question_type_en')}}</th>
                                            <th style="width: 0px;">{{__('form.question_type_bn')}}</th>
                                            <th style="width: 0px;">{{__('form.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($quizcategory as $qc)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$loop->iteration}}</td>
                                            <td>{{$qc->name}}</td>
                                            <td>{{$qc->bn_name}}</td>
                                            <td style="text-align: center; ">
                                                <a class="edit" href="" data-id="{{$qc->id}}" data-name="{{$qc->name}}" data-bnname="{{$qc->bn_name}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete text-danger" style="cursor: pointer;" data-id="{{$qc->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.question_type_en')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.question_type_bn')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                    {{$quizcategory->links()}}
                                @else
                                <div class="text-center">
                                    <p>No Data Found..</p>
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
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
        $('.edit').on('click', function(e) {
            e.preventDefault();
            $('#uid').val($(this).attr('data-id'));
            $('#editName').val($(this).attr('data-name'));
            $('#editbnName').val($(this).attr('data-bnname'));
            $('#edit-category').modal('show');
        })

        $(".delete").click(function() {
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
                        url: "{{url('questionTypedelete')}}/" + id,
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

    function deleteCategory(id) {
        $.ajax({
            url: "{{url('question/updatecategory')}}/" + id,
            type: "GET",
            success: function() {
                $(this).parent().parent().remove();
            }
        })
    }
</script>
@endsection
