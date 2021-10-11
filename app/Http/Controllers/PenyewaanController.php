<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Penyewaan;
use App\Models\PenyewaanAttachment;
use App\Models\ExportPenyewaan;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class PenyewaanController extends Controller
{
    public function index()
    {
        if(session('user'))
        {
            $current = 'request';
            $data_req = Penyewaan::all();
            $data = Menu::where('status',1)->get();
            
            return view('request.request',
                [
                'data_req' => $data_req,
                'current' => $current,   
                'data' => $data,   
                ]);
        }
        else {
            return redirect('/');
        }
        
    }

    public function show($id)
    {
        if(session('user')){
            $current = 'request';
            $data = Menu::where('status',1)->get();
            $data_request = Penyewaan::where('id_penyewaan',$id)->first();
            $img_data = PenyewaanAttachment::where('id_penyewaan',$id)->get();
            if($data_request->status == 1)
            {
                $status="Submitted";
                $button = "Approve"; 
                $button_reject = "Reject"; 
                $button_cancel = "Cancel";
            } 
            if($data_request->status == 2)
            {
                $status="Approved"; 
                $button = "Used";  
                $button_cancel = "Cancel";
            } 
            if($data_request->status == 3)
            {
                $status="Used"; 
                $button = "Finished";
            } 
            if($data_request->status == 4) $status="Finished";
            if($data_request->status == 5) $status="Rejected";
            if($data_request->status == 6) $status="Canceled";
            return view('request.request_detail',
                [
                    'data_request' => $data_request,
                    'img_data' => $img_data,
                    'data' => $data,
                    'current' => $current,
                    'status' => $status,
                    'button' => isset($button) ? $button : '',
                    'button_reject' => isset($button_reject) ? $button_reject : '',
                    'button_cancel' => isset($button_cancel) ? $button_cancel : '',
                ]);

        }else {
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        if(session('user')){
            if($request->but == "Approve") $status = 2;
            if($request->but == "Reject") $status = 5;
            if($request->but == "Cancel") $status = 6;
            if($request->but == "Used") $status = 3;
            if($request->but == "Finished") $status = 4;
            try{
                DB::beginTransaction();
                $upstts = Penyewaan::where('id_penyewaan',$request->id_sewa)->first();
                $sttsbefore = $upstts->status;
                $upstts->status = $status;
                $upstts->rec_editor = session('user')['userName'];
                $upstts->save();
                if($status == 2)
                {
                    $stok = Mobil::where('id_mobil',$upstts->id_mobil)->first();
                    $stok->stok = intval($stok->stok)-1;
                    $stok->rec_editor = session('user')['userName'];
                    $stok->save();
                }
                elseif($status == 4)
                {
                    $stok = Mobil::where('id_mobil',$upstts->id_mobil)->first();
                    $stok->stok = intval($stok->stok)+1;
                    $stok->rec_editor = session('user')['userName'];
                    $stok->save();
                }
                elseif($status == 6 && $sttsbefore == 2)
                {
                    $stok = Mobil::where('id_mobil',$upstts->id_mobil)->first();
                    $stok->stok = intval($stok->stok)+1;
                    $stok->rec_editor = session('user')['userName'];
                    $stok->save(); 
                }
                DB::commit();
                return redirect('/request');
            }catch(Exception $e)
            {
                DB::rollback();
                return redirect('/request/'.$request->id_sewa);
            }
            
        }else {
            return redirect('/');
        }
    }

    public function export()
    {
        if (session('user')) {
            $string =  'report-penyewaan'.'_oleh_'. session('user')['userName'];
            return FacadesExcel::download(new ExportPenyewaan(), $string.'.xlsx');
        } else {
            session(['url_redirect'=>$_SERVER['REQUEST_URI']]);
            return redirect('/');
        }
    }
}
