<!Doctype>
<html>
<title>Gyankosh {{ $challenge->name }}</title>
<head>
    <meta property="og:url"           content="{{url('challengeShareResult/'.$link .'/details')}}" />
    <meta property="og:type='article'"  content="website জ্ঞানের সমৃদ্ধি জ্ঞানকোষের সাথে type article. " />
    <meta property="og:title"         content="Gyankosh Challenge Result" />
    <meta property="og:description"   content="Gyankosh {{ $challenge->name }} জ্ঞানের সমৃদ্ধি জ্ঞানকোষের সাথে " />
    <meta property="og:image"         content="{{url('challengeShareResult/'.$link)}}" />

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
<h1>Your Headline</h1>
<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget tristique nibh,
    vel consequat purus. Praesent molestie, turpis ut ultrices commodo, felis arcu cursus enim,
    vel porttitor ante quam vel lacus. Quisque at laoreet sapien. Proin nec purus dolor. Integer
    pharetra nec ligula a condimentum. Fusce sem orci, porta ut felis id, commodo imperdiet risus.
</p>
</body>
</html>
