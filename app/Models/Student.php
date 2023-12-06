<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class Student extends Model
{
    use HasFactory;

    //Casts
    protected $casts =
    ['created_at' => 'datetime:Y-m-d'];
    // Hidden
    protected $hidden = ['name'];
    // Appends
    protected $appends = ['full_name', 'age'];
    public function getFullNameAttribute()
    {
        return $this->name . " abcd";
    }
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['date_of_birth'])->age;
    }
    //Local Scope
    public function scopeGreaterId($query)
    {
        return $query->where('id', '>', 10);
    }
    public function scopeAddress($query)
    {
        return $query->whereNotNull('address');
    }
    //Global Scope
    protected static function booted()
    {
        static::addGlobalScope('greater', function (Builder $builder) {
            $builder->where('id', '>', 10);
        });
        static::addGlobalScope('address', function (Builder $builder) {
            $builder->whereNotNull('address');
        });
        //Eloquent Events
        static::creating(function ($model) {
            // $model->added_by = auth()->user()->id;
            $model->added_by ='3';
        });
        static::updating(function ($model) {
            $model->upadted_by = auth()->user()->id;
        });
    }
    // Accessor & Mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = 'Student' . $value;
    }
    public function getNameAttribute($value)
    {
        return str_replace('Student', '', $value);
    }
}
