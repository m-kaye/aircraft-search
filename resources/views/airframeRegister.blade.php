@extends('layouts.component')
@section('block')
<div class="row">
    <div class="col-xs-12 col-lg-6 p-5">
        <h1>機体登録</h1>
        <form action="{{ url('/create') }}" method="post">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td>登録記号</td>
                    <td><input type="text" name="registrationSymbol" class="input"></td>
                </tr>
                <tr>
                    <td>型式</td>
                    <td><input type="text" name="model" class="input"></td>
                </tr>
                <tr>
                    <td>製造番号</td>
                    <td><input type="text" name="serialNumber" class="input"></td>
                </tr>
                <tr>
                    <td>登録日</td>
                    <td><input type="text" name="date" class="input"></td>
                </tr>
                <tr>
                    <td>所有者（使用者）</td>
                    <td><input type="text" name="owner" class="input"></td>
                </tr>
                <tr>
                    <td>定置場</td>
                    <td><input type="text" name="stationaryPlant" class="input"></td>
                </tr>
                <tr>
                    <td>備考</td>
                    <td><input type="text" name="note" class="input"></td>
                </tr>
                <tr>
                    <td>輸出国</td>
                    <td><input type="text" name="export" class="input"></td>
                </tr>
                <tr>
                    <td>海外登録記号</td>
                    <td><input type="text" name="exregistrationSymbol" class="input"></td>
                </tr>
                <tr>
                    <td>海外所有者</td>
                    <td><input type="text" name="exowner" class="input"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;"><input type="submit" value="登 録" style="background-color:#006064;color:white" class="icon btn w-25"></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="col-xs-12 col-lg-6 reg_card">
        <div class="card" style="margin:auto;">
            <div class="card-header">機体登録 (Excel)</div>
            <div class="card-body" style="text-align:center;">
                <h4>Excelファイルを選択してください</h4><br>
                <p>※行数が多いと数分かかることがあります。</p>
                <form role="form" method="post" action="{{ url('/import') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="excel_file" id="excel_file"><br><br>
                    <div class="form-group">
                        <button type="submit" style="background-color:#006064;color:white" class="btn w-25">登 録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<style>
    table {
        margin-right: auto;
        margin-left: auto;
    }

    #p1 {
        font-size: 24pt;
    }

    td,
    th {
        padding: 5px 10px;
    }

    th {
        background: #1e90ff;
        color: #fff;
    }

    tbody tr:first-child {
        border-top: none;
    }

    tbody tr.even td {
        background: #fbfbfb;
    }

    tbody tr.clickable:hover td {
        background: #ecf2fa;
        cursor: pointer;
    }

    .reg_card {
        padding: 120px;
    }

    .reg_btn {
        text-align: right;
    }
    .input {
        width: 250px;
    }
</style>
@endsection