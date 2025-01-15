@php $lang = App::getLocale(); @endphp
<div class="card">
    <div class="card-body">
        <div class="" style="overflow-x: hidden">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                      <th style="width: 40%">{{__('form.question_en')}}</th>
                                        <th style="width: 40%;">{{__('form.en_options')}}</th>
                                        <th style="width: 10%;" class="text-center">
                                          {{__('form.action')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $col = 'question_text';
                                $option = 'option';
                                if($lng =='bd'){
                                    $col = 'bd_question_text';
                                    $option = 'bd_option';

                                }
                                @endphp
                                @foreach($questions as $qs)
                                    <tr>
                                        <td>
                                            @if($qs->$col)
                                            <p id="eq_{{$qs->id}}" class="p-1 border border-success rounded-lg">
                                              {{$qs->$col}}
                                            </p>
                                            @endif
                                        </td>
                                        <td class="text-center" >
                                            <span id="eo_{{$qs->id}}">
                                            @foreach($qs->options as $qo)
                                                @if($qo->$option)
                                                    <span class="btn btn-sm m-1 rounded-lg" style="border: #5378e8 1px solid;">
                                                        @if($qo->correct)
                                                        <i class="{{$qo->correct?'fa fa-check':''}}" style="color:#5378e8"></i>
                                                        @endif
                                                       {{$qo->$option}}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @if(Permission::can('reviewQuestion.edit'))
                                            <a class="edit text-info" style="cursor: pointer;" data-id="{{$qs->id}}" title="edit">
                                              <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            @else
                                                <span class="disabled"><i class="fas fa-pencil-alt"></i></span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                {{$questions->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end card-body-->
</div> <!-- end card-->
<script>
  $(function() {
    $('body').on('click', '.pagination a', function(e) {
      e.preventDefault();

      $('#load a').css('color', '#dfecf6');
      $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

      var url = $(this).attr('href');
      getArticles(url);
      window.history.pushState("", "", url);
    });

    function getArticles(url) {
      $.ajax({
        url : url
      }).done(function (data) {
        $('.articles').html(data);
      }).fail(function () {
        alert('Articles could not be loaded.');
      });
    }
  });
</script>
