@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <p>
                        {{ $productos->count() }} registros |
                        página {{ $productos->currentPage() }} de {{ $productos->lastPage() }}
                    </p>
                    <div id="alert" class="alert alert-primary"></div>
                    {{-- table section --}}
                    <table id="table-select" class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">option</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row">{{ $producto->id }}</th>
                                    <td><label for="{{ $producto->id }}">{{ $producto->name }}</label></td>
                                    <td>
                                        {{-- <form method="DELETE" action="{{ route('destroyProduct',$producto->id) }}">
                                            <a href="#">eliminar</a>
                                        </form> --}}
                                        {!! Form::open(['route' => ['destroyProduct', $producto->id], 'method'=>'DELETE']) !!}
                                            <a href="#">eliminar</a>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                          {!! $productos->render() !!}
                    {{-- fin table section --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
