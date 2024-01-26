<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentModalRequest;
use App\Http\Requests\PhysioModalRequest;
use App\Http\Requests\PrescriptionModalRequest;
use App\Http\Requests\SickModalRequest;
use App\Models\Medicines;
use App\Models\Payments;
use App\Models\PhysioAreas;
use App\Models\PhysioCertificate;
use App\Models\PhysioCertificateAreas;
use App\Models\PhysioCertificateTypes;
use App\Models\PhysioTypes;
use App\Models\PrescriptionMedicines;
use App\Models\Prescriptions;
use App\Models\SickCertificate;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class FormsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $areas = PhysioAreas::all();
        $types = PhysioTypes::all();
        $medicines = Medicines::all();
        return view('forms',compact('areas','types','medicines'));
    }

    public function showPatient($nCode)
    {
        $user = User::where('national_code',$nCode)->first();
        //Log::debug($user);
        return response()->json($user);

    }

    public function storeSickCertificate(SickModalRequest $request)
    {
        Log::debug($request);

        if($request->modal_sick_patient_id == null)
        {
            Log::debug('here');

//            $user = User::create([
//                'national_code' => $request->modal_sick_nationalCode,
//                'username' => $request->modal_sick_nationalCode,
//                'name' => $request->modal_sick_name,
//                'phone' => $request->modal_sick_phone,
//                'email' => null,
//                'password' => 1,
//                'status' => 1,
//
//            ]);
            $user = $this->createUser($request->modal_sick_nationalCode,
                $request->modal_sick_nationalCode,
                $request->modal_sick_name,
                $request->modal_sick_phone,
                null,1,1);
            $patient_id = $user->id;

        }else $patient_id = $request->modal_sick_patient_id;
        $res = SickCertificate::create(
            ['user_id' => $patient_id,
                'start_date' => SickCertificate::dateToMiladi($request->modal_sick_sdate),
                'end_date' => SickCertificate::dateToMiladi($request->modal_sick_edate),
                'date' => SickCertificate::dateToMiladi($request->modal_sick_date),
                'phone' => $request->modal_sick_phone,
                'description' => $request->modal_sick_description]);

        return response()->json(['code'=>200 ,'id'=>$res->id], 200);
    }

    public function storePayment(PaymentModalRequest $request)
    {
        //Log::debug($request);
        if($request->modal_payment_patient_id == null)
        {
            Log::debug('here');


//            $user = User::create([
//                'national_code' => $request->modal_payment_nationalCode,
//                'username' => $request->modal_payment_nationalCode,
//                'name' => $request->modal_payment_name,
//                'phone' => $request->modal_payment_phone,
//                'email' => null,
//                'password' => 1,
//                'status' => 1,
//
//            ]);
            $user = $this->createUser($request->modal_payment_nationalCode,
                $request->modal_payment_nationalCode,
                $request->modal_payment_name,
                $request->modal_payment_phone,
                null,1,1);
            $patient_id = $user->id;

        }else $patient_id = $request->modal_payment_patient_id;

        $res = Payments::create(
            ['user_id' => $patient_id,
                'number' => $request->modal_payment_number,
                'amount' => $request->modal_payment_amount,
                'date' => SickCertificate::dateToMiladi($request->modal_payment_date),
                'description' => $request->modal_payment_description]);
        $id = $res->id;
        return response()->json(['code'=>200,'id'=>$id],200);
    }

    public function storePhysioCertificate(PhysioModalRequest $request)
    {
        Log::debug($request);
        if($request->modal_physio_patient_id == null)
        {
            Log::debug('here');

//            $user = User::create([
//                'national_code' => $request->modal_physio_nationalCode,
//                'username' => $request->modal_physio_nationalCode,
//                'name' => $request->modal_physio_name,
//                'phone' => $request->modal_physio_phone,
//                'email' => null,
//                'password' => 1,
//                'status' => 1,
//
//            ]);
            $user = $this->createUser($request->modal_physio_nationalCode,
                $request->$request->modal_physio_nationalCode,
                $request->$request->modal_physio_name,
                $request->$request->modal_physio_phone,
                null,1,1);
            $patient_id = $user->id;

        }else $patient_id = $request->modal_physio_patient_id;


        $physio_certificate_id = "";
        $certificate = PhysioCertificate::create([
            'user_id' => $patient_id,
            'num_of_sessions' => $request->modal_physio_num_sessions,
            'date' => SickCertificate::dateToMiladi($request->modal_physio_date),
            'description' => $request->modal_physio_description]);
        $physio_certificate_id  = $certificate->id;

        $checked_types = $request->input('modal_physio_types');
        foreach ($checked_types as $checked_type) {
            $types = PhysioCertificateTypes::create(
                ['physio_certificate_id' => $physio_certificate_id,
                    'physio_type_id' => $checked_type]);
//            Log::debug($types);
        }


        $checked_areas = $request->input('modal_physio_areas');
        foreach ($checked_areas as $checked_area) {
            $areas = PhysioCertificateAreas::create(
                ['physio_certificate_id' => $physio_certificate_id,
                    'physio_area_id' => $checked_area]);
            Log::debug($areas);
        }

        return response()->json(['code'=>200 , 'id'=>$physio_certificate_id],200);
    }

    public function storePrescriptionCertificate(PrescriptionModalRequest $request){
        Log::debug($request);
        if($request->modal_prescription_patient_id == null)
        {
            //Log::debug('here');

//            $user = User::create([
//                'national_code' => $request->modal_prescription_nationalCode,
//                'username' => $request->modal_prescription_nationalCode,
//                'name' => $request->modal_prescription_name,
//                'phone' => $request->modal_prescription_phone,
//                'email' => null,
//                'password' => 1,
//                'status' => 1,
//            ]);
            $user = $this->createUser($request->modal_prescription_nationalCode,
                $request->modal_prescription_nationalCode,
                $request->modal_prescription_name,
                $request->modal_prescription_phone,
                null,1,1);
            $patient_id = $user->id;

        }else $patient_id = $request->modal_prescription_patient_id;


        $prescription_id = "";
        $certificate = Prescriptions::create([
            'user_id' => $patient_id,
            'date' => SickCertificate::dateToMiladi($request->modal_prescription_date),
            'description' => $request->modal_prescription_description]);
        $prescription_id  = $certificate->id;



        $checked_meds = $request->input('modal_prescription_medicines');
        foreach ($checked_meds as $checked_med) {
            $meds = PrescriptionMedicines::create(
                ['prescription_id' => $prescription_id,
                    'medicine_id' => $checked_med]);
//            Log::debug($types);
        }

        return response()->json(['code'=>200 , 'id'=>$prescription_id],200);
    }

    public function printPaymentA5($id){
        $payment = Payments::find($id);
        $patient = User::find($payment->user_id);
        $name = $patient->name;
        $date = SickCertificate::dateToJalali($payment->date);
        return view('print_payment_a5',compact('payment','name','date'));
    }

    public function printPrescriptionA5($id){
        $prescription = Prescriptions::find($id);
        $patient = User::find($prescription->user_id);
        $name = $patient->name;
        $medicines = $prescription->prescription_medicines;
        $date = SickCertificate::dateToJalali($prescription->date);
        $nCode = $patient->national_code;
        return view('print_prescription_a5',compact('name','medicines','date','nCode'));
    }

    public function printSickA5($id){
        $sick_certificate = SickCertificate::find($id);
        $patient = User::find($sick_certificate->user_id);
        $name = $patient->name;
        $date = SickCertificate::dateToJalali($sick_certificate->date);
        $start_date = SickCertificate::dateToJalali($sick_certificate->date);
        $end_date = SickCertificate::dateToJalali($sick_certificate->date);
        $description = $sick_certificate->description;
        $national_code = $patient->national_code;
        return view('print_sick_certificate_a5',compact('name','date','national_code','start_date','end_date','description'));
    }

    public function printPhysioA5($id){
        $physio = PhysioCertificate::find($id);
        $patient = User::find($physio->user_id);
        $name = $patient->name;
        $description = $physio->description;
        $num_sessions = $physio->num_of_sessions;
        $national_code = $patient->national_code;
        $areas = $physio->physio_areas;
        $physio_types = $physio->physio_types->pluck('physio_type_id');

//        if(Str::contains($physio_types, '4')){
//            Log::debug('true');
//        }

//        Log::debug($areas);
        $physio_types = "";
        $date = SickCertificate::dateToJalali($physio->date);
        return view('print_physio_a5',compact('name','national_code','description','date','num_sessions','areas','physio_types'));
    }

    public function createUser($nationalCode,$username,$name,$phone,$email,$status,$password){
        $user = User::create([
            'national_code' => $nationalCode,
            'username' => $nationalCode,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => $password,
            'status' => $status,

        ]);
        return $user;
    }

}
