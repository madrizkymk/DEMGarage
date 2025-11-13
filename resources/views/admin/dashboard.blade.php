@extends('app')
@section('content')
<main class="flex-grow flex justify-center items-center">
    <div class="bg-gray-200 rounded-xl flex gap-8 px-10 py-10">

      <!-- Incoming -->
      <div class="bg-white rounded-md shadow-md w-40 h-40 flex flex-col justify-center items-center hover:bg-gray-100 transition">
        <img src="https://img.icons8.com/ios-filled/100/000000/todo-list.png" alt="Incoming" class="w-12 h-12 mb-2">
        <p class="text-sm font-semibold">Incoming</p>
      </div>

      <!-- Service Result Update -->
      <div class="bg-white rounded-md shadow-md w-40 h-40 flex flex-col justify-center items-center hover:bg-gray-100 transition">
        <img src="https://img.icons8.com/ios-filled/100/000000/task.png" alt="Service Result Update" class="w-12 h-12 mb-2">
        <p class="text-sm font-semibold text-center leading-tight">Service Result<br>Update</p>
      </div>

    </div>
</main>

@endsection
