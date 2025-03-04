<?php

namespace App\Http\Controllers;

use App\Models\Consult;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(): View
    {
        $consults = Consult::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->select('id', 'date', 'hour', 'username', 'dni')
            ->get();

        return view('certificate.index', compact('consults'));
    }

    public function show(String $id)
    {
        $consult = Consult::with('pacient', 'doctor')->findOrFail($id);

        $pdf = Pdf::loadView('certificate.generate_certificate', compact('consult'));

        return $pdf->download('bill-' . now()->format('Y-m-d-H-i-s') . '-' . $consult->id . '.pdf');
    }
}
