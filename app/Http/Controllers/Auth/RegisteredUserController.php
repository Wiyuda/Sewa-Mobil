<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sim' => ['required', 'numeric', 'min_digits:14',  'max_digits:14', 'unique:'.User::class],
            'no_telp' => ['required', 'numeric', 'min_digits:12',  'max_digits:13'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'sim' => $request->sim,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'password' => Hash::make($request->password),
            ]);
            
            $user->assignRole('customer');
            
            event(new Registered($user));
            
            Auth::login($user);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            $messageError = 'Maaf terjadi masalah saat proses registrasi, silahkan coba kembali';
            return back()->with('messageError', $messageError);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
