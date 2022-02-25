@foreach($projects as $project)
    <div class="ui changeProject normal modal {{$project -> id}}" style="border-radius: 130px!important;" id="changeProjectModal"
         xmlns="http://www.w3.org/1999/html">
        <div class="header">Projekt Bearbeiten</div>

        <div class="scrolling content">
            <form action="{{ route('storeProject') }}" method="POST" id="changeProjectForm{{$project -> id}}" style="width: 100%">

                @csrf
                <input type="text" name="id" value="{{$project -> id}}" hidden>

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
                            <input id="projectName{{$project -> id}}" name="projectName" value="{{$project -> projectName}}"
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
                                <option @if($project -> projectPrioritization = 2) selected @endif value="2">High</option>
                                <option @if($project -> projectPrioritization = 1) selected @endif value="1">Normal</option>
                                <option @if($project -> projectPrioritization = 0) selected @endif value="0">Low</option>
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
                                    <option @if($project -> customerKey == $customer -> id ) selected
                                            @endif value="{{$customer -> id}}"> {{$customer -> customerCompanyName}}</option>
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
                                    <option @if($employee -> id == $project -> employeeKey ) selected
                                            @endif value="{{$employee -> id}}"> {{$employee -> employeeFirstName}}</option>
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
                            <input name="projectStartDate" id="projectStartDate{{$project -> id}}" value="{{$project -> projectStartDate}}"
                                   class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="grid-state" type="date" placeholder="John"/>

                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Projekt Ende (Dead Line)
                            </label>
                            <input name="projectDeadline" id="projectDeadline{{$project -> id}}"  value="{{$project -> projectDeadline}}"
                                   class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="grid-state" type="date" placeholder="John"/>


                        </div>

                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">

                        <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Projekt Beschreibung
                            </label>
                            <textarea
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                name="projectDescription" id="projectDescription{{$project -> id}}" cols="30" rows="10">{{$project -> projectDescription}}</textarea>

                        </div>

                    </div>

                </div>

            </form>
        </div>

        <div class="actions">

            <div class="ui error message" id="errorBlockChangeProject{{$project -> id}}" style="display: none; text-align: left">
                <ul class="list"><p id="errorTextChangeProject{{$project -> id}}"></p></ul>
            </div>


            <div class="ui black deny button">
                Abbrechen
            </div>
            <button type="button" class="ui green right labeled icon button"
                    onclick="validate{{$project -> id}}();">Speichern<i
                    class="checkmark icon"></i>
            </button>
        </div>
    </div>



    <script>
        function validate{{$project -> id}}() {
            //formValidation
            document.getElementById('errorBlockChangeProject{{$project -> id}}').innerHTML = "";
            let submit = true;

            let inputs{{$project -> id}} = [

                {
                    name: "projectName{{$project -> id}}",
                    message: "Der Projekt Name, darf nicht leer sein!"
                },
                {
                    name: "projectStartDate{{$project -> id}}",
                    message: "Das Start-Datum, darf nicht leer sein!"
                },
                {
                    name: "projectDeadline{{$project -> id}}",
                    message: "Die Deadline, darf nicht leer sein!"
                },
                {
                    name: "projectDescription{{$project -> id}}",
                    message: "Die Beschreibung, darf nicht leer sein!"
                },

            ];

            for (let i = 0; i < inputs{{$project -> id}}.length; i++) {
                console.log(inputs{{$project -> id}}[i].name)
                if (document.getElementById('' + inputs{{$project -> id}}[i].name + '').value === "") {
                    document.getElementById('errorBlockChangeProject{{$project -> id}}').style.display = "block";
                    document.getElementById('errorBlockChangeProject{{$project -> id}}').innerHTML += "• " + inputs{{$project -> id}}[i].message + "<br>"
                    document.getElementById('' + inputs{{$project -> id}}[i].name + '').style.border = "1px rgba(255,0,0,0.47) solid"
                    submit = false;
                } else {
                    document.getElementById('' + inputs{{$project -> id}}[i].name + '').style.border = "0"
                }
            }


            if (submit) {
                document.getElementById('changeProjectForm{{$project -> id}}').submit();
            }

        }
    </script>


@endforeach



