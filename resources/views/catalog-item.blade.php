@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">
            <div class="row flex-md-row flex-column justify-content-center align-items-center">
                <div class="title mb-4">
                    <h2>{{$dataItem['name']}}</h2>
                </div>
                <div class="col-5"
                     style="background: url('../public/img/{{$dataItem['image']}}') center center no-repeat; background-size: contain; height: 300px ">
                </div>
                <div class="col-7">
                    <p>Описание: {{$dataItem['description']}}</p>
                    <p>Тип: {{$dataItem['category']['name']}}</p>
                    <div class="text-end">
                        <h3>{{$dataItem['price']}} руб.</h3>
                        <form action="{{ route('add-to-cart')}}" method="post">
                            @csrf
                            <input type="hidden" name="catalog_id" value="{{$dataItem['id']}}">
                            <button type="submit" class="btn btn-primary">Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
