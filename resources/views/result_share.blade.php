<!Doctype>
<html>
<head>
    <title>Gyankosh</title>
    <meta property="og:title" content="Gyankosh Challenge Result">
    <meta property="og:image" content="{{url('challengeShareResult/'.$link)}}">
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

<!-- Your share button code -->
<div class="fb-share-button"
     data-layout="button_count">
</div>

</body>
</html>
