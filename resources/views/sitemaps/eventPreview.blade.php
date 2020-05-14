@extends('layouts.app')
@section('title', 'Event Preview Information')
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
    <div class="bgGray zima-event-listing-banner" style="background-image:url('{{ $event->event_cover_image }}')">
        @include('components.header')
        <div class="menu-spacer"></div>
        <div class="hero-title" style="padding: 100px 0;">
            <div class="container">
                <h2 class="text-white">{{ $event->event_name}}</h2>
            </div>
        </div>
    </div>

    <section class="bgWhite zima-event-listing-details" style="padding: 75px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Date and Time</h5>
                    <p>Start Date: {{ $event->event_start_date}} ({{$event->event_start_time}} -
                        {{$event->event_end_time}})<br>
                        End Date: {{ $event->event_end_date}} ({{$event->event_start_time}} - {{$event->event_end_time}}
                        )
                    </p>

                    <h5>Venue</h5>
                    <p>{{ $event->event_venue}}
                    </p>

                    <div class="goto-links">
                        <h5>Share Event</h5>
                        <a href="" class="goto-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="" class="goto-link"><i class="fab fa-twitter"></i></a>
                        <a href="" class="goto-link"><i class="fab fa-instagram"></i></a>
                    </div>


                </div>
                <div class="col-md-8">
                    <div class="blog-single-content">
                        <p style="font-size:17px;">{{ strip_tags($event->event_description)}}</p>
                    </div>
                    <div>
                        <form action="{{ route('event.listings.cart.submit', $event->slug) }}" method="post">
                            @csrf
                            <div class="ticket-info-offer mt-4">
                                <div class="zima-event-prview-ticket-info">
                                    <h2>Ticket Information</h2>
                                </div>

                                @foreach ($event->tickets as $t => $ticket)

                                    <div class="form-group row mt-3">
                                        <div class="col-12 col-md-7">
                                            <input name="ticket_name[]" class="form-control" type="text" readonly
                                                   value="{{$ticket->ticket_name}}">
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <input name="ticket_price[]" class="form-control" type="text"
                                                   placeholder="Price *"
                                                   readonly value="{{ $ticket->ticket_price}}">
                                        </div>

                                        <div class="col-12 col-md-2">
                                            <input name="ticket_qty[]" class="form-control" type="number"
                                                   placeholder="Qty"
                                                   value="">
                                        </div>
                                    </div>

                                @endforeach

                                <div class="zima-tickets-cta">
                                    <button type="submit" class="btn text-white theme-border-btn nav-link"><i
                                                class="fas fa-ticket-alt mr-2"></i>
                                        Get Tickets
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>

        </div>
    </section>
@endsection
