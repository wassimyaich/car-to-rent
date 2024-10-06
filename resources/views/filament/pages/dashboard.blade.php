<x-filament-panels::page>
    <div class="space-y-6">
        <h1 class="text-2xl font-bold">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg">Total Revenue</h2>
                <p class="text-xl">${{ number_format($totalRevenue, 2) }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg">Revenue This Month</h2>
                <p class="text-xl">${{ number_format($monthlyRevenue, 2) }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg">Revenue Today</h2>
                <p class="text-xl">${{ number_format($todayRevenue, 2) }}</p>
            </div>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg">Latest Reservation</h2>
            @if ($latestReservation)
                <p class="text-md">Reservation ID: {{ $latestReservation->id }}</p>
                <p class="text-md">User ID: {{ $latestReservation->user_id }}</p>
                <p class="text-md">Total Cost: ${{ number_format($latestReservation->total_cost, 2) }}</p>
                <p class="text-md">Status: {{ $latestReservation->status }}</p>
                <p class="text-md">Created At: {{ $latestReservation->created_at }}</p>
            @else
                <p>No reservations found.</p>
            @endif
        </div>
    </div>
</x-filament-panels::page>
