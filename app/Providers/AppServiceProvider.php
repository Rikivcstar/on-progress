<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Product::class, ProductPolicy::class);
        Gate::define('manage-products', fn ($user) => $user->isAdmin() || $user->isSeller());
         Product::observe(ProductObserver::class);
         Blade::directive('rupiah', function ($expression) {
            return "<?php echo 'Rp' . number_format($expression, 0, ',', '.'); ?>";
        });
    }
}
