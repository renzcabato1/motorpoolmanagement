<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestData extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function class()
    {
        return $this->belongsTo(ClassEquipment::class,'class_id','id');
    }
}
