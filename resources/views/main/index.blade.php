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
        <section class="cart-area pb-120 pt-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="container grey-bg-3  d-md-block pt-10 pb-10">
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="header__search-3">
                                        <form action="{{route('search')}}">
                                            <div class="header__search-input-2 header__search-input-3">
                                                <input type="text" class="form-control" id="s" name="s" placeholder="Поиск..">
                                                <button type="submit"><i class="far fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="header__middle-right header__middle-right-d d-flex align-items-center justify-content-end">
                                        <div class="sd-contact">
                                            <span>Есть вопросы? Позвоните нам. <a href="tel:+0889006690">+88613364215</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="product-price">Артикул</th>
                                        <th class="product-quantity">Номенклатура</th>
                                        <th class="product-subtotal">Цена</th>
                                        <th class="product-subtotal">Количкство </th>
                                        <th class="product-subtotal">Склад</th>
                                        <th class="product-subtotal">Бренд</th>
                                        <th class="product-remove"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="product-name">{{ $product->article }}</td>
                                            <td class="product-price"><span class="amount">{{ $product->nomenclature }}</span></td>
                                            <td class="product-subtotal"><span class="amount">{{ $product->price }}</span></td>
                                            <td class="product-subtotal"><span class="amount">{{ $product->count }}.</span></td>
                                            <td class="product-subtotal"><span class="amount">{{ $product->stock }}.</span></td>
                                            <td class="product-subtotal"><span class="amount">{{ $product->brand }}.</span></td>
                                            <td class="product-quantity">
                                                <a href="cart.html" class="btn-tp">В корзину</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div>
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
