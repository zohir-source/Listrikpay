<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id_penggunaan
 * @property int $id_pelanggan
 * @property string $bulan
 * @property int $tahun
 * @property int $meter_awal
 * @property int $meter_akhir
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pelanggan $pelanggan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan whereBulan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan whereIdPelanggan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan whereIdPenggunaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan whereMeterAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan whereMeterAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penggunaan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Penggunaan extends Model
{
    protected $primaryKey = 'id_penggunaan';
    protected $table = 'penggunaan';
    protected $fillable = ['id_pelanggan','bulan','tahun','meter_awal','meter_akhir'];

     public $timestamps = false; 
    public $incrementing = true;

    protected $keyType = 'int';

    public function pelanggan()
    {
        # setiap data penggunaan hanya milik satu pelanggan
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
    public function tagihan()
    {
        # setiap data penggunaan hanya milik satu pelanggan
        return $this->hasone(Tagihan::class, 'id_penggunaan', 'id_penggunaan');
    }
    //
}
