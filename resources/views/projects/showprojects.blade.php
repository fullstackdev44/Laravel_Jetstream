
  
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
       

    </x-slot>

 
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
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Button
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $user)
   {{ $user->id }} {{ $user->name }} 
@endforeach
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   1
                </th>
                <td class="px-6 py-4">
                    Sliver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
              

   <button type="button" class="bg-blue-500 py-2 px-4">View</button>
                  <button type="button" class="bg-blue-500 py-2 px-4" >Edit</button>
                   <button type="button" class="bg-blue-500 py-2 px-4">Delete</button>

                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                 2
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                 <button type="button" class="bg-blue-500 py-2 px-4">View</button>
                  <button type="button" class="bg-blue-500 py-2 px-4" >Edit</button>
                   <button type="button" class="bg-blue-500 py-2 px-4">Delete</button>

                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  3
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">

                  <button type="button" class="bg-blue-500 py-2 px-4">View</button>
                  <button type="button" class="bg-blue-500 py-2 px-4" >Edit</button>
                   <button type="button" class="bg-blue-500 py-2 px-4">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>


</x-app-layout>
