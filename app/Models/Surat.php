<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nomor_surat
 * @property string $jenis_surat
 * @property string $pengirim_penerima
 * @property string $perihal
 * @property string $tanggal_surat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereJenisSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereNomorSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat wherePengirimPenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat wherePerihal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereTanggalSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Surat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Surat extends Model
{
    use HasFactory;

    protected $table = 'surats';

    protected $fillable = [
        'nomor_surat',
        'jenis_surat',
        'pengirim_penerima',
        'perihal',
        'tanggal_surat',
    ];
}