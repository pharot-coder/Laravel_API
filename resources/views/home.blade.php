<!doctype html>
<html lang="en">

<head>
    <title>API-DATA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    {{-- <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}
</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-primary">
        <!-- Brand -->
        <a class="navbar-brand" href="#">API DATA</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        {{-- <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div> --}}
    </nav>

    <div class="container mt-4">

        <h5>Method</h5>
        <p>GET: <a href="http://localhost:8888/laravel_api_demo/public/api/person">/api/person</a></p>
        <p>GET: <a href="http://localhost:8888/laravel_api_demo/public/api/person/1">/api/person/1</a></p>
        <p>POST: <a href="http://localhost:8888/laravel_api_demo/public/api/person">/api/person</a></p>
        <p>PUT: <a href="http://localhost:8888/laravel_api_demo/public/api/person/1">/api/person/1</a></p>
        <p>DELETE: <a href="http://localhost:8888/laravel_api_demo/public/api/person/1">/api/person/1</a></p>



        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="card mb-3">
            <div class="card-header">
                <button class="btn btn-primary" onclick="showBodyCardForm()" id="addnew"> + New</button>
            </div>
            <div class="card-body" style="display: none" id="card-body-form">
                <form action="{{ route('storeData') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email"> First Name:</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for="email">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="email">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter address">
                    </div>
                    {{-- <div class="input-group mb-3">
                        <span class="input-group-text">First and last name</span>
                        <input type="text" aria-label="First name" name="first_name" class="form-control" />
                        <input type="text" aria-label="Last name" name="last_name" class="form-control" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Email and address</span>
                        <input type="email" aria-label="Eamil" name="email" class="form-control" />
                        <input type="text" aria-label="Address" name="address" class="form-control" />
                    </div> --}}
                    {{-- <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="0">Deactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div> --}}
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>




        <div class="card">
            <div class="card-header">
                Data View
            </div>
            <div class="card-body">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($data as $row)
                            @php
                                $status = !empty($row->status) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactive</span>';
                            @endphp
                            <tr>
                                <td> {{ $count++ }} </td>
                                <td> {{ $row->first_name }} </td>
                                <td> {{ $row->last_name }} </td>
                                <td> {{ $row->email }} </td>
                                <td> {{ $row->address }} </td>
                                <td> {!! $status !!}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm">Edit</a>
                                    |
                                    <a href="" onclick="window.confirm('Are you want to delete')"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <hr style="border: 1px solid gray">

        <h5>Method</h5>
        <p>GET: <a href="http://localhost:8888/laravel_api_demo/public/api/image">/api/image</a></p>
        <p>GET: <a href="http://localhost:8888/laravel_api_demo/public/api/image/1">/api/image/1</a></p>
        <p>POST: <a href="http://localhost:8888/laravel_api_demo/public/api/image">/api/image</a></p>
        <p>PUT: <a href="http://localhost:8888/laravel_api_demo/public/api/image/1">/api/image/1</a></p>
        <p>DELETE: <a href="http://localhost:8888/laravel_api_demo/public/api/image/1">/api/image/1</a></p>


        <div class="card mb-3 mt-4">
            <div class="card-header">
                <button class="btn btn-primary" onclick="showBodyCardFormImage()" id="addnewImage"> + New</button>
            </div>
            <div class="card-body" style="display: none" id="image-card-body-form">
                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title"> Title: </label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="image">Photo</label>
                        <input type="file" class="form-control" onchange="preview()" name="image"
                            placeholder="Enter Image">
                        <img id="frame" src="" alt="" width="100px" height="100px" />
                    </div>

                    <div class="form-group">
                        <label for="email">Description:</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="5"
                            placeholder="Enter Description"></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>


        <div class="card mt-4 mb-4">
            <div class="card-header">
                Data View Image
            </div>
            <div class="card-body">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($imageData) > 0)
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($imageData as $row)
                                @php
                                    $img = empty($row->image_url) || $row->image_url == '' ? 'N/A' : '<img src="' . $row->image_url . '" height="50px" width="50px" alt="' . $row->title . '">';
                                    $status = !empty($row->status) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactive</span>';
                                @endphp
                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td> {{ $row->title }} </td>
                                    <td> {{ $row->description }} </td>
                                    <td> {!! $img !!} </td>
                                    <td> {!! $status !!}</td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm">Edit</a>
                                        |
                                        <a href="#" onclick="window.confirm('Are you want to delete')"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else

                        @endif

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        function showBodyCardForm() {
            $('#card-body-form').toggle("slow");
        }


        function showBodyCardFormImage() {
            $('#image-card-body-form').toggle("slow");
        }

        function preview() {
            var frame = document.getElementById("frame");
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>

</html>
