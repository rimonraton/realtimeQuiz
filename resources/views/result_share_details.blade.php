<html>
<head>
    <title>Gyankosh</title>
    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="og:url"           content="{{url('challengeShareResult/'.$link .'/details')}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Gyankosh Challenge Result" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="{{url('challengeShareResult/'.$link)}}" />
</head>
<body>

    <ul class="list-group" v-for="option in question.options">
        @foreach($sr as $s)
            <li class="list-group-item list-group-item-action my-1">
                {{ $s->name . ' ' . $s->score}}
            </li>
        @endforeach

    </ul>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your share button code -->
<div class="fb-share-button"
     data-href="{{url('challengeShareResult/'.$link .'/details')}}"
     data-layout="button_count">
</div>

</body>
</html>
