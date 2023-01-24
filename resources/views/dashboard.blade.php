<x-app-layout>
    <x-slot name="header">
        <div class="top-buttons">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{ route('projects.addproject') }}">
            {{ __('Create New Project') }}
        </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   # ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    File Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Created
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
    @foreach($data as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $user->id }}
                </th>
                <td class="px-6 py-4">
                   {{ $user->name }}
                </td>
                <td class="px-6 py-4">
                   {{ $user->file_name }}
                </td>
                 <td class="px-6 py-4">
                   {{ $user->status }}
                </td> 
                    <td class="px-6 py-4">
                   {{ $user->created_at }}
                </td>
                <td class="px-6 py-4">
              

                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"><a href="{{ route('projects.singleproject',['id'=>$user->id ]) }}">View</a></button>
                

                </td>
            </tr>
            @endforeach

          
        </tbody>
    </table>
    {!! $data->links() !!}
</div>

            </div>
        </div>
    </div>
</x-app-layout>
