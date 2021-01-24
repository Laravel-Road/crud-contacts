<?php

namespace App\Models;

use App\Models\Traits\TeamTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    use TeamTenant;

    protected $guarded = ['id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
