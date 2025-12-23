<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Export Laporan</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            padding: 20px;
        }

        h1 {
            font-size: 16px;
            margin-bottom: 4px;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: #666;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 6px;
            vertical-align: top;
        }

        th {
            background-color: #eee;
            font-weight: bold;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .status-menunggu {
            color: #b45309;
            font-weight: bold;
        }

        .status-diproses {
            color: #1d4ed8;
            font-weight: bold;
        }

        .status-selesai {
            color: #15803d;
            font-weight: bold;
        }

        img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    {{-- Header --}}
    <div class="text-center">
        <h1>LAPORAN PENGADUAN MASYARAKAT</h1>
        <div class="text-muted">
            Dicetak pada {{ now()->format('d M Y H:i') }}
        </div>
    </div>

    {{-- Table --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Pelapor</th>
                <th>Bukti Foto</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($reports as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->deskripsi_laporan }}</td>
                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $item->user->nama ?? '-' }}</td>

                    <td>
                        @if ($item->foto)
                            <img src="{{ public_path('foto_laporan/' . $item->foto_laporan) }}">
                        @else
                            <img src="{{ public_path('foto_laporan/' . $item->foto_laporan) }}" width="120">
                        @endif
                    </td>

                    <td>
                        @php
                            $lokasi = 'Lokasi tidak tersedia';

                            if ($item->latitude && $item->longitude) {
                                $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$item->latitude}&lon={$item->longitude}";
                                $opts = [
                                    "http" => [
                                        "header" => "User-Agent: LaporDesaApp/1.0\r\n",
                                        "timeout" => 5
                                    ]
                                ];

                                try {
                                    $context = stream_context_create($opts);
                                    $res = file_get_contents($url, false, $context);

                                    if ($res) {
                                        $data = json_decode($res, true);
                                        $addr = $data['address'] ?? [];

                                        $lokasi = collect([
                                            $addr['hamlet'] ?? null,
                                            $addr['village'] ?? $addr['road'] ?? null,
                                            $addr['suburb'] ?? $addr['neighbourhood'] ?? null,
                                        ])->filter()->implode(', ');
                                    }
                                } catch (\Exception $e) {
                                }
                            }
                        @endphp

                        {{ $lokasi }}
                    </td>

                    <td>
                        @if ($item->status === 'menunggu')
                            <span class="status-menunggu">Menunggu</span>
                        @elseif ($item->status === 'diproses')
                            <span class="status-diproses">Diproses</span>
                        @elseif ($item->status === 'selesai')
                            <span class="status-selesai">Selesai</span>
                        @else
                            -
                        @endif
                    </td>

                    <td>{{ $item->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>