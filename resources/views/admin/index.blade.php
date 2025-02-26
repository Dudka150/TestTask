@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Управление ипотеками</h1>

    <button class="btn btn-success mb-3" onclick="showCreateForm()">Добавить ипотеку</button>

    <table class="table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Процентная ставка</th>
                <th>Стоимость (мин-макс)</th>
                <th>Первоначальный взнос</th>
                <th>Срок (лет)</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody id="mortgages-table">
            
        </tbody>
    </table>
</div>

<div id="mortgageModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить/Редактировать ипотеку</h5>
                <button type="button" class="btn-close" onclick="closeModal()"></button>
            </div>
            <div class="modal-body">
                <form id="mortgageForm">
                    <input type="hidden" id="mortgageId">
                    
                    <div class="mb-3">
                        <label class="form-label">Название</label>
                        <input type="text" id="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Описание</label>
                        <textarea id="description" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Процентная ставка (макс. 40%)</label>
                        <input type="number" id="percent" class="form-control" required min="0" max="40">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Минимальная цена</label>
                        <input type="number" id="min_price" class="form-control" required step="0.01">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Максимальная цена</label>
                        <input type="number" id="max_price" class="form-control" required step="0.01">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Минимальный взнос (макс. 98%)</label>
                        <input type="number" id="min_first_payment" class="form-control" required min="0" max="98">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Минимальный срок</label>
                        <input type="number" id="min_term" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Максимальный срок</label>
                        <input type="number" id="max_term" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Активна</label>
                        <input type="checkbox" id="is_active">
                    </div>

                    <button type="button" class="btn btn-primary" onclick="saveMortgage()">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/admin_mortgages.js') }}"></script>
@endsection
