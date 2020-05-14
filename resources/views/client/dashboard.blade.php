@extends('layouts.client')
@section('title', 'Client Dashboard')
@section('content')
    <style>
        .zima-event_cover_image {
            background-repeat: no-repeat;
            background-size: contain;
            background-position: 50%;
            height: 50px;
            width: 250px;
        }
    </style>
    <div class="zima-event-content-right">
        <div class="form-row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="form-row mt-25">
                    <div class="col-12 col-md-6">
                        <div class="zima-event-summary-wrapper">
                            <div class="zima-event-summary-wrapper-icon">
                                <i class="fe fe-calendar"></i>
                            </div>
                            <div class="zima-event-summary-content">
                                <div class="zima-event-summary-content-list">
                                    <div class="zima-event-summary-content-list-icon">
                                        <i class="fe fe-calendar"></i>
                                    </div>
                                    <div class="zima-event-summary-content-list-title">
                                        Total Events
                                    </div>
                                    <div class="zima-event-summary-content-list-subtitle">
                                        Approved / Pending
                                    </div>

                                </div>
                                <div class="zima-event-summary-content-list-counter">
                                    <div class="zima-event-summary-content-list-counter-number">
                                        {{ $eventCount}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="zima-event-summary-wrapper">
                            <div class="zima-event-summary-wrapper-icon">
                                <i class="fe fe-trending-up"></i>
                            </div>
                            <div class="zima-event-summary-content">
                                <div class="zima-event-summary-content-list">
                                    <div class="zima-event-summary-content-list-icon">
                                        <i class="fe fe-trending-up"></i>
                                    </div>
                                    <div class="zima-event-summary-content-list-title">
                                        Total Sales
                                    </div>
                                    <div class="zima-event-summary-content-list-subtitle">
                                        Ticket Sales Transaction
                                    </div>

                                </div>
                                <div class="zima-event-summary-content-list-counter">
                                    <div class="zima-event-summary-content-list-counter-number">
                                        0
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 mt-30">
                <h2 style="font-size:20px;">My Events</h2>
                <table id="selection-datatable" class="table dt-responsive nowrap ">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Event Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Min Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>

                    @forelse ($eventList as $event)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$event->event_name}}</td>
                            <td>{{$event->event_start_date}}</td>
                            <td>{{$event->event_end_date}}</td>
                            <td>&#8358;{{number_format($event->min_price)}}</td>
                            <td>
                                @if ($event->isVerified ==1)
                                    <span class="badge badge-success p-2">Approved</span>
                                @else
                                    <span class="badge badge-danger p-2">pending</span>
                                @endif

                            </td>
                            <td><a href="" class="db-list-edit" target="_blank"><i class="fe fe-eye"></i></a></td>
                        </tr>
                    @empty

                        <tr>
                            <td>No Records found</td>
                        </tr>

                    @endforelse


                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
