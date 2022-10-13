@extends('layout.master')

@section('titulo', 'Todas las motos de Larabikes')

@section('contenido')
@can('view', Auth::user() )

{{-- formulario de busqueda --}}
        {{-- {{ $users->links() }} --}}
        <div class="container mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="p-4 border-b border-gray-200 shadow">
                        <!-- <table> -->
                        <table id="dataTable" class="p-4">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="p-8 text-xs text-gray-500">
                                        ID
                                    </th>
                                    <th class="p-8 text-xs text-gray-500">
                                        Name
                                    </th>
                                    <th class="p-8 text-xs text-gray-500">
                                        Email
                                    </th>
                                    <th class="p-8 text-xs text-gray-500">
                                        ALTA
                                    </th>
                                    <th class="p-8 text-xs text-gray-500">
                                        Nº de MOTOS
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Edit
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($users as $user)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{ $user->id }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-500">
                                                {{ $user->email }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{ $user->created_at }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{ $user->bikes_count }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="#"
                                                class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="#"
                                                class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();

            });
        </script>
        {{-- {{ $users->links() }} --}}
@endcan

@endsection
