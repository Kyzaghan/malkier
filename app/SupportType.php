<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Destek türü tablosu, e-posta, telefon, yerinde destek vb. türleri tutar.
 * @package App
 */
class SupportType extends Model
{
    /**
     * Department tablosuna bire çok bağlantı yapılıyor.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('Department');
    }

    /**
     * Work tablosuna çoka bir bağlantı yapılıyor.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function works()
    {
        return $this->hasMany('Work');
    }
}
