@foreach($employees as $employee)

    <div class="ui changeEmployee normal modal {{$employee -> id}}" style="border-radius: 130px!important;"
         id="changeEmployeeModal">
        <div class="header">Mittarbeiter Bearbeiten</div>
        <div class="scrolling content">
            <form action="{{ route('storeEmployee') }}" method="POST" id="changeEmployeeForm{{$employee -> id}}"
                  style="width: 100%">


                <input type="text" name="id" value="{{$employee -> id}}" hidden>

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
                            <input name="employeeFirstName" value="{{$employee -> employeeFirstName}}"
                                   id="employeeFirstName{{$employee -> id}}"
                                   class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="grid-state" type="text" placeholder="John"/>

                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Nachname
                            </label>
                            <input name="employeeLastName" value="{{$employee -> employeeLastName}}"
                                   id="employeeLastName{{$employee -> id}}"
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
                            <input name="employeeMail" value="{{$employee -> employeeMail}}"
                                   id="employeeMail{{$employee -> id}}"
                                   class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="grid-state" type="text" placeholder="J.Doe@asc.de"/>

                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Telefonnummer
                            </label>
                            <input name="employeePhone" value="{{$employee -> employeePhone}}"
                                   id="employeePhone{{$employee -> id}}"
                                   class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="grid-state" type="text" placeholder="0172 5069 1231"/>

                        </div>

                    </div>
                </div>

            </form>
        </div>
        <div class="actions">

            <div class="ui error message" id="errorBlockChangeEmployee{{$employee -> id}}" style="display: none; text-align: left">
                <ul class="list"><p id="errorTextChangeEmployee{{$employee -> id}}"></p></ul>
            </div>

            <div class="ui black deny button">
                Abbrechen
            </div>
            <button type="button" class="ui green right labeled icon button"
                    onclick="validate{{$employee -> id}}()">Speichern<i
                    class="checkmark icon"></i>
            </button>
        </div>
    </div>


    <script>
        function validate{{$employee -> id}}() {
            //formValidation
            document.getElementById('errorBlockChangeEmployee{{$employee -> id}}').innerHTML = "";
            let submit = true;

            let inputs{{$employee -> id}} = [

                {
                    name: "employeeFirstName{{$employee -> id}}",
                    message: "Der Vorname, darf nicht leer sein!"
                },
                {
                    name: "employeeLastName{{$employee -> id}}",
                    message: "Der Nachame, darf nicht leer sein!"
                },
                {
                    name: "employeeMail{{$employee -> id}}",
                    message: "Die E-Mail, darf nicht leer sein!"
                },
                {
                    name: "employeePhone{{$employee -> id}}",
                    message: "Der Telefonnummer, darf nicht leer sein!"
                },

            ];

            for (let i = 0; i < inputs{{$employee -> id}}.length; i++) {
                console.log(inputs{{$employee -> id}}[i].name)
                if (document.getElementById('' + inputs{{$employee -> id}}[i].name + '').value === "") {
                    document.getElementById('errorBlockChangeEmployee{{$employee -> id}}').style.display = "block";
                    document.getElementById('errorBlockChangeEmployee{{$employee -> id}}').innerHTML += "• " + inputs{{$employee -> id}}[i].message + "<br>"
                    document.getElementById('' + inputs{{$employee -> id}}[i].name + '').style.border = "1px rgba(255,0,0,0.47) solid"
                    submit = false;
                } else {
                    document.getElementById('' + inputs{{$employee -> id}}[i].name + '').style.border = "0"
                }
            }


            if (submit) {
                document.getElementById('changeEmployeeForm{{$employee -> id}}').submit();
            }

        }
    </script>


@endforeach
