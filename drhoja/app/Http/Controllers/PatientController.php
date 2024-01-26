<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Log;

class PatientController
{
    public function index()
    {
        return view('patient');
    }
    public function listForms(){
        $users = User::all();
        $output = [];
        foreach ($users as $user ){
            $out = $user->user_output2();
            if (sizeof($out)){
//                $out["name"]= $user->name;
                Log::debug($out);
                foreach ($out as $o)
                {
                    $output[] = $o;
                }
            }
        }
        Log::debug('------------------------------------------');
        $users = collect($output);
        Log::debug($users);

        return datatables()->of($users)
            ->addIndexColumn()
            ->setRowClass(function () {
                return 'flex flex-row justify-between items-center bg-white w-full rounded-lg text-xs lg:text-xs font-extralight px-1 md:px-5 py-3 relative';
            })

            ->addColumn('title', function ($row) {
//                Log::debug($row);
                return '<td>' . $row->table_name . '</td>';
            })
            ->addColumn('name', function ($row) {
                $name = User::where("id",$row->user_id)->value("name");

                return '<td>' . $name . '</td>';
            })
            ->addColumn('nationalCode', function ($row) {
                $nCode = User::where("id",$row->user_id)->value("national_code");

                return '<td>' . $nCode . '</td>';
            })
            ->addColumn('date', function ($row) {

                return '<td>' . $row->date . '</td>';
            })
            ->addColumn('action', function ($row) {
                $button_href = "-";
                switch ($row->table_name)
                {
                    case ('physio_certificate'):
                        $button_href = '/printPhysioA5/'.$row->id;
                        break;
                    case ('sick_certificate'):
                        $button_href = "/printSickA5/".$row->id;
                        break;
                    case ('payment'):
                        $button_href = "/printPaymentA5/".$row->id;
                        break;
                    case ('prescriptions'):
                        $button_href = "/printPrescriptionA5/".$row->id;
                        break;
                }

                $btn = '<td class="oneLine w-[15%] hidden lg:flex gap-1 justify-center border-r">
                                                <a target="_blank" href="'.url($button_href).'" class="bg-slate-600 p-1 w-full text-white rounded-md flex max-w-fit cursor-pointer hover:scale-105 transition-transform">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                      </svg>
                                                </a>
                                            </td>
                                            <td class="w-[20%] flex lg:hidden justify-center items-center gap-2 border-r pr-1">
                                                <a @click="detailrow= !detailrow" :class="detailrow ? \'bg-gray-600\' : \'\' " class="bg-green-500 p-1 w-full text-white rounded-md flex lg:hidden max-w-fit cursor-pointer hover:scale-105 transition-transform">
                                                    <svg :class="detailrow ? \'rotate-45\' : \'\' " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 rotate-0">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                                      </svg>
                                                </a>
                                            </td>';
                return $btn;
            })
            ->rawColumns(['action','date','title','name','nationalCode'])
            ->make(true);
    }
}
