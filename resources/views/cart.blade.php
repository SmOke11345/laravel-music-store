@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="title mb-4">
                    <h2>Корзина</h2>
                </div>
            </div>
            <div class="row gap-4 justify-content-evenly">
                @if(!count($dataOrder))
                    <h3>Корзина пуста</h3>
                @else
                    @foreach($dataOrder as $data)
                        <div class="card d-flex justify-content-between pt-2" style="width: 18rem;">
                            <div class="img--wrap p-3"
                                 style="background: url('../public/img/{{$data['catalog']['image']}}') center center no-repeat; background-size: contain;  height: 250px">
                            </div>
                            <div class="card-body d-flex flex-column justify-content-end">
                                <h5 class="card-title">{{$data['catalog']['name']}}</h5>
                                <p class="card-text">{{$data['catalog']['description']}}</p>
                                <p class="card-text">Тип:{{$data['catalog']['category']['name']}}</p>
                                <p class="card-text">{{$data['catalog']['price'] * $data['count']}} руб.</p>
                                <div class="wrapper d-flex justify-content-between w-100">
                                    <form action="{{ route('remove-to-cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$data['id']}}">
                                        <input type="hidden" name="catalog_id" value="{{$data['catalog_id']}}">
                                        <button type="submit" class="btn btn-danger w-100">-</button>
                                    </form>
                                    <p class="card-text mx-2">{{$data['count']}} шт</p>
                                    <form action="{{ route('add-to-cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="catalog_id" value="{{$data['catalog_id']}}">
                                        <button type="submit" class="btn btn-primary w-100 ">+</button>
                                    </form>
                                </div>
                                <div class="wrapper d-flex">
                                    <form action="{{ route('delete-from-cart', $data['id']) }}" method="get"
                                          class="w-75">
                                        <button type="submit"
                                                class="btn btn-primary w-100 ">Купить
                                        </button>
                                    </form>
                                    <form action="{{ route('delete-from-cart', $data['id']) }}" method="get"
                                          class="w-20">
                                        <button type="submit"
                                                class="btn btn-danger w-100 ms-2">Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
