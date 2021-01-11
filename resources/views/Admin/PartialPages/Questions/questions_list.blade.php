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
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Questions List <a class="btn btn-success float-right" href="{{url('question/create')}}">Create Questions</a></h4>
                <hr>
                <div class="row">
                    <div class="col-md-12 col-sm-12 row justify-content-center">
                        <div class="bd-highlight pt-3 col-md-2 col-xs-4 text-right">Topic :</div>
                        <div class="p-2 bd-highlight col-md-4 col-xs-8">
                            <select class="form-control custom-select topic">
                                <option value="0">Select Topic</option>
                                @foreach($topic as $t)
                                <option value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
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
                                            <p class="pt-3">Please select from the topic above and see the questions according to the topic.</p>
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