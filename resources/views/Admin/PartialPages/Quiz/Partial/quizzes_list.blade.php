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

</script>
