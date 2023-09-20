<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl. Terbit</th>
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
            </tr>
        @endforeach
    </tbody>
</table>
<p>Jumlah data buku: {{ $jumlahData }}</p> 
<p>Jumlah total harga semua buku: Rp {{ number_format($totalHarga, 0, ',', '.') }}</p> 
            