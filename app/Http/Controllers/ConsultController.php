<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultRequest;
use App\Models\Bill;
use App\Models\Consult;
use App\Models\Doctor;
use App\Models\Pacient;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class ConsultController extends Controller
{
    public function index(): View
    {
        $consults = Consult::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->select('id', 'date', 'hour', 'username', 'dni')
            ->orderBy('date', 'asc')
            ->get();

        return view('consults.index', compact('consults'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        $pacients = Pacient::all();
        return view('consults.create', compact('doctors', 'pacients'));
    }

    public function store(ConsultRequest $request)
    {
        Consult::create($request->validated());

        return redirect()->route('consults.index')->with('success', 'Consult created succesfully');
    }

    public function show(String $id)
    {
        $bill = Bill::where('consult_id', '=', $id)->first();

        $pdf = Pdf::loadView('consults.generate_bill', compact('bill'));

        return $pdf->download('bill-' . now()->format('Y-m-d-H-i-s') . '-' . $bill->id . '.pdf');
    }

    public function edit(Consult $consult)
    {
        $doctors = Doctor::all();
        $pacients = Pacient::all();
        return view('consults.edit', compact('consult', 'doctors', 'pacients'));
    }

    public function update(ConsultRequest $request, Consult $consult)
    {
        $consult->update($request->validated());
        return redirect()->route('consults.index')->with('success', 'Consult updated successfully');
    }

    public function destroy(Consult $consult)
    {
        $consult->delete();

        return redirect()->route('consults.index')->with('success', 'Consult deleted succesfully');
    }
}
