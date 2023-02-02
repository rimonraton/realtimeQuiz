@php $lang = App::getLocale(); @endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @foreach($questions as $q)
                    <p>{{$q->id}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
