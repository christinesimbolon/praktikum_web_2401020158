<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    {{-- Pesan Feedback Operasi Berhasil/Gagal --}}
    @if (session('berhasil'))
        <p>{{ session('berhasil') }}</p>
    @endif

    @if (session('gagal'))
        <p>{{ session('gagal') }}</p>
    @endif

    {{-- Menampilkan Daftar Error Validasi Server-Side --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- Form Tambah Mahasiswa (Create) --}}
    <h2>Tambah Mahasiswa</h2>
    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <p>NIM<br><input type="text" name="nim" value="{{ old('nim') }}"></p>
        <p>Nama<br><input type="text" name="nama" value="{{ old('nama') }}"></p>
        <p>Email<br><input type="email" name="email" value="{{ old('email') }}"></p>
        <p>Usia<br><input type="number" name="usia" value="{{ old('usia') }}"></p>
        <p>Program Studi<br>
            <select name="program_studi_id">
                <option value="">-- Pilih Program Studi --</option>
                @foreach ($daftarProgramStudi as $programStudi)
                    <option value="{{ $programStudi['id'] }}" @selected(old('program_studi_id') == $programStudi['id'])>
                        {{ $programStudi['nama_prodi'] }}
                    </option>
                @endforeach
            </select>
        </p>
        <button type="submit">Tambah Data</button>
    </form>

    <hr>

    {{-- Bagian Tabel & Filter Data (Read) --}}
    <h2>Daftar Mahasiswa</h2>

    @if (isset($nim) && $nim)
        <p>Filter NIM: {{ $nim }}</p>
    @else
        <p>Menampilkan semua data.</p>
    @endif

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Usia</th>
                <th>Program Studi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarMahasiswa as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa['nim'] }}</td>
                    <td>{{ $mahasiswa['nama'] }}</td>
                    <td>{{ $mahasiswa['email'] }}</td>
                    <td>{{ $mahasiswa['usia'] }}</td>
                    <td>{{ $mahasiswa['nama_prodi'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Data tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if (isset($nim) && $nim)
        <p><a href="{{ url('/mahasiswa') }}">Tampilkan semua data</a></p>
    @endif
</body>
</html>