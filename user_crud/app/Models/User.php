<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $table="users";
    protected $primaryKey="id";
    protected $guarded=['id'];

    public function setFirstNameAttribute($value){
        $this->attributes['first_name'] = ucwords($value);
    }

    public function setLastNameAttribute($value){
        $this->attributes['last_name'] = ucwords($value);
    }


    public function getFormattedDobAttribute(){
        return date("d-M-Y",strtotime($this->dob));
    }
}
