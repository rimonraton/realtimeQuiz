@extends('Admin.Layout.dashboard')
@section('css')
<style>
    .myadmin-dd .dd-list .dd-item .dd-handle-new {
        background: #fff;
        border: 1px solid rgba(120, 130, 140, .13);
        padding: 8px 16px;
        height: auto;
        font-family: Montserrat, sans-serif;
        font-weight: 400;
        border-radius: 0;
    }

    .dd-handle-new {
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px;
        cursor: pointer;
        /* color: #000; */
        text-decoration: none;
        font-weight: 700;
        border: 1px solid #e5e5e5;
        background: #fafafa;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .activeli {
        background-color: #e9ecef !important;
    }
</style>
@endsection
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('msg.questionsList')}} <a class="btn btn-success float-right" href="{{url('question/create')}}">{{__('msg.createQuestion')}}</a></h4>
                <hr>
                <div class="form-group row pb-3">
                    <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.topic')}} :</label>
                    <div class="col-sm-9">
                        <div class="myadmin-dd dd" id="nestable" style="width: 100% !important;">
                            <ol class="dd-list">
                                <li class="dd-item" id="parentdd">
                                    <div class="dd-handle-new">
                                        <strong class="selectedTopic">{{ $id ? $catName :__('form.select_topic') }}</strong>
                                    </div>
                                    <ol class="dd-list">
                                        @foreach($topic as $c)
                                        <li class="dd-item">
                                            <div class="dd-handle-new topicls" data-cid="{{$c->id}}">
                                                <input type="checkbox" name="" id="">
                                                {{$lang=='gb'?$c->name:$c->bn_name}}</div>
                                            @if(count($c->childs))
                                            @include('Admin.PartialPages.Questions._subtopic', ['category'=>$c->childs])
                                            @endif
                                        </li>
                                        @endforeach
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="overflow-x: hidden">

                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12" id="loading" style="display: none;">
                                <div class="text-center">
                                    <button class="btn btn-primary" type="button" disabled="">
                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-12 pt-3" id="viewData">
                                <div class="container">
                                    <div class="row justify-content-md-center">
                                        <div class="alert alert-success text-center" role="alert" id="msg">
                                            <p class="pt-3">{{__('form.question_notify')}}.</p>
                                        </div>
                                    </div>
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
        var getId = "{{$id}}"
        if (getId != "") {
            topicwithcategory(getId);
        }
        $('.topic').on('change', function() {
            var id = $(this).val();
            if (id == 0) {
                $('#viewData').html(`<div class="container">
                                    <div class="row justify-content-md-center">
                                        <div class="alert alert-success text-center" role="alert" id="msg">
                                            <p class="pt-3">Please select from the topic above and see the questions according to the topic.</p>
                                        </div>
                                    </div>
                                </div>`);
            } else {
                topicwithcategory(id);

            }

        })
        $('.Qcategory').on('change', function() {
            var id = $(".topic option:selected").val();
            var cid = $(this).val();
            topicwithcategory(id, cid);

        })
        $(document).on('click', '.topicls', function() {

            // $(this).hasClass('activeli') ? $(this).removeClass('activeli') : [$('.topicls').removeClass('activeli'), $(this).addClass('activeli'), $('#selectedCid').val($(this).attr('data-cid')), $('#selectedTopic').html($(this).text())];

            if ($(this).hasClass('activeli')) {
                $(this).removeClass('activeli');
                $('#selectedCid').val('');
                $('.selectedTopic').html('Select Topic');
            } else {
                $('#parentdd').addClass('dd-collapsed').children('[data-action="collapse"]').hide();
                $('#parentdd').children('[data-action="expand"]').show();
                $('.topicls').removeClass('activeli');
                $(this).addClass('activeli');
                $('#selectedCid').val($(this).attr('data-cid'));
                $('.selectedTopic').html($(this).text());
                topicwithcategory($(this).attr('data-cid'));
            }

        })
        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        $('#nestable-menu').on('click', function(e) {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        $('#nestable-menu').nestable();
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
                console.log(data);
                if (data != '') {
                    $('#viewData').html(data);
                    toastr.success('Successfully Loaded', {
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut",
                        timeOut: 1000
                    });
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
                console.log('COMPLETE');

            }
        })
    }
    $(document).on('click', '.edit', function() {
        var id = $(this).attr('data-id');
        $('#uqid').val(id);
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
</script>
@endsection
