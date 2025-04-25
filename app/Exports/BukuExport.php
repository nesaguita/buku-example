<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class BukuExport implements FromCollection, WithHeadingRow
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function model(array $row)
    {
        return new Buku([
            'id' => $row['id'],
            'judul_buku' => $row['judul_buku'],
            'tahun_terbit' => $row['tahun_terbit'],
            'pengarang' => $row['pengarang'],
            'harga' => $row['harga'],
        ]);
    }
    
    public function collection()
    {
        return Buku::all();
    }
}
