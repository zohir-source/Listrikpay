<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * 
 *
 * @property int $id_pelanggan
 * @property string $username
 * @property string $password
 * @property string $nomor_kwh
 * @property string $nama_pelanggan
 * @property string $alamat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $id_tarif
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pembayaran> $pembayaran
 * @property-read int|null $pembayaran_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Penggunaan> $penggunaan
 * @property-read int|null $penggunaan_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tagihan> $tagihan
 * @property-read int|null $tagihan_count
 * @property-read \App\Models\Tarif $tarif
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereIdPelanggan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereIdTarif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereNamaPelanggan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereNomorKwh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereUsername($value)
 * @mixin \Eloquent
 */
class Pelanggan extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_pelanggan';
    protected $table = 'pelanggan';

    public $timestamps = false;
    protected $fillable = ['username','password','nomor_kwh','nama_pelanggan','alamat','id_tarif'];

    public function tarif()
    {
        # satu pelanggan hanya memiliki satu tarif listrik
        return $this->belongsTo(Tarif::class,'id_tarif','id_tarif');
    }
    public function penggunaan()
    {
        # satu pelanggan bisa memiliki banyak data penggunaan listrik
        return $this->hasMany(Penggunaan::class,'id_pelanggan','id_pelanggan');
    }
    public function tagihan()
    {
        # satu pelanggan bisa memiliki banyak tagihan
        return $this->hasMany(Tagihan::class, 'id_pelanggan', 'id_pelanggan');
    }
    public function pembayaran()
    {
        # setiap pelanggan bisa melakukan banyak pembayaran
        return $this->hasMany(Pembayaran::class, 'id_pelanggan','id_pelanggan');
    }
    //
}
