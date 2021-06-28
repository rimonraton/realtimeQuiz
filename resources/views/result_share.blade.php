<!Doctype>
<html>
<title>Gyankosh {{ $challenge->name }}</title>
<head>
    <meta property="og:url"           content="{{url('challengeShareResult/'.$link .'/details')}}" />
    <meta property="og:type='article'"  content="website জ্ঞানের সমৃদ্ধি জ্ঞানকোষের সাথে type article. " />
    <meta property="og:title"         content="Gyankosh Challenge Result" />
    <meta property="og:description"   content="Gyankosh {{ $challenge->name }} জ্ঞানের সমৃদ্ধি জ্ঞানকোষের সাথে " />
    <meta property="og:image"         content="{{url('challengeShareResult/'.$link)}}" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />


</head>
<body>


<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="result">
    <div class="card mt-1" style="width: 24rem;">
        <div class="card-header d-flex justify-content-between">
            {{ $challenge->name }}
            <a href="{{url()->previous()}}"><i class="fas fa-arrow-left fa-2x"></i></a>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($results as $key => $result)
                <li class="list-group-item" v-for="(v, i) in results" :key="i">
                    @if($key == 0)
                        <span class="badge badge-success m-1">1<sup>st</sup></span>
                        <i class="fas fa-award fa-lg ml-1" style="color: gold"></i>
                    @elseif($key == 1)
                        <span class="badge badge-primary m-1">2<sup>nd</sup></span>
                        <i class="fas fa-award ml-1" style="color: silver"></i>
                    @elseif($key == 2)
                        <span class="badge badge-info m-1">3<sup>rd</sup></span>
                        <i class="fas fa-award fa-sm ml-1" style="color: #CD7F32"></i>
                    @elseif($key > 2) <span class="badge badge-secondary m-1">{{ $key + 1 }}</span>;
                    @endif
                    {{ $result->name}}
                    <span class="badge badge-primary text-white float-right mt-1">{{ $result->score}}</span>
                </li>
                @endforeach

            </ul>

        </div>
        <div class="card-footer" v-if="lastQuestion">
            <a href="{{url('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a>
        </div>
    </div>
</div>
</body>
</html>
