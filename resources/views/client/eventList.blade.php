@extends('layouts.client')
@section('title', 'Event Listings')
@section('content')
    <div class="zima-event-content-right other">
        <div class="form-row">

            <div class="col-12 col-md-12 col-lg-12">

                <div class="zima-event-dashboard-page-header">
                    <i class="fe fe-calendar"></i>
                    <h5>My Events</h5>
                </div>

                <div class="zima-event-client-dashboard-transaction-wrapper">
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
    </div>
@endsection
