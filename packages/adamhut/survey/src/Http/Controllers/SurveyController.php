<?php
namespace Survey\Http\Controllers;

use Survey\Models\Audit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
        return view('survey::index');
        
    }

    public function store(Request $request)
    {
        $data= request()->validate([
            'name'=>'required|min:3',
        ]);
        
        Audit::create([
            'name'=>$request->input('name'),
            'is_published' => !!$request->input('published'),
            'user_id'   => 1,
            'checklist_id' => 1,
        ]);

        return redirect()->back();
    }

    public function  create()
    {
        return view('survey::add');
    }
}
