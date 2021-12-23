<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SplFileObject;
use App\Models\Log;
use App\Models\Airplane;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AirplaneImport;
use App\Imports\LogImport;

class RegistrationController extends Controller
{
    public function input()
    {
        return view('airframeRegister');
    }

    //Excel登録
    public function import(Request $req)
    {
        Excel::import(new AirplaneImport,$req->file('excel_file'));
        Excel::import(new LogImport,$req->file('excel_file'));

        return redirect('/');
    }

    //手動登録
    public function create(Request $req)
    {
        $req_registrationSymbol = $req->registrationSymbol;
        $req_model = $req->model;
        $req_serialNumber = $req->serialNumber;
        $req_date = $req->date;
        $req_owner = $req->owner;
        $req_stationaryPlant = $req->stationaryPlant;
        $req_note = $req->note;
        $req_export = $req->export;
        $req_exregistrationSymbol = $req->exregistrationSymbol;
        $req_exowner = $req->exowner;


        $airplane = Airplane::where('registrationSymbol', $req_registrationSymbol)->first();
        if($airplane == null){
            Airplane::insert(array(
                'registrationSymbol' => $req_registrationSymbol,
                'model' => $req_model,
                'serialNumber' => $req_serialNumber,
            ));
            $airplane = Airplane::where('registrationSymbol', $req_registrationSymbol)->first();

        }
        Log::insert(array(
            'airplane_id' => $airplane->id,
            'date' => $req_date,
            'owner' => $req_owner,
            'stationaryPlant' => $req_stationaryPlant,
            'note' => $req_note,
            'export' => $req_export,
            'ex_registrationSymbol' => $req_exregistrationSymbol,
            'ex_owner' => $req_exowner,

        ));
        return redirect('/');
    }

    //履歴登録
    public function createlog(Request $req)
    {
        $airplane_id = $req->airplaneid;
        $date = $req->createdate;
        $owner = $req->createowner;
        $stationaryPlant = $req->createstationaryPlant;
        $note = $req->createnote;
        $export = $req->createexport;
        $exregistrationSymbol = $req->createexregistrationSymbol;
        $exowner = $req->createexowner;

        Log::insert(array(
            'airplane_id' => $airplane_id,
            'date' => $date,
            'owner' => $owner,
            'stationaryPlant' => $stationaryPlant,
            'note' => $note,
            'export' => $export,
            'ex_registrationSymbol' => $exregistrationSymbol,
            'ex_owner' => $exowner,
        ));

        return redirect('/detail/' . $airplane_id);
    }
}
