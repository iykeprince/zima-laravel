@extends('layouts.client')
@section('title', 'Ticket Information')
@section('content')
    <style>
        .ticket-info-add-btn {
            border-radius: 0px;
            background-color: #6ca405;
            border-color: #6ca405;
        }

        .ticket-info-add-btn:hover {
            background-color: #6ca405;
            border-color: #6ca405;
        }

        .ticket-info-remove-btn {
            background-color: #d21309;
            border-color: #d21309;
            border-radius: 0px;
        }

        .ticket-info-remove-btn:hover {
            background-color: #d21309;
            border-color: #d21309;
        }
    </style>
    <div class="zima-event-content-right other">
        <div class="form-row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="zima-event-create-event-content">
                    <div class="zima-event-client-dashboard-profile-change-password mt-0">
                        <form action="{{ route('user.create.event.step.two', $event->slug) }}" method="post">
                            @csrf
                            <div class="zima-event-client-dashboard-profile-change-password-header">
                                <h5>Event ticket offers</h5>
                                <div class="d-flex justify-content-between">
                                    <button class="zima-event-profile-change-password-btn">Save</button>
                                    <button type="button" class="zima-event-profile-change-password-btn">+ New Free
                                        Ticket
                                    </button>
                                </div>
                            </div>
                            <div class="zima-event-client-dashboard-profile-change-password-form">
                                <div class="ticket-info-offer mt-2">
                                    <div class="zima-event-client-dashboard-profile-change-password-header"
                                         style="background: #eee;">
                                        <h5>Paid Ticket Information</h5>
                                    </div>


                                    <div id="dynamicTable" class="form-group row mt-2">
                                        <input name="addmore[0][event_id]" type="hidden" value="{{$event->id}}"/>

                                        <div class="col-12 col-md-12 mt-2">
                                            <div class="row">
                                                <div class="col-12 col-md-5">
                                                    <input name="addmore[0][ticket_name]" class="form-control "
                                                           type="text"
                                                           placeholder="Early Bird, VIP *" value=""/>

                                                </div>

                                                <div class="col-12 col-md-2">
                                                    <input name="addmore[0][ticket_qty]" class="form-control"
                                                           type="text"
                                                           placeholder="Qty *" value=""/>

                                                </div>

                                                <div class="col-12 col-md-3">
                                                    <input name="addmore[0][ticket_price]" class="form-control"
                                                           type="text"
                                                           placeholder="Price *" value=""/>

                                                </div>

                                                <div class="col-12 col-md-2">
                                                    <button type="button" name="add" id="add"
                                                            class="ticket-info-add-btn text-white">+
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row mt-2">
                                        <div class="col-12 col-md-6 mt-2">
                                            <input name="minimum_age"
                                                   class="form-control {{ $errors->has('minimum_age') ? ' is-invalid' : '' }}"
                                                   type="text" placeholder="Minimum Age (optional)"
                                                   value="{{ old('minimum_age') }}"/>
                                            @error('minimum_age')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 mt-2">
                                            <input name="ticket_sales_start"
                                                   class="form-control {{ $errors->has('ticket_sales_start') ? ' is-invalid' : '' }}"
                                                   type="text" placeholder="Ticket sale ends *"
                                                   value="{{ old('ticket_sales_start') }}"/>
                                            @error('ticket_sales_start')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 mt-2">
                                            <input name="ticket_sales_end"
                                                   class="form-control {{ $errors->has('ticket_sales_end') ? ' is-invalid' : '' }}"
                                                   type="text" placeholder="Ticket sale starts *"
                                                   value="{{ old('ticket_sales_end') }}"/>
                                            @error('ticket_sales_end')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 mt-2">
                                            <input name="ticket_sales_limit"
                                                   class="form-control {{ $errors->has('ticket_sales_limit') ? ' is-invalid' : '' }}"
                                                   type="text" placeholder="Single Purchase Limit (optional)"
                                                   value="{{ old('ticket_sales_limit') }}"/>
                                            @error('ticket_sales_limit')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var i = 0;

            $("#add").click(function () {
                ++i;
                $("#dynamicTable").append('<div class="col-12 col-md-12 main-wrapper mt-2"><input name="addmore[' + i + '][event_id]" type="hidden" value="{{$event->id}}" /><div class="row"><div class="col-12 col-md-5"><input name="addmore[' + i + '][ticket_name]" class="form-control " type="text" placeholder="Early Bird, VIP *" value="" /></div><div class="col-12 col-md-2"><input name="addmore[' + i + '][ticket_qty]" class="form-control" type="text" placeholder="Qty *" value="" /></div><div class="col-12 col-md-3"><input name="addmore[' + i + '][ticket_price]" class="form-control" type="text" placeholder="Price *" value="" /> </div><div class="col-12 col-md-2"><button type="button" class="ticket-info-remove-btn remove-row text-white">-</button></div></div></div>');
            });

            $(document).on('click', '.remove-row', function () {
                --i;
                $(this).closest('.main-wrapper').remove();
            });
        </script>

@endsection
