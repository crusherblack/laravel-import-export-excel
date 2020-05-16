<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header bg-white">
                        <h3>Data Pegawai</h3>
                        <form action="{{ url('/uploadExcel') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" name="file" required>
                                    <label class="custom-file-label" for="inputGroupFile01">Pilih File Excel</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Upload Excel</button>
                            </div>

                            <div class="form-group">
                                <a href="{{ url('exportExcel') }}" target="_blank" class="btn btn-success btn-block">Export Excel</a>
                            </div>

                        </form>
                    </div>
                    <div class="card-body">

                        <!-- Untuk mempersingkat waktu ini adalah flash messagenya -->

                        @if(Session::has('info'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session('info') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <!-- End of flash messagenya -->

                        <table class="table table-striped table-hovered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Pegawai</td>
                                    <td>Pekerjaan</td>
                                    <td>Jenis Kelamin</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $index=>$item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->job }}</td>
                                    <td>
                                        @if ($item->gender === 'L')
                                        Laki-laki
                                        @else
                                        Perempuan
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
