<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
    protected $table = "password_resets";
    protected $primaryKey = 'email';
    public $incrementing = false;
    public $timestamps = false;
    protected $dates = ['created_at'];
}
