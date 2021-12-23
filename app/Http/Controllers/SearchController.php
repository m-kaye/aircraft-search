<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Airplane;
use App\Models\Log;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(Request $req)
    {
        $req_registrationSymbol = $req->registrationSymbol;
        $req_model = $req->model;
        $req_owner = $req->owner;
        $req_stationaryPlant = $req->stationaryPlant;
        $req_ex_registrationSymbol = $req->ex_registrationSymbol;
        $req_ex_owner = $req->ex_owner;
        $result = null;
        $result2 = null;

        if (is_null($req_registrationSymbol) && is_null($req_model) && is_null($req_owner) && is_null($req_stationaryPlant) && is_null($req_ex_registrationSymbol) && is_null($req_ex_owner)) {
            $result = null;
            $result2 = null;
        } else {
            $query = Airplane::query();
            $query2 = Log::query();

            if (!empty($req_registrationSymbol)){
                $query->where(function($query) use($req_registrationSymbol){
                    $query->where('registrationSymbol', 'LIKE', "%{$req_registrationSymbol}%");
                });
            }
            if (!empty($req_model)) {
                $query->where(function($query) use($req_model){
                    $query->where('model', 'LIKE', "%{$req_model}%");
                });
            }
            
            if (!empty($req_owner)) {
                $query2->where(function($query2) use($req_owner){
                    $query2->where('owner', 'LIKE', "%{$req_owner}%");
                });
            }
            if (!empty($req_stationaryPlant)) {
                $query2->where(function($query2) use($req_stationaryPlant){
                    $query2->where('stationaryPlant', 'LIKE', "%{$req_stationaryPlant}%");
                });
            }
            if (!empty($req_ex_registrationSymbol)) {
                $query2->where(function($query2) use($req_ex_registrationSymbol){
                    $query2->where('ex_registrationSymbol', 'LIKE', "%{$req_ex_registrationSymbol}%");
                });
            }
            if (!empty($req_ex_owner)) {
                $query2->where(function($query2) use($req_ex_owner){
                    $query2->where('ex_owner', 'LIKE', "%{$req_ex_owner}%");
                });
            }
            
            if (empty($req_owner) && empty($req_stationaryPlant) && empty($req_ex_registrationSymbol) && empty($req_ex_owner)) {
                $result = $query->paginate(10);
            }else {
                $result2 = $query2->get();
                if(isset($result2[0])){
                    $query->where(function($query) use($result2){
                        foreach($result2 as $res){
                                $query->orWhere('id',$res->airplane_id);
                        }
                    });
                    $result = $query->paginate(10);
                }else{
                    $result = null;
                }
            }
        }
        $data = [
            'result' => $result,
        ];
        return view('list', $data);
    }

    public function detail($id)
    {
        $airplane = Airplane::where('id',$id)->first();
        $log = Log::where('airplane_id',$id)->get();
        $data = ["airplane"=>$airplane, "log"=>$log];
        return view('detail', $data);
    }

    public function edit(Request $req){
        $id = $req->editid;
        $registrationSymbol = $req->editregistrationSymbol;
        $model = $req->editmodel;
        $serialNumber = $req->editserialNumber;

        $airplane = Airplane::find($id);
        $airplane->registrationSymbol = $registrationSymbol;
        $airplane->model = $model;
        $airplane->serialNumber = $serialNumber;
        $airplane->save();

        return redirect('/detail/'.$id);
    }

    public function logedit(Request $req){
        $id = $req->editid;
        $date = $req->editdate;
        $owner = $req->editowner;
        $stationaryPlant = $req->editstationaryPlant;
        $note = $req->editnote;

        $log = Log::find($id);
        $log->date = $date;
        $log->owner = $owner;
        $log->stationaryPlant = $stationaryPlant;
        $log->note = $note;
        $log->save();

        $reslog = Log::find($id);
        $air_id = $reslog->airplane_id;

        return redirect('/detail/'.$air_id);
    }

    public function exlogedit(Request $req){
        $id = $req->editid;
        $export = $req->editexport;
        $exregistrationSymbol = $req->editexregistrationSymbol;
        $exowner = $req->editexowner;

        $log = Log::find($id);
        $log->export = $export;
        $log->ex_registrationSymbol = $exregistrationSymbol;
        $log->ex_owner = $exowner;
        $log->save();


        $reslog = Log::find($id);
        $air_id = $reslog->airplane_id;

        return redirect('/detail/'.$air_id);
    }
}
