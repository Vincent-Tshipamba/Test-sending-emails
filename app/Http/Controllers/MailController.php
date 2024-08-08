<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Mail as Smail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function send(Request $request)
    {
        $user_exists = User::where('email', $request->email)->first();
        if (isset($user_exists)) {
            try {
                $destinataire = User::where('email', $user_exists->email)->first();
                $destinataire->notify(new InvoicePaid($user_exists));


                return "E-mail envoyé avec succès!";
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            $user_exists = User::firstOrCreate([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            try {
                $destinataire = User::where('email', $user_exists->email)->first();
                $destinataire->notify(new InvoicePaid($user_exists));
                return "E-mail envoyé avec succès!";
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mail $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
