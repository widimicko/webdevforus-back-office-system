<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    protected $primaryKey = 'memberid';
    protected $guarded = ['memberid'];

    public function group() : BelongsTo
    {
        return $this->belongsTo(Group::class, 'groupid');
    }
}
