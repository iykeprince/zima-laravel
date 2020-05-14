<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\SubscribeRequest;
use App\Subscribe;
use DB;
use Illuminate\Http\Request;
use Session;


class SitemapController extends Controller
{
    public function welcome()
    {
        $eventList = DB::table('events')->select('events.*', \DB::raw('min(ticket_infos.ticket_price) as min_price, max(ticket_infos.ticket_price) as max_price'))
            ->leftJoin('ticket_infos', 'events.id', '=', 'ticket_infos.event_id')->groupBy('events.id')->get();

        return view('sitemaps.welcome', compact('eventList'));
    }

    public function eventListings()
    {
        return view('sitemaps.eventArchive');
    }

    public function eventPreview($slug)
    {
        $event = Event::with('tickets')->where(['slug' => $slug])->first();
        return view('sitemaps.eventPreview', compact('event'));
    }


    public function eventPreviewForm(Request $request, $slug)
    {
        // $request->validate([
        //     'ticket_qty.*' => 'required'
        // ]);

        $ticket_name = $request['ticket_name'];
        $ticket_price = $request->ticket_price;
        $ticket_qty = $request->ticket_qty;
        $temp = [];
        foreach ($ticket_qty as $i => $qty) {
            $t['ticket_name'] = $ticket_name[$i];
            $t['ticket_price'] = $ticket_price[$i];
            $t['ticket_qty'] = $ticket_qty[$i];
            $temp[] = $t;
        }

        Session::put('cart', $temp);

        // dd($cart);

        $event = Event::with('tickets')->where(['slug' => $slug])->first();

        return view('sitemaps.eventCheckout', compact('event'));
    }

    public function eventCheckout($slug)
    {
        $event = Event::with('tickets')->where(['slug' => $slug])->first();
        return view('sitemaps.eventCheckout', compact('event'));
    }

    public function userSubscribeForm(SubscribeRequest $request)
    {
        $validated = $request->validated();

        $subscribe = new Subscribe;
        $subscribe->email_address = $request->email_address;

        if ($subscribe->save()) {
            $notification = [
                'message' => 'You have successfully subscribe to our monthly newsletters!',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message' => 'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

}
