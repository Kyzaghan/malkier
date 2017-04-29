<?php

namespace App;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Eloquent  implements Authenticatable
{
    use AuthenticableTrait, CanResetPassword;
    use EntrustUserTrait;

    protected $fillable = ['email', 'username', 'name', 'surname'];
    /**
     * Kullanıcıya ait departmanlar için Department_User tablosuna bağlantı yapılıyor.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departments()
    {
        return $this->hasMany('App\DepartmentUser');
    }
}
