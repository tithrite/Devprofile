<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generate($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        
        $pdf = Pdf::loadView('pdf.cv', compact('user'));
        
        return $pdf->download('cv-' . $user->username . '.pdf');
    }
} 