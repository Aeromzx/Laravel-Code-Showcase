@foreach($customers as $customer)
    <div class="ui changeCustomer normal modal {{$customer -> id}}" style="border-radius: 130px!important;"
         id="changeCustomerModal{{$customer -> id}}">
        <div class="header">Kunden Bearbeiten</div>
        <div class="scrolling content">
            <form action="{{ route('storeCustomer') }}" method="POST" id="changeCustomerForm{{$customer -> id}}"
                  style="width: 100%">

                <input type="text" name="id" value="{{$customer -> id}}" hidden>

                @csrf

                <div class="ui blue segment">

                    <p class="text-lg text-black font-semibold">
                        Zugriffs-Daten
                    </p>

                    <p class="ui divider"></p>

                    <div class="flex flex-wrap -mx-3 mb-6">

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Typ
                            </label>
                            <select name="customerType"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state">
                                <option @if($customer -> customerType == 0) selected @endif value="0">Dirketer Kunde
                                </option>
                                <option @if($customer -> customerType == 1) selected @endif value="1">Partner</option>
                            </select>
                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Firmenname/Kundenname
                            </label>
                            <input id="customerCompanyName{{$customer -> id}}" name="customerCompanyName"
                                   value="{{$customer -> customerCompanyName}}"
                                   class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="grid-state" type="text" placeholder="Holzmann GmbH"/>


                        </div>

                    </div>

                </div>

                <div class="ui red segment">

                    <p class="text-lg text-black font-semibold">
                        Grundlegende Daten
                    </p>
                    <p class="ui divider"></p>

                    <div class="flex flex-wrap -mx-3 mb-6">

                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Vorname
                            </label>
                            <input id="customerContactPersonFirstName{{$customer -> id}}"
                                   value="{{$customer -> customerContactPersonFirstName}}"
                                   name="customerContactPersonFirstName"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   type="text" placeholder="Max">
                        </div>

                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Nachname
                            </label>
                            <input id="customerContactPersonLastName{{$customer -> id}}"
                                   value="{{$customer -> customerContactPersonLastName}}"
                                   name="customerContactPersonLastName"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   type="text" placeholder="Mustermann">
                        </div>

                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Telefonnummer
                            </label>
                            <input id="customerContactPersonPhone{{$customer -> id}}"
                                   value="{{$customer -> customerContactPersonPhone}}" name="customerContactPersonPhone"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   type="text" placeholder="0176 5079 5192">
                        </div>

                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                E-Mail
                            </label>
                            <input id="customerContactPersonMail{{$customer -> id}}"
                                   value="{{$customer -> customerContactPersonMail}}" name="customerContactPersonMail"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   type="text" placeholder="max@asc.de">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Straße
                            </label>
                            <input id="customerCompanyLocationStreet{{$customer -> id}}"
                                   value="{{$customer -> customerCompanyLocationStreet}}"
                                   name="customerCompanyLocationStreet"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="grid-last-name" type="text" placeholder="Musterstraße 22">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Postleitzahl
                            </label>
                            <input id="customerCompanyLocationPostCode{{$customer -> id}}"
                                   value="{{$customer -> customerCompanyLocationPostCode}}"
                                   name="customerCompanyLocationPostCode"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="grid-last-name" type="text" placeholder="63505">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Stadt
                            </label>
                            <input id="customerCompanyLocationCity{{$customer -> id}}"
                                   value="{{$customer -> customerCompanyLocationCity}}"
                                   name="customerCompanyLocationCity"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="grid-last-name" type="text" placeholder="Musterstadt">
                        </div>

                    </div>

                </div>

            </form>
        </div>
        <div class="actions">
            <div class="ui error message" id="errorBlockChangeCustomer{{$customer -> id}}" style="display: none; text-align: left">
                <ul class="list"><p id="errorTextChangeCustomer{{$customer -> id}}"></p></ul>
            </div>

            <div class="ui black deny button">
                Abbrechen
            </div>
            <button type="button" class="ui green right labeled icon button"
                    onclick="validate{{$customer -> id}}()">Speichern<i
                    class="checkmark icon"></i>
            </button>
        </div>
    </div>



    <script>
        function validate{{$customer -> id}}() {
            //formValidation
            document.getElementById('errorBlockChangeCustomer{{$customer -> id}}').innerHTML = "";
            let submit = true;

            let inputs{{$customer -> id}} = [

                {
                    name: "customerCompanyName{{$customer -> id}}",
                    message: "Der Kundenname, darf nicht leer sein!"
                },
                {
                    name: "customerContactPersonFirstName{{$customer -> id}}",
                    message: "Der Vorname, darf nicht leer sein!"
                },
                {
                    name: "customerContactPersonLastName{{$customer -> id}}",
                    message: "Der Nachame, darf nicht leer sein!"
                },
                {
                    name: "customerContactPersonPhone{{$customer -> id}}",
                    message: "Die Telefonnummer, darf nicht leer sein!"
                },
                {
                    name: "customerContactPersonMail{{$customer -> id}}",
                    message: "Die E-Mail, darf nicht leer sein!"
                },
                {
                    name: "customerCompanyLocationStreet{{$customer -> id}}",
                    message: "Die Straße, darf nicht leer sein!"
                },
                {
                    name: "customerCompanyLocationPostCode{{$customer -> id}}",
                    message: "Die Postleitzahl, darf nicht leer sein!"
                },
                {
                    name: "customerCompanyLocationCity{{$customer -> id}}",
                    message: "Die Stadt, darf nicht leer sein!"
                },

            ];

            for (let i = 0; i < inputs{{$customer -> id}}.length; i++) {
                console.log(inputs{{$customer -> id}}[i].name)
                if (document.getElementById('' + inputs{{$customer -> id}}[i].name + '').value === "") {
                    document.getElementById('errorBlockChangeCustomer{{$customer -> id}}').style.display = "block";
                    document.getElementById('errorBlockChangeCustomer{{$customer -> id}}').innerHTML += "• " + inputs{{$customer -> id}}[i].message + "<br>"
                    document.getElementById('' + inputs{{$customer -> id}}[i].name + '').style.border = "1px rgba(255,0,0,0.47) solid"
                    submit = false;
                } else {
                    document.getElementById('' + inputs{{$customer -> id}}[i].name + '').style.border = "0"
                }
            }


            if (submit) {
                 document.getElementById('changeCustomerForm{{$customer -> id}}').submit();
            }

        }
    </script>


@endforeach



