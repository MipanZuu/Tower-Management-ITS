@extends('layouts.header')
@section('content')
<div class="overflow-x-auto shadow-md sm:rounded-lg h-screen">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Staff 
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus ex repellat ipsum, voluptatibus voluptate vel ab natus quis fugiat consequatur, enim assumenda eveniet sunt reprehenderit odit non dolore eum est.</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Lantai
                </th>
                <th scope="col" class="px-6 py-3">
                    Kelas
                </th>
                <th scope="col" class="px-6 py-3">
                    No Telp
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Denta Bramasta
                </th>
                <td class="px-6 py-4">
                    Lantai 1
                </td>
                <td class="px-6 py-4">
                    IF108
                </td>
                <td class="px-6 py-4">
                    08222222656
                </td>
                <td class="px-6 py-4">
                    denta@gmail.com
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection