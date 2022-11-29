@extends('layout.app')

@section('content')
    <x-card class="p-10">
        <div class="sm:flex items-center justify-between">
            <div class="flex items-center">
                <h1 class="text-lg font-medium leading-none text-blue">Project Repository Name</h1>
            </div>
            <div>
                <button id="open"
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                    <p class="text-sm font-medium leading-none text-white">Add Folder</p>
                </button>
                <button id="open-file-modal"
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                    <p class="text-sm font-medium leading-none text-white">Upload Files</p>
                </button>

                <div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-700 bg-opacity-60"></div>

                <!-- The dialog for Add Folder -->
                <div id="dialog"
                    class="hidden fixed z-50 top-1/4z left-1/2 -translate-x-1/2 -translate-y-1/2 w-2/5 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                    <h1 class="text-xl font-semibold">Add folder in your repository</h1>
                    <button type="button" id="close"
                        class="absolute top-2 right-6 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="crypto-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <form action="{{ route('repository.folder') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="py-5 border-t border-b border-gray-300">


                            <label for="email-address-icon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Folder Name</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
                                        className="w-6 h-6">
                                        <path strokeLinecap="round" strokeLinejoin="round"
                                            d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </div>
                                <input type="hidden" name="project_id" value="{{ $project_id }}">

                                <input type="text" id="email-address-icon"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Database Folder..." name="folder">
                            </div>


                        </div>
                        <div class="flex justify-end pt-5">
                            <!-- This button is used to close the dialog -->
                            <button id="close"
                                class="px-5 py-2 bg-gray-500 hover:bg-gray-700 text-white cursor-pointer rounded-md">
                                Close</button>
                            <button id="close"
                                class="px-5 py-2 bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md ml-1">
                                Save</button>
                        </div>
                    </form>
                </div>

                <div id="overlay-file" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-700 bg-opacity-60"></div>

                <!-- The dialog for Upload Files -->
                <div id="dialog-file"
                    class="hidden fixed z-50 top-1/4z left-1/2 -translate-x-1/2 -translate-y-1/2 w-2/5 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                    <h1 class="text-xl font-semibold">Add files in your repository</h1>
                    <button type="button" id="close-file"
                        class="absolute top-2 right-6 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="crypto-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>

                    <form action="{{ route('repository.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="py-5 border-t border-b border-gray-300">


                            <label for="email-address-icon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload files:</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
                                        className="w-6 h-6">
                                        <path strokeLinecap="round" strokeLinejoin="round"
                                            d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                </div>

                                <input type="hidden" name="project_id" value="{{ $project_id }}">
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                file:rounded-full file:bg-gradient-to-b file:from-blue-500 file:to-blue-600 file:border-none file:text-white file:cursor-pointer"
                                    id="multiple_files" type="file" name="attachment[]" multiple>
                            </div>


                        </div>
                        <div class="flex justify-end pt-5 ">
                            <!-- This button is used to close the dialog -->
                            <button id="close-file"
                                class="px-5 py-2 bg-gray-500 hover:bg-gray-700 text-white cursor-pointer rounded-md">
                                Close</button>
                            <button
                                class="px-5 py-2 bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md ml-1">
                                Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    File Name</th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Action</th>

                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach ($folders as $folder)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" width="10%">
                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
                                            className="w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                        </svg>

                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" width="70%">
                                        <div class="text-sm leading-5 text-gray-500">{{ $folder->folder_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" width="20%">
                                        <div class="text-sm leading-5 text-gray-500"><a href=""
                                                class="font-medium text-green-600 hover:green-red-500">Open</a></div>
                                    </td>
                                </tr>
                            @endforeach
                            @unless($project_files->isEmpty())
                                @foreach ($project_files as $project)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" width="10%">
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" width="70%">
                                            <div class="text-sm leading-5 text-gray-500">{{ $project->file_name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" width="20%">
                                            <div class="text-sm leading-5 text-gray-500 flex"><a
                                                    href=" {{ asset('storage/' . $project->file_path) }}" download
                                                    class="font-medium text-blue-600 hover:text-blue-500 mr-1">Download</a> |
                                                <form action={{ route('repository.destroy', $project->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="font-medium text-red-600 hover:text-red-500 ml-1">Remove</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" colspan="5">
                                        <div class="text-sm leading-5 text-gray-500 text-center">No Project Found</div>
                                    </td>
                                </tr>
                            @endunless
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-card>
@endsection
@section('script')
    <script>
        var openButton = document.getElementById('open');
        var openButtonFile = document.getElementById('open-file-modal');
        var dialog = document.getElementById('dialog');
        var dialogFile = document.getElementById('dialog-file');
        var closeButton = document.getElementById('close');
        var closeButtonFile = document.getElementById('close-file');
        var overlay = document.getElementById('overlay');
        var overlayFile = document.getElementById('overlay-file');


        // show the overlay and the dialog
        openButton.addEventListener('click', function() {
            dialog.classList.remove('hidden');
            overlay.classList.remove('hidden');
        });

        openButtonFile.addEventListener('click', function() {
            dialogFile.classList.remove('hidden');
            overlayFile.classList.remove('hidden');
        });

        // hide the overlay and the dialog
        closeButton.addEventListener('click', function() {
            dialog.classList.add('hidden');
            overlay.classList.add('hidden');
        });

        closeButtonFile.addEventListener('click', function() {
            dialogFile.classList.add('hidden');
            overlayFile.classList.add('hidden');
        });
    </script>
@endsection
