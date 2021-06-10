<?php

namespace Adminetic\Contact\Provider;

use Livewire\Livewire;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Adminetic\Contact\Models\Admin\Contact;
use Adminetic\Contact\Policies\ContactPolicy;
use Adminetic\Contact\Repositories\ContactRepository;
use Adminetic\Contact\Contracts\ContactRepositoryInterface;
use Adminetic\Contact\Contracts\GroupRepositoryInterface;
use Adminetic\Contact\Http\Livewire\Admin\Contact\ContactTable;
use Adminetic\Contact\Http\Livewire\Admin\Contact\ToggleActiveContact;
use Adminetic\Contact\Http\Livewire\Admin\Contact\ToggleFavoriteContact;
use Adminetic\Contact\Repositories\GroupRepository;

class ContactServiceProvider extends ServiceProvider
{
    // Register Policies
    protected $policies = [
        Contact::class => ContactPolicy::class,
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish Ressource
        if ($this->app->runningInConsole()) {
            $this->publishResource();
        }
        // Register Resources
        $this->registerResource();
        // Register Policies
        $this->registerPolicies();
        // Register Livewire Components
        $this->registerLivewire();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /* Repository Interface Binding */
        $this->repos();
    }

    /**
     * Publish Package Resource.
     *
     *@return void
     */
    protected function publishResource()
    {
        // Publish Config File
        $this->publishes([
            __DIR__ . '/../../config/contact.php' => config_path('contact.php'),
        ], 'contact-config');
        // Publish View Files
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/adminetic/plugin/contact'),
        ], 'contact-views');
        // Publish Migration Files
        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path('migrations'),
        ], 'contact-migrations');
    }

    /**
     * Register Package Resource.
     *
     *@return void
     */
    protected function registerResource()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations'); // Loading Migration Files
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'contact'); // Loading Views Files
        $this->registerRoutes();
    }

    /**
     * Register Routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        });
    }

    /**
     * Register Route Configuration.
     *
     * @return void
     */
    protected function routeConfiguration()
    {
        return [
            'prefix' => config('contact.prefix', 'admin'),
            'middleware' => config('contact.middleware', ['web', 'auth']),
        ];
    }

    /**
     * Register Livewire Components
     *
     *@return void
     */
    protected function registerLivewire()
    {
        Livewire::component('admin.contact.contact-table', ContactTable::class);
        Livewire::component('admin.contact.toggle-active-contact', ToggleActiveContact::class);
        Livewire::component('admin.contact.toggle-favorite-contact', ToggleFavoriteContact::class);
    }


    /**
     * Repository Binding.
     *
     * @return void
     */
    protected function repos()
    {
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
    }

    /**
     * Register Policies.
     *
     *@return void
     */
    protected function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }
}
