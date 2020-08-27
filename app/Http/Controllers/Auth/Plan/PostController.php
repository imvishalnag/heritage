<?php

namespace App\Http\Controllers\Auth\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Plan;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function index()
    {
        return view('admin.auth.plan.index');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'rule' => 'required',
            'price' => 'required',
            'invoice_period' => 'required',
            'invoice_interval'  => 'required'
        ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $rule = $request->input('rule');
        $price = $request->input('price');
        $currency = $request->input('currency');
        $invoice_period = $request->input('invoice_period');
        $invoice_interval = $request->input('invoice_interval');

        $plan = new Plan;
        $plan->slug = Str::slug($title, '-');
        $plan->name = $title;
        $plan->description = $description;
        $plan->rule = $rule;
        $plan->price = $price;
        $plan->currency = $currency;
        $plan->invoice_period = $invoice_period;
        $plan->invoice_interval = $invoice_interval;

        if($plan->save()){
            return redirect()->back()->with('msg', '<p class="text-success">Data inserted successfully</p>');
        }
    }

    public function show()
    {
        return view('admin.auth.plan.show');
    }

    public function get()
    {
        $query = Plan::orderBy('created_at', 'DESC');
        return datatables()->of($query->get())
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $btn = '<div class = "btn-group"><a href="'.route('plan.update_view', ['id' => encrypt($row->id)]).'" class="btn btn-info btn-sm"><i class="fa fa-pen"></i></a>
                    <a href="'.route('plan.delete', ['id' => encrypt($row->id)]).'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>
                    ';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function updateShow($id)
    {
        try{
            $id = decrypt($id);
        }catch(DecryptException $e) {
            abort(404);
        }
        $plan = Plan::find($id);
        return view('admin.auth.plan.update', compact('plan'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'rule' => 'required',
            'price' => 'required',
            'invoice_period' => 'required',
            'invoice_interval'  => 'required'
        ]);
        $id = $request->input('plan_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $rule = $request->input('rule');
        $price = $request->input('price');
        $currency = $request->input('currency');
        $invoice_period = $request->input('invoice_period');
        $invoice_interval = $request->input('invoice_interval');

        $plan = Plan::find($id);
        $plan->slug = Str::slug($title, '-');
        $plan->name = $title;
        $plan->description = $description;
        $plan->rule = $rule;
        $plan->price = $price;
        $plan->currency = $currency;
        $plan->invoice_period = $invoice_period;
        $plan->invoice_interval = $invoice_interval;

        if($plan->save()){
            return redirect()->back()->with('msg', '<p class="text-success">Data updated successfully</p>');
        }
    }
    public function delete($id)
    {
        try{
            $id = decrypt($id);
        }catch(DecryptException $e) {
            abort(404);
        }
        $plan = Plan::find($id);
        if($plan->delete()){
            return redirect()->back()->with('msg', '<p class="text-success">Data Deleted successfully</p>');
        }
    }
}
