<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Contracts\LoginResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                if(Auth()->User()->is_admin || Auth()->User()->is_owner){
                    return redirect('/dashboard/orders')->with('success', 'Selamat Datang, '.Auth()->user()->name.'!');
                }else{
                    return redirect('/room')->with('success', 'Selamat Datang ' . Auth()->User()->name . '!');
                }
            }
        });
        
        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
            public function toResponse($request)
            {
                return redirect('/login')->with('success', 'Anda berhasil logout!');
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);


        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Fortify::registerView(function() {
        //     return view('auth.register', ["title" => "Register"])->with('success', 'Akun Berhasil Terdaftar, silahkan Login terlebih dahulu!');
        // });

        Fortify::loginView(function() {
            return view('auth.login', ["title" => "Login"]);
        });

        Fortify::requestPasswordResetLinkView(function() {
            return view('auth.forgot-password', ['title' => 'Lupa Password']);
        });

        Fortify::resetPasswordView(function($request) {
            return view('auth.reset-password', [
                'title' => 'Reset Password',
                'request' => $request]);
        });


        
        
    }
}
