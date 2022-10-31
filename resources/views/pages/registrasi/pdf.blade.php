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
            font-size: 14px;
        }

        .text-center {
            display: block;
            text-align: center;
        }

        .text-sm {
            font-size: 12px;
        }

        .text-lg {
            font-size: 16px;
        }

        .text-bold {
            font-weight: bold;
        }

        .text-uppercase {
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="title">
        <div class="text-bold">BADAN KEPEGAWAIAN PENDIDIKAN DAN PELATIHAN</div>
        <div class="text-sm">Pemerintah Kabupaten Bulaang Mongodow</div>
        <div class="text-sm">Komplek Kantor Bupati, Jl. Trans Sulawesi, Lolak Tombolango, Lolak</div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div class="text-center text-bold">BUKTI REGISTRASI</div>
    <div class="text-center text-lg text-uppercase">{{ $item->no_registrasi ?? null }}</div><br />
    <p class="text-bold">IDENTITAS PEGAWAI</p>
    <table id="detail">
        <tr>
            <td style="width: 200px;">Tgl. Registrasi</td>
            <td>: {{ $item->created_at ?? null }}</td>
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
            <td>Tempat/Tgl. Lahir</td>
            <td>: {{ $item->detail_user->tempat_lahir ?? "-"}}, {{ $item->detail_user->tgl_lahir ?? "-"}}</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>: {{ $item->detail_user->skpd->nama_skpd ?? "-"}}</td>
        </tr>
        <tr>
            <td>Pangkat/Golongan</td>
            <td>: {{ $item->detail_user->golongan->nama_pangkat ?? null }} {{ $item->detail_user->golongan->golongan ?? null }} {{ $item->detail_user->golongan->ruang ?? null }}</td>
        </tr>
        <tr>
            <td>Jabatan Terakhir</td>
            <td>: {{ $item->detail_user->jabatan ?? "-"}}</td>
        </tr>
        <tr>
            <td>Pendidikan Terakhir</td>
            <td>: {{ $item->jenjang_pendidikan->nama_jenjang_pendidikan ?? "-"}}</td>
        </tr>
    </table>
    <p class="text-bold">PENDIDIKAN YANG DIAMBIL</p>
    <table id="detail">
        <tr>
            <td style="width: 200px;">Jenjang Pendidikan</td>
            <td>: {{ $item->jenjang_pendidikan->nama_jenjang_pendidikan ?? null }}</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>: {{ $item->program_studi ?? "-"}}</td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td>: {{ $item->fakultas ?? "-"}}</td>
        </tr>

        <tr>
            <td>Universitas</td>
            <td>: {{ $item->universitas ?? "-"}}</td>
        </tr>
        <tr>
            <td>Tgl. Diterima</td>
            <td>: {{ $item->tgl_diterima ?? "-"}}</td>
        </tr>
        @php
        $arr = [
        1 => 'Sendiri',
        2 => 'Pemda'
        ];
        @endphp
        <tr>
            <td>Biaya</td>
            <td>: {{ $arr[$item->biaya] ?? null }}</td>
        </tr>

    </table>
    <p class="text-bold">BERKAS PERSYARATAN</p>
    @if($item->detail_user->ujian->persyaratan)
    <table id="detail">
        @foreach($item->detail_user->ujian->persyaratan as $persyaratan)
        <tr>
            <td style="width: 200px;">{{ $persyaratan->nama_persyaratan ?? null }}</td>
            <td>:
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