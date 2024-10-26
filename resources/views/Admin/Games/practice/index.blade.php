@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body wizard-content">
          @if(Permission::can('quizPracticeCreate'))
            <a type="button" class="btn btn-info btn-rounded float-right" href="{{url('quizPracticeCreate')}}" >
              {{__('form.create_quiz')}}
            </a>
          @endif
          <h4 class="card-title text-center">
            {{__('msg.practice')}}
          </h4>
          <hr>
          <div class="col-sm-6 offset-sm-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="{{__('form.search')}}" id="practice_search">
            </div>
          </div>
          <div id="viewData">
            <div class="table-responsive" style="overflow-x: hidden">
              <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      @if( count($practices))
                        <table  class="table table-striped table-bordered">
                          <thead>
                          <tr role="row" class="text-center">
                            <th>{{__('form.sl')}}</th>
                            <th style="width: 30%;"> Name </th>
                            <th style="width: 30%;"> নাম </th>
                            <th> {{__('form.noq')}}</th>
                            <th> {{__('form.publish')}}</th>
                            <th> {{__('form.action')}}</th>
                          </tr>
                          </thead>
                          <tbody>

                          @foreach($practices as $practice)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>
                                <div id="name_{{$practice->id}}">
                                  {{$practice->quiz_name}}
                                </div>
                              </td>
                              <td>
                                <div id="bd_name_{{$practice->id}}">
                                  {{$practice->bd_quiz_name}}
                                </div>
                              </td>
                              <td>{{ count(explode(",", $practice->questions)) }}</td>
                              <td class="text-center">
                                <div class="bt-switch">
                                  <input type="checkbox" class="chk" data-id="{{$practice->id}}"
                                         data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}"
                                         data-size="normal" {{$practice->status ==1?"checked":""}} />
                                </div>
                              </td>
                              <td class="text-center">
                                <button class="delete btn btn-sm btn-outline-danger rounded mr-1"
                                   data-id="{{$practice->id}}" title="Delete">
                                  <i class="fas fa-trash"></i>
                                </button>
                                <button
                                  class="edit btn btn-sm btn-outline-dark-info rounded"
                                  title="Edit"
                                  data-name="{{$practice->quiz_name}}"
                                  data-bdname="{{$practice->bd_quiz_name}}"
                                  data-id="{{$practice->id}}"
                                  data-amount="{{count(explode(',', $practice->questions))}}"
                                >
                                  <i class="fas fa-pencil-alt"></i>
                                </button>
                              </td>
                            </tr>
                          @endforeach
                          </tbody>
                        </table>
                      @else
                        <p>No data found..</p>
                      @endif

                      {{$practices->links()}}
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

{{--    Modal--}}
    <div id="edit-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">{{__('msg.updateQuiz')}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal form-material"  autocomplete="off">
              <input type="hidden" id="qid" >
              <div class="form-group row">
                <div class="col-md-6 m-b-20">
                  <input type="text" class="form-control" id="editName">
                </div>
                <div class="col-md-6 m-b-20">
                  <input type="text" class="form-control" id="editBdName">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="practiceUpdateBtn" class="btn btn-info waves-effect">{{__('form.update')}}</button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
              </div>

            </form>
          </div>

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
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
        url: "{{url('publishPractice')}}",
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
    function updatePractice(id, name, bd_name) {
      $.ajax({
        url: "{{url('updatePractice')}}",
        type: "POST",
        data: {
          "_token": "{{ csrf_token() }}",
          'id': id,
          'name': name,
          'bd_name': bd_name,
        },
        success: function(data) {
          $('#name_' + id).html(name);
          $('#bd_name_' + id).html(bd_name);
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
            url: "{{url('deletePractice')}}/" + id,
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
      $('.edit').on('click', function(e) {
        $('#qid').val($(this).data('id'));
        $('#editName').val($(this).data('name'));
        $('#editBdName').val($(this).data('bdname'));
        $('#edit-category').modal('show');
      });

      $('#practiceUpdateBtn').on('click', function(e) {
        var id = $('#qid').val();
        var name = $('#editName').val();
        var bd_name = $('#editBdName').val();
        updatePractice(id,name,bd_name);
        $('#edit-category').modal('hide');
      });
      // allCategory();
      $(document).on('keyup','#challange_search',function (){
        let keyword = $(this).val();
        if (keyword != '')
        {
          $.ajax({
            url:"{{url('practice_search')}}/" + keyword,
            type:"GET",
            success:function (data){
              $('#viewData').html(data);
            }
          })
        }
        else {
          // allCategory();
        }
      });

      function allCategory(){
        $.ajax({
          url:"{{url('practice_search')}}/" + 'all',
          type:"GET",
          success:function (data){
            $('#viewData').html(data);
          }
        })
      }
    })

  </script>

@endsection
