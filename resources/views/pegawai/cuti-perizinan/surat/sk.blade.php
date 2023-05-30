<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ "sk " . $sk }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    @if ($sk == 'cuti' || $sk == 'izin')
    <div class="container">
        <div class="row mt-3">
            <div class="col text-center">
                <h4>{{ Str::upper('surat keterangan ' . $sk) }}</h4>
                <h6>No : {{ Str::upper($no_surat) }}</h6>
                <hr class="border border-dark">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8 mx-auto">
                <p>Yang bertanda tangan :</p>
                <ul style="list-style-type: none;">
                    <li>Nama : {{ $nama }}</li>
                    <li>NIK : {{ $nik }}</li>
                    <li>Golongan : {{ $golongan }}</li>
                    <li>Department : {{ $department }}</li>
                </ul>
                <p>dengan ini mengajukan permohonan {{ $sk }} untuk tidak masuk bekerja, selama {{ date_diff(date_create($tanggal_mulai), date_create($tanggal_berakhir))->days + 1 . " hari" }}, dimulai pada tanggal {{ date('d-m-Y', strtotime($tanggal_mulai)) }} @if (date_diff(date_create($tanggal_mulai), date_create($tanggal_berakhir))->days + 1 > 1)
                sampai pada tanggal {{ date('d-m-Y', strtotime($tanggal_berakhir)) }} @endif dengan alasan yaitu, {{ $alasan }}.</p>
                <p>Demikian disampaikan kiranya menjadi maklum. </p>
            </div>
        </div>
        <div class="row mt-4">
            <table class="table text-center">
                <tr>
                    <td>Menyetujui</td>
                    <td></td>
                    <td>Hormat Kami,</td>
                </tr>
                <tr>
                    <td><p>{{ $penyetuju_golongan .'-' . $penyetuju_department }}</p></td>
                    <td></td>
                    <td></td>
                </tr>
                {{-- <tr>
                    <td>
                        <img src="{{ public_path('storage/' . $penyetuju_signature) }}" alt="" style="width: 200px;">
                    </td>
                    <td></td>
                    <td>
                        <img src="{{ public_path('storage/' . $digital_signature) }}" alt="" style="width: 200px;">
                    </td>
                </tr> --}}
                <tr>
                    <td><p>{{ $penyetuju_nama }}</p></td>
                    <td></td>
                    <td><p>{{ $nama }}</p></td>
                </tr>
                <tr>
                    <td><p>{{ 'NIK. '. $penyetuju_nik }}</p></td>
                    <td></td>
                    <td><p>{{ 'NIK. '. $nik }}</p></td>
                </tr>
            </table>
        </div>
    </div>
    @elseif ($sk == 'resign')
    <div class="container">
        <div class="row mt-3">
            <div class="col text-center">
                <h4>{{ Str::upper('surat keterangan ' . $sk) }}</h4>
                <h6>No : {{ Str::upper($no_surat) }}</h6>
                <hr class="border border-dark">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8 mx-auto">
                <p>Yang bertanda tangan :</p>
                <ul style="list-style-type: none;">
                    <li>Nama : {{ $nama }}</li>
                    <li>NIK : {{ $nik }}</li>
                    <li>Golongan : {{ $golongan }}</li>
                    <li>Department : {{ $department }}</li>
                </ul>
                <p>dengan ini mengajukan permohonan untuk {{ $sk }}, pada tanggal {{ $tanggal }}</p>
                <p>Demikian disampaikan kiranya menjadi maklum. </p>
            </div>
        </div>
        <div class="row mt-4">
            <table class="table text-center">
                <tr>
                    <td>Menyetujui</td>
                    <td></td>
                    <td>Hormat Kami,</td>
                </tr>
                <tr>
                    <td><p>{{ $penyetuju_golongan .'-' . $penyetuju_department }}</p></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ public_path('storage/' . $penyetuju_signature) }}" alt="" style="width: 200px;">
                    </td>
                    <td></td>
                    <td>
                        <img src="{{ public_path('storage/' . $digital_signature) }}" alt="" style="width: 200px;">
                    </td>
                </tr>
                <tr>
                    <td><p>{{ $penyetuju_nama }}</p></td>
                    <td></td>
                    <td><p>{{ $nama }}</p></td>
                </tr>
                <tr>
                    <td><p>{{ 'NIK. '. $penyetuju_nik }}</p></td>
                    <td></td>
                    <td><p>{{ 'NIK. '. $nik }}</p></td>
                </tr>
            </table>
        </div>
    </div>
    @endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>