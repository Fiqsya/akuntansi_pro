<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table="siswa";
    protected $primaryKey="id";
     protected $fillable = ['nis', 'nama_siswa', 'alamat', 'handphone'];

    public function journalDetails()
    {
        return $this->hasMany(JournalDetail::class);
    }

}
