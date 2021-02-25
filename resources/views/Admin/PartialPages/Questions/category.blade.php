@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('msg.questionsTopics')}}</h4>
                <hr>
                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-topic">{{$lang=='gb'?'Add New Topic':'নতুন বিষয় যুক্ত করুন'}}</button>
                <!-- Add Contact Popup Model -->
                <div id="add-topic" data-backdrop="static" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{__('form.new_topic')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" method="POST" action="{{url('question/savecategory')}}" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-12 m-b-20">
                                            <select class="form-control custom-select" name="topic">
                                                <option value="">{{__('form.select_topic')}}</option>
                                                @foreach($category as $c)
                                                <option value="{{$c->id}}">{{$lang=='gb'?$c->name:$c->bn_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12 m-b-20">
                                            <input type="text" class="form-control" name="name" pattern="^[a-zA-Z0-9 ]+$" placeholder="{{__('form.sub_topic_en')}}" require>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12 m-b-20">
                                            <input type="text" class="form-control" name="bn_name" placeholder="{{__('form.sub_topic_bn')}}" require>
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
                                @if($category->count() > 0)
                                <table class="table table-striped table-bordered" >
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 0px;">{{__('form.sl')}}</th>
                                            <th style="width: 0px;">{{__('form.topic_en')}}</th>
                                            <th style="width: 0px;">{{__('form.topic_bn')}}</th>
                                            <th style="width: 0px;">{{__('form.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category as $c)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$loop->iteration}}</td>
                                            <td>{{$c->name}}</td>
                                            <td>{{$c->bn_name}}</td>
                                            <td style="text-align: center; ">
                                                <a class="edit" href="" data-id="{{$c->id}}" data-name="{{$c->name}}" data-bangla="{{$c->bn_name}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="delete text-danger" style="cursor: pointer;" data-id="{{$c->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.topic_en')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.topic_bn')}}</th>
                                            <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                    {{$category->links()}}
                                @else
                                <div class="text-center">
                                    <p>
                                        No Data Found..
                                    </p>
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
                <h4 class="modal-title" id="myModalLabel">{{__('form.update_topic')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('question/updatecategory')}}" autocomplete="off">
                    @csrf
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editName" name="name" pattern="^[a-zA-Z0-9 ]+$" placeholder="Type Topic/Sub-Topic in English">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="editbanglaName" name="bn_name" placeholder="Type Topic/Sub-Topic in Bangla">
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
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            $('#uid').val($(this).attr('data-id'));
            $('#editName').val($(this).attr('data-name'));
            $('#editbanglaName').val($(this).attr('data-bangla'));
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
                        url: "{{url('question/deletecategory')}}/" + id,
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
