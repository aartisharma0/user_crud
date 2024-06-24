<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leavenature extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="leave_natures";
    protected $primaryKey="id";

}
