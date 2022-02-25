<div class="ui newProject normal modal" style="border-radius: 130px!important;" id="createProjectModal"
     xmlns="http://www.w3.org/1999/html">
    <div class="header">Projekt Anlegen</div>
    <div class="scrolling content">
        <form action="{{ route('storeProject') }}" method="POST" id="createProjectForm" style="width: 100%">

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
                            ProjektName
                        </label>
                        <input name="projectName" id="projectName"
                               class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="grid-state" type="text" placeholder="System-Aufbau"/>


                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Priorität
                        </label>
                        <select name="projectPrioritization"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" type="text" placeholder="John">
                            <option value="2">High</option>
                            <option value="1">Normal</option>
                            <option value="0">Low</option>
                        </select>
                    </div>

                </div>

                <p class="ui divider"></p>

                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Kunden
                        </label>
                        <select name="customerKey"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" type="text" placeholder="John">
                            @foreach($customers as $customer)
                                <option value="{{$customer -> id}}"> {{$customer -> customerCompanyName}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Zugewiesener Mittarbeiter
                        </label>
                        <select name="employeeKey"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" type="text" placeholder="John">
                            @foreach($employees as $employee)
                                <option value="{{$employee -> id}}"> {{$employee -> employeeFirstName}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <p class="ui divider"></p>

                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Projekt Beginn
                        </label>
                        <input name="projectStartDate"
                               class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="projectStartDate" type="date" placeholder="John"/>

                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Projekt Ende (Dead Line)
                        </label>
                        <input name="projectDeadline"
                               class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="projectDeadline" type="date" placeholder="John"/>


                    </div>

                </div>

                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Projekt Beschreibung
                        </label>
                        <textarea id="projectDescription"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="projectDescription"  cols="30" rows="10"></textarea>

                    </div>

                </div>

            </div>

        </form>
    </div>

    <div class="actions">

        <div class="ui error message" id="errorBlockCreateProject" style="display: none; text-align: left">
            <ul class="list"><p id="errorTextCreateProject"></p></ul>
        </div>


        <div class="ui black deny button">
            Abbrechen
        </div>
        <button type="button" class="ui green right labeled icon button"
                onclick="validate();">Hinzufügen<i
                class="checkmark icon"></i>
        </button>
    </div>

</div>

<script>
    function validate() {
        //formValidation
        document.getElementById('errorBlockCreateProject').innerHTML = "";
        let submit = true;

        let inputs = [
            {
                name: "projectName",
                message: "Der Projekt Name, darf nicht leer sein!"
            },
            {
                name: "projectStartDate",
                message: "Das Start-Datum, darf nicht leer sein!"
            },
            {
                name: "projectDeadline",
                message: "Die Deadline, darf nicht leer sein!"
            },
            {
                name: "projectDescription",
                message: "Die Beschreibung, darf nicht leer sein!"
            },
        ];

        for (let i = 0; i < inputs.length; i++) {
            if (document.getElementById('' + inputs[i].name + '').value === "") {
                document.getElementById('errorBlockCreateProject').style.display = "block";
                document.getElementById('errorBlockCreateProject').innerHTML += "• " + inputs[i].message + "<br>"
                document.getElementById('' + inputs[i].name + '').style.border = "1px rgba(255,0,0,0.47) solid"
                submit = false;
            } else {
                document.getElementById('' + inputs[i].name + '').style.border = "0"
            }
        }


        if (submit) {
            document.getElementById('createProjectForm').submit();
        }

    }
</script>

