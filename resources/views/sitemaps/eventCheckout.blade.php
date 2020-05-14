@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
    <style>
        .zima-event-listings h2 {
            color: #2d3954;
            text-align: left;
            font-weight: 600;
            font-size: 30px;
        }

        .zima-event-prview-ticket-info {
            background: #eee;
            border-radius: 6px 6px 0 0;
            padding: 2px 0;
        }

        .zima-event-prview-ticket-info h2 {
            color: #a4006a;
            margin: 10px;
            font-size: 17px;
            font-weight: 550;
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
            color: #a4006a;
            font-weight: 400;
            letter-spacing: 0.3px;
            font-size: 15px;
            text-transform: uppercase;
        }
    </style>

    <div id="zima-events-authentication-wrapper" class="zima-events-authentication-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="zima-events-authentication-logo-wrapper">
                        <a href="{{ route('welcome.page') }}">
                            <img class="zima-img-trim"
                                 src="{{ asset('static/assets/img/zima-logo-event-default.png') }}"
                                 alt="Zima Events Logo"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .basket-summary {
            margin-top: 0;
        }

        .basket-summary {
            border: 1px solid #e5e5e5;
            padding: 20px;
            margin-bottom: 20px;
            background: #fff;
            margin-top: 20px;
        }

        .basket-summary__line {
            margin: 0 0 10px;
            color: #666;
        }

        .basket_summary__total {
            font-size: 2rem;
        }

        .basket_summary__total {
            font-size: 1.6rem;
            text-transform: uppercase;
            margin-top: 20px;
            font-weight: 600;
        }

        .basket-summary__value {
            float: right;
            color: #1C4863;
        }

        .zima-events-ticket-cart-information-list p {
            font-size: 1rem;
            color: #1C4863;
        }
    </style>


    <section class="bgWhite zima-event-listing-details" style="padding: 75px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="zima-event-ticket-buyer-information">

                        <div class="zima-event-prview-ticket-info">
                            <h2>Buyer's Information</h2>
                        </div>

                        <form>
                            @csrf
                            <div class="form-group row mt-30">
                                <div class="col-12 col-md-6">
                                    <input name="first_name"
                                           class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           type="text" placeholder="First Name *" value=""/>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <input name="last_name"
                                           class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           type="text" placeholder="Last Name *" value=""/>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 col-md-12">
                                    <input name="email_address"
                                           class="form-control {{ $errors->has('email_address') ? ' is-invalid' : '' }}"
                                           type="text" placeholder="Email Address *" value=""/>
                                    @error('email_address')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="form-group row">
                                <div class="col-12 col-md-12">
                                    <input id="phone" name="phone_number"
                                           class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                           type="text" placeholder="Phone Number *" value=""/>
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 col-md-12">
                                    <button type="submit" class="btn text-white theme-border-btn nav-link w-100"><i
                                                class="fas fa-ticket-alt"></i>
                                        Reserve Tickets
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
                <div class="col-md-7">
                    <div class="zima-event-ticket-buyer-information">

                        <div class="zima-event-prview-ticket-info">
                            <h2>Order Information</h2>
                        </div>

                        <div class="zima-events-ticket-cart-information">
                            <?php $total = 0 ?>
                            @if(session('cart'))

                                @foreach(session::get('cart') as $i=>$orders)

                                    <?php $total += $orders['ticket_price'] * $orders['ticket_qty'] ?>

                                    <div class="zima-events-ticket-cart-information-list d-flex justify-content-between">
                                        <p>{{ $orders['ticket_name'] }} - {{ $orders['ticket_qty'] }}</p>
                                        <p>&#8358; {{ number_format($orders['ticket_price']) }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <section class="basket-summary">
                            <p class="basket-summary__line">VAT <span
                                        class="basket-summary__value i-basket-sub-total">&#8358;
                                {{ number_format(0.05 * $total) }}</span></p>
                            <h2 class="basket_summary__total">Total <span
                                        class="basket-summary__value i-basket-total">&#8358;{{ number_format($total) }}</span>
                            </h2>
                        </section>
                    </div>
                </div>


            </div>

        </div>
    </section>
@endsection
