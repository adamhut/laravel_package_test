<?php
namespace Survey\Models;

use Survey;
use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $guarded = [];

    protected $with=['survey'];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}