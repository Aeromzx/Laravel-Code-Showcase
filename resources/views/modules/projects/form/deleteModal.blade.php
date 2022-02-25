<div class="ui deleteProject tiny modal" style="border-radius: 130px!important;" id="createNewProjectModal">
    <div class="header">Wirklich Löschen</div>
    <div class="scrolling content">

        @csrf
        <div style="text-align: center">
            <h1 class="text-gray-800 text-xl">Möchtest du das Projekt Wirklich löschen?</h1>
            <p>Nach dem Löschen kann der Eintrag nicht wiederhergestellt werden! <br>Außerdem gehen alle Tätigkeiten und
                Tasks verloren!</p>

        </div>

    </div>
    <div class="actions">
        <div class="ui black deny button">
            Abbrechen
        </div>
        <a id="destroyButton" type="button" class="ui red right labeled icon button">Löschen<i
                class="trash alternate icon"></i>
        </a>
    </div>
</div>



