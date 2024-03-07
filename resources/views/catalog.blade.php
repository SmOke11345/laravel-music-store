@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="title mb-4">
                <h2>Каталог</h2>
            </div>
        </div>
        <div class="row gap-4 justify-content-evenly">
            @foreach($dataCatalog as $data)
                <div class="card d-flex justify-content-between pt-2" style="width: 18rem;">
                    <div class="img--wrap p-3"
                         style="background: url('public/img/{{$data['image']}}') center center no-repeat; background-size: contain;  height: 250px">
                    </div>
                    <div class="card-body d-flex flex-column justify-content-end">
                        <h5 class="card-title">{{$data['name']}}</h5>
                        <p class="card-text">{{$data['description']}}</p>
                        <p class="card-text">Тип: {{$data['category']['name']}}</p>
                        <p class="card-text">{{$data['price']}} руб.</p>
                        <a href="{{route('catalog', $data['id'])}}" class="btn btn-primary">Подробнее
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
