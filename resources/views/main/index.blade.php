@extends('layouts.main')

@section('content')
<main>
    <!-- slider area start -->
    <section class="page__title p-relative d-flex align-items-center" data-background="assets/img/slider/top.jpg" >
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>Интернет-магазин автозапчастей</h1>
                        <div class="page__title-breadcrumb">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider area end -->
    <main>
        <!-- product-area start -->
        <section class="cart-area pb-100 pt-50">
          <div class=" pb-20">
            <div class="container grey-bg-3  d-md-block pt-10 pb-10">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="header__search-2">
                            <form action="{{route('search')}}">
                                <div class="header__search-input-2">
                                    <input type="text" class="form-control" id="s" name="s" placeholder="Поиск запчастей..">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="product-subtotal">Бренд</th>
                                        <th class="product-price">Артикул</th>
                                        <th class="product-quantity">Номенклатура</th>
                                        <th class="product-subtotal">Количкство </th>
                                        <th class="product-subtotal">Цена</th>
                                        <th class="product-remove"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="product-subtotal"><span class="amount">{{ $product->brand }}</span></td>
                                            <td class="product-subtotal"><span class="amount">{{ $product->article }}</span></td>
                                            <td class="product-price"><span class="amount">{{ $product->nomenclature }}</span></td>
                                            <td class="product-subtotal"><span class="amount">{{ $product->count }}</span></td>
                                            <td class="product-subtotal"><span class="amount">{{ $product->price }} руб.</span></td>
                                            <td class="product-quantity">
                                                <a href="{{route('addCart', ['id' => $product -> id])}}" class="btn-tp">В корзину</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pt-30">
                                    {{ $products->appends(['s' => request()->s])->Links() }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
 </main>
@endsection
