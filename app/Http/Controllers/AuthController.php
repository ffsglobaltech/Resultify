<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Show the super admin login form.
     */
    public function showSuperAdminLogin()
    {
        return view('auth.super_admin_login');
    }

    /**
     * Handle the super admin login.
     */
    public function superAdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->route('super_admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    /**
     * Show the school registration form based on the plan.
     */
    public function showSchoolRegister($plan)
    {
        return view('auth.school_register', compact('plan'));
    }

    /**
     * Handle the school registration.
     */
    public function schoolRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:50|unique:schools',
            'domain' => 'required|string|max:255|unique:schools',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'contact_phone' => 'required|string|max:20',
        ]);

        // Create the school
        $school = School::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'domain' => Str::slug($request->short_name) . '.' . config('app.domain'), // Set subdomain
            'contact_email' => $request->email,
            'contact_phone' => $request->contact_phone,
        ]);

        // Create the school admin user
        $schoolAdmin = User::create([
            'school_id' => $school->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'principal', // School admin role
        ]);

        Auth::login($schoolAdmin);

        return redirect()->route('school.dashboard', ['subdomain' => $school->short_name]);
    }

    /**
     * Show the school login form.
     */
    public function showSchoolLogin()
    {
        return view('auth.school_login');
    }

    /**
     * Handle school login.
     */
    public function schoolLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->route('school.dashboard', ['subdomain' => Auth::user()->school->short_name]);
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    /**
     * Show teacher login form.
     */
    public function showTeacherLogin()
    {
        return view('auth.teacher_login');
    }

    /**
     * Handle teacher login.
     */
    public function teacherLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->route('teacher.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    /**
     * Show parent login form.
     */
    public function showParentLogin()
    {
        return view('auth.parent_login');
    }

    /**
     * Handle parent login.
     */
    public function parentLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->route('parent.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    /**
     * Log the user out.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
