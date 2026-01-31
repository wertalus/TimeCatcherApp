<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_id',
        'subtitle',
        'position',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
