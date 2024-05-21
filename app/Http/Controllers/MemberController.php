<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    function index()
    {
        $members = Member::all();

        return view('member.index')
                ->withMembers($members);
    }
    function create()
    {
        return view('member.create');
    }
    function store(Request $request)
    {
        $member = new Member;
        $member->first_name = $request->firstName;
        $member->last_name = $request->lastName;
        $member->email = $request->email;
        $member->phone_number = $request->phone;
        $member->registration_date = $request->registerDate;
        $member->save();
        
        return redirect(route('member'))
                ->with('success','You created a new Member!');
    }
    
    function edit($id)
    {
        $member = Member::find($id);

        return view('member.edit')
                ->withMember($member);
    }
    function update(Request $request, $id)
    {
        $member = Member::find($id);

        $member->first_name = $request->firstName;
        $member->last_name = $request->lastName;
        $member->email = $request->email;
        $member->phone_number = $request->phone;
        $member->registration_date = $request->registerDate;
        $member->update();
        
        return redirect(route('member'))
                ->with('success','You updated a Member!');
        

    }
    function delete($id)
    {
        $member = Member::find($id);
        $member->delete();
        
        return redirect(route('member'))
                ->with('success','You Deleted a Member!');
    }
}
