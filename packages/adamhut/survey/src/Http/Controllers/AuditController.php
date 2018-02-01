<?php
namespace Survey\Http\Controllers;

use Survey\Models\Audit;
use Illuminate\Http\Request;
use Survey\Models\ChecklistItem;
use App\Http\Controllers\Controller;

class AuditController extends Controller
{

    public function store(Request $request)
    {
        $data = request()->validate([
            'description' => 'required|min:3',
            'audit_id'    => 'exists:audits,id'
        ]);

        ChecklistItem::create([
            'description' => $data['description'],
            'is_archived'   => false,
            'correct_answer'=> $request->has('correct_answer') ? $request->has('correct_answer') :false,
            'audit_id' => $data['audit_id'],
        ]);

        return redirect()->back();
    }
}