@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title text-center">{{__('msg.challenge')}}
                    </h4>
                    <hr>
                    <div class="col-sm-6 offset-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{__('form.search')}}" id="challange_search">
                        </div>
                    </div>
                    <div id="viewData">

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')

    <script>
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
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
                    // $('.loading').hide();
                    $('#viewData').show();
                    console.log('COMPLETE');

                }
            })
            // window.history.pushState("", "", url);
        });
        $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
            var id = $(this).attr('data-id');
            if (state == true) {

                publishedOrNot(id, 1);
                // $(this).prop('checked', true);
            } else {
                publishedOrNot(id, 0);
                // $(this).removeProp('checked');

            }
        });
        function publishedOrNot(id, value) {
            $.ajax({
                url: "{{url('challange-Published')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    'value': value
                },
                success: function(data) {
                    Swal.fire({
                        text: data,
                        type: 'success',
                        timer: 1000,
                        showConfirmButton: false
                    })
                }
            })
        }
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
                        url: "{{url('delete_challange')}}/" + id,
                        type: "GET",
                        success: function(data) {
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
$(function (){
    allCategory();
    $(document).on('keyup','#challange_search',function (){
        let keyword = $(this).val();
        if (keyword != '')
        {
            $.ajax({
                url:"{{url('challange_search')}}/" + keyword,
                type:"GET",
                success:function (data){
                    $('#viewData').html(data);
                }
            })
        }
        else {
            allCategory();
        }
    });

    function allCategory(){
        $.ajax({
            url:"{{url('challange_search')}}/" + 'all',
            type:"GET",
            success:function (data){
                $('#viewData').html(data);
            }
        })
    }
})

    </script>

@endsection
