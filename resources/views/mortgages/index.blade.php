@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Список ипотек</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Процентная ставка</th>
                <th>Стоимость (мин-макс)</th>
                <th>Первоначальный взнос</th>
                <th>Срок</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody id="mortgages-table">
            
        </tbody>
    </table>
</div>

<div id="descriptionModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Описание ипотеки</h5>
                <button type="button" class="btn-close" onclick="closeDescriptionModal()"></button>
            </div>
            <div class="modal-body">
                <p id="mortgageDescription"></p>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/mortgage.js') }}"></script>


@endsection
 