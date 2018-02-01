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
        $audits = Audit::paginate(10);
        return view('survey::index',compact('audits'));

    }

    public function store(Request $request)
    {
        $data= request()->validate([
            'name'=>'required|min:3',
        ]);

        Audit::create([
            'name'=>$request->input('name'),
            'is_published' => !!$request->input('published'),
            'is_archived' => !!$request->input('archived'),
            'user_id'   => 1,
            'checklist_id' => 1,
        ]);

        return redirect()->back();
    }

    public function  create()
    {
        return view('survey::add');
    }

    public function show(Audit $audit)
    {
        if($audit->isPublished=="0")
        {
            abort(403,'permission Denied');
        }
        return view('survey::show',compact('audit'));
    }

    public function destroy($audit)
    {
        return view('survey::add');
    }
}
