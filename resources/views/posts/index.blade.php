<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                    <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <span class="font-medium">Sukses!</span>{{ session('success') }}
                        </div>
                    </div>
                    @endif
                    <a href="{{ route('post.create') }}">
                        <button class="bg-gray-500 font-semibold text-white py-2 px-4 border rounded-md m-2">
                            Tambah Data
                        </button>
                    </a>
                    <table class="w-full table-auto border mt-3">
                        <thead class="border-b">
                            <tr>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">No</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">Judul</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">Deskripsi</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">DiUpload</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">DiUpdate</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $item)
                            <tr>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{
                                    $item->id }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{
                                    $item->judul
                                    }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{
                                    $item->deskripsi }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                    {{
                                    $item->created_at }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{
                                    $item->updated_at }}</td>
                                <td>
                                    <form action="{{ route('post.destroy', $item->id) }}" method="post"
                                        onsubmit="return confirm('Apakah Anda Yakin??')">
                                        <a href="{{ route('post.edit', $item->id) }}" id="{{ $item->id }}-edit-btn">
                                            <button type="button"
                                                class="border-2 border-blue-600 rounded-lg px-3 py-2 text-blue-400 cursor-pointer hover:bg-blue-600 hover:text-blue-200">
                                                Edit
                                            </button>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="{{ $item->id }}-detele-btn"
                                            class="border-2 border-red-600 rounded-lg px-3 py-2 text-red-400 cursor-pointer hover:bg-red-600 hover:text-red-200">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>