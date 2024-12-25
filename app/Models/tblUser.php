<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblUser extends Model
{
    use HasFactory;
    protected $table = 'tbl_users';
    protected $fillable = [
        'name', 'phone', 'address'
    ];
}
