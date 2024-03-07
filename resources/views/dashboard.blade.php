@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="title mb-4">
                    <h2>Добавление товара</h2>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('catalog-add-item') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Загрузить изображение</label>
                                <input class="form-control" name="img" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Имя</label>
                                <input type="text" class="form-control" name="name" id="nameInput"
                                       placeholder="Введите имя">
                            </div>
                            <div class="mb-3">
                                <label for="descriptionTextarea" class="form-label">Описание</label>
                                <textarea class="form-control" name="description" id="descriptionTextarea" rows="3"
                                          placeholder="Введите описание"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="categorySelect" class="form-label">Категория</label>
                                <select class="form-select" name="selected_category"
                                        aria-label="Default select example">
                                    <option selected hidden="hidden">Выберите категорию</option>
                                    <option value="1">Струнные</option>
                                    <option value="2">Клавишные</option>
                                    <option value="3">Духовые</option>
                                    <option value="4">Ударные</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="priceInput" class="form-label">Цена</label>
                                <input type="text" class="form-control" name="price" id="priceInput"
                                       placeholder="Укажите цену">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </section>

@endsection
