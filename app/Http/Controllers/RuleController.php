<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = 'index';
        $rules = Rule::with('category')->orderBy('name')->get();
        return view('rules.index', ['rules' => $rules, 'status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = 'create';
        $rules = Rule::all();
        // $categories voor de dropdown
        $categories = Category::orderBy('name')->get();
        return view('rules.index', ['rules' => $rules, 'categories' => $categories, 'status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rule = new Rule();
        $rule->name = $request->input('rule-name');
        $rule->description = $request->input('rule-description');
        $rule->category_id = $request->input('category_id');
        $rule->save();
        return redirect(route('rules.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show(Rule $rule)
    {
        $status = 'show';
        // $categories voor de dropdown
        $categories = Category::orderBy('name')->get();
        $rules = Rule::with('category')->get();
        return view('rules.index', ['rule' => $rule, 'rules' => $rules, 'categories' => $categories, 'status' => $status]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function edit(Rule $rule)
    {
        $status = 'edit';
        $rules = Rule::with('category')->get();
        // $categories voor de dropdown
        $categories = Category::orderBy('name')->get();
        return view('rules.index', ['rule' => $rule, 'rules' => $rules, 'categories' =>$categories, 'status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rule $rule)
    {
        $rule->name = $request->input('rule-name');
        $rule->description = $request->input('rule-description');
        $rule->update();
        return redirect()->route('rules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rule $rule)
    {
        //
    }
}
