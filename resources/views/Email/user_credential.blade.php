<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gyankosh</title>
<style>
        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }
        .btn-group-sm>.btn, .btn-sm {
            padding: .25rem .5rem;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: .2rem;
        }
        .btn-success {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        a {
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }
        a:-webkit-any-link {
            color: -webkit-link;
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<p>
    প্রিয় {{$user->name}},
    <br>
    জ্ঞানকোষ এ আপনাকে স্বাগতম,
    <br>
    <div>
    <a class="btn btn-success btn-sm" href="{{url('userCredential/'.$user->token)}}"> Go to Profile</a>
    </div>
    <br>
    সর্বদা ভালো থাকবেন- এই শুভকামনায়,
    <br>
    জ্ঞানকোষ ।
</p>
</body>
</html>
