<?php

namespace App\Imports;

use App\Excels;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Airplane;


class AirplaneImport implements OnEachRow,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function OnRow(Row $row)
    {  
        $airplane=Airplane::firstOrCreate(
            // 重複除外カラムを指定
            [   'registrationSymbol'=>$row['登録記号']],
            // データベースのカラムとエクセルのカラムを紐づけ
            [
                'registrationSymbol' => $row['登録記号'],
                'model'              => $row['型式'],
                'serialNumber'       => $row['製造番号'],
            ]
        );
        $airplane->save();
    }
}
