<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h3 class="font-weight-normal">LAPORAN CHRIS REPARASI</h3>
    <h5>{{ date('d M Y', strtotime($from)) }} - {{ date('d M Y', strtotime($to)) }}</h5>
    <table class="table table-bordered mx-auto" style="width:180;">
        <thead class="thead text-center">
        <tr>
            <th>ID Barang</th>
            <th>Pelanggan</th>
            <th>Karyawan</th>
            <th>Barang</th>
            <th>Ukuran</th>
            <th>Perbaikan</th>
            <th>Harga</th>
            <th>Tanggal Masuk</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $cetak as $ctk )
        <tr>
            <td>{{ $ctk->id_brg }}</td>
            <td>{{ $ctk->nm_plgn }}({{ $ctk->id_plgn }})</td>
            <td>{{ $ctk->nm_krywn }}({{ $ctk->id_krywn }})</td>
            <td>{{ $ctk->nm_brg }}</td>
            <td>{{ $ctk->uk_brg }}</td>
            <td>{{ $ctk->jns_prbkn }}</td>
            <td>{{ 'Rp'.number_format($ctk->harga, '0', ',', '.') }}</td>
            <td>{{ date('d M Y', strtotime($ctk->tgl_masuk)) }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>

