@php $lang = App::getLocale(); @endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="container">
                <div class="row justify-content-center py-2">
                    <div class="form-group col-sm-10">
                        <input type="text" class="form-control" data-cid="{{$tid}}" placeholder="{{$lang == 'gb' ? 'Search...' : 'অনুসন্ধান...'}}" id="search_keyword">
                    </div>
                    <div class="col-sm-2 text-center">
                        <span class="btn btn-primary" id="search_btn" data-cid="{{$tid}}">{{$lang == 'gb' ? 'Search' : 'অনুসন্ধান'}}</span>
                    </div>
                </div>
                @if(count($questions) > 0)
                <div class="row">
                    @foreach($questions as $q)
                        <div class="btn p-2 border border-secondary rounded-lg col-sm-4">{{$lang == 'gb' ? ($q->question_text ? $q->question_text : $q->bd_question_text): ($q->bd_question_text?$q->bd_question_text:$q->question_text)}}</div>
                    @endforeach
                </div>
                @else
                    <div class="text-center">
                        {{$lang == 'gb' ? 'No Data Found!' : 'কোন ডাটা পাওয়া যায় নি!'}}
                        <br>
                        <div class="btn btn-info" id="refreash_btn" data-cid="{{$tid}}">{{$lang == 'gb' ? 'Refresh' : 'রিফ্রেস করুন'}}</div>
                    </div>

                @endif
            </div>

{{--            <div class="card-body d-flex justify-content-center flex-wrap">--}}
{{--                @foreach($questions as $q)--}}
{{--                    <div class="btn p-2 border border-secondary rounded-lg">{{$lang == 'gb' ? ($q->question_text ? $q->question_text : $q->bd_question_text): ($q->bd_question_text?$q->bd_question_text:$q->question_text)}}</div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
        </div>
    </div>
</div>
