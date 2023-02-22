@extends('layouts.main')

@section('content')

<main>
    <!-- signin__area start -->
    <section class="page__title p-relative d-flex align-items-center " data-background="assets/img/slider/top.jpg" >
        <div class="container ">
            <div class="row">
                <div class="col-xl-12 ">
                    <div class="page__title-inner text-center">
                        <h1>Оформление заказа</h1>
                        <div class="page__title-breadcrumb">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout-area start -->
    <section class="checkout-area pb-85 pt-50">
        <div class="container">
            <form method="post" action="{{route('order')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Реквизиты</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Имя <span class="required">*</span></label>
                                        <input name="name" type="text" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input name="email" type="text"  value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Организация</label>
                                        <input name="organization" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Почтовый индекс<span class="required">*</span></label>
                                        <input name="index" type="text" placeholder="Индекс">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input name="address" type="text" placeholder="Город, улица, дом.">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Телефон <span class="required">*</span></label>
                                        <input name="phone" type="text" placeholder="Телефон">
                                    </div>
                                </div>
                            </div>
                            <div class="different-address">
                                <div class="ship-different-title">
                                </div>
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Дополнение к заказу</label>
                                        <textarea name="description" id="checkout-mess" cols="30" rows="10" placeholder="Заполните поле"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="your-order mb-30 ">
                            <h3>Ваш заказ</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product-name">Продукт</th>
                                        <th class="product-total">Цена</th>
                                    </tr>
                                    </thead>
                                    @foreach($cart as $item)
                                    <tbody>
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$item->name}} <strong class="product-quantity"> × {{$item->quantity}}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">{{$item->price}} руб.</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Доставка</th>
                                        <td><span class="amount">0</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Сумма заказа.</th>
                                        <td><strong><span class="amount">{{$sum}} руб.</span></strong>
                                        </td>
                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="accordion" id="checkoutAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="checkoutOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bankOne" aria-expanded="true" aria-controls="bankOne">
                                                Информация о заказе
                                            </button>
                                        </h2>
                                        <div id="bankOne" class="accordion-collapse collapse show" aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">
                                                <p>После оплаты вы сможите проверить статус заказа в своём личном кабинете</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="paymentTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#payment" aria-expanded="false" aria-controls="payment">
                                                Методы доставки
                                            </button>
                                        </h2>
                                        <div id="payment" class="accordion-collapse collapse" aria-labelledby="paymentTwo" data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">
                                                <p>Выберите свой метод доставки.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="paypalThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                                                PayPal
                                            </button>
                                        </h2>
                                        <div id="paypal" class="accordion-collapse collapse" aria-labelledby="paypalThree" data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                    PayPal account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment mt-20">
                                    <button type="submit" class="btn-tp">Оформить заказ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- checkout-area end -->


</main>
@endsection
