<div class="ui addTodo tiny modal" style="border-radius: 130px!important;" id="addTodoModal">
    <div class="header">Todo Hinzufügen</div>
    <div class="scrolling content">
        <form action="{{ route('todoListCreate') }}" method="POST" id="addTodoForm" style="width: 100%">

            @csrf

            <input type="text" name="creatorName" value="{{Auth::user()->name}}" hidden>

            <!-- Student-MainData Section -->
            <div class="ui yellow segment">
                <div>
                    <p class="text-lg text-black font-semibold">
                        Daten
                    </p>
                    <p class="ui divider"></p>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Titel
                        </label>

                        <input name="todoListTitle" type="text" id="todoListTitles"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Mittarbeiter
                        </label>
                        <select
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="todoListEmployeeIdentifier" id="">
                            @foreach($employees as $employee)
                                <option
                                    value="{{$employee -> id}}">{{$employee -> employeeFirstName}} {{$employee -> employeeLastName}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            DeadLine
                        </label>
                        <input name="todoListDeadLine" type="date" id="todoListDeadLine"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0"
                         style="max-width: 1550px; width: 1000px; margin: 0px auto 0px auto">
                    <textarea name="todoListDescription" id="todoListDescription" cols="20" rows="15"
                              class="block appearance-none w-full bg-gray-200 border border-gray-200
                                               text-gray-700 py-3 px-4 pr-8 rounded leading-tight
                                               focus:outline-none
                                                focus:bg-white focus:border-gray-500"></textarea>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <div class="actions">

        <div class="ui error message" id="errorBlockNewTodo" style="display: none; text-align: left">
            <ul class="list"><p id="errorTextChangeNewTodo"></p></ul>
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
    $('.ui.checkbox')
        .checkbox()
    ;
</script>


<script>
    function validate() {
        //formValidation
        document.getElementById('errorBlockNewTodo').innerHTML = "";
        let submit = true;

        let inputs = [
            {
                name: "todoListTitles",
                message: "Der Titel, darf nicht leer sein!"
            },
            {
                name: "todoListDeadLine",
                message: "Die DeadLine, darf nicht leer sein!"
            },
            {
                name: "todoListDescription",
                message: "Die Beschreibung, darf nicht leer sein!"
            },
        ];

        for (let i = 0; i < inputs.length; i++) {
            console.log(inputs[i].name)
            if (document.getElementById('' + inputs[i].name + '').value === "") {
                console.log(inputs[i].name)
                document.getElementById('errorBlockNewTodo').style.display = "block";
                document.getElementById('errorBlockNewTodo').innerHTML += "• " + inputs[i].message + "<br>"
                document.getElementById('' + inputs[i].name + '').style.border = "1px rgba(255,0,0,0.47) solid"
                submit = false;
            } else {
                document.getElementById('' + inputs[i].name + '').style.border = "0"
            }
        }


        if (submit) {
            document.getElementById('addTodoForm').submit();
        }

    }
</script>

