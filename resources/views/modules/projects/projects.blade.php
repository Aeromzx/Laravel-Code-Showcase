<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projekte') }}
            <button onclick="create()" class="circular ui blue icon button"><i class="plus icon"></i></button>
        </h2>
    </x-slot>

    @include('modules.projects.form.createNewProjectModal')
    @include('modules.projects.form.deleteModal')
    @include('modules.projects.form.changeProjectModal')

    <div class="pt-4">
        <div class="ui segment" style="margin-right: 20px; margin-left: 20px">

            <div class="ui five centered stackable cards">
                @forelse($projects as $project)
                    <div style="margin: 10px"
                         class="mt-4 mb-4  bg-white text-black w-full max-w-md flex flex-col rounded-xl shadow-lg p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="rounded-full w-4 h-4 border border-blue-500"></div>
                                <div class="text-md font-bold">{{$project -> customer -> customerCompanyName}}</div>
                            </div>
                            <div class="flex items-center space-x-4">

                                <div class="text-red-500 hover:text-red-300 cursor-pointer"
                                     onclick="destroy({{$project -> id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>

                                <div class="text-gray-500 hover:text-gray-300 cursor-pointer"
                                     onclick="change({{$project -> id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>

                                <div class="text-blue-500 hover:text-blue-300 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                                    </svg>
                                </div>

                            </div>
                        </div>
                        <div class="mt-4 text-gray-500 font-bold text-sm">
                            <span class="text-gray-800 text-base">{{$project -> projectName}}</span>
                            <br> <br>

                            <b>{{$project -> projectDescription}}</b>

                            <p class="ui divider"></p>
                            <div class="extra content" style="text-align: center">
                                <a>
                                    <i class="clipboard icon"></i>
                                    22 Todos
                                </a>

                                <a style="margin-left: 10px">
                                    <i class="calendar alternate icon"></i>
                                    {{date('d.m.Y', strtotime($project -> projectDeadline))}}
                                </a>

                                <a style="margin-left: 10px">
                                    <i class="thermometer three quarters icon"></i>
                                    @if($project -> projectPrioritization == 0)
                                        Low
                                    @elseif($project -> projectPrioritization == 1)
                                        Normal
                                    @else
                                        High
                                    @endif
                                </a>
                            </div>

                        </div>
                    </div>
                @empty
                    <h1 style="text-align: center">
                        <div
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <!-- Heroicon name: outline/exclamation -->
                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900"
                                            id="modal-title">
                                            Kein Projekt Angelget
                                        </h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">
                                               Es wurden keine Projekte angelegt, Um die "Projektverwaltung" zu nutzen
                                                Lege ein Projekt an!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button onclick="create()" type="button"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Erstellen
                                </button>
                            </div>
                        </div>
                    </h1>
                @endforelse

            </div>

        </div>
    </div>

</x-app-layout>

<script>
    function create() {
        $('.ui.newProject.normal.modal')
            .modal('show');
    }

    function change(id) {
        $('.ui.changeProject.normal.modal.' + id)
            .modal('show');
    }

    function destroy(id) {
        document.getElementById("destroyButton").href = "/projects/destroy/" + id;
        $('.ui.deleteProject.tiny.modal')
            .modal('show')
        ;
    }

</script>
