<div class="ui newCustomer normal modal" style="border-radius: 130px!important;" id="createNewCustomerModal">
    <div class="header">Mittarbeiter Anlegen</div>
    <div class="scrolling content">
        <form action="{{ route('storeCustomer') }}" method="POST" id="createNewCustomerForm" style="width: 100%">

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
                            <option value="0">Dirketer Kunde</option>
                            <option value="1">Partner</option>
                        </select>
                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Firmenname/Kundenname
                        </label>
                        <input id="customerCompanyName" name="customerCompanyName"
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
                        <input id="customerContactPersonFirstName" name="customerContactPersonFirstName"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                type="text" placeholder="Max">
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Nachname
                        </label>
                        <input id="customerContactPersonLastName" name="customerContactPersonLastName"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               type="text" placeholder="Mustermann">
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Telefonnummer
                        </label>
                        <input id="customerContactPersonPhone" name="customerContactPersonPhone"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="customerContactPersonPhone" type="text" placeholder="0176 5079 5192">
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            E-Mail
                        </label>
                        <input id="customerContactPersonMail" name="customerContactPersonMail"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="customerContactPersonMail" type="text" placeholder="max@asc.de">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Straße
                        </label>
                        <input id="customerCompanyLocationStreet" name="customerCompanyLocationStreet"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="grid-last-name" type="text" placeholder="Musterstraße 22">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Postleitzahl
                        </label>
                        <input id="customerCompanyLocationPostCode" name="customerCompanyLocationPostCode"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="grid-last-name" type="text" placeholder="63505">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Stadt
                        </label>
                        <input id="customerCompanyLocationCity" name="customerCompanyLocationCity"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="grid-last-name" type="text" placeholder="Musterstadt">
                    </div>

                </div>

            </div>

        </form>
    </div>
    <div class="actions">

        <div class="ui error message" id="errorBlockCreateCustomer" style="display: none; text-align: left">
            <ul class="list"><p id="errorTextCreateCustomer"></p></ul>
        </div>


        <div class="ui black deny button">
            Abbrechen
        </div>
        <button type="button" class="ui green right labeled icon button"
                onclick="validate()">Hinzufügen<i
                class="checkmark icon"></i>
        </button>
    </div>
</div>


<script>
    function validate() {
        //formValidation
        document.getElementById('errorBlockCreateCustomer').innerHTML = "";
        let submit = true;

        let inputs = [
            {
                name: "customerCompanyName",
                message: "Der Kundenname, darf nicht leer sein!"
            },
            {
                name: "customerContactPersonFirstName",
                message: "Der Vorname, darf nicht leer sein!"
            },
            {
                name: "customerContactPersonLastName",
                message: "Der Nachame, darf nicht leer sein!"
            },
            {
                name: "customerContactPersonPhone",
                message: "Die Telefonnummer, darf nicht leer sein!"
            },
            {
                name: "customerContactPersonMail",
                message: "Die E-Mail, darf nicht leer sein!"
            },
            {
                name: "customerCompanyLocationStreet",
                message: "Die Straße, darf nicht leer sein!"
            },
            {
                name: "customerCompanyLocationPostCode",
                message: "Die Postleitzahl, darf nicht leer sein!"
            },
            {
                name: "customerCompanyLocationCity",
                message: "Die Stadt, darf nicht leer sein!"
            },
        ];

        for (let i = 0; i < inputs.length; i++) {
            if (document.getElementById('' + inputs[i].name + '').value === "") {
                document.getElementById('errorBlockCreateCustomer').style.display = "block";
                document.getElementById('errorBlockCreateCustomer').innerHTML += "• " + inputs[i].message + "<br>"
                document.getElementById('' + inputs[i].name + '').style.border = "1px rgba(255,0,0,0.47) solid"
                submit = false;
            } else {
                document.getElementById('' + inputs[i].name + '').style.border = "0"
            }
        }


        if (submit) {
            document.getElementById('createNewCustomerForm').submit();
        }

    }
</script>


