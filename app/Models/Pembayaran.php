<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id_pembayaran
 * @property int $id_pelanggan
 * @property int $id_tagihan
 * @property string $tanggal_pembayaran
 * @property string $bulan_bayar
 * @property int $biaya_admin
 * @property int $total_bayar
 * @property int $id_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pelanggan $pelanggan
 * @property-read \App\Models\Tagihan $tagihan
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereBiayaAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereBulanBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereIdPelanggan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereIdPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereIdTagihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereTanggalPembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereTotalBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pembayaran extends Model
{
    protected $primaryKey = 'id_pembayaran';
    protected $table = 'pembayaran';
    public $timestamps = false;
    protected $fillable = ['id_tagihan','id_pelanggan','tanggal_pembayaran','bulan_bayar','biaya_admin','total_bayar','id_user'];
    
    public function tagihan()
    {
        # setiap pembayaran terkait dengan satu tagihan
        return $this->belongsTo(Tagihan::class, 'id_tagihan', 'id_tagihan');
    }
    
    public function pelanggan()
    {
        # pembayaran dilakukan oleh satu pelanggan
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
    
    public function user()
    {
        # pembayaran dilakukan oleh satu pelanggan
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    //
}
