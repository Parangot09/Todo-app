<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donezo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body style="background-color: #FBFBF2;">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: #847577;"><b>Donezo</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Tasks</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/create">New task</a>
                    </li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-primary">Logout</button>
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li>
                        <a href="/login">
                            <button class="btn btn-primary">Login</button>
                        </a>
                    </li>
                    @endguest
            </div>
        </div>
    </nav>

    <div class="container my-3 d-flex flex-wrap justify-content-center">
        <h2 style="color: #847577;">All Tasks</h2>
    </div>


    @if(session("success"))
    <div class="alert alert-success my-3" role="alert">
        <p style="text-align: center;">{{session("success")}}</p>
    </div>
    @endif


    <div class="container d-flex flex-wrap justify-content-center">

        @if($tasks->isNotEmpty())
        @foreach($tasks as $task)
        <x-card style="width: 45rem;margin: 5px">
            <h4 style="color: #847577;">{{$task->title}}</h4>
            <p>{{$task->description}}</p>
            <div class="container d-flex flex-wrap gap-3">
                <a href="/delete/{{$task->id}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                <a href="/edit/{{$task->id}}" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a>
            </div>
        </x-card>
        @endforeach

        @else
        <div class="container d-flex flex-wrap justify-content-center my-5">
            <h4 style="color: #847577;">No tasks!<h4>
        </div>
        @endif

    </div>
    <div class="container d-flex flex-wrap justify-content-center my-5">
        {{$tasks->links("pagination::bootstrap-4")}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
