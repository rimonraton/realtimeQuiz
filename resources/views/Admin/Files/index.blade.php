@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center">{{__('form.file_list')}}</h4>
          <hr>
          <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-topic">{{__('form.add_menu')}}</button>
          <!-- Add Contact Popup Model -->
          <div id="add-topic" data-backdrop="static" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">{{__('form.add_menu_header')}}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal form-material" method="POST" action="{{url('saveMenu')}}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                      <!-- <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.menu')}}</label> -->
                      <div class="col-sm-12" id="options">
                        <select class="form-control" name="parent_id" id="">
                          <option value="0">{{__('form.select_menu')}}</option>
                          @foreach($parent_menus as $menu)
                            <option value="{{$menu->id}}">{{$lang=='gb'?$menu->name:$menu->bn_name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-12 m-b-20">
                        <input type="text" class="form-control" name="menu" pattern="^[a-zA-Z0-9 ]+$" placeholder="{{__('form.menu_placholder_en')}}" require>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-12 m-b-20">
                        <input type="text" class="form-control" name="bn_menu" placeholder="{{__('form.menu_placholder_bn')}}" require>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-12 m-b-20">
                        <input type="text" class="form-control" name="route_name" placeholder="{{__('form.route_name')}}" require>
                      </div>
                    </div>
                    <div class="form-check">
                      <input class="material-inputs" type="checkbox" value="1" id="defaultCheck1" name="actionRoute">
                      <label class="form-check-label" for="defaultCheck1">
                        Action Route
                      </label>
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
          <div class="table-responsive" style="overflow-x: hidden">

            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-striped table-bordered">
                    <thead>
                    <tr role="row">
                      <th style="width: 0px;">{{__('form.sl')}}</th>
                      <th style="width: 0px;">{{__('form.menu_en')}}</th>
                      <th style="width: 0px;">{{__('form.menu_bn')}}</th>
                      <th style="width: 0px;">{{__('form.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $menu)
                      <tr>
                        <td>{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                        <th>{{$menu->name}}</th>
                        <th>{{$menu->bn_name}}</th>
                        <th>
                          <a class="edit" href="" data-id="{{$menu->id}}" data-name="{{$menu->name}}" data-bnname="{{$menu->bn_name}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                          <a class="delete text-danger" style="cursor: pointer;" data-id="{{$menu->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                          <a class="delete text-success" style="cursor: pointer;" data-id="{{$menu->id}}" title="Remove">
                            <i class="fas fa-share-alt"></i>
                          </a>

                        </th>
                      </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                      <th rowspan="1" colspan="1">{{__('form.menu_en')}}</th>
                      <th rowspan="1" colspan="1">{{__('form.menu_bn')}}</th>
                      <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                    </tr>
                    </tfoot>
                  </table>
                  {{$menus->links()}}
                  <!-- <div class="text-center">
                                    <p>
                                        No Data Found..
                                    </p>
                                </div> -->
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="edit-category" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">{{__('form.menu_update')}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal form-material" method="POST" action="{{url('menuUpdate')}}" autocomplete="off">
            @csrf
            <input type="hidden" id="uid" name="id">
            <div class="form-group">
              <div class="col-md-12 m-b-20">
                <input type="text" class="form-control" id="editName" name="menu" pattern="^[a-zA-Z0-9 ]+$" placeholder="{{__('form.menu_placholder_en')}}">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12 m-b-20">
                <input type="text" class="form-control" id="editbanglaName" name="bn_menu" placeholder="{{__('form.menu_placholder_bn')}}">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info waves-effect">{{__('form.update')}}</button>
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
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
      $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        $('#uid').val($(this).attr('data-id'));
        $('#editName').val($(this).attr('data-name'));
        $('#editbanglaName').val($(this).attr('data-bnname'));
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
              url: "{{url('deleteMenu')}}/" + id,
              type: "GET",
              success: function(data) {
                // $(this).parent().parent().remove();
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
