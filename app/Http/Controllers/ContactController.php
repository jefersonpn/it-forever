<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the contact form submission.
     */
    public function send(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
        ]);

        // Handle file upload if present
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('attachments', 'public');
        }

        // Send the email
        Mail::to('your-email@example.com')
            ->queue((new ContactFormMail($validated, $filePath))->onQueue('mail'));

        // Return a response
        return back()->with('success', 'Sua mensagem foi enviada com sucesso!');
    }
}
