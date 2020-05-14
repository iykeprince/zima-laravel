<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'event_uid', 'event_name', 'event_start_date', 'event_end_date', 'event_start_time', 'event_end_time', 'event_description', 'event_venue', 'organiser_name', 'organiser_email', 'organiser_phone_number', 'event_cover_image', 'minimum_age', 'ticket_sales_start', 'ticket_sales_end', 'ticket_sales_limit'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'event_name'
            ]
        ];
    }

    public function user_event()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function tickets()
    {
        return $this->hasMany(TicketInfo::class, 'event_id');
    }


}
