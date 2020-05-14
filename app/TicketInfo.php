<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketInfo extends Model
{
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ticket_name', 'ticket_qty', 'ticket_price', 'event_id'];

    public function event()
    {
//        return $this->belongsTo(Event::class,'event_id')->withDefault();
        return $this->belongsTo(Event::class);
    }
//    public function getMinAttribute(){
//        // dd($this->ticket_price);
//        // $prices = $this->ticket_price->filter(function($p){
//        //     return !is_null($p->ticket_price);
//        // });
//        $p =  $this->ticket_price->where('ticket_price','!=',null)->min('ticket_price');
//        dd($p);
//    }


}
