@extends('layouts.landing')
@section('title', 'Zima Events')
@section('content')
    <style>
        .zma-event-listings h2 {
            color: #2d3954;
            text-align: left;
            font-weight: 600;
            font-size: 30px;
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #dc3545;
        }
    </style>
    <div class="hero-search">
        <div class="container">
            <h2>Search for events, festivals or serminars</h2>
            <div class="search-form-container mt-50">
                <div class="search-input">
                    <input type="text" placeholder=""/>
                    <ul class="options">
                        <li class="contains-sub-menu">
                            <a href="#">All <i class="fa fa-angle-down"></i></a>
                            <ul>
                                <li><a href="">Party</a></li>
                                <li><a href="">Music</a></li>
                                <li><a href="">Social</a></li>
                                <li><a href="">Food & Drink</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button>Search</button>
            </div>
        </div>
    </div>
    </div>


    <section class="bgGray gray-bg zima-event-listings">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h2>Featured Events</h2>
                </div>
            </div>
            <div class="row">

                @forelse ($eventList as $event)

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="event-listing">
                            <div class="listing-img-wrapper">
                                <div class="list-img-slide">
                                    <a href="{{ route('event.listings.preview',$event->slug) }}">
                                        <img src="{{ $event->event_cover_image }}" class="img-fluid mx-auto" alt=""/>
                                    </a>
                                    <div class="show-favorite">
                                        <i class="far fa-heart"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="listing-detail-wrapper pb-0">
                                <h2>
                                    {{ $event->event_name}}
                                </h2>
                            </div>
                            <div class="price-features-wrapper">
                                <div class="listing-price-fx">
                                    <h6 class="listing-card-info-price price-prefix">
                                <span class="ml-30">&#8358;{{number_format($event->min_price)}} -
                                    &#8358;{{number_format($event->max_price)}}</span>
                                    </h6>
                                    <p><i style='color:#a4006a;' class="fa fa-map-marker-alt"></i>
                                        {{ $event->event_venue}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2>No Records found</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="zima-event-subscribe" class="zima-event-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2>
                        Subscribe today to get the latest offers, discount rates and offers.
                        No spamming, we promise.
                    </h2>
                    <form action="{{ route('user.subscribe.submit') }}" method="post">
                        @csrf
                        <div class="search-form-container mt-50">
                            <div class="search-input">
                                <input type="text" name="email_address"
                                       class="form-control {{ $errors->has('email_address') ? ' is-invalid' : '' }}"
                                       placeholder="Email address">
                            </div>
                            <button type="submit" class="zima-event-subscribe-btn">Subscribe</button>
                            @error('email_address')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>


@endsection
