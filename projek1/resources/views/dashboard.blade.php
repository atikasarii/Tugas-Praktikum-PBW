<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <div class="grid grid-cols-4 gap-4 mb-6">
        <x-card>
            <div class="text-sm text-gray-500">Omzet Hari Ini</div>
            <div class="text-2xl font-bold">Rp {{ number_format($omzetHariIni, 0, ',', '.') }}</div>
            @php
                $selisih = $omzetKemarin > 0 ? (($omzetHariIni - $omzetKemarin) / $omzetKemarin) * 100 : null;
            @endphp
            <div class="text-xs mt-1 {{ $selisih !== null && $selisih < 0 ? 'text-red-600' : 'text-green-600' }}">
                @if ($selisih === null)
                    Belum ada data kemarin
                @else
                    {{ $selisih >= 0 ? '+' : '' }}{{ number_format($selisih, 1) }}% dari kemarin
                @endif
            </div>
        </x-card>

        <x-card>
            <div class="text-sm text-gray-500">Transaksi Hari Ini</div>
            <div class="text-2xl font-bold">{{ $transaksiHariIni }}</div>
        </x-card>

        <x-card>
            <div class="text-sm text-gray-500">Produk Stok Menipis</div>
            <div class="text-2xl font-bold {{ $produkMenipis > 0 ? 'text-red-600' : '' }}">{{ $produkMenipis }}</div>
            <div class="text-xs mt-1 text-gray-500">Stok di bawah 10</div>
        </x-card>

        <x-card>
            <div class="text-sm text-gray-500">Pengguna</div>
            <div class="text-lg font-bold">{{ auth()->user()->name }}</div>
            <div class="text-xs mt-1 text-gray-500">{{ ucfirst(auth()->user()->role) }}</div>
        </x-card>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <x-card class="col-span-2">
            <h3 class="font-semibold mb-3">Tren Penjualan 7 Hari Terakhir</h3>
            <canvas id="chartTren" height="120"></canvas>
        </x-card>

        <x-card>
            <h3 class="font-semibold mb-3">5 Produk Terlaris</h3>
            <ol class="list-decimal list-inside space-y-1 text-sm">
                @forelse ($produkTerlaris as $p)
                    <li>{{ $p->name }} <span class="text-gray-500">({{ $p->total_qty }} terjual)</span></li>
                @empty
                    <li class="list-none text-gray-500">Belum ada penjualan.</li>
                @endforelse
            </ol>
        </x-card>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            new window.Chart(document.getElementById('chartTren'), {
                type: 'line',
                data: {
                    labels: @json($labelTren),
                    datasets: [{
                        label: 'Omzet (Rp)',
                        data: @json($dataTren),
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        fill: true,
                        tension: 0.3,
                    }],
                },
                options: { plugins: { legend: { display: false } } },
            });
            });
        </script>
    @endpush
</x-app-layout>