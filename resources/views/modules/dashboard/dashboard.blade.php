<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-4">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-2">
            <div class="ui equal width stackable grid">
                <div class="ui three wide column">
                    <div class="ui segment overflow-y-scroll"
                         style="min-height:750px; height: auto; max-height: 750px; ">

                        <h1 class="text-center text-xl">Deine Projekte</h1>
                        <p class="ui divider"></p>

                        @forelse($projects as $project)
                            <div
                                class="mt-4 mb-4  bg-white text-black w-full max-w-md flex flex-col rounded-xl shadow-lg p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="rounded-full w-4 h-4 border border-blue-500"></div>
                                        <div class="text-md font-bold">{{$project -> projectName}}</div>
                                    </div>
                                    <div class="flex items-center space-x-4">

                                        <div class="text-red-500 hover:text-red-300 cursor-pointer ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </div>

                                        <div class="text-gray-500 hover:text-gray-300 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>

                                        <div class="text-blue-500 hover:text-blue-300 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 text-gray-500 font-bold text-sm">
                                    <span class="text-gray-800 text-base">Systeminstandsetzung</span>
                                    <br> <br>

                                    <b>
                                        {{$project -> projectDescription}}
                                    </b>

                                    <p class="ui divider"></p>
                                    <div class="extra content">
                                        <a>
                                            <i class="clipboard icon"></i>
                                            0 Todos
                                        </a>

                                        <a style="margin-left: 10px">
                                            <i class="calendar alternate icon"></i>
                                            {{date('d.m.Y', strtotime($project -> projectDeadline))}}
                                        </a>

                                        <a style="margin-left: 10px">
                                            <i class="thermometer three quarters icon"></i>

                                            @if($project -> projectPrioritization === 0)
                                                Low
                                            @elseif($project -> projectPrioritization === 1)
                                                Normal
                                            @else
                                                High
                                            @endif
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="mt-8">
                                <h1 class="text-xl text-gray-800 text-center">Keine Projekte zugewiesen</h1>
                                <p class="text-center">Ganz schön Leer hier!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="ui column ">
                    <div style="max-width: 800px; margin: 0px auto 0px auto" id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<style>
    .segment {
        overflow-y: scroll;
        scrollbar-color: #b4b2b2 white;
        scrollbar-width: thin;
    }

</style>


<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css' rel='stylesheet'/>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/rrule@2.6.4/dist/es5/rrule.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5/main.global.min.js'></script>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var initialLocaleCode = 'de';
        var localeSelectorEl = document.getElementById('locale-selector');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: '0227550227-fcs-1585070748',
            locale: initialLocaleCode,

            headerToolbar: {
                left: '',
                center: 'title',
                right: '',
            },
            footerToolbar: {
                left: 'timeGridWeek,timeGridDay',
                center: '',
                right: 'prev,next',
            },

            events: [
                    @foreach($projects as $project)
                {
                    title: '{{$project -> projectName}} | Beginn',
                    start: '{{$project->projectStartDate}}',
                    end: '{{$project->projectStartDate}}',
                    color: 'blue',
                },

                {
                    title: '{{$project -> projectName}} | Deadline',
                    start: '{{$project->projectDeadline}}',
                    end: '{{$project->projectDeadline}}',
                    color: 'red',
                },
                @endforeach
            ]


        });

        calendar.render();
    });

</script>

