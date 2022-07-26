<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $primaryKey = 'groupid';
    protected $guarded = ['groupid'];

    public function members() : HasMany
    {
        return $this->hasMany(Member::class, 'groupid');
    }
}
