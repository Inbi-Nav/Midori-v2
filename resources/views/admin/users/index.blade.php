@extends('layouts.admin')

@section('content')
<h1 class="zen-font text-2xl font-bold mb-6 text-green-400">
    Users
</h1>
<div class="bg-gray-900 rounded-xl shadow border border-gray-800 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-800 text-gray-400">
            <tr>
                <th class="p-4 text-left">Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr class="border-t border-gray-800 {{ $user->role === 'admin' ? 'bg-green-900/30' : 'hover:bg-gray-800/60'}}">
                    <td class="p-4 font-medium">
                        {{ $user->name }}
                    </td>
                    <td class="text-gray-400">
                        {{ $user->email }}
                    </td>
                    <td>
                        @if($user->role === 'admin')
                            <span class="px-2 py-1 text-xs rounded-full bg-green-600/20 text-green-400">
                                ADMIN
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-700 text-gray-300">
                                USER
                            </span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
