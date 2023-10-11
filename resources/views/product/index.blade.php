<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

    <style>
        .progress {
            position: relative;
            width: 100%;
        }

        .bar {
            background-color: #b5076f;
            width: 0%;
            height: 20px;
        }

        .percent {
            position: absolute;
            display: inline-block;
            left: 50%;
            color: #040608;
        }

    </style>
    <title>Import Product Data on CSV in Laravel 10</title>
</head>
<body>
    <div class="container my-5">
        <h1 class="fs-5 fw-bold text-center">Import Product Data on CSV in Laravel 10</h1>
        <div class="row">
            <div class="d-flex my-2 invisible">
                <a href="" class="btn btn-primary me-1">Export Data</a>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Data
                </button>
            </div>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="container mt-5">
                <form id="fileUploadForm" method="post" action="{{ route('products.import.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <strong>CSV File:</strong>
                        <input type="file" name="csv" class="form-control" />
                    </div>
                    <div id="progressbar" style="border:1px solid #ccc; border-radius: 5px; "></div>
                    <iframe id="loadarea" style="display:none;"></iframe><br />
                    <div class="form-group text-center">
                        <button id="button1" type="submit" class="btn btn-success btn-block">Import</button>
                    </div>
                </form>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Time</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $item)
                    <tr>
                        <th scope="row">{{ $item->created_at }}</th>
                        <td>{{ $item->file_name }}</td>
                        <td>{{ $item->import_status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.import.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" name="csv" class="form-control">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $("#button1").click(function() {
            document.getElementById('loadarea').src = '/progress-bar';
        });
        $("#button2").click(function() {
            document.getElementById('loadarea').src = '';
        });

    </script>

</body>
</html>
