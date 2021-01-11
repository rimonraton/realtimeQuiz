@if($questions->count() > 0)
@foreach($questions as $q)
@if($q->questions->count() > 0)
<h4 class="text-center">{{$q->name}}</h4>
<div class="table-responsive">
    <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
        <thead>
            <tr role="row">
                <th style="width: 10%;">SL</th>
                <th style="width: 80%;">Question</th>
                <th style="width: 10%;" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($q->questions as $qs)
            <tr role="row" class="odd">
                <td class="sorting_1">{{$loop->iteration}}</td>
                <td>{{$qs->question_text}}</td>
                <td class="text-center">
                    <a class="view" style="cursor: pointer; color:black;" data-id="{{$qs->id}}" title="View"><i class="fas fa-pencil-alt"></i></a>
                    <!-- <a class="edit" href="" title="Edit"><i class="fas fa-pencil-alt"></i></a> -->
                    <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>

                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>SL</th>
                <th>Question</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endif
@endforeach
@else
<div class="text-center">
    <p>No Questions Found..</p>
</div>
@endif