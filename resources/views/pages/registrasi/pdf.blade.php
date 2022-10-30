<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? null }}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #detail {
            font-size: 12px;
            border-collapse: collapse;
            text-transform: uppercase;
            width: 100%;
        }

        #detail td,
        #detail th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #detail tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #detail tr:hover {
            background-color: #ddd;
        }

        #detail th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        .h3 {
            text-align: center;
            text-transform: uppercase;
            color: #4CAF50;
        }

        .h5 {
            text-align: center;
            text-transform: uppercase;
        }

        .title {
            font-size: 12px;
            font-weight: bold;
        }

        .title .subtitle {
            font-size: 14px;
            text-transform: uppercase;
        }

        .title .address {
            font-weight: normal;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="title">
        <div>BADAN KEPEGAWAIAN PENDIDIKAN DAN PELATIHAN</div>
        <div class="subtitle">Pemerintah Kabupaten Bulaang Mongodow</div>
        <div class="address">Komplek Kantor Bupati, Jl. Trans Sulawesi, Lolak Tombolango, Lolak</div>
    </div>
    <br /><br />
    <div class="h3">BUKTI REGISTRASI</div>
    <div class="h5">UJIAN {{ $item->detail_user->ujian->nama_ujian ?? "-"}}</div><br />
    <table id="detail">
        <tr>
            <td>Tanggal Registrasi</td>
            <td>: {{ $item->created_at }}</td>
        </tr>
        <tr>
            <td>No. Registrasi</td>
            <td>: {{ $item->no_registrasi ?? "-"}}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>: {{ $item->detail_user->nip ?? "-"}}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: {{ $item->detail_user->user->name ?? "-"}}</td>
        </tr>
        <tr>
            <td>SKPD</td>
            <td>: {{ $item->detail_user->skpd->nama_skpd ?? "-"}}</td>
        </tr>
        <tr>
            <td>Pangkat/Golongan Terakhir</td>
            <td>: {{ $item->detail_user->golongan->nama_pangkat ?? null }} {{ $item->detail_user->golongan->golongan ?? null }} {{ $item->detail_user->golongan->ruang ?? null }}</td>
        </tr>
        <tr>
            <td>Jabatan Terakhir</td>
            <td>: {{ $item->detail_user->jabatan ?? "-"}}</td>
        </tr>
    </table><br />
    <div class="h5">BERKAS PERSYARATAN</div><br />
    @if($item->detail_user->ujian->persyaratan)
    <table id="detail">
        <tr>
            <th>BERKAS Persyaratan</th>
            <th>Ket.</th>
        </tr>
        @foreach($item->detail_user->ujian->persyaratan as $persyaratan)
        <tr>
            <td>{{ $persyaratan->nama_persyaratan ?? null }}</td>
            <td>
                @if($persyaratan->persyaratan_user)
                @forelse($persyaratan->persyaratan_user as $persyaratan_user)
                Sudah diupload
                @empty
                Belum diupload
                @endforelse
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    @endif
</body>

</html>