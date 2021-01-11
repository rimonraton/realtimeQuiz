
@if($questions->count() > 0)
<h4 class="text-center">MCQ</h4>
<table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
    <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 0px;">SL</th>
            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 0px;">Question</th>
            <!-- <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 0px;">Action</th> -->
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $q)
        <tr role="row" class="odd">
            <td class="sorting_1">{{$loop->iteration}}</td>
            <td>{{$q->question_text}}</td>
            <!-- <td style="text-align: center; ">
                <a class="edit" href="" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                <a class="delete" style="cursor: pointer;" title="Remove"><i class="fas fa-trash"></i></a>
            </td> -->
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th rowspan="1" colspan="1">SL</th>
            <th rowspan="1" colspan="1">Question</th>
            <!-- <th rowspan="1" colspan="1">Action</th> -->
        </tr>
    </tfoot>
</table>
@else
<div class="text-center">
    <p>No Questions Found..</p>
</div>
@endif