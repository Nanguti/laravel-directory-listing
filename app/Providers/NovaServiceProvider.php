<?php

namespace App\Providers;

use App\Nova\AccommodationType;
use App\Nova\Account;
use App\Nova\Amenity;
use App\Nova\Booking;
use App\Nova\Category;
use App\Nova\Comment;
use App\Nova\Dashboards\MainDashboard;
use App\Nova\Listing;
use App\Nova\Post;
use App\Nova\RatingReview;
use App\Nova\Tag;
use App\Nova\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Vyuldashev\NovaPermission\NovaPermissionTool;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::mainMenu(function () {
            return [

                MenuSection::dashboard(MainDashboard::class)->icon('chart-bar'),

                MenuSection::make('User Management', [
                    MenuItem::resource(User::class),
                    MenuItem::resource(Account::class),
                ])->icon('users')->collapsable(),

                MenuSection::make('Listings', [
                    MenuItem::resource(AccommodationType::class),
                    MenuItem::resource(Listing::class),
                    MenuItem::resource(Amenity::class),
                    MenuItem::resource(Booking::class),                    
                    MenuItem::resource(RatingReview::class),
                ])->icon('document-text')->collapsable(),

                MenuSection::make('CMS', [
                    MenuItem::resource(Category::class),
                    MenuItem::resource(Post::class),
                    MenuItem::resource(Tag::class),
                    MenuItem::resource(Comment::class)
                ])->icon('document-text')->collapsable(),
                
                MenuSection::make('Roles & Permissions', [
                    MenuItem::make('Roles',"/resources/roles"),
                    MenuItem::make('Permissions',"/resources/permissions"),
                ])->icon('lock-closed')->collapsable(),
                
                    
            ];
        });

        Nova::style('prism-css', asset('assets/prism.css'));
        Nova::script('prism-js', asset('assets/prism.js'));
        
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new NovaPermissionTool,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
