<div class="lobilists">
    @foreach($questions as $q)
    @if($q->questions->count() > 0)
    <div class="lobilist-wrapper">
        <div class="lobilist lobilist-primary ps-container ps-theme-default">
            <div class="lobilist-header">
                <div class="lobilist-title">{{$q->name}}</div>
            </div>
            <div class="lobilist-body">
                <ul class="lobilist-items ui-sortable">
                    @foreach($q->questions as $qq)
                    <li data-id="6" class="lobilist-item">
                        <!-- <div class="lobilist-item-title">{{$qq->question_text}}</div>
                        <label class="checkbox-inline lobilist-check">
                        <input name="questions[]" value="{{$qq->id}}" type="checkbox"></label> -->
                        <div class="col-md-12">
                            <input type="checkbox" name="questions[]" value="{{$qq->id}}" id="chc{{$qq->id}}" class="material-inputs">
                            <label for="chc{{$qq->id}}">{{$qq->question_text}}</label>
                        </div>
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>