<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>User Tree!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-5">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link  btn btn-info m-1" aria-current="page" href="{{ url('/') }}">Tree</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-info m-1" href="{{ url('/create') }}">Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white m-1" href="{{ url('/clean') }}">Clean Data</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 m-5">
                <div class="card text-center">
                    <div class="card-header bg-info">
                        New User Tree
                    </div>
                    <div class="card-body row d-flex justify-content-center">

                        {{-- Level 1/1 --}}
                        @if ($data["l1"]["l1_u1"])
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <p>Ref: {{ $data["l1"]["l1_u1"]->own_ref }}</p>
                                <p>Car: {{ $data["l1"]["l1_u1"]->carry }}</p>
                                <h5 class="card-title">{{ $data["l1"]["l1_u1"]->name }}</h5>
                                <a href="{{ route('selsctUser', $data["l1"]["l1_u1"]->id) }}" class="btn btn-primary">Click Me</a>
                            </div>
                        </div>
                        @else
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ 'Empty' }}</h5>
                            </div>
                        </div>
                        @endif
                        <hr class="mt-3">
                        {{-- Level 2/1 --}}
                        @if ($data["l2"]["l2_u1"])
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <p>Ref: {{ $data["l2"]["l2_u1"]->own_ref }}</p>
                                <p>Car: {{ $data["l2"]["l2_u1"]->carry }}</p>
                                <h5 class="card-title">{{ $data["l2"]["l2_u1"]->name }}</h5>
                                <a href="{{ route('selsctUser', $data["l2"]["l2_u1"]->id) }}" class="btn btn-primary">Click Me</a>
                            </div>
                        </div>
                        @else
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ 'Empty' }}</h5>
                            </div>
                        </div>
                        @endif

                        {{-- Level 2/2 --}}
                        @if ($data["l2"]["l2_u2"])
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <p>Ref: {{ $data["l2"]["l2_u2"]->own_ref }}</p>
                                <p>Car: {{ $data["l2"]["l2_u2"]->carry }}</p>
                                <h5 class="card-title">{{ $data["l2"]["l2_u2"]->name }}</h5>
                                <a href="{{ route('selsctUser', $data["l2"]["l2_u2"]->id) }}" class="btn btn-primary">Click Me</a>
                            </div>
                        </div>
                        @else
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ 'Empty' }}</h5>
                            </div>
                        </div>
                        @endif

                        <hr class="mt-3">
                        {{-- Level 3/1 --}}
                        @if ($data["l3"]["l3_u1"])
                        <div class="card col" style="width: 18rem;">

                            <div class="card-body">
                                <p>Ref: {{ $data["l3"]["l3_u1"]->own_ref }}</p>
                                <p>Car: {{ $data["l3"]["l3_u1"]->carry }}</p>
                                <h5 class="card-title">{{ $data["l3"]["l3_u1"]->name }}</h5>
                                <a href="{{ route('selsctUser', $data["l3"]["l3_u1"]->id) }}" class="btn btn-primary">Click Me</a>
                            </div>
                        </div>
                        @else
                        <div class="card col" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ 'Empty' }}</h5>
                            </div>
                        </div>
                        @endif

                        {{-- Level 3/2 --}}
                        @if ($data["l3"]["l3_u2"])
                        <div class="card col" style="width: 18rem;">

                            <div class="card-body">
                                <p>Ref: {{ $data["l3"]["l3_u2"]->own_ref }}</p>
                                <p>Car: {{ $data["l3"]["l3_u2"]->carry }}</p>
                                <h5 class="card-title">{{ $data["l3"]["l3_u2"]->name }}</h5>
                                <a href="{{ route('selsctUser', $data["l3"]["l3_u2"]->id) }}" class="btn btn-primary">Click Me</a>
                            </div>
                        </div>
                        @else
                        <div class="card col" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ 'Empty' }}</h5>
                            </div>
                        </div>
                        @endif

                        {{-- Level 3/3 --}}
                        @if ($data["l3"]["l3_u3"])
                        <div class="card col" style="width: 18rem;">
                            <div class="card-body">
                                <p>Ref: {{ $data["l3"]["l3_u3"]->own_ref }}</p>
                                <p>Car: {{ $data["l3"]["l3_u3"]->carry }}</p>
                                <h5 class="card-title">{{ $data["l3"]["l3_u3"]->name }}</h5>
                                <a href="{{ route('selsctUser', $data["l3"]["l3_u3"]->id) }}" class="btn btn-primary">Click Me</a>
                            </div>
                        </div>
                        @else
                        <div class="card col" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ 'Empty' }}</h5>
                            </div>
                        </div>
                        @endif
                        {{-- Level 3/4 --}}
                        @if ($data["l3"]["l3_u4"])
                        <div class="card col" style="width: 18rem;">

                            <div class="card-body">
                                <p>Ref: {{ $data["l3"]["l3_u4"]->own_ref }}</p>
                                <p>Car: {{ $data["l3"]["l3_u4"]->carry }}</p>
                                <h5 class="card-title">{{ $data["l3"]["l3_u4"]->name }}</h5>
                                <a href="{{ route('selsctUser', $data["l3"]["l3_u4"]->id) }}" class="btn btn-primary">Click Me</a>
                            </div>
                        </div>
                        @else
                        <div class="card col" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ 'Empty' }}</h5>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer text-muted">
                        Demo Algorithm
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
