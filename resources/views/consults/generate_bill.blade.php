<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/pdf.css') }}">
    <title>Medical Bill</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        hr {
            border-top: 1px solid #d1d5db;
        }
    </style>
</head>

<body>
    <div class="container mx-auto p-8 border border-gray-300 rounded-lg shadow-lg bg-white">
        <div class="text-center">
            <img src="{{ public_path('assets/img/Logo.jpg') }}" alt="Consult logo" class="max-w-[150px] mx-auto mb-6">
            <h2 class="text-3xl text-blue-600 font-semibold">Medical Bill</h2>
            <hr class="my-4 border-t-2 border-gray-300">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Bill Details</h4>
                <ul class="text-sm text-gray-600">
                    <li><strong>Bill Number:</strong> {{ $bill->id }}</li>
                    <li><strong>Date:</strong> {{ $bill->date }}</li>
                </ul>
            </div>

            <div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Consult Details</h4>
                <ul class="text-sm text-gray-600">
                    <li><strong>Consult ID:</strong> {{ $bill->consult_id }}</li>
                </ul>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Patient Details</h4>
                <ul class="text-sm text-gray-600">
                    <li><strong>Name:</strong> {{ $bill->consult->pacient->name }}</li>
                    <li><strong>Surname:</strong> {{ $bill->consult->pacient->surname }}</li>
                    <li><strong>DNI:</strong> {{ $bill->consult->pacient->dni }}</li>
                    <li><strong>Phone:</strong> {{ $bill->consult->pacient->telephone }}</li>
                </ul>
            </div>

            <div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Bill Amount</h4>
                <ul class="text-sm text-gray-600">
                    <li><strong>Amount:</strong>
                        @if ($bill->consult->pacient->insurance === 'insured')
                            30 € (IVA included)
                        @else
                            80 € (IVA included)
                        @endif
                    </li>
                </ul>
            </div>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                <strong>Issued on:</strong> {{ today() }}
            </p>
        </div>

        <hr class="my-6 border-t-2 border-gray-300">

        <div class="text-center">
            <p class="text-xs text-gray-500">This is an automatically generated invoice. No signature required.</p>
        </div>
    </div>
</body>

</html>
