<div class="ui manageTodo normal modal {{$todo -> id}}" style="border-radius: 130px!important;" id="manageTodoModal">
    <div class="header">Todo Bearbeiten <span
            class="flex rounded-full bg-blue-500 uppercase px-2 py-1 text-xs font-bold mr-3"
            style="width: 50px">Offen</span></div>
    <div class="scrolling content">
        <form action="{{ route('todoListUpdate', ['id' => $todo -> id]) }}" method="POST" id="manageTodoForm{{$todo -> id}}"
              style="width: 100%">

        @csrf

        <!-- Student-MainData Section -->
            <div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Titel
                        </label>
                        <input id="todoListTitles{{$todo -> id}}" name="todoListTitle" value="{{$todo -> todoListTitle}}"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="todoListTitle" type="text" placeholder="Max">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Mittarbeiter
                        </label>

                        <select
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="todoListEmployeeIdentifier" id="">
                            @foreach($employees as $employee)
                                <option @if($todo -> todoListEmployeeIdentifier == $employee -> id) selected
                                        @endif value="{{$employee -> id}}">{{$employee -> employeeFirstName}} {{$employee -> employeeLastName}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            DeadLine
                        </label>
                        <input name="todoListDeadLine" id="todoListDeadLine{{$todo -> id}}" type="date" value="{{$todo -> todoListDeadLine}}"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-last-name">
                            Stauts
                        </label>

                        <select
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="todoListType" id="">
                            <option @if($todo -> todoListType  == 0) selected @endif value="0">Offen</option>
                            <option @if($todo -> todoListType  == 1) selected @endif value="1">in Bearbeitung</option>
                            <option @if($todo -> todoListType  == 2) selected @endif value="2">Überprüfung</option>
                            <option @if($todo -> todoListType  == 3) selected @endif value="3">Abgeschlossen</option>
                        </select>

                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0"
                         style="max-width: 1550px; width: 1000px; margin: 0px auto 0px auto">
                    <textarea name="todoListDescription" id="todoListDescription{{$todo -> id}}" cols="20" rows="8"
                              class="block appearance-none w-full bg-gray-200 border border-gray-200
                                               text-gray-700 py-3 px-4 pr-8 rounded leading-tight
                                               focus:outline-none
                                                focus:bg-white focus:border-gray-500">{{$todo -> todoListDescription}}</textarea>
                    </div>
                </div>
            </div>
        </form>
        <div class="ui equal width stackable grid">
            <div class="ui column">
                <div class="ui segment" style="min-height: 600px">
                    <div style="text-align: center">
                        <h4>Komentare</h4>
                        <button onclick="document.getElementById('addComment{{$todo -> id}}').submit();"
                                class="ui tiny button">+
                        </button>
                        <p class="ui divider"></p>
                        <form
                            action="{{ route('todoListAddComment', ['id' => $todo -> id, 'employeeId' => Auth::user() -> employeeKey]) }}"
                            method="POST" id="addComment{{$todo -> id}}">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0"
                                     style="max-width: 1550px; width: 1000px; margin: 0px auto 0px auto">

                                    @csrf

                                    <textarea name="todoListCommentsText" id="" cols="20" rows="8"
                                              class="block appearance-none w-full bg-gray-200 border border-gray-200
                                               text-gray-700 py-3 px-4 pr-8 rounded leading-tight
                                               focus:outline-none
                                                focus:bg-white focus:border-gray-500"></textarea>


                                    <p class="ui divider"></p>


                                    @foreach($todoComments as $todoComment)
                                        @if($todoComment -> todoListCommentsParentTodoIdentifier == $todo -> id)
                                            <p style="margin-top: 5px">{{$todoComment -> getEmployeeData -> employeeFirstName}} {{$todoComment -> getEmployeeData -> employeeLastName}}
                                                | {{$todoComment -> created_at}}</p>
                                            <textarea style="margin-top: -10px" name="todoListCommentsText" id=""
                                                      cols="20"
                                                      rows="8"
                                                      class="block appearance-none w-full bg-gray-200 border border-gray-200
                                               text-gray-700 py-3 px-4 pr-8 rounded leading-tight
                                               focus:outline-none
                                                focus:bg-white focus:border-gray-500">{{$todoComment -> todoListCommentsText}}</textarea>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="ui column">
                <div style="min-height: 600px" class="ui segment">
                    <div style="text-align: center">
                        <h4>Logs</h4>
                        <p class="ui divider"></p>

                        @foreach($todoLogs as $todoLog)
                            @if($todoLog -> todoListLogsParentTodoIdentifier == $todo -> id)
                                <div class="text-center py-4" style="margin-top: -20px">
                                    <div style="width: 100%!important;"
                                         class="p-3 bg-gray-600 items-center text-gray-100 leading-none lg:rounded-full flex lg:inline-flex"
                                         role="alert">

                                        <span class="font-semibold mr-2 text-left flex-auto">{{$todoLog -> todoListLogsText}} | {{$todoLog -> created_at}}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="actions">

        <div class="ui error message" id="errorBlockChangeTodo{{$todo -> id}}" style="display: none; text-align: left">
            <ul class="list"><p id="errorTextChangeTodo{{$todo -> id}}"></p></ul>
        </div>

        <div class="ui black deny button">
            Abbrechen
        </div>
        <button type="button" class="ui green right labeled icon button"
                onclick="validate{{$todo->id}}()">Hinzufügen<i
                class="checkmark icon"></i>
        </button>
    </div>
</div>


<script>
    function validate{{$todo -> id}}() {
        //formValidation
        document.getElementById('errorBlockChangeTodo{{$todo -> id}}').innerHTML = "";
        let submit = true;

        let inputs{{$todo -> id}} = [
            {
                name: "todoListTitles{{$todo -> id}}",
                message: "Der Titel, darf nicht leer sein!"
            },
            {
                name: "todoListDeadLine{{$todo -> id}}",
                message: "Die DeadLine, darf nicht leer sein!"
            },
            {
                name: "todoListDescription{{$todo -> id}}",
                message: "Die Beschreibung, darf nicht leer sein!"
            },
        ];

        for (let i = 0; i < inputs{{$todo -> id}}.length; i++) {
            console.log(inputs{{$todo -> id}}[i].name)
            if (document.getElementById('' + inputs{{$todo -> id}}[i].name + '').value === "") {
                document.getElementById('errorBlockChangeTodo{{$todo -> id}}').style.display = "block";
                document.getElementById('errorBlockChangeTodo{{$todo -> id}}').innerHTML += "• " + inputs{{$todo -> id}}[i].message + "<br>"
                document.getElementById('' + inputs{{$todo -> id}}[i].name + '').style.border = "1px rgba(255,0,0,0.47) solid"
                submit = false;
            } else {
                document.getElementById('' + inputs{{$todo -> id}}[i].name + '').style.border = "0"
            }
        }


        if (submit) {
            document.getElementById('manageTodoForm{{$todo -> id}}').submit();
        }

    }
</script>






