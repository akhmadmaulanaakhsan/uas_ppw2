<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pertemuan6.css">
    <title>Latihan Pertemuan 6</title>
</head>
<body>
    <h1 style="text-align: center"> Pertemuan 6: CRUD</h1>
    <button class="tambah-button"><a href="{{ route('buku.create') }}"> Tambah Buku</a></button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tgl. Terbit</th>
                    <th class="aksi-buku">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $buku)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp ".number_format($buku->harga, 2, ',', '.') }}</td>
                        <td>{{ $buku->tgl_terbit }}</td>
                        <td>
                            <form method="put" action="{{ route('buku.edit', $buku->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="update-button">Update</button>
                            </form>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="post" style="display: inline;">
                                @csrf
                                <button onClick="return confirm('Yakin mau dihapus?')" class="hapus-button">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Jumlah data buku: {{ $jumlahData }}</p> 
        <p>Jumlah total harga semua buku: Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>

</body>
</html>



