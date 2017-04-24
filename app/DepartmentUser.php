<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Departman içerisinde yer alan kullanıcılar bu tabloda tutulur.
 * @package App
 */
class DepartmentUser extends Model
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
     * User tablosuna bire çok bağlantı yapılıyor.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User');
    }
}
