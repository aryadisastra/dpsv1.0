<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportPenyewaan implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents {
    use Exportable;

    public function collection() {
        $o = 0;
        $output = [];
        $data = Penyewaan::whereIn('status', [4])->orderBy('created_at', 'asc')->get();
        if(count($data) > 0){
            foreach ($data as $datas) {
                $o++;
                $kode = isset($datas->kode_penyewaan) ? $datas->kode_penyewaan : '';
                $tanggal = isset($datas->tanggal_sewa) ? $datas->tanggal_sewa : '';
                $waktu = isset($datas->jangka_waktu) ? $datas->jangka_waktu.' Hari' : ' Hari';
                $nama = isset($datas->nama_customer) ? ucwords($datas->nama_customer) : '' ;
                $email = isset($datas->email_customer) ? $datas->email_customer : '' ;
                $alamat = isset($datas->alamat_customer) ? $datas->alamat_customer : '';
                $namarek = isset($datas->nama_rek) ? $datas->nama_rek : '';
                $mobil = isset($datas->nama_mobil) ? $datas->nama_mobil->nama_mobil : '';
                $total = isset($datas->total) ? 'Rp. '.$datas->total : '';
                $status = isset($datas->status) ? ($datas->status == 4 ? 'Finished' : '') : '';
                $output[] =
                [
                    $o,
                    $kode,
                    date("d M Y",strtotime($tanggal)),
                    $waktu,
                    $nama,
                    $email,
                    $alamat,
                    $namarek,
                    $mobil,
                    $total,
                    $status,
                ];
            }
        }
        return collect($output);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFF0000'],
                        ],
                    ],
                ];
                $cellRange = 'A1:K1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
            },
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Penyewaan',
            'Tanggal Sewa',
            'Jangka Waktu',
            'Nama Customer',
            'Email Customer',
            'Alamat Customer',
            'Nama Rekening',
            'Nama Mobil',
            'Total',
            'Status'
        ];
    }
}
