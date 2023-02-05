@php $lang = App::getLocale(); @endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="container">
                <div class="row justify-content-center align-items-center py-2">
                    <div class="form-group col-sm-10">
                        <input type="text" class="form-control" data-cid="{{$tid}}" placeholder="{{$lang == 'gb' ? 'Search...' : 'অনুসন্ধান...'}}" id="search_keyword">
                    </div>
                    <div class="col-sm-2 text-center">
                        <span class="btn btn-primary" id="search_btn" data-cid="{{$tid}}">{{$lang == 'gb' ? 'Search' : 'অনুসন্ধান'}}</span>
                    </div>
                </div>
                @if(count($questions) > 0)
                    <div style="height: 400px" class="overflow-auto px-4">
                        <div class="row">
                            @foreach($questions as $q)
                                {{--                        <div class="d-flex align-items-center rounded p-3">--}}
                                {{--                            <span class="badge badge-pill badge-primary">Badge</span>--}}
                                {{--                        </div>--}}
                                <div class="btn p-2 border border-secondary rounded-lg col-sm-4 {{$q->fileType == null || $q->fileType == '' ? '' : 'mediaQ'}}" data-fileType="{{$q->fileType}}" data-fileLink="{{$q->question_file_link}}">
                                    {{$lang == 'gb' ? ($q->question_text ? $q->question_text : $q->bd_question_text): ($q->bd_question_text ? $q->bd_question_text : $q->question_text)}}
                                    @if($q->fileType == 'image' || $q->fileType == 'audio' || $q->fileType == 'video')
                                        <p class="badge badge-pill {{$q->fileType == 'video' ? 'badge-primary' : ($q->fileType == 'image'?'badge-success': 'badge-secondary')}}">
                                            @if($q->fileType == 'video')
                                                {{$lang == 'gb' ? 'Click to view the video file' : 'ভিডিও ফাইল দেখতে ক্লিক করুন'}}
                                            @elseif($q->fileType == 'audio')
                                                {{$lang == 'gb' ? 'Click to view the audio file' : 'অডিও ফাইল দেখতে ক্লিক করুন'}}
                                            @elseif($q->fileType == 'image')
                                                {{$lang == 'gb' ? 'Click to view image file' : 'ইমেজ ফাইল দেখতে ক্লিক করুন'}}
                                            @else
                                                {{''}}
                                            @endif
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
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
