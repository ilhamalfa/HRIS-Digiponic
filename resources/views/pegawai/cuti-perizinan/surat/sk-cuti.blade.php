<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SK Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    {{-- <div class="container">
        <table class="table">
            <tr>
                <td><center><h4>Surat Cuti</h4></center></td>
            </tr>
            <tr>
                <td>
                    <center><h6>No : {{ $data->id . '-' . $data->tanggal_mulai . '-' . $data->user1->nik . '-' . $data->user_id_1 }}</h6></center>
                </td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td>Yang bertanda tangan :</td>
            </tr>
            <tr>
                <td>
                    Nama : {{ $data->user1->nama }}
                </td>
            </tr>
            <tr>
                <td>
                    NIK : {{ $data->user1->nik }}
                </td>
            </tr>
            <tr>
                <td>
                    Golongan : {{ $data->user1->golongan }}
                </td>
            </tr>
            <tr>
                <td>
                    Department : {{ $data->user1->department }}
                </td>
            </tr>
            <tr>
                <td>
                    <p>dengan ini mengajukan permohonan cuti untuk tidak masuk bekerja, selama {{ date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 . " hari" }}, dimulai pada tanggal {{ date('d-m-Y', strtotime($data->tanggal_mulai)) }} @if (date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 > 1)
                        sampai pada tanggal {{ date('d-m-Y', strtotime($data->tanggal_berakhir)) }} @endif dengan alasan, yaitu {{ $data->alasan }}.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Demikian disampaikan kiranya menjadi maklum. </p>
                </td>
            </tr>
        </table>
    </div> --}}
    <div class="container">
        <div class="row mt-3">
            <div class="col text-center">
                <h4>Surat Cuti</h4>
                <h6>No : {{ $data->id . '-' . $data->tanggal_mulai . '-' . $data->user1->nik . '-' . $data->user_id_1 }}</h6>
                <hr class="border border-dark">
            </div>
        </div>
        <div class="row">
            <div class="col-8 mx-auto">
                <p>Yang bertanda tangan :</p>
                <ul style="list-style-type: none;">
                    <li>Nama : {{ $data->user1->nama }}</li>
                    <li>NIK : {{ $data->user1->nik }}</li>
                    <li>Golongan : {{ $data->user1->golongan }}</li>
                    <li>Department : {{ $data->user1->department }}</li>
                </ul>
                <p>dengan ini mengajukan permohonan cuti untuk tidak masuk bekerja, selama {{ date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 . " hari" }}, dimulai pada tanggal {{ date('d-m-Y', strtotime($data->tanggal_mulai)) }} @if (date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 > 1)
                sampai pada tanggal {{ date('d-m-Y', strtotime($data->tanggal_berakhir)) }} @endif dengan alasan, yaitu {{ $data->alasan }}.</p>
                <p>Demikian disampaikan kiranya menjadi maklum. </p>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col text-center">
                <p>Menyetujui,</p>
                <p>{{ $data->user2->golongan .'-' . $data->user2->department }}</p>
                <img src="{{ url('storage/' . $data->user2->digital_signature) }}" alt="">
                <p>{{ $data->user2->nama }}</p>
                <p>{{ $data->user2->nik }}</p>
            </div>
            <div class="col text-center">
                <p>Hormat Kami,</p>
                <img src="{{ url('storage/' . $data->user1->digital_signature) }}" alt="" class="mt-4">
                <p>{{ $data->user1->nama }}</p>
                <p>{{ $data->user1->nik }}</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>