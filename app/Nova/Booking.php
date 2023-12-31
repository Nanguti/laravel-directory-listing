<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class Booking extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Booking>
     */
    public static $model = \App\Models\Booking::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
     public function title()
    {
        return __($this->listing->name);
    }
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'accommodation_type', 'check_in_date', 'check_out_date', 'total_charges', 'booking_status', 'guest_count', 'special_requests', 'payment_status', 'payment_method', 'booking_code'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Account'),
            BelongsTo::make('Listing'),
            DateTime::make('Check In Date')->required(),
            DateTime::make('Check Out Date')->required(),
            Number::make('Phone Number')->required(),
            Text::make('Email')->required(),
            Select::make('Booking Status')->options([
                'pending' => 'Pending',
                'Cancelled' => 'Cancelled',
                'Confirmed' => 'Confirmed'
            ]),
            Number::make('Guest Count'),
            TextArea::make('Special Requests'),
            Select::make('Payment Status')->options([
                'Paid' => 'Paid',
                'Pending' => 'Pending',
                'Failed' => 'Failed'
            ]),
            Select::make('Payment Method')->options([
                'Cash' => 'Cash',
                'Mpesa' => 'Mpesa',
                'Credit Card' => 'Credit Card',
            ])->required(),
            Number::make('Total Charges'),
            Text::make('Booking Code')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
