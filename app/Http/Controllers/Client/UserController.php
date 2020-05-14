<?php

namespace App\Http\Controllers\Client;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientPasswordRequest;
use App\Http\Requests\EventRequest;
use App\Http\Requests\UpdateClientProfileRequest;
use App\TicketInfo;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use JD\Cloudder\Facades\Cloudder;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function dashboard()
    {
        $active_user = Auth::user()->id;
        $eventCount = Event::where(['user_id' => $active_user])->count();
        $eventList = DB::table('events')->where(['user_id' => $active_user])->select('events.*', \DB::raw('min(ticket_infos.ticket_price) as min_price, max(ticket_infos.ticket_price) as max_price'))
            ->leftJoin('ticket_infos', 'events.id', '=', 'ticket_infos.event_id')->groupBy('events.id')->latest()->get();
        return view('client.dashboard', compact('eventList', 'eventCount'));
    }

    public function userEventListings()
    {
        $active_user = Auth::user()->id;
        $eventList = DB::table('events')->where(['user_id' => $active_user])->select('events.*', \DB::raw('min(ticket_infos.ticket_price) as min_price, max(ticket_infos.ticket_price) as max_price'))
            ->leftJoin('ticket_infos', 'events.id', '=', 'ticket_infos.event_id')->groupBy('events.id')->get();
        return view('client.eventList', compact('eventList'));
    }

    public function userSetting()
    {
        return view('client.setting');
    }

    public function userSettingPassword(ClientPasswordRequest $request)
    {
        //
        $active_user = Auth::user()->id;
        $user = User::findOrFail($active_user);

        //validate
        $validated = $request->validated();

        $currentPass = Auth::user()->password;

        if (Hash::check($request->old, $currentPass)) {
            $user->password = Hash::make($request->new);
            $user->save();
            Auth::logout();

            $notification = [
                'message' => 'You have successfully updated your password!',
                'alert-type' => 'success'
            ];
            return redirect()->route('login')->with($notification);
        } else {
            $notification = [
                'message' => 'Invalid current password submitted!',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }


    public function userSocialMedia()
    {
        return view('client.socialMedia');
    }

    public function userProfileDetails()
    {
        $userList = Auth::user();
        return view('client.profileDetails', compact('userList'));
    }

    public function userProfileDetailsForm(UpdateClientProfileRequest $request)
    {
        $validated = $request->validated();

        $client = Auth::user();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->phone_number = $request->phone_number;
        $client->contact_address = $request->contact_address;
        $client->state = $request->state;
        $client->country = $request->country;
        $client->zipcode = $request->zipcode;
        $client->dob = $request->dob;

        if ($client->save()) {
            $notification = [
                'message' => 'You have successfully updated your contact profile!',
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

    public function userCreateEvent()
    {
        return view('client.createEvent');

    }

    public function userCreateEventStepOneForm(EventRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();

        $event = new Event;
        $event->event_name = $request->event_name;
        $event->slug = Str::slug($request->event_name, '-');
        $event->event_start_date = $request->event_start_date;
        $event->event_end_date = $request->event_end_date;
        $event->event_start_time = $request->event_start_time;
        $event->event_end_time = $request->event_end_time;
        $event->event_description = $request->event_description;
        $event->event_venue = $request->event_venue;
        $event->organiser_name = $request->organiser_name;
        $event->organiser_email = $request->organiser_email;
        $event->organiser_phone_number = $request->organiser_phone_number;


        try {
            Cloudder::upload($request->file('event_cover_image')->getRealPath());
            $event->event_cover_image = Cloudder::getResult()['url'];
        } catch (\Exception $th) {
            //throw $th;
            // return $th->getMessage();
        }

        // Cloudder::upload($request->file('event_cover_image')->getRealPath());
        // $event->event_cover_image = Cloudder::getResult()['url'];


        $code = str_replace(' ', '', $request->event_name);
        $c = strlen($code);
        $ref = substr($code, 3, $c - 5) . mt_rand(100000, 999999);
        $event->event_uid = $ref;
        $event->user_id = $user->id;


        if ($event->save()) {
            $notification = [
                'message' => 'You have successfully updated event information!',
                'alert-type' => 'success'
            ];
            return redirect()->route('user.create.event.ticket.info', $event->slug);
            // return redirect()->route('user.create.event.ticket.info')->withInput($request->only('event_uid', 'user_id'));;
        } else {
            $notification = [
                'message' => 'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function userCreateEventTicketInfo($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('client.ticketInfo', compact('event'));
    }

    public function userCreateEventStepTwoForm(Request $request, $slug)
    {
        $request->validate([
            'addmore.*.ticket_name' => 'required',
            'addmore.*.ticket_qty' => 'required',
            'addmore.*.ticket_price' => 'required',
        ]);

        foreach ($request->addmore as $key => $value) {
            TicketInfo::create($value);
        }

        $event = Event::where('slug', $slug)->first();

        $event->minimum_age = $request['minimum_age'];
        $event->ticket_sales_start = $request['ticket_sales_start'];
        $event->ticket_sales_end = $request['ticket_sales_end'];
        $event->ticket_sales_limit = $request['ticket_sales_limit'];

        // dd($event);

        if ($event->save()) {
            $notification = [
                'message' => 'You have successfully created an event!',
                'alert-type' => 'success'
            ];
            return redirect()->route('user.dashboard')->with($notification);
        } else {
            $notification = [
                'message' => 'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
            ];
            return redirect()->route('user.dashboard')->with($notification);
        }


    }


    public function userTransaction()
    {
        return view('client.transactions');
    }

    public function userTransactionPreview()
    {
        return view('client.transactionPreview');
    }


}
