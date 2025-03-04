<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/pdf.css') }}">
    <title>Medical Certificate</title>
</head>

<body>
    <div class="container mx-auto p-5 border border-gray-400 rounded-lg shadow-md bg-white">
        <div class="text-center">
            <img src="{{ public_path('assets/img/Logo.jpg') }}" alt="Consult logo" class="max-w-[100px] mx-auto">
            <hr class="my-4">
            <h3 class="text-2xl text-blue-600 font-semibold">Medical Assistance Certificate</h3>
        </div>

        <p class="mt-4">
            We hereby certify that <strong>{{ $consult->pacient->name }} {{ $consult->pacient->surname }}</strong>,
            holder of the DNI number <strong>{{ $consult->pacient->dni }}</strong>, attended our medical facility
            on <strong>{{ $consult->date }}</strong> at <strong>{{ $consult->hour }}</strong>.
        </p>

        <p class="mt-2">
            The consultation was carried out by Dr. <strong>{{ $consult->doctor->name }}
                {{ $consult->doctor->surname }}</strong>.
            This certificate is issued upon patient request for any necessary purposes.
        </p>

        <p class="text-center mt-4">
            <strong>Issued on: {{ today() }}</strong>
        </p>

        <div class="signature mt-10">
            <div class="signature-label">Doctor’s Signature</div>
        </div>
    </div>
</body>

</html>
