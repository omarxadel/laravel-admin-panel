<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view("auth.forget-password");
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users",
        ]);

        $token = Str::random(64);

        DB::table("password_resets")->insert([
            "email" => $request->email,
            "token" => $token,
            "created_at" => Carbon::now(),
        ]);

        Mail::send("email.forgot-password", ["token" => $token], function (
            $message
        ) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return back()->with(
            "status",
            "We have e-mailed your password reset link!"
        );
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm(Request $request)
    {
        return view("auth.reset-password", ["request" => $request]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|string|min:6|confirmed",
            "password_confirmation" => "required",
        ]);

        $updatePassword = DB::table("password_resets")
            ->where([
                "email" => $request->email,
                "token" => $request->token,
            ])
            ->first();
        error_log($request->email);
        error_log($request->token);

        if (!$updatePassword) {
            return back()->withErrors(["msg" => "Invalid Token"]);
        }

        $user = User::where("email", $request->email)->update([
            "password" => Hash::make($request->password),
        ]);

        DB::table("password_resets")
            ->where(["email" => $request->email])
            ->delete();

        return redirect("/login")->with(
            "message",
            "Your password has been changed!"
        );
    }
}
