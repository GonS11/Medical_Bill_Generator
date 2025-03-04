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
        // Obtener la consulta de la base de datos
        $consult = Consult::with('pacient', 'doctor')->findOrFail($id);

        // Cargar la vista con los datos
        $pdf = Pdf::loadView('certificate.generate_certificate', compact('consult'));

        // Generar el PDF y devolverlo como descarga
        return $pdf->download('certificate-' . now() . '-'  . $consult->id . '.pdf');
    }
}
