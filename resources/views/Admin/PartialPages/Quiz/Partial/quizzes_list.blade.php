@php $lang = App::getLocale(); @endphp
{{--<div class="col-sm-6 offset-sm-3">--}}
{{--    <div class="form-group">--}}
{{--        <input type="text" class="form-control" placeholder="{{__('form.search')}}" id="quiz_search">--}}
{{--    </div>--}}
{{--</div>--}}
<div class="card">
    <div class="card-body" id="quiz_view">
    @include('Admin.PartialPages.Quiz.Partial._quiz_search')
    </div>
</div>
<!-- end card-body-->
{{--</div> <!-- end card-->--}}
<script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
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
    $(document).on('switchChange.bootstrapSwitch', '.quizTime', function(event, state) {
        var id = $(this).attr('data-id');
        console.log(id)
        if (state == true) {
            // console.log(id, 3)
            quizTimeUpdate(id, 3)
            // publishedOrNot(id, 1);
            // $(this).prop('checked', true);
        } else {
            // console.log(id, 0)
            quizTimeUpdate(id, 0)
            // publishedOrNot(id, 0);
            // $(this).removeProp('checked');

        }
    });

    function publishedOrNot(id, value) {
        $.ajax({
            url: "{{url('quizPublished')}}",
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
    $('.dataTable').DataTable({
        responsive: true,
        "ordering": false,
    });
    function quizTimeUpdate(id, value) {
        $.ajax({
            url: "{{url('qiiz-time-update')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
                'value': value
            },
            success: function(data) {
                // console.log(data)
                // $('#qtime_'+ data.id).text(data.quiz_time)
                toastr.success("{{__('form.upload_notification_message')}}", {
                    "closeButton": true
                });
            }
        })
    }

    $(document).on('keyup','#quiz_search',function (){
        let keyword = $(this).val();
        let top_id = $('#top_id').val();
        // console.log(top_id);
        // return;
        if (keyword != '')
        {
            $.ajax({
                url:"{{url('search_quiz')}}/" + keyword+'/'+ top_id,
                type:"GET",
                success:function (data){
                    $('#quiz_view').html(data);
                }
            })
        }
        else {
            $.ajax({
                url:"{{url('search_quiz')}}/" +'all'+'/'+ top_id,
                type:"GET",
                success:function (data){
                    $('#quiz_view').html(data);
                }
            })
        }
    });

    // document.getElementsByClassName("editor").addEventListener("input", (e) => {
    //     console.log("input event fired", e);
    // }, false);
    // $('.editor').on('change', function() {alert('changed')});
    // var outerText = ''
    // function someFunc(e) {
    //     console.log(e.target.outerText, 'event',e)
    //     e.target.next().removeClass('d-none')
    //     outerText = e.target.outerText
    // }
    var outerText = ''
    $(document).on('input', '.editor', function (e) {
            $(this).next().removeClass('d-none')
            outerText = e.target.outerText
        // console.log('next element',e.target.outerText == "\n", e.target.outerText)
        // if (e.target.outerText) {
        //     console.log(e.target.outerText, 'inside')
        //     $(this).next().removeClass('d-none')
        //     outerText = e.target.outerText
        // } else {
        //     console.log(e.target.outerText, 'outside')
        //     outerText = 0
        // }
    })
    $('.btn_update').on('click', function () {
        const id = $(this).attr('data-id')
        $(this).addClass('d-none')
        $.ajax({
            url: "{{url('qiiz-time-update')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
                'value': outerText
            },
            success: function(data) {
                // console.log(data)
                $('#qtime_'+ data.id).text(data.quiz_time)
                toastr.success("{{__('form.upload_notification_message')}}", {
                    "closeButton": true
                });
            }
        })
        // console.log('id, text', id, outerText)
    })
</script>
