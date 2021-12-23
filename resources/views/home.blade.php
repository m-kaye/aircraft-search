@extends('layouts.component')
@section('block')
<div>
    <div id="block1">
        <form action="{{ url('/search') }}" method="get">
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
                    <td>所有者</td>
                    <td><input type="text" name="owner" class="input"></td>
                </tr>
                <tr>
                    <td>定置場</td>
                    <td><input type="text" name="stationaryPlant" class="input"></td>
                </tr>
                <tr>
                    <td>海外登録記号</td>
                    <td><input type="text" name="ex_registrationSymbol" class="input"></td>
                </tr>
                <tr>
                    <td>海外所有者</td>
                    <td><input type="text" name="ex_owner" class="input"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;"><input type="submit" value="&#xf002; 検 索" style="background-color:#006064;color:white" class="icon btn btn-lg w-50"></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="block2">
        <a href="input" class="btn btn-lg" style="color:#006064; border: 1px solid #006064;"><i class="fa fa-plus-square-o" aria-hidden="true"></i> 機体登録はコチラ</a>
    </div>
    <div id="block3">
        <p>お問い合わせはメールにてご連絡ください</p>
        <a href="mailto:kmura7150@gmail.com?subject=[Heli Search] 問い合わせ" class="btn btn-sm btn-outline-secondary">CONTACT</a>
    </div>
</div>
@endsection

@section("script")

<style>
    #block1{
        margin-top:50px;
    }
    #block2{
        margin-top:100px;
        text-align:center;

    }
    #block3{
        margin-top:150px;
        text-align:center;
    }
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

    .input {
        width: 250px;
    }
    .icon {
	display: inline-block;
	font-family: FontAwesome;
	font-style: normal;
	font-weight: normal;
	line-height: 1;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
</style>

@endsection