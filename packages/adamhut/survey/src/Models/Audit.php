<?php
namespace Survey\Models;

use Survey\Models\ChecklistItem;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model{

    protected $guarded=[];

    protected $with=[
        'checklist'
    ];

    public function checklist()
    {
        return $this->hasMany(ChecklistItem::class)->orderBy('id','desc');
    }
}