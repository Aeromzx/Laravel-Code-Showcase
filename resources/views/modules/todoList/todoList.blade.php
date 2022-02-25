<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TodoListe') }}
            <button onclick="deployCreateTodoModal()" class="ui blue icon button"><i class="user add icon"></i></button>

        </h2>
    </x-slot>

    @include('modules.todoList.form.newTodo_Modal')

    @foreach($todos as $todo)
        @include('modules.todoList.form.manageTodo_Modal')
    @endforeach

    <div class="py-5">
        <div class="max-w-10xl mx-auto sm:px-20 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Content Starts Here -->

                    <div>

                        <div class="ui top attached tabular menu">
                            <a class="active item" data-tab="first">Aktiv/Fertig/Test</a>
                            <a class="item" data-tab="second">Abgeschlossen</a>
                        </div>
                        <div class="ui bottom attached active tab segment" data-tab="first">

                            <div class="ui equal width stackable grid">
                                <div class="ui column">
                                    <div class="ui piled segment" style="min-height: 600px">

                                        <div class="header text-center">
                                            <h2>Aktive Todos</h2>
                                            <p class="ui divider"></p>
                                        </div>

                                        <div>
                                            <div class="ui three centered cards">
                                                @foreach($todos as $todo)
                                                    @if($todo -> todoListType == 0)
                                                        <div style="margin-top: 20px; width:160px"
                                                             class="bg-red-600 pt-1 px-2 bg-gradient-to-b from-red-400 to-red-500 rounded-xl shadow-lg w-52 mr-5">
                                                            <div class="flex justify-center">
                                                                <a onclick="deployManageTodoModal({{$todo -> id}})"
                                                                   class="flex justify-center p-4 bg-red-400 ring-2 ring-red-300 rounded-lg shadow-xl w-32"
                                                                   style="margin-top: 5px">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="h-8 w-8 text-white"
                                                                         fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round"
                                                                              stroke-width="2"
                                                                              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                                                    </svg>

                                                                </a>
                                                            </div>
                                                            <div class="p-4">
                                                                <p class="text-white font-bold text-center"
                                                                   style="text-decoration: underline">{{$todo -> todoListTitle}}</p>
                                                                <p class="text-gray-200 text-center">{{date('d.m.Y', strtotime($todo -> todoListDeadLine))}}</p>
                                                                <p class="text-gray-200 text-center text-bold"
                                                                   style="margin-top: -10px; font-weight: bold"></p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="ui column">
                                    <div class="ui piled segment" style="min-height: 600px">
                                        <div class="header text-center">
                                            <h2>In Bearbeitung</h2>
                                            <p class="ui divider"></p>
                                        </div>

                                        <div>
                                            <div class="ui three centered cards">
                                                @foreach($todos as $todo)
                                                    @if($todo -> todoListType == 1)
                                                        <div style="margin-top: 20px; width:160px"
                                                             class="bg-red-600 pt-1 px-2 bg-gradient-to-b from-red-400 to-red-500 rounded-xl shadow-lg w-52 mr-5">
                                                            <div class="flex justify-center">
                                                                <a onclick="deployManageTodoModal({{$todo -> id}})"
                                                                   class="flex justify-center p-4 bg-red-400 ring-2 ring-red-300 rounded-lg shadow-xl w-32"
                                                                   style="margin-top: 5px">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="h-8 w-8 text-white"
                                                                         fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round"
                                                                              stroke-width="2"
                                                                              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                                                    </svg>

                                                                </a>
                                                            </div>
                                                            <div class="p-4">
                                                                <p class="text-white font-bold text-center"
                                                                   style="text-decoration: underline">{{$todo -> todoListTitle}}</p>
                                                                <p class="text-gray-200 text-center">{{date('d.m.Y', strtotime($todo -> todoListDeadLine))}}</p>
                                                                <p class="text-gray-200 text-center text-bold"
                                                                   style="margin-top: -10px; font-weight: bold"></p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui column">
                                    <div class="ui piled segment" style="min-height: 600px">
                                        <div class="header text-center">
                                            <h2>Überprüfung</h2>
                                            <p class="ui divider"></p>
                                        </div>
                                        <div>
                                            <div class="ui three centered cards">
                                                @foreach($todos as $todo)
                                                    @if($todo -> todoListType == 2)
                                                        <div style="margin-top: 20px; width:160px"
                                                             class="bg-red-600 pt-1 px-2 bg-gradient-to-b from-red-400 to-red-500 rounded-xl shadow-lg w-52 mr-5">
                                                            <div class="flex justify-center">
                                                                <a onclick="deployManageTodoModal({{$todo -> id}})"
                                                                   class="flex justify-center p-4 bg-red-400 ring-2 ring-red-300 rounded-lg shadow-xl w-32"
                                                                   style="margin-top: 5px">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="h-8 w-8 text-white"
                                                                         fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round"
                                                                              stroke-width="2"
                                                                              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                                                    </svg>

                                                                </a>
                                                            </div>
                                                            <div class="p-4">
                                                                <p class="text-white font-bold text-center"
                                                                   style="text-decoration: underline">{{$todo -> todoListTitle}}</p>
                                                                <p class="text-gray-200 text-center">{{date('d.m.Y', strtotime($todo -> todoListDeadLine))}}</p>
                                                                <p class="text-gray-200 text-center text-bold"
                                                                   style="margin-top: -10px; font-weight: bold"></p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="ui bottom attached tab segment" data-tab="second">
                            <div class="ui equal width stackable grid">
                                <div class="ui column">
                                    <div class="ui piled segment" style="min-height: 600px">

                                        <div class="header text-center">
                                            <h2>Abgeschlossene- Todos</h2>
                                            <p class="ui divider"></p>
                                        </div>

                                        <div>
                                            <div class="ui three centered cards">
                                                @foreach($todos as $todo)
                                                    @if($todo -> todoListType == 3)
                                                        <div style="margin-top: 20px; width:160px"
                                                             class="bg-red-600 pt-1 px-2 bg-gradient-to-b from-red-400 to-red-500 rounded-xl shadow-lg w-52 mr-5">
                                                            <div class="flex justify-center">
                                                                <a onclick="deployManageTodoModal({{$todo -> id}})"
                                                                   class="flex justify-center p-4 bg-red-400 ring-2 ring-red-300 rounded-lg shadow-xl w-32"
                                                                   style="margin-top: 5px">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="h-8 w-8 text-white"
                                                                         fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round"
                                                                              stroke-width="2"
                                                                              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                                                    </svg>

                                                                </a>
                                                            </div>
                                                            <div class="p-4">
                                                                <p class="text-white font-bold text-center"
                                                                   style="text-decoration: underline">{{$todo -> todoListTitle}}
                                                                </p>

                                                                <p class="text-gray-200 text-center"
                                                                   style="margin-top: -10px">{{date('d.m.Y', strtotime($todo -> todoListDeadLine))}}</p>
                                                                <p class="text-gray-200 text-center text-bold"
                                                                   style="margin-top: -10px; font-weight: bold"></p>

                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Content ends Here -->

                </div>
            </div>
        </div>
    </div>

</x-app-layout>


<script>
    $('.menu .item')
        .tab()
    ;

    function deployCreateTodoModal() {

        $('.ui.addTodo.tiny.modal')
            .modal('show')
        ;
    }

    function deployManageTodoModal(id) {
        $('.ui.manageTodo.normal.modal.' + id)
            .modal('show')
        ;
    }


</script>
