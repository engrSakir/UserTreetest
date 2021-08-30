<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Create User!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-5">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Tree</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/create') }}">Add User</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 m-5">
                <div class="card text-center">
                    <div class="card-header">
                        Create User
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('storeUser') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Reference" name="reference" value="{{ old('reference') }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-6">Submit</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Some Ref...
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Own Ref</th>
                                    <th scope="col">Using Ref</th>
                                    <th scope="col">Parent</th>
                                    <th scope="col">Left</th>
                                    <th scope="col">Right</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\User::all() as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->own_ref }}</td>
                                        <td>{{ $user->using_ref }}</td>
                                        <td>{{ $user->parent_user }}</td>
                                        <td>{{ $user->left_user }}</td>
                                        <td>{{ $user->right_user }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
