<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaRequest;
use App\Models\Physio_areas;
use App\Models\PhysioAreas;
use Illuminate\Support\Facades\Log;


class AreaController extends Controller
{
    public function index(){
        return view('area');
    }

    public function store(AreaRequest $request)
    {
        //Log::debug($request);
        $res = PhysioAreas::updateOrCreate(
            ['id' => $request->row_id],
            ['title' => $request->add_area_name,
                'status' => $request->add_area_status]);

        //Log::debug($res);
        return response()->json(['code'=>200], 200);


    }
    public function listArea()
    {

        $areas = PhysioAreas::query();
        //Log::debug($medicines);
        return datatables()->of($areas)
            ->addIndexColumn()
            ->setRowClass(function () {
                return 'flex flex-row justify-between items-center bg-white w-full rounded-lg text-xs lg:text-xs font-extralight px-1 md:px-5 py-3 relative';
            })

            ->addColumn('title', function ($row) {
                return '<td>' . $row->title . '</td>';
            })
            ->addColumn('status', function ($row) {
                $status = '<span class="bg-lime-400 text-lime-800 py-1 px-5 rounded-full">غیرفعال</span>';
                if( $row->status ){
                    $status = '<span class="bg-lime-400 text-lime-800 py-1 px-5 rounded-full">فعال</span>';
                }
                return '<td>' . $status . '</td>';
            })
            ->addColumn('action', function ($row) {
                $btn = '<td class="oneLine w-[15%] hidden lg:flex gap-1 justify-center border-r">
                                                <a onclick="editRow('.$row->id.')" class="bg-slate-600 p-1 w-full text-white rounded-md flex max-w-fit cursor-pointer hover:scale-105 transition-transform">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                      </svg>
                                                </a>
                                                <a onclick="deleteRowModal('.$row->id.')" class="bg-rose-600 p-1 w-full text-white rounded-md flex max-w-fit cursor-pointer hover:scale-105 transition-transform">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                      </svg>
                                                </a>
                                            </td>';
                return $btn;
            })
            ->rawColumns(['action','title','status'])
            ->make(true);

    }

    public function show($id)
    {
        try {
            $areas = PhysioAreas::findOrfail($id);
            Log::debug($areas);
            return response()->json($areas);

        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                return response()->json(['code' => 406], 406);
            }
        }

    }

    public function destroy($id)
    {
        try {
            PhysioAreas::findOrfail($id)->delete();

        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                return response()->json(['code' => 406], 406);
            }
        }
    }

}
