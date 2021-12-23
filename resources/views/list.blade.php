@extends('layouts.component')
@section('block')

<div>
    <div class="row">
        <div class="col-xs-12 col-lg-4 p-5">
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
        </div>
        <div class="col-xs-12 col-lg-8 p-5">
            @if(isset($result[0]))
            <p id="p1">機体情報</p>
            <table class="table table-hover table-clickable">
                <thead>
                    <tr>
                        <th scope="col">登録記号</th>
                        <th scope="col">型式</th>
                        <th scope="col">製造番号</th>
                    </tr>
                </thead>
                @foreach($result as $res)
                <tr data-href="{{ url('/detail/' . $res->id ) }}">
                    <td class="pl-4 pr-4">{{$res->registrationSymbol}}</td>
                    <td class="pl-4 pr-4">{{$res->model}}</td>
                    <td class="pl-4 pr-4">{{$res->serialNumber}}</td>
                </tr>
                @endforeach
            </table>
            {{ $result->appends(Request::only('registrationSymbol','model','owner','stationaryPlant','ex_registrationSymbol','ex_owner'))->links() }}


            @else
            <p>見つかりませんでした</p>
            @endif

        </div>
    </div>

</div>
@endsection

@section("script")

<style>
    table {
        margin-right: auto;
        margin-left: auto;
    }

    #p1 {
        font-size: 24pt;
        color:#006064;
    }

    td,
    th {
        padding: 5px 10px;
    }

    .pagination {
        justify-content: center;
    }
    .input {
        width: 250px;
    }
</style>

<script>
    jQuery(function($) {
        $('tbody tr[data-href]').addClass('clickable').click(function() {
            window.location = $(this).attr('data-href');
        }).find('a').hover(function() {
            $(this).parents('tr').unbind('click');
        }, function() {
            $(this).parents('tr').click(function() {
                window.location = $(this).attr('data-href');
            });
        });
    });
</script>

@endsection