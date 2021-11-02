<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todolist extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;


    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',
        'reminder',
    ];
}
