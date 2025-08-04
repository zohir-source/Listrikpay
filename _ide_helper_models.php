<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
	class Level extends \Eloquent {}
}

namespace App\Models{
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
	class Pelanggan extends \Eloquent {}
}

namespace App\Models{
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
	class Pembayaran extends \Eloquent {}
}

namespace App\Models{
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
	class Penggunaan extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \App\Models\Pelanggan $pelanggan
 */
	class Tagihan extends \Eloquent {}
}

namespace App\Models{
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
	class Tarif extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property string $nama_admin
 * @property int $id_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Level $level
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNamaAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

