<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrescriptionModalRequest;
use App\Models\Prescriptions;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function store(PrescriptionModalRequest $request)
    {

        $prescription = new Prescriptions;

        $name = $request->input('modal-prescription-name');
        $phone = $request->input('modal-prescription-phone');
        $national_code = $request->input('modal-prescription-national-code');
        $prescription_date = $request->input('modal-prescription-prescription-date');
        $description = $request->input('modal-prescription-description');

        $prescription_date = $prescription->dateToMiladi($prescription_date);
        //$prescription->
        return view('patient');
    }
}
