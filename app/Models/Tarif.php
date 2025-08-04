<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id_tarif
 * @property int $daya
 * @property int $tarifperkwh
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pelanggan> $pelanggan
 * @property-read int|null $pelanggan_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarif newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarif newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarif query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarif whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarif whereDaya($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarif whereIdTarif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarif whereTarifperkwh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarif whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tarif extends Model
{
    protected $primaryKey = 'id_tarif';
    protected $table = 'tarif';
    protected $fillable = ['daya','tarifperkwh'];

    public function pelanggan()
    {
        # satu tarif bisa digunakan oleh banyak pelanggan
        return $this->hasMany(Pelanggan::class, 'id_tarif', 'id_tarif');
    }
    //
}
