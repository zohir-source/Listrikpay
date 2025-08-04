<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id_tagihan
 * @property int $id_penggunaan
 * @property int $id_pelanggan
 * @property string $bulan
 * @property int $tahun
 * @property int $jumlah_meter
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pelanggan $pelanggean
 * @property-read \App\Models\Pembayaran|null $pembayaran
 * @property-read \App\Models\Penggunaan $penggunaan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan whereBulan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan whereIdPelanggan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan whereIdPenggunaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan whereIdTagihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan whereJumlahMeter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tagihan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tagihan extends Model
{
     protected $primaryKey = 'id_tagihan';
    protected $table = 'tagihan';
    protected $fillable = ['id_penggunaan','id_pelanggan','bulan','tahun','jumlah_meter','status'];

    public function pelanggan()
    {
        # satu tagihan dimiliki oleh satu pelanggan
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan','id_pelanggan')->withTrashed();
    }

    public function penggunaan()
   {
        # Tagihan berasal dari satu data penggunaan
        return $this->belongsTo(Penggunaan::class, 'id_penggunaan', 'id_penggunaan')->withDefault();
{
}
   }

   public function pembayaran()
   {
        # satu tagihan hanya memiliki satu pembayaran
        return $this->hasone(Pembayaran::class, 'id_tagihan','id_tagihan');
   }
   public function tarif()
   {
        # satu tagihan hanya memiliki satu pembayaran
        return $this->belongsTo(Pembayaran::class, 'id_tagihan','id_tagihan');
   }
   public function getTotalTagihanAttribute()
{
    $tarifperkwh = optional($this->pelanggan->tarif)->tarifperkwh ?? 0;
    $jumlah_meter = $this->jumlah_meter ?? 0;
    $biaya_admin = 1000;

    return ($jumlah_meter * $tarifperkwh) + $biaya_admin;
} 

    
    //
}
