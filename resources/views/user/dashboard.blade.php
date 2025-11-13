<x-app-layout>
    <div class="p-6 text-grey-900">
        <h1 class="text-2xl font-bold mb-4">User Dashboard</h1>
        <p>Hello, {{ Auth::user()->name }}! Kamu login sebagai <b>User</b>.</p>
    </div>
</x-app-layout>
