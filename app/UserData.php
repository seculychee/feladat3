<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = "user_datas";

    protected $fillable = ["firstname", "lastname", "phone", "city", "street", "h_number"];

}
