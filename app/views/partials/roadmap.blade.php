<div class="container container-grey">
	<ul class="list-roadmap">
		<li>
			<header>Version  0.1.2</header>
			<ul>
				<li>Einbau kleinerer JavaScript Funktionen: Anzeigen Gitter, anzeigen Tile-Position</li>
				<li>Drag-Drop des Kartenausschnitts</li>
			</ul>
		</li>
		<li>
			<header>Version  0.1.1</header>
			<ul>
				<li class="done">Einbau Menü mit Punkten World | Plugins</li>
				<li class="done">Einbau PluginController</li>
				<li class="done">Installationsprozess von Plugins</li>
				<li class="done">Aufbau Plugin Struktur + Tile Plugins</li>
				<li class="done">Erstellung zweier Tiles -> green, blue</li>
				<li class="done">Umstellung der Map / Tile auf Map / MapRenderer und Tile / TileRenderer</li>
				<li>Zuweisung der Tile Typen zu einzelnen Tiles einer Karte und Speicherung der Information</li>
			</ul>
		</li>
		<li class="done">
			<header>Version 0.1.0</header>
			<ul>
				<li class="done">Erstellung Karte über PHP und Speicherung der Daten im Cache</li>
				<li class="done">Laden der Karte aus dem Cache</li>
				<li class="done">Weiterleitung auf den Wizard ohne Map -> Auswahl bestehender Karten oder Anlegen einer Neuen</li>
				<li class="done">Auslagerung der Kartenkonfiguration in ein Partial und dann Einbau in der Wizard</li>
				<li class="done">Erzeugen der Karte an Hand der X,Y Eingabe; Default aus Config</li>
				<li class="done">X,Y Feld darf nicht bearbeitet werden -> disabled</li>
				<li class="done">Kann eine Karte nicht geladen werden (nicht im Cache) -> werfe eine eigene Exeption und werte diese aus -> Umleitung auf Wizard mit Fehlermeldung</li>
			</ul>
		</li>
	</ul>
</div>