<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Departman sınıfı, veritabanı tabloları için bağlantılar burada ayarlanır.
 * @package App
 */
class Department extends Model
{
    /**
     * Departmanda yer alan kullanıcılar için DepartmentUser tablosuna bağlantı yapılıyor.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function department_users()
    {
        return $this->hasMany('DepartmentUser');
    }

    /**
     * Departmana ait destek türleri için SupportType tablosuna bağlantı yapılıyor.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function support_types()
    {
        return $this->hasMany('SupportType');
    }

    /**
     * Departmana ait iş durumları için WorkType tablosuna bağlantı yapılıyor.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function work_types()
    {
        return $this->hasMany('WorkType');
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
