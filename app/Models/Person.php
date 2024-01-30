<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model of person
 */
class Person extends Model
{
    protected $table = 'persons';

    protected $fillable = ['other_id', 'tax_number', 'full_name', 'email', 'login_at', 'logout_at'];

    protected $dates = ['login_at', 'logout_at'];

    /**
     * Override save method
     *
     * @param array $options
     * @return bool
     */
    public function save(array $options = []): bool
    {
        $logText = 'A(z) ' . $this->tax_number . ' adóazonosítószámú személy rögzítésre került';
        (new Log())->fill(['log_text' => $logText])->save();

        return parent::save($options);
    }

    /**
     * Override delete method
     *
     * @return bool|null
     */
    public function delete(): ?bool
    {
        $logText = 'A(z) ' . $this->tax_number . ' adóazonosítószámú személy törlésre került';
        (new Log())->fill(['log_text' => $logText])->save();
        return parent::delete();
    }
}
