@extends('layouts.component')
@section('block')

<div>
    <div class="row">
        <div class="col-xs-12 col-lg-4 p-5">
            <!-- 検索 -->
            <form method="get" action="{{ url('/search') }}">
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
                        <td colspan="2" style="text-align:center;"><input type="submit" value="検 索" style="background-color:#006064;color:white" class="icon btn w-50"></td>
                    </tr>
                </table>
            </form>
            <!-- 履歴登録 -->
            <div style="text-align:center">
                <button class="btn" data-toggle="modal" data-target="#reglog" style="color:#006064; border: 1px solid #006064; margin-top:100px;"><i class="fa fa-plus-square-o" aria-hidden="true"></i> 新規履歴登録</button>
            </div>
            <!--履歴登録モーダル-->
            <div class="modal fade" id="reglog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">新規履歴登録</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/createlog') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="airplaneid" value="{{$airplane->id}}">
                            <table>
                                <tr>
                                    <td>登録日</td>
                                    <td><input type="text" name="createdate" class="input"></td>
                                </tr>
                                <tr>
                                    <td>所有者</td>
                                    <td><input type="text" name="createowner" class="input"></td>
                                </tr>
                                <tr>
                                    <td>定置場</td>
                                    <td><input type="text" name="createstationaryPlant" class="input"></td>
                                </tr>
                                <tr>
                                    <td>備考</td>
                                    <td><input type="text" name="createnote" class="input"></td>
                                </tr>
                                <tr>
                                    <td>輸出国</td>
                                    <td><input type="text" name="createexport" class="input"></td>
                                </tr>
                                <tr>
                                    <td>海外登録記号</td>
                                    <td><input type="text" name="createexregistrationSymbol" class="input"></td>
                                </tr>
                                <tr>
                                    <td>海外所有者</td>
                                    <td><input type="text" name="createexowner" class="input"></td>
                                </tr>
                                <tr style="text-align:center;">
                                    <td colspan="2">
                                        <button data-dismiss="modal" class="btn btn-sm btn-outline-secondary">キャンセル</button>　
                                        <input type="submit" value="登 録" style="background-color:#006064;color:white" class="btn btn-sm">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-lg-8 p-5">
            @if(isset($airplane) && isset($log[0]))
            <p id="p1">{{$airplane->registrationSymbol}}　機体情報</p>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">登録記号</th>
                        <th scope="col">型式</th>
                        <th scope="col">製造番号</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$airplane->registrationSymbol}}</td>
                        <td>{{$airplane->model}}</td>
                        <td>{{$airplane->serialNumber}}</td>
                        <td class="align-middle" style="color:#17a2b8" data-toggle="modal" data-target="#airplane"><i class="fa fa-lg fa-pencil-square-o" aria-hidden="true"></i></td>
                    </tr>
                </tbody>
            </table>
            <!--機体編集モーダル-->
            <div class="modal fade" id="airplane" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">機体編集</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/edit') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="editid" value="{{$airplane->id}}">
                            <table>
                                <tr>
                                    <td>登録記号</td>
                                    <td><input type="text" name="editregistrationSymbol" class="input" value="{{$airplane->registrationSymbol}}"></td>
                                </tr>
                                <tr>
                                    <td>型式</td>
                                    <td><input type="text" name="editmodel" class="input" value="{{$airplane->model}}"></td>
                                </tr>
                                <tr>
                                    <td>製造番号</td>
                                    <td><input type="text" name="editserialNumber" class="input" value="{{$airplane->serialNumber}}"></td>
                                </tr>
                                <tr style="text-align:center;">
                                    <td colspan="2">
                                        <button data-dismiss="modal" class="btn btn-sm btn-outline-secondary">キャンセル</button>　
                                        <input type="submit" value="編集" class="btn btn-sm btn-info">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <p id="p1">登録履歴</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">登録日</th>
                        <th scope="col">所有者</th>
                        <th scope="col">定置場</th>
                        <th scope="col">備考</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($log as $res)
                    <tr style="font-size:10pt;">
                        <td class="date align-middle">{{$res->date}}</td>
                        <td class="align-middle">{{$res->owner}}</td>
                        <td class="align-middle">{{$res->stationaryPlant}}</td>
                        <td class="align-middle">{{$res->note}}</td>
                        <td class="align-middle" style="color:#17a2b8" data-toggle="modal" data-target="#log" data-id="{{$res->id}}" data-date="{{$res->date}}" data-owner="{{$res->owner}}" data-plant="{{$res->stationaryPlant}}" data-note="{{$res->note}}"><i class="fa fa-lg fa-pencil-square-o" aria-hidden="true"></i></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!--登録履歴編集モーダル-->
            <div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">登録履歴編集</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/logedit') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="editid" id="logid">
                            <table>
                                <tr>
                                    <td>登録日</td>
                                    <td><input type="text" name="editdate" class="input" id="date"></td>
                                </tr>
                                <tr>
                                    <td>所有者</td>
                                    <td><input type="text" name="editowner" class="input" id="owner"></td>
                                </tr>
                                <tr>
                                    <td>定置場</td>
                                    <td><input type="text" name="editstationaryPlant" class="input" id="plant"></td>
                                </tr>
                                <tr>
                                    <td>備考</td>
                                    <td><input type="text" name="editnote" class="input" id="note"></td>
                                </tr>
                                <tr style="text-align:center;">
                                    <td colspan="2">
                                        <button data-dismiss="modal" class="btn btn-sm btn-outline-secondary">キャンセル</button>　
                                        <input type="submit" value="編集" class="btn btn-sm btn-info">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <p id="p1">海外登録履歴</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">登録日</th>
                        <th scope="col">輸出国</th>
                        <th scope="col">海外登録記号</th>
                        <th scope="col">海外所有者</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($log as $res)
                        @if(isset($res->ex_registrationSymbol))
                        <tr style="font-size:10pt;">
                            <td class="date align-middle">{{$res->date}}</td>
                            <td class="date align-middle">{{$res->export}}</td>
                            <td class="align-middle">{{$res->ex_registrationSymbol}}</td>
                            <td class="align-middle">{{$res->ex_owner}}</td>
                            <td class="align-middle" style="color:#17a2b8" data-toggle="modal" data-target="#exlog" data-exid="{{$res->id}}" data-export="{{$res->export}}" data-exsymbol="{{$res->ex_registrationSymbol}}" data-exowner="{{$res->ex_owner}}"><i class="fa fa-lg fa-pencil-square-o" aria-hidden="true"></i></td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <!--海外登録履歴編集モーダル-->
            <div class="modal fade" id="exlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">海外登録履歴編集</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/exlogedit') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="editid" id="exlogid">
                            <table>
                                <tr>
                                    <td>輸出国</td>
                                    <td><input type="text" name="editexport" class="input" id="export"></td>
                                </tr>
                                <tr>
                                    <td>海外登録記号</td>
                                    <td><input type="text" name="editexregistrationSymbol" class="input" id="exsymbol"></td>
                                </tr>
                                <tr>
                                    <td>海外所有者</td>
                                    <td><input type="text" name="editexowner" class="input" id="exowner"></td>
                                </tr>
                                <tr style="text-align:center;">
                                    <td colspan="2">
                                        <button data-dismiss="modal" class="btn btn-sm btn-outline-secondary">キャンセル</button>　
                                        <input type="submit" value="編集" class="btn btn-sm btn-info">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <p>見つかりませんでした</p>
            @endif

        </div>
    </div>

</div>
<script>
    // logモーダルにパラメータ渡し
    window.onload = function(){
        $('#log').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var date = button.data('date');
            var owner = button.data('owner');
            var plant = button.data('plant');
            var note = button.data('note');
            var modal = $(this);
            modal.find('#logid').val(id);
            modal.find('#date').val(date);
            modal.find('#owner').val(owner);
            modal.find('#plant').val(plant);
            modal.find('#note').val(note);
        })

        // exlogモーダルにパラメータ渡し
        $('#exlog').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var exid = button.data('exid');
            var eexport = button.data('export');
            var exsymbol = button.data('exsymbol');
            var exowner = button.data('exowner');
            var modal = $(this);
            modal.find('#exlogid').val(exid);
            modal.find('#export').val(eexport);
            modal.find('#exsymbol').val(exsymbol);
            modal.find('#exowner').val(exowner);
        })
    }

</script>
<style>
    #p1 {
        font-size: 24pt;
        color:#006064;
    }

    table {
        margin-right: auto;
        margin-left: auto;
    }

    #p1 {
        font-size: 24pt;
    }

    td {
        padding: 5px 10px;
    }

    tbody tr:first-child {
        border-top: none;
    }

    .input {
        width: 250px;
    }

    #logblock {
        margin-top: 100px;
    }
    .date{
        width:130px;
    }
</style>

@endsection