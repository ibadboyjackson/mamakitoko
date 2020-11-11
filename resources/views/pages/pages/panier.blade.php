@extends('pages.template')
@section('title')
    Panier | Mama Kitoko
@stop
@section('style')
    <link rel="stylesheet" href="{{ asset('css/panier.css') }}">
@stop
@section('content')
    @if(Session::has('panier'))
        <section class="panier">
            <div class="container">
                <div class="row my-5">
                    <div class="col-lg-12 text-center">
                        <h1>Votre Panier</h1>
                        <table class="table my-5">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Articles</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Actions</th>
                                <th scope="col">Prix</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shops as $shop)
                                <tr>
                                    <td>
                                        <img src="{{ asset("img/") }}/{{$shop['item']['image']}}" alt="" class="img-fluid" width="80"> &nbsp;
                                        <a href="">{{ $shop['item']['titre'] }}</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-dark">{{ $shop['qty'] }}</span>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td class="herman">
                                        <div class="dropdown">
                                            <a href="{{ route('panier.reduire', $shop['item']['id']) }}"><button class="btn btn-primary btn-xs">
                                                X <span class="caret"></span>
                                            </button></a>
                                        </div>
                                    </td>
                                    <td scope="col">
                                        {{ $shop['item']['prix'] * $shop['qty']}} CHF
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td scope="col"><strong style="color: red">TOTAL</strong></td>
                                <td>
                                    <strong style="color: red">{{ $totalPrice }} CHF</strong>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <a href="{{ route('paypal') }}">
                                        <button class="btn btn-primary mr-1">
                                            <i class="fab fa-paypal px-1"></i>
                                            PayPal
                                        </button>
                                    </a>
                                    <a href="{{ route('payments') }}"><button class="btn btn-primary">Carte de crédit</button></a>

                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="panier">
            <div class="container">
                <div class="row my-5">
                    <div class="col-lg-12 text-center">
                        <h1>Votre Panier Est Vide</h1>
                    </div>
                </div>
            </div>
        </section>
    @endif
@stop
