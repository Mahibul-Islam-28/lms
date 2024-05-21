<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Operator;

class OperatorController extends Controller
{
    function index()
    {
        $session = Session('operator');
        $type = $session->type;
        if($type == 'admin'){
            $operators = Operator::all();

            return view('operator.index')
                    ->withOperators($operators);
        }
        else{
            return redirect(route('404'));
        }
    }
    function create()
    {
        $session = Session('operator');
        $type = $session->type;
        if($type == 'admin'){
            return view('operator.create');
        }
        else{
            return redirect(route('404'));
        }
    }
    function store(Request $request)
    {
        $session = Session('operator');
        $type = $session->type;
        if($type == 'admin'){
            $operator = new Operator;
            $operator->user_name = $request->userName;
            $operator->password = $request->password;
            $operator->type = $request->type;
            $operator->save();
            
            return redirect(route('operator'))
                    ->with('success','You created a new Operator!');
        }
        else{
            return redirect(route('404'));
        }
    }
    
    function edit($id)
    {
        $session = Session('operator');
        $type = $session->type;
        if($type == 'admin'){
            $operator = Operator::find($id);

            return view('operator.edit')
                    ->withOperator($operator);
        }
        else{
            return redirect(route('404'));
        }
    }
    function update(Request $request, $id)
    {
        $session = Session('operator');
        $type = $session->type;
        if($type == 'admin'){
            $operator = Operator::find($id);

            $operator->user_name = $request->userName;
            $operator->password = $request->password;
            $operator->type = $request->type;
            $operator->update();
            
            return redirect(route('operator'))
                    ->with('success','You updated a Operator!');
        }
        else{
            return redirect(route('404'));
        }
        

    }
    function delete($id)
    {
        $session = Session('operator');
        $type = $session->type;
        if($type == 'admin'){
            $operator = Operator::find($id);
            $operator->delete();
            
            return redirect(route('operator'))
                    ->with('success','You Deleted a Operator!');
        }
        else{
            return redirect(route('404'));
        }
    }
}
