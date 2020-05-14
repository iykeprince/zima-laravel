@extends('layouts.client')
@section('title', 'Transaction | My Accounts')
@section('content')
    <div class="zima-event-content-right other">
        <div class="form-row">

            <div class="col-12 col-md-12 col-lg-12">

                <div class="zima-event-dashboard-page-header">
                    <i class="fe fe-trending-up"></i>
                    <h5>Sales Transactions</h5>
                </div>

                <div class="zima-event-client-dashboard-transaction-wrapper">
                    <table id="selection-datatable" class="table dt-responsive nowrap ">
                        <thead>
                        <tr>
                            {{-- <th>SN</th> --}}
                            <th>Reference No</th>
                            <th>Event Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        <tr>
                            {{-- <td>1</td> --}}
                            <td>PRF0293883</td>
                            <td>Purple Valentine</td>
                            <td>2020/04/25</td>
                            <td>2020/04/27</td>
                            <td><span class="db-list-rat">4</span></td>
                            <td><span class="db-list-status">Paid</span></td>
                            <td><a href="{{ route('user.transactions.preview') }}" class="db-list-edit"><i
                                            class="fe fe-eye"></i></a></td>
                        </tr>


                        </tbody>
                    </table>


                </div>


            </div>
        </div>
    </div>
@endsection
