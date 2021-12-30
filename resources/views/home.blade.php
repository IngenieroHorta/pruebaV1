@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <div class="row">

                        <div class="col-md-4">
                            {{ __('Dashboard') }}
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-sm" style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clientNew">Nuevo cliente</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="text-align:center;">CODE</th>
                                <th style="text-align:center;">NAME</th>
                                <th style="text-align:center;">CITY</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($client as $item)
                            <tr>
                                <td style="text-align:center;">{{$item->code}}</td>
                                <td style="text-align:center;">{{$item->name}}</td>
                                <td style="text-align:center;">{{$item->cities->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }} -->

                </div>
                <div class="container">

                    @if ($client->lastPage() > 1)

                    <ul class="pagination">
                        <li class="{{ ($client->currentPage() == 1) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $client->url(1) }}">Anterior</a>
                        </li>
                        @for ($i = 1; $i <= $client->lastPage(); $i++)
                            <li class="{{ ($client->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $client->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor
                            <li class="{{ ($client->currentPage() == $client->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $client->url($client->currentPage()+1) }}">Siguiente</a>
                            </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="clientNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Nombre</label>
                                <input class="form-control" id="name_client" type="text" placeholder="Nombre del cliente">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Ciudad</label>
                                <select class="form-control" id="city">
                                    @foreach ($cities as $city)
                                    <option value={{$city->code}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-success btn-block new_client">Guardar cliente</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection