@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white py-20">
    <div class="max-w-5xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-6">📍 Kontakt</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Info -->
            <div>
                <h4 class="text-2xl font-semibold mb-4">Naša lokacija:</h4>
                <p class="text-gray-300 leading-relaxed">
                    Tehnički pregled <strong>Mega Auto</strong><br>
                    Branka Radičevića 87<br>
                    11550 Lazarevac<br><br>
                    📞 Telefon: <strong>011/811-7641</strong><br>
                    ✉️ Email: <strong>megaautodenix@gmail.com</strong>
                </p>
            </div>

            <!-- Mapa -->
            <div>
                <h4 class="text-2xl font-semibold mb-4">Mapa:</h4>
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <iframe class="w-full h-64 rounded-lg"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2398.04546655676!2d20.252045606663692!3d44.37625705460699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4759ff57625413a1%3A0x461f0aa552ff4f74!2sMega%20Auto!5e0!3m2!1sen!2srs!4v1747761916529!5m2!1sen!2srs"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <!-- Forma -->
        <div class="mt-16">
            <h4 class="text-2xl font-semibold text-center mb-6">📬 Pošaljite nam poruku</h4>

            @if(session('poruka_poslata'))
                <div class="bg-green-600 text-white p-4 rounded-md mb-6 text-center">
                    {{ session('poruka_poslata') }}
                </div>
            @endif

            <form method="POST" action="{{ route('kontakt.posalji') }}" class="max-w-2xl mx-auto bg-gray-800 p-8 rounded-xl shadow-md space-y-6">
                @csrf

                <div>
                    <label for="ime" class="block text-sm font-medium text-gray-300">Vaše ime</label>
                    <input type="text" name="ime" id="ime" class="mt-1 w-full rounded-md bg-gray-700 border border-gray-600 text-white p-2" required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email adresa</label>
                    <input type="email" name="email" id="email" class="mt-1 w-full rounded-md bg-gray-700 border border-gray-600 text-white p-2" required>
                </div>

                <div>
                    <label for="poruka" class="block text-sm font-medium text-gray-300">Poruka</label>
                    <textarea name="poruka" id="poruka" rows="4" class="mt-1 w-full rounded-md bg-gray-700 border border-gray-600 text-white p-2" required></textarea>
                </div>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-2 rounded-md font-semibold transition w-full">
                    Pošalji
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
