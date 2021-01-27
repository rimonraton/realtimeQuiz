<div class="card w-100">
    <div class="card-body">
        <ul class="nav nav-tabs mb-3">
            @foreach($questions as $q)
            @if($q->questions->count() > 0)
            <li class="nav-item">
                <a href="#home{{$q->id}}" data-toggle="tab" aria-expanded="true" class="nav-link {{$loop->first?'active':''}}">
                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">{{$q->name}}</span>
                </a>
            </li>
            @endif
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach($questions as $q)
            @if($q->questions->count() > 0)
            <div class="tab-pane {{$loop->first?'active':''}}" id="home{{$q->id}}">
                <div class="lobilists">
                    <div class="lobilist lobilist-primary ps-container ps-theme-default">
                        <div class="lobilist-body">
                            <ul class="lobilist-items ui-sortable">
                                @foreach($q->questions as $qq)
                                <li data-id="6" class="lobilist-item">
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
            </div>
            @endif
            @endforeach
        </div>
    </div> <!-- end card-body-->
</div>