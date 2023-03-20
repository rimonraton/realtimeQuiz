@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
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
                @if(Permission::can('question.saveCategory'))
                <h4 class="card-title text-center">
                    {{__('msg.questionsTopics')}}
                    <button type="button" class="btn btn-info btn-rounded float-lg-right" data-toggle="modal" data-target="#add-topic">{{$lang=='gb'?'Add New Topic':'নতুন বিষয় যুক্ত করুন'}}</button>
                </h4>
                @endif
                <hr>
                    @if(Permission::can('question.searchCategory'))
                <div class="col-sm-6 offset-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{__('form.search')}}" id="category_search">
                    </div>
                </div>
                    @endif
                <div id="showCategory">

                </div>
            </div>
        </div>
    </div>
</div>
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
                                @foreach($category_all as $c)
                                    <option value="{{$c->id}}">{{$lang=='gb'?$c->name:$c->bn_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 m-b-20">
                            <input type="text" class="form-control" name="name"  placeholder="{{__('form.sub_topic_en')}}" require>
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

<div id="edit-category" data-backdrop="static" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('form.update_topic')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
{{--                <form class="form-horizontal form-material" method="POST" action="{{url('question/updatecategory')}}" autocomplete="off">--}}
{{--                    @csrf--}}
                    <input type="hidden" id="uid" name="id">
                    <div class="form-group">
                        <div class="col-12 m-b-20">
                            <select class="form-control custom-select" name="parent" id="sub_top">
                                <option value="0">{{__('form.select_topic')}}</option>
                                @foreach($category_all as $c)
                                    <option value="{{$c->id}}">{{$lang=='gb'?$c->name:$c->bn_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
{{--                        <button type="submit" class="btn btn-info waves-effect upt">{{__('form.update')}}</button>--}}
                        <button type="button" class="btn btn-info waves-effect upt">{{__('form.update')}}</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
                    </div>

{{--                </form>--}}
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('js')
<script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    $(function() {

        allCategory();
        $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
            var id = $(this).attr('data-id');
            if (state == true) {

               console.log('Publish',id);
                publishedOrNot(id,1);
                // $(this).prop('checked', true);
            } else {
                publishedOrNot(id,0);
                console.log('UnPublish',id);
                // $(this).removeProp('checked');

            }
        });
        function publishedOrNot(id, value) {
            $.ajax({
                url: "{{url('category-Published')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    'value': value
                },
                success: function(data) {
                    Swal.fire({
                        text: "{{__('form.success')}}",
                        type: 'success',
                        timer: 1000,
                        showConfirmButton: false
                    });
                    // console.log(data);
                }
            })
        }
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
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            $('#uid').val($(this).attr('data-id'));
            $('#editName').val($(this).attr('data-name'));
            $('#editbanglaName').val($(this).attr('data-bangla'));
            $('#sub_top').val($(this).attr('data-st'));
            $('#edit-category').modal('show');
        })

        $(document).on('click', ".delete", function() {
            Swal.fire({
                title: "{{__('form.are_you_sure')}}",
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
                        url: "{{url('question/deletecategory')}}/" + id,
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

        $(document).on('keyup','#category_search',function (){
            let keyword = $(this).val();
            if (keyword != '')
            {
                $.ajax({
                    url:"{{url('search_category')}}/" + keyword,
                    type:"GET",
                    success:function (data){
                        $('#showCategory').html(data);
                    }
                })
            }
            else {
                allCategory();
            }
        });

        function allCategory(){
            $.ajax({
                url:"{{url('search_category')}}/" + 'all',
                type:"GET",
                success:function (data){
                    $('#showCategory').html(data);
                }
            })
        }
    });
    $(document).on('click','.upt',function (){
        let uid = $('#uid').val();
        let sub_id = $('#sub_top').val();
        let name = $('#editName').val();
        let bn_name = $('#editbanglaName').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:"{{url('question/updatecategory')}}",
            type:"POST",
            data:{
                _token:_token,
                id:uid,
                parent :sub_id,
                name:name,
                bn_name:bn_name
            },
            success:function (data){
                $('#btn_'+uid).attr('data-name',data.name).attr('data-bangla',data.bn_name);
                $('#name_'+uid).html(data.name);
                $('#bn_name_'+uid).html(data.bn_name);
                $('#edit-category').modal('hide');

            }
        })
        console.warn(uid,sub_id,name,bn_name);
    })
</script>
@endsection
