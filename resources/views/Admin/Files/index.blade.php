@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp

@section('css')
  <style>
    iframe {
      width: 100%;
      border: none;
      height: 85vh;
    }
    .view{
      cursor: pointer;
    }


  </style>
@endsection

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center">{{__('form.file_list')}}</h4>
          <hr>
          <div class="table-responsive" style="overflow-x: hidden">

            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-striped table-bordered">
                    <thead>
                    <tr role="row">
                      <th class="text-center" width="8%">{{__('form.sl')}}</th>
                      <th class="text-center" width="8%">{{ __('form.file') }}</th>
                      <th class="text-center" >{{__('form.title')}}</th>
                      <th class="text-center" >{{__('form.shareBy')}}</th>
                      <th class="text-center" width="5%">{{__('form.publish')}}</th>
                      <th class="text-center" style="width: 15%">{{__('form.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $file)
                      <tr>
                        <td class="text-center">{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                        <td class="text-center view " data-id={{$file->id}}>
                          @switch($file->ext)
                            @case('pptx')
                              <i class="fa fa-file-powerpoint fa-3x text-muted"></i>
                              @break
                            @case('docx')
                              <i class="fa fa-file-word fa-3x text-muted"></i>
                              @break
                            @case('xlsx')
                              <i class="fa fa-file-excel fa-3x text-muted"></i>
                              @break
                            @case('mp3')
                              <i class="fas fa-file-audio fa-3x"></i>
                              @break

                            @case('pdf')
                              <i class="fa fa-file-pdf fa-3x text-danger"></i>
                              @break

                            @case('mp4')
                              <i class="fas fa-video fa-3x"></i>
                              @break

                            @default
                              <i class="fa fa-file-image fa-3x"></i>
{{--                              <img src="{{Storage::url($file->path)}}" alt="" style="width: 100px; height: 80px; object-fit: cover;">--}}
                          @endswitch
                        </td>

                        <td class="text-center view" data-id={{$file->id}}>
                          {{$file->title}}
                        </td>

                        <td class="text-center">
                          {{$file->user->name}}
                        </td>

                        <td class="text-center">
                          <div class="bt-switch">
                            <input type="checkbox" class="chk"
                               data-id="{{$file->id}}"
                               data-on-text="{{__('form.yes')}}"
                               data-off-text="{{__('form.no')}}"
                               data-size="normal"
                              {{ $file->status == 1 ? "checked" : "" }}
                            />
                          </div>
                        </td>
                        <td class="text-center">
{{--                          @can('view', $file)--}}
                          <button
                            class="view btn btn-xs btn-outline-warning"
                            data-id="{{$file->id}}"
                            title="View File">
                            <i class="fas fa-eye fa-lg"></i>
                          </button>
{{--                          @endcan--}}
                          <button class="edit btn btn-xs btn-outline-info"
                             data-id="{{$file->id}}"
                             data-title="{{$file->title}}"
                             data-status="{{$file->status}}"
                             title="Edit">
                            <i class="fas fa-pencil-alt fa-lg"></i>
                          </button>
                          @can('delete', $file)
                            <button
                              class="delete btn btn-xs btn-outline-danger"
                              style="cursor: pointer;"
                              data-id="{{$file->id}}"
                              title="Remove">
                              <i class="fas fa-trash fa-lg"></i>
                            </button>
                          @endcan
{{--                          <a--}}
{{--                            class="delete text-success"--}}
{{--                             style="cursor: pointer;"--}}
{{--                             data-id="{{$file->id}}"--}}
{{--                             title="Remove">--}}
{{--                            <i class="fas fa-share-alt"></i>--}}
{{--                          </a>--}}
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {{$files->links()}}
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          @include('includes.dropzone', [
            'directory' => 'files',
            'maxFiles' => 1,
            'maxSize' => 200,
            'callback' => 'dropzoneCallback'
          ])
        </div>
      </div>
    </div>
  </div>

  <div id="edit-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Files</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">

          <form class="form-horizontal form-material" id="fileTitleForm" method="POST" action="" autocomplete="off">
            @csrf
            @method('patch')
            <input type="hidden" id="fileId" name="id">

            <div class="form-group row">
              <label for="Publish" class="col-sm-3 col-form-label">Publish</label>
              <div class="col-sm-9">
                <div class="bt-switch" id="Publish">
                  <input type="checkbox" class="chk" id="publishedStatus" name="published"
                         data-on-text="{{__('form.yes')}}"
                         data-off-text="{{__('form.no')}}"
                         data-id=""
                         data-size="normal"
                  />
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="fileTitle" class="col-sm-3 col-form-label">File Title</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="fileTitle" name="title" onClick="this.select();">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" id="titleUpdateBtn" class="btn btn-info waves-effect">{{__('form.update')}}</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
            </div>

          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div id="file_view" class="modal fade " data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body p-0" >
          <iframe id="fileUrl" src="http://gyankosh.test/viewer">

          </iframe>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection

@section('js')
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
    $.noConflict();
    // $('#edit-category').modal('show');
    function dropzoneCallback(fileData){
      console.log('dropzoneCallback', fileData)

      $.ajax({
        url: "{{url('files')}}/",
        type: "POST",
        data: fileData,
        success: function(data) {
          console.log('data', data);
          if(!fileData['removedFile']) {
            $('#edit-category').modal('show');
            console.log(data['id'])
            $('#fileId').val(data['id']);
            $('#fileTitle').val(data['name']);
          }
        }
      })
    }

    $(function() {

      $('#titleUpdateBtn').click(function () {
          let url = "{{url('files')}}/"+ $('#fileId').val();
          $('#fileTitleForm').attr('action', url).submit();
      })

      $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
      $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
        let status = state ? 1 : 0;
        $.ajax({
          type: "GET",
          url: "{{ url('files') }}/" + $(this).attr('data-id') +'/'+status,
          success: function (data) {
            console.log(data)
          }
        });

      });

      $(document).on('click', '.view', function(e) {
        e.preventDefault();
        let file = $(this).attr('data-id');
        console.log(file);
        let newUrl = "{{url('files')}}/"+file;
        $('#fileUrl').attr('src', newUrl);
        $('#file_view').modal('show');
      })
      $("#file_view").on('hide.bs.modal', function(){
        let newUrl = "{{url('/viewer')}}";
        $('#fileUrl').attr('src', newUrl);
      });

      $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        let file_id = $(this).attr('data-id');
        $('#fileId').val(file_id);
        $('#fileTitle').val($(this).attr('data-title'));
        let status = $(this).attr('data-status')
        console.log('status', status);
        $('#publishedStatus').attr('data-id', file_id);
        $('#publishedStatus').bootstrapSwitch('state', status==='1' );

        $('#edit-category').modal('show');
      })

      $(document).on('click', ".delete", function() {
        Swal.fire({
          title: '{{__('form.are_you_sure')}}',
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
              url: "{{url('files/delete')}}/" + id,
              type: "GET",
              success: function(data) {
                $(this).parent().parent().remove();
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

