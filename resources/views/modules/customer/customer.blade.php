<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kunden') }}
            <button onclick="create()" class="circular ui blue icon button"><i class="plus icon"></i></button>
        </h2>
    </x-slot>

    @include('modules.customer.form.createNewCustomerModal')
    @include('modules.customer.form.deleteModal')
    @include('modules.customer.form.changeCustomerModal')

    <div class="pt-4">
        <div class="ui segment" style="margin-right: 20px; margin-left: 20px">
            <!-- component -->
            <table id="emptyTable" class="ui celled table">
                <thead>
                <tr>
                    <th>Typ</th>
                    <th>Firmenname</th>
                    <th>Standort</th>
                    <th>Name (Ansprechpartner)</th>
                    <th>Telefonnummer (Ansprechpartner)</th>
                    <th>E-Mail (Ansprechpartner)</th>
                    <th>Angelegt am</th>
                    <th>Steuerung</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>@if($customer -> type == 0) Direkter Kunde @else Partner @endif</td>
                        <td>{{$customer -> customerCompanyName}}</td>
                        <td>{{$customer -> customerCompanyLocationStreet}}
                            | {{$customer -> customerCompanyLocationPostCode}} {{$customer -> customerCompanyLocationCity}}</td>
                        <td>{{$customer -> customerContactPersonFirstName}} {{$customer -> customerContactPersonLastName}}</td>
                        <td>{{$customer -> customerContactPersonPhone}}</td>
                        <td>{{$customer -> customerContactPersonMail}}</td>
                        <td>{{date('d.m.Y', strtotime($customer -> created_at))}}</td>
                        <td>
                            <div class="ui tiny icon buttons">
                                <button onclick="update({{$customer -> id}})" class="ui blue button"><i
                                        class="pencil alternate icon"></i></button>
                                <a onclick="destroy({{$customer -> id}})" class="ui red button"><i
                                        class="trash alternate icon"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @forelse($customers as $customer)
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
                                        Kein kunde eingetragen
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Um Alle funktionen nutzen zu können <br>Trage einen Kunden ein!
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
                <script>
                    document.getElementById('emptyTable').style.display = "none";
                </script>
            @endforelse


        </div>
    </div>

</x-app-layout>


<script>
    function create() {
        $('.ui.newCustomer.normal.modal')
            .modal('show')
        ;
    }

    function destroy(id) {
        document.getElementById("destroyButton").href = "/customer/destroy/" + id;
        $('.ui.deleteCustomer.tiny.modal')
            .modal('show')
        ;
    }

    function update(id) {
        console.log(id)
        $('.ui.changeCustomer.normal.modal.' + id)
            .modal('show')
        ;
    }

</script>
