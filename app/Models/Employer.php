<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employer extends Model
{
    use HasFactory;

    protected $fillable
    = [
        'name',
        'surname',
        'permission_id',
        'position_id',
        'content_row',
      ];

    public function position(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        //the employee belongs to the specialization
        return $this->belongsTo(EmployersPosition::class);
    }

    public function permission(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        //the employee belongs to the permission
        return $this->belongsTo(EmployersPermission::class);
    }
}
