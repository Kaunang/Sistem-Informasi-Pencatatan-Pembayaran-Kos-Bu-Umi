@extends('layouts.admin.master')
@section('title', 'Aplikasi Laravel')
@section('content')
    <br>
    <div class="container">
        <div class="text-center">
            <h1>Data Tagihan</h1>
        </div>
        <div class="table-wrapper">
        <table class="table table-bordered table-striped" id="tabel-lunas">
            <thead>
                <tr>
                    <th style="width:1%">No.</th>
                    <th style="width:10%">Penghuni</th>
                    <th style="width:10%">No HP</th>
                    <th style="width:10%">Alamat</th>
                    <th style="width:10%">Tagihan Bulan</th>
                    <th style="width:10%">Total Tagihan (Rp.)</th>
                    <th style="width:10%">Tanggal Bayar</th>
                    <th style="width:10%">Nomor Kamar</th>
                    <th style="width:5%">Status</th>
                    <th style="width:10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataTagihan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->data_penghuni->nama }}</td>
                        <td>{{ $data->data_penghuni->no_hp }}</td>
                        <td>{{ $data->data_penghuni->alamat }}</td>
                        <td>{{ $data->bulan_tahun }}</td>
                        <td>{{ number_format($data->data_kamar->tarif, 0, '', '') }}</td> <!-- Menghapus titik -->
                        <td>{{ $data->tgl_bayar }}</td>
                        <td>{{ $data->data_penghuni->id_kamar }}</td>
                        <td>
                            <div class="bg-info text-white"
                                style="display: inline-block; padding: 5px; max-width: 150px; border-radius: 5px;">
                                {{ $data->status }}</div>
                        </td>
                        <td>
                            <form action="" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary text-white"><i class="fas fa-print"></i>  Struk</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <script>
const { jsPDF } = window.jspdf;

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".btn-primary").forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            const row = button.closest("tr");
            const cells = row.querySelectorAll("td");

            const data = {
                penghuni: cells[1].innerText,
                noHp: cells[2].innerText,
                alamat: cells[3].innerText,
                bulanTagihan: cells[4].innerText,
                totalTagihan: parseInt(cells[5].innerText),
                tanggalBayar: cells[6].innerText,
                nomorKamar: cells[7].innerText,
                status: cells[8].innerText
            };

            const doc = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: 'A4'
            });

            // Header
            doc.setFont('Helvetica', 'bold');
            doc.setFontSize(16);
            doc.text('STRUK PEMBAYARAN KOS', 105, 20, { align: 'center' });
            doc.setFontSize(10);
            doc.setFont('Helvetica', 'normal');
            doc.text('Kos Bu Umi', 105, 26, { align: 'center' });
            doc.text('Kota Kediri', 105, 30, { align: 'center' });
            doc.text('Telp: 08123456789', 105, 34, { align: 'center' });

            doc.line(14, 40, 196, 40);

            // Detail Invoice
            doc.setFont('Helvetica', 'bold');
            doc.setFontSize(12); 
            doc.text(`Nomor Kamar: ${data.nomorKamar}`, 14, 50);

            // Status
            doc.setFontSize(12);
            doc.text('Status:', 14, 58); 
            if (data.status.toLowerCase() === 'lunas') {
                doc.setTextColor(0, 128, 0); 
            } else {
                doc.setTextColor(255, 0, 0); 
            }
            doc.setFont('Helvetica', 'bold'); 
            doc.setFontSize(16); 
            doc.text(`${data.status}`, 30, 58); 

            doc.setTextColor(0, 0, 0); 
            doc.setFontSize(12); 
            doc.text(`Tanggal Bayar: ${data.tanggalBayar || '-'}`, 14, 66);

            // Penerima Tagihan
            doc.setFont('Helvetica', 'bold');
            doc.setFontSize(10);
            doc.text('Dibayarkan Kepada:', 14, 76);
            doc.setFont('Helvetica', 'normal');
            doc.text(`${data.penghuni}`, 14, 82);
            doc.text(`${data.alamat}`, 14, 88);
            doc.text(`No HP: ${data.noHp}`, 14, 94);

            // Detail Tagihan
            doc.setFont('Helvetica', 'bold');
            doc.text('Detail Tagihan:', 14, 104);
            doc.line(14, 106, 196, 106);
            doc.setFont('Helvetica', 'normal');
            doc.text('Deskripsi', 14, 112);
            doc.text('Jumlah (Rp)', 180, 112, { align: 'right' });
            doc.line(14, 114, 196, 114);

            doc.text(`Tagihan Bulan ${data.bulanTagihan}`, 14, 120);
            doc.text(`Rp ${data.totalTagihan.toLocaleString('id-ID')}`, 180, 120, { align: 'right' });

            // Total
            doc.line(14, 130, 196, 130);
            doc.setFont('Helvetica', 'bold');
            doc.text('Total Tagihan', 14, 136);
            doc.text(`Rp ${data.totalTagihan.toLocaleString('id-ID')}`, 180, 136, { align: 'right' });

            // Footer
            doc.line(14, 150, 196, 150);
            doc.setFont('Helvetica', 'normal');
            doc.text('Kediri, ' + new Date().toLocaleDateString('id-ID'), 14, 160);
            doc.text('Admin Kos', 14, 166);

            // Simpan PDF
            doc.save(`Invoice_${data.penghuni}.pdf`);
        });
    });
});



    </script>
@endsection
