@extends('Admin.Layout.dashboard')
@section('css')
<style>
    .custom-select {
        display: inline-block;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem 1.75rem .375rem .75rem;
        font-size: .875rem;
        font-weight: 400;
        line-height: 1.5;
        color: #54667a;
        vertical-align: middle;
        background: #fff url("{{asset('images/custom-select.png')}}") no-repeat right .75rem center/8px 5px;
        border: 1px solid #e9ecef;
        border-radius: 4px;
        appearance: none;
    }

    .custom-border {
        border: #5378e8 1px solid;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Questions List <a class="btn btn-success float-right" href="{{url('question/create')}}">Create Questions</a></h4>
                <hr>
                <div class="table-responsive" style="overflow-x: hidden">

                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12 pt-3" id="viewData">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- <h4 class="card-title mb-3">Default Tabs</h4> -->
                                            <ul class="nav nav-tabs mb-3">
                                                @foreach($questions as $q)
                                                @if($q->questions->count() > 0)
                                                <li class="nav-item">
                                                    <a href="#home{{$q->id}}" data-toggle="tab" aria-expanded="true" class="nav-link {{$loop->first?'active':''}}">
                                                        <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                                        <span class="d-none d-lg-block">{{$q->name}}</span>
                                                    </a>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>

                                            <div class="tab-content">
                                                @foreach($questions as $q)
                                                @if($q->questions->count() > 0)
                                                <div class="tab-pane {{$loop->first?'active':''}}" id="home{{$q->id}}">
                                                    <div class="table-responsive" style="overflow-x: hidden">

                                                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                            <div class="row">
                                                                <div class="col-sm-12 pt-3">
                                                                    <div class="table-responsive">
                                                                        <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                                            <thead>
                                                                                <tr role="row">
                                                                                    <th style="width: 10%;">SL</th>
                                                                                    <th style="width: 30%;">Question</th>
                                                                                    <th style="width: 50%;">Options</th>
                                                                                    <th style="width: 10%;" class="text-center">Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($q->questions as $qs)
                                                                                <tr>
                                                                                    <td class="sorting_1">{{$loop->iteration}}</td>
                                                                                    <td>{{$qs->question_text}}</td>
                                                                                    <td>
                                                                                        <div class="d-flex justify-content-center">
                                                                                            @foreach($qs->options as $qo)
                                                                                            <button class="btn custom-border mr-1"><i class="{{$qo->correct?'fa fa-check':''}}" style="color:#5378e8"></i> {{$qo->option}}</button>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                        <!-- <a class="view" style="cursor: pointer; color:teal;" data-question="{{$qs->question_text}}" data-id="{{$qs->id}}" title="View"><i class="fas fa-eye"></i></a> -->
                                                                                        <a class="edit" style="cursor: pointer; color:black;" data-id="{{$qs->id}}" data-cid="{{$id}}" title="edit"><i class="fas fa-pencil-alt"></i></a>
                                                                                        <!-- <a class="edit" href="" title="Edit"><i class="fas fa-pencil-alt"></i></a> -->
                                                                                        <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>

                                                                                    </td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th>SL</th>
                                                                                    <th>Question</th>
                                                                                    <th>Options</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div> <!-- end card-body-->
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="edit-questions" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material" method="POST" action="{{url('question/update')}}" autocomplete="off">
                        @csrf
                        <input type="hidden" id="uqid" name="qid">
                        <input type="hidden" id="ucid" name="cid">
                        <div id="quistion_view">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect">Update</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
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
            // toastr.success('I do not think that word means what you think it means.', 'Slide Down / Slide Up!', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });

            $('.topic').on('change', function() {
                var id = $(this).val();
                // var cid = $(".Qcategory option:selected").val();
                // cid == 0 ? cid = '' : cid = cid;
                if (id == 0) {
                    // $(".Qcategory").attr('disabled', 'disabled')
                    $('#viewData').html(`<div class="container">
                                    <div class="row justify-content-md-center">
                                        <div class="alert alert-success text-center" role="alert" id="msg">
                                            <p class="pt-3">Please select from the topic above and see the questions according to the topic.</p>
                                        </div>
                                    </div>
                                </div>`);
                } else {
                    // $(".Qcategory").removeAttr('disabled')
                    topicwithcategory(id);

                }

            })
            $('.Qcategory').on('change', function() {
                var id = $(".topic option:selected").val();
                var cid = $(this).val();
                topicwithcategory(id, cid);

            })
            // $('#tst').click(function() {
            //     console.log('toast');
            //     toastr.success('Have fun storming the castle!', 'Miracle Max Says');
            // })
        })

        function topicwithcategory(id) {

            $.ajax({
                url: "{{url('question/getlist')}}/" + id,
                type: "GET",
                beforeSend: function() {
                    $('#loading').show();
                    $('#msg').hide();
                    $('#viewData').hide();
                    console.log('BEFORE');
                },
                success: function(data) {
                    if (data != '') {
                        $('#viewData').html(data);
                    } else {

                        $('#viewData').html(
                            `<div class="text-center">
                            <p>Questions not available.</p>
                            </div>`
                        );

                    }
                    console.log(data);
                },
                complete: function() {
                    $('#loading').hide();
                    $('#viewData').show();
                    toastr.success('Successfully Loaded', {
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut",
                        timeOut: 1000
                    });
                    console.log('COMPLETE');

                }
            })
        }
        $(document).on('click', '.edit', function() {
            var id = $(this).attr('data-id');
            var cid = $(this).attr('data-cid');
            $('#uqid').val(id);
            $('#ucid').val(cid);
            $.ajax({
                url: "{{url('question/edit')}}/" + id,
                type: 'GET',
                success: function(data) {
                    $('#quistion_view').html(data);
                    $('#edit-questions').modal('show');
                }
            })
        })
        $(document).on('click', ".delete", function(e) {
            // e.preventDefault();
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
                        url: "{{url('question/delete')}}/" + id,
                        type: "GET",
                        success: function(data) {
                            $this.closest("tr").remove();
                        },
                        complete: function() {
                            toastr.success('Deleted Successfully.', {
                                "closeButton": true
                            });

                        }
                    })

                }
            })
        });
        $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
            if (state == true) {
                $(this).closest("div.bt-switch").find(".hi").val('1');
            } else {
                $(this).closest("div.bt-switch").find("input[name='ans[]']").val('0');
            }
        });
    </script>
    @endsection