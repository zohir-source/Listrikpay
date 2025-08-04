<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id_level
 * @property string $nama_level
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereIdLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereNamaLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Level extends Model
{
    protected $table = 'level'; # mengatakan kepada laravel bahawa tabel kita bernama level
    protected $primaryKey = 'id_level'; # mengatakan kepada laravel kalau id di tabel level bernama id_level
    public $timestamps = false; 
    protected $fillable = ['nama_level'];
    //
    public function users()
    {
        return $this->hasMany(User::class,'id_level');
    }
        
}

