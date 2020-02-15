<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(
            Appointment::with(['customer', 'staffMember', 'service'])->paginate(15),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the submitted data
        $this->validate($request, [
            'staff_member_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'service_id' => 'required|integer',
            'date' => 'required',
        ]);

        // create the appointment
        $appointment = Appointment::create($request->toArray());

        // get the related customer, staff member and service data too
        $appointment = Appointment::with(['customer', 'staffMember', 'service'])
            ->findOrFail($appointment->id);

        return response($appointment, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(
            Appointment::with(['customer', 'staffMember', 'service'])->findOrFail($id),
            200
        );
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
        $appointment = Appointment::findOrFail($id);

        $this->validate($request, [
            'staff_member_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'service_id' => 'required|integer',
            'date' => 'required',
        ]);

        $appointment->update($request->toArray());

        return response($appointment, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::with(['customer', 'staffMember', 'service'])
            ->findOrFail($id);

        $appointment->delete();

        return response(null, 204);
    }
}
