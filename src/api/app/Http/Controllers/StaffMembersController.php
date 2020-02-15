<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffMember;

class StaffMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StaffMember::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:staff_members',
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
        ]);

        $staffMember = StaffMember::create($request->toArray());

        return response($staffMember, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(StaffMember::findOrFail($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staffMember = StaffMember::findOrFail($id);

        $this->validate($request, [
            'email' => 'required|email|unique:staff_members,email,'.$staffMember->id,
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
        ]);

        $staffMember->update($request->toArray());

        return response($staffMember, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StaffMember::findOrFail($id)
            ->delete();

        return response(null, 204);
    }
}
