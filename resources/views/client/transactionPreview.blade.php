@extends('layouts.client')
@section('title', 'Transaction Information | My Accounts')
@section('content')
    <style>
        .zima-event-client-dashboard-transaction-detail-subtitle {
            width: 100%;
            border-top: 1px solid #d7dde3;
            border-bottom: 1px solid #d7dde3;
            line-height: 20px;
            color: #242437;
            padding: 5px 20px;
            font-weight: 500;
            background: rgba(0, 0, 0, .05);
        }

        .zima-event-client-dashboard-transaction-detail-content {
            padding: 20px;
            flex: 1 1 auto;
            background: #fff;
        }
    </style>

    <div class="zima-event-content-right other">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="zima-event-dashboard-page-header">
                    <i class="fe fe-trending-up"></i>
                    <h5>Sales Transactions</h5>
                </div>

                <div class="zima-event-client-dashboard-transaction-details">
                    <div class="zima-event-client-dashboard-transaction-detail-subtitle">Order Information</div>
                    <div class="zima-event-client-dashboard-transaction-detail-content">

                        <div class="row">
                            <div class="col-6 col-md-4"><strong>First Name</strong><br>Tesla
                            </div>

                            <div class="col-6 col-md-4"><strong>Email Address</strong><br>balo@gmail.com
                            </div>

                            <div class="col-6 col-md-4"><strong>Phone
                                    Number</strong><br>122344
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-6 col-md-3"><strong>Reference NO</strong><br>PRF0293883</div>
                            <div class="col-6 col-md-3"><strong>Qty</strong><br><span class="db-list-rat">12</span>
                                Tickets
                            </div>
                            <div class="col-6 col-md-3"><strong>Status</strong><br><span
                                        class="db-list-status">Paid</span>
                            </div>
                            <div class="col-6 col-md-3"><strong>Amount</strong><br>N16,900
                            </div>

                        </div>


                    </div>
                    <div class="zima-event-client-dashboard-transaction-detail-subtitle">Ticket Information</div>

                    <div class="zima-event-client-dashboard-transaction-detail-content">

                        <div class="row">
                            <div class="col-6 col-md-6"><strong>Event Name</strong><br>Patoranking Experience
                            </div>

                            <div class="col-6 col-md-3"><strong>Start Date</strong><br>02/14/2020
                            </div>

                            <div class="col-6 col-md-3"><strong>End Date</strong><br>02/15/2020
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-6 col-md-3 mt-2"><strong>Time</strong><br>18:00</div>
                            <div class="col-6 col-md-3 mt-2"><strong>Regular </strong><br><span
                                        class="db-list-status">1</span> Ticket
                            </div>
                            <div class="col-6 col-md-3 mt-2"><strong>VIP </strong><br><span
                                        class="db-list-status">6</span>
                                Tickets
                            </div>
                            <div class="col-6 col-md-3 mt-2"><strong>VVIP </strong><br><span
                                        class="db-list-status">5</span>
                                Tickets
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
