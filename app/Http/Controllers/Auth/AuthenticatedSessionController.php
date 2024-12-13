<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Log the current user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Auth::logout();

        // Redirect ke halaman utama atau halaman login
        return redirect('/');  // Sesuaikan URL tujuan setelah logout
    }
}
