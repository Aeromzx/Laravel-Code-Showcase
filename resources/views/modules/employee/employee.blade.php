<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mitarbeiter') }}
            <button onclick="create()" class="circular ui blue icon button"><i class="plus icon"></i></button>
        </h2>
    </x-slot>

    @include('modules.employee.form.createNewEmployeeModal')
    @include('modules.employee.form.deleteModal')
    @include('modules.employee.form.changeEmployeeModal')

    <div class="pt-4">
        <div class="ui segment" style="margin-right: 20px; margin-left: 20px">

        <div class="ui centered cards">
            @forelse($employees as $employee)
                <div style="margin: 10px" class="bg-white font-semibold text-center rounded-3xl border shadow-lg p-10 max-w-xs">

                    @if($employee -> employeeProfilePicture == null)
                        <img class="mb-3 w-32 h-32 rounded-full shadow-lg mx-auto"
                             src="https://dummyimage.com/512x512/fff/000" alt="img">
                    @else
                        <img class="mb-3 w-32 h-32 rounded-full shadow-lg mx-auto"
                             src="{{$employee -> employeeProfilePicture}}" alt="img">
                    @endif
                    <h1 class="text-lg text-gray-700"> {{$employee -> employeeFirstName}} {{$employee -> employeeLastName}}</h1>
                    <h3 class="text-sm text-gray-400 "> {{$employee -> employeeMail}} </h3>
                    <p class="text-xs text-gray-400 mt-4"> {{$employee -> employeeDescription}} </p>

                    <button onclick="update({{$employee -> id}})"
                            class="bg-blue-600 px-8 py-2 mt-8 rounded-3xl text-gray-100 font-semibold uppercase tracking-wide">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </button>

                    <button onclick="destroy({{$employee -> id}})"
                            class="bg-red-600 px-8 py-2 mt-8 rounded-3xl text-gray-100 font-semibold uppercase tracking-wide">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            @empty
                <h1>
                    <div class=" inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
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
                                        Kein Mittarbeiter eingetragen
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Die nachicht sollte nicht zu sehen sein! <br>Kontaktiere einen
                                            Administrator!
                                            <br>Optional kann ein Mittarbeiter eingetragen werden!
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
        $('.ui.newEmployee.normal.modal')
            .modal('show')
        ;
    }

    function destroy(id) {
        document.getElementById("destroyButton").href = "/employee/destroy/" + id;
        $('.ui.deleteEmployee.tiny.modal')
            .modal('show')
        ;
    }

    function update(id) {
        $('.ui.changeEmployee.normal.modal.' + id)
            .modal('show')
        ;
    }

</script>
