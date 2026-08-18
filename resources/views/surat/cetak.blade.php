<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Surat - {{ $surat->nomor_surat }}</title>
    <style>
        @page {
            size: A4;
            margin: 2cm;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.6;
        }
        .kop {
            text-align: center;
            margin-bottom: 15px;
        }
        .kop h1 {
            font-size: 16pt;
            text-transform: uppercase;
            margin: 0;
        }
        .kop p {
            font-size: 10pt;
            margin: 2px 0;
        }
        .judul {
            text-align: center;
            margin: 20px 0;
        }
        .judul h2 {
            font-size: 14pt;
            text-decoration: underline;
            text-transform: uppercase;
            margin: 0;
        }
        .judul .nomor {
            font-size: 12pt;
            font-weight: bold;
            margin-top: 5px;
        }
        table.info {
            width: 100%;
            margin: 15px 0;
            border-collapse: collapse;
        }
        table.info td {
            padding: 4px 0;
        }
        table.info .lbl {
            width: 25%;
            font-weight: bold;
        }
        table.info .dot {
            width: 5%;
            text-align: center;
        }
        table.info .val {
            width: 70%;
        }
        .garis {
            border-bottom: 1px dashed #999;
            margin: 15px 0;
        }
        .isi {
            margin: 20px 0;
            text-align: justify;
        }
        .isi p {
            margin: 8px 0;
        }
        .ttd {
            margin-top: 40px;
            text-align: right;
        }
        .ttd .nama {
            margin-top: 35px;
            font-weight: bold;
            text-decoration: underline;
        }
        .ttd .jabatan {
            font-size: 10pt;
        }
        .footer {
            margin-top: 40px;
            padding-top: 8px;
            border-top: 1px solid #ccc;
            font-size: 8pt;
            text-align: center;
            color: #888;
        }
        .badge {
            display: inline-block;
            padding: 2px 10px;
            font-weight: bold;
            border-radius: 3px;
        }
        .badge-masuk {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #34d399;
        }
        .badge-keluar {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #f87171;
        }

        @if(!($isPdf ?? false))
        .toolbar {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 100;
        }
        .toolbar a, .toolbar button {
            display: inline-block;
            padding: 8px 16px;
            margin-left: 8px;
            border: none;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
        }
        .btn-print { background: #7c3aed; }
        .btn-pdf { background: #1e293b; }
        .btn-back { background: #9ca3af; color: #000; }
        @media print { .toolbar { display: none; } }
        body {
            background: #f3f4f6;
            padding: 80px 20px 30px 20px;
        }
        .halaman {
            background: #fff;
            max-width: 21cm;
            margin: 0 auto;
            padding: 2cm;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        @media print {
            body { background: #fff; padding: 0; }
            .halaman { box-shadow: none; padding: 0; max-width: 100%; }
        }
        @endif
    </style>
</head>
<body>

    @unless($isPdf ?? false)
    <div class="toolbar">
        <a href="{{ url()->previous() }}" class="btn-back">Kembali</a>
        <button onclick="window.print()" class="btn-print">Print</button>
        <a href="{{ route('surat.pdf', $surat->id) }}" class="btn-pdf">Download PDF</a>
    </div>
    @endunless

    <div class="{{ ($isPdf ?? false) ? '' : 'halaman' }}">

        <!-- KOP SURAT DENGAN LOGO -->
        <div class="kop">
            <table style="width:100%; border-collapse:collapse;">
                <tr>
                    <td style="width:80px; vertical-align:middle; text-align:center;">
                        @if($isPdf ?? false)
                            <img src="{{ public_path('logo-surat.png') }}" alt="Logo" style="width:60px; height:60px;">
                        @else
                            <img src="{{ asset('logo-surat.png') }}" alt="Logo" style="width:60px; height:60px;">
                        @endif
                    </td>
                    <td style="vertical-align:middle; text-align:center;">
                        <h1 style="font-size:16pt; text-transform:uppercase; margin:0;">AgendaSurat.Digital</h1>
                        <p style="font-size:10pt; margin:2px 0;">Sistem Manajemen Pengarsipan Surat Resmi</p>
                        <p style="font-size:10pt; margin:2px 0;">info@agendasurat.digital • (0333) 000-0000 • Banyuwangi, Jawa Timur</p>
                    </td>
                </tr>
            </table>
            <div style="border-bottom:3px solid #000; margin-top:10px;"></div>
        </div>

        <!-- JUDUL -->
        <div class="judul">
            @php
                $jenis = ucfirst(strtolower(trim($surat->jenis_surat)));
            @endphp
            <h2>{{ $jenis === 'Masuk' ? 'SURAT MASUK' : 'SURAT KELUAR' }}</h2>
            <div class="nomor">Nomor: {{ $surat->nomor_surat }}</div>
        </div>

        <!-- INFO SURAT -->
        <table class="info">
            <tr>
                <td class="lbl">Jenis Surat</td>
                <td class="dot">:</td>
                <td class="val">
                    @php $j = ucfirst(strtolower(trim($surat->jenis_surat))); @endphp
                    <span class="badge {{ $j === 'Masuk' ? 'badge-masuk' : 'badge-keluar' }}">{{ $j }}</span>
                </td>
            </tr>
            <tr>
                <td class="lbl">{{ $jenis === 'Masuk' ? 'Pengirim' : 'Penerima' }}</td>
                <td class="dot">:</td>
                <td class="val">{{ $surat->pengirim_penerima ?? '-' }}</td>
            </tr>
            <tr>
                <td class="lbl">Tanggal Surat</td>
                <td class="dot">:</td>
                <td class="val">{{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td class="lbl">Perihal</td>
                <td class="dot">:</td>
                <td class="val">{{ $surat->perihal }}</td>
            </tr>
        </table>

        <div class="garis">&nbsp;</div>

        <!-- ISI SURAT -->
        <div class="isi">
            <p>Dengan hormat,</p>
            <p>{{ $surat->isi ?? $surat->perihal }}</p>
            <p>Demikian surat ini dibuat untuk dapat dipergunakan sebagaimana mestinya. Atas perhatian dan kerja sama yang diberikan, kami ucapkan terima kasih.</p>
        </div>

        <!-- TANDA TANGAN -->
        <div class="ttd">
            <p>Banyuwangi, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p>Yang Menyatakan,</p>
            <br><br><br>
            <p class="nama">{{ $surat->penandatangan ?? '( ......................................... )' }}</p>
            <p class="jabatan">{{ $surat->jabatan ?? 'Administrator' }}</p>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            Dokumen ini dihasilkan secara otomatis oleh sistem AgendaSurat.Digital • {{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i') }} WIB
        </div>

    </div>

</body>
</html>