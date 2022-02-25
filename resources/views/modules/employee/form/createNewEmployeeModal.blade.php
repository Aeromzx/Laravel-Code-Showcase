
<div class="ui newEmployee normal modal" style="border-radius: 130px!important;" id="createNewEmployeeModal">
    <div class="header">Mittarbeiter Anlegen</div>
    <div class="scrolling content">
        <form action="{{ route('storeEmployee') }}" method="POST" id="createNewEmployeeForm" style="width: 100%">

        @csrf

            <div class="ui blue segment">

                <p class="text-lg text-black font-semibold">
                    Daten
                </p>

                <p class="ui divider"></p>

                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Vorname
                        </label>
                        <input name="employeeFirstName" id="employeeFirstName"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" type="text" placeholder="John"/>

                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Nachname
                        </label>
                        <input name="employeeLastName" id="employeeLastName"
                               class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="grid-state" type="text" placeholder="Doe"/>

                    </div>

                </div>

                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            E-Mail-Adresse
                        </label>
                        <input name="employeeMail" id="employeeMail"
                               class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               type="text" placeholder="J.Doe@asc.de"/>

                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Telefonnummer
                        </label>
                        <input name="employeePhone" id="employeePhone"
                               class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               type="text" placeholder="0172 5069 1231"/>

                    </div>

                </div>
            </div>

        </form>
    </div>
    <div class="actions">

        <div class="ui error message" id="errorBlockCreateEmployee" style="display: none; text-align: left">
            <ul class="list"><p id="errorTextCreateEmployee"></p></ul>
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
        document.getElementById('errorBlockCreateEmployee').innerHTML = "";
        let submit = true;

        let inputs = [
            {
                name: "employeeFirstName",
                message: "Der Vorname, darf nicht leer sein!"
            },
            {
                name: "employeeLastName",
                message: "Der Nachame, darf nicht leer sein!"
            },
            {
                name: "employeeMail",
                message: "Die E-Mail, darf nicht leer sein!"
            },
            {
                name: "employeePhone",
                message: "Der Telefonnummer, darf nicht leer sein!"
            },

        ];

        for (let i = 0; i < inputs.length; i++) {
            if (document.getElementById('' + inputs[i].name + '').value === "") {
                document.getElementById('errorBlockCreateEmployee').style.display = "block";
                document.getElementById('errorBlockCreateEmployee').innerHTML += "• " + inputs[i].message + "<br>"
                document.getElementById('' + inputs[i].name + '').style.border = "1px rgba(255,0,0,0.47) solid"
                submit = false;
            } else {
                document.getElementById('' + inputs[i].name + '').style.border = "0"
            }
        }


        if (submit) {
            document.getElementById('createNewEmployeeForm').submit();
        }

    }
</script>
