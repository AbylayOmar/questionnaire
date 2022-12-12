<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiestionnaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h2>Answer the questions below.</h2>
        
        <form method="post" action="{{ route('store') }}">
            @csrf 
            <input name="name" placeholder="Write your name" />
            @foreach($questions as $q)
                <p>
                    {{ $q->text }}
                </p>
                <ul>
                    @foreach($q->answers as $a)
                        <li>
                            @if($a->type == 1)
                            <input class="input" type="text" value="" id="" name="answers[{{ $q->id }}][{{$a->id}}][0]">
                            @else
                            <input class="form-check-input" type="checkbox" value="{{ $a->id }}" id="" name="answers[{{ $q->id }}][{{$a->id}}]">
                            @endif
                            <label class="form-check-label" for="">
                                {{ $a->text }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
