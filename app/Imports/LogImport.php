<?php

namespace App\Imports;

use App\Excels;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Log;
use App\Models\Airplane;

class LogImport implements OnEachRow,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function OnRow(Row $row)
    {  
        $airplane = Airplane::where('registrationSymbol', $row['登録記号'])->first();

        $airplane=Log::firstOrCreate(
            // データベースのカラムとエクセルのカラムを紐づけ
            [
                'airplane_id'           => $airplane->id,
                'date'                  => $row['登録日'],
                'owner'                 => $row['所有者(使用者)'],
                'stationaryPlant'       => $row['定置場'],
                'note'                  => $row['備考'],
                'export'                => $row['輸出国'],
                'ex_registrationSymbol' => $row['海外登録記号'],
                'ex_owner'              => $row['海外所有者'],
            ]
        );
        $airplane->save();
    }
}
