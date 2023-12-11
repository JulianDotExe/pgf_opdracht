   <!-- Floating button in the corner -->
   <div x-data="{ showModal: false }">
    <div
        @click="showModal = true"
        class="fixed bottom-4 right-4 bg-blue-500 text-white h-20 w-20 rounded-full cursor-pointer hover:bg-blue-600 transition duration-300 flex items-center justify-center"
    >
        <span class="text-2xl font-bold">?</span>
    </div>
    
    <!-- Modal container -->
    <div
        x-show="showModal"
        @click.away="showModal = false"
        class="fixed inset-0 flex items-center justify-center z-50"
    >
        <!-- Modal content with increased width -->
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md w-150 h-96 overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Need a helping hand?</h2>
                <button @click="showModal = false" class="text-gray-200 hover:text-gray-400 cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Add content here if needed -->
            <p class="text-lg text-gray-600 dark:text-gray-300 underline"><b>Beheersmodule:</b></p>
            <p class="text-gray-600 dark:text-gray-300">Dit is het overzicht voor de beheerder.</p>
            <p class="text-gray-600 dark:text-gray-300 underline">Roles:</p>
            <p class="text-gray-600 dark:text-gray-300">Dit is het overzicht voor alle rollen.</p>
            <p class="text-gray-600 dark:text-gray-300">Hier kan je nieuwe rollen aanmaken door op <span style="color:#0F83BB"><b>Create Role</b></style></span> te klikken.</p>
            <p class="text-gray-600 dark:text-gray-300">Wanneer je een rol aangemaakt hebt kan je klikken op Edit en dan kan je permissies toevoegen aan die rol.</p>
            <p class="text-gray-600 dark:text-gray-300 underline">Permissions:</p>
            <p class="text-gray-600 dark:text-gray-300">Hier kan je nieuwe rollen aanmaken door op <span style="color:#0F83BB"><b>Create Permission</b></style></span> te klikken.</p>
            <p class="text-gray-600 dark:text-gray-300">Wanneer je een permissie aangemaakt hebt kan je klikken op Edit en dan kan je permissies toevoegen aan de juiste rol.</p>
            <p class="text-gray-600 dark:text-gray-300">De permissies moeten in overleg met de ontwikkelaar tot stand gebracht worden.</p>
            <p class="text-gray-600 dark:text-gray-300 underline">Users:</p>
            <p class="text-gray-600 dark:text-gray-300">Dit is het overzicht voor alle gebruikers.</p>
            <p class="text-gray-600 dark:text-gray-300">Wanneer een gebruiker een account aangevraagd krijgt de beheerder een e-mail binnen.</p>
            <p class="text-gray-600 dark:text-gray-300">In de e-mail staan alle gegevens van het aangevraagde account en de benodige informatie hoe dit account aangemaakt kan worden.</p>
            <p class="text-gray-600 dark:text-gray-300">In het overzicht kan je de gebruiker rollen geven of gebruikers verwijderen.</p><br>

            <p class="text-lg text-gray-600 dark:text-gray-300 underline"><b>Collecties:</b></p>
            <p class="text-gray-600 dark:text-gray-300">Hier kan je nieuwe collecties aanmaken door op <span style="color:#0F83BB"><b>Collectie toevoegen</b></style></span> te klikken.</p>
            <p class="text-gray-600 dark:text-gray-300">Zodra je daarop geklikt hebt, zie je een formulier voor je.</p>
            <p class="text-gray-600 dark:text-gray-300">Begin het formulier in te vullen, alles is vereist om ingevuld te worden, op "Bijzonderheden" na.</p>
            <p class="text-gray-600 dark:text-gray-300">Klik daarna op <span style="color:#0F83BB"><b>Opslaan</b></style></span> en in het overzicht zie je je toegevoegde collectie.</p>
            <p class="text-gray-600 dark:text-gray-300">In het overzicht kan je alle details zien van de collecties en ze ook weer verwijderen/bewerken.</p><br>

            <p class="text-lg text-gray-600 dark:text-gray-300 underline"><b>Inrichting:</b></p>
            <p class="text-gray-600 dark:text-gray-300">Hier kan je nieuwe eigenschappen aanmaken voor je collectie zoals merken, kleuren, etc, door op <span style="color:#0F83BB"><b>Inrichting toevoegen</b></style></span> te klikken.</p>
            <p class="text-gray-600 dark:text-gray-300">Zodra je daarop geklikt hebt, zie je een formulier voor je, kies de eigenschap die je wilt toevoegen en vul daar de benodige informatie in.</p>
            <p class="text-gray-600 dark:text-gray-300">Klik daarna op <span style="color:#0F83BB"><b>Voeg *Eigenschap* toe</b></style></span> en in het overzicht zie je je toegevoegde eigenschap.</p><br>

            <p class="text-lg text-gray-600 dark:text-gray-300 underline"><b>Inrichting:</b></p>
            <p class="text-gray-600 dark:text-gray-300">Hier kan je nieuwe eigenschappen aanmaken voor je collectie zoals merken, kleuren, etc, door op <span style="color:#0F83BB"><b>Inrichting toevoegen</b></style></span> te klikken.</p>
            <p class="text-gray-600 dark:text-gray-300">Zodra je daarop geklikt hebt, zie je een formulier voor je, kies de eigenschap die je wilt toevoegen en vul daar de benodige informatie in.</p>
            <p class="text-gray-600 dark:text-gray-300">Klik daarna op <span style="color:#0F83BB"><b>Voeg *Eigenschap* toe</b></style></span> en in het overzicht zie je je toegevoegde eigenschap.</p>
            <p class="text-gray-600 dark:text-gray-300">In het overzicht kan je alle eigenschappen zien in een netjes gesorteerde orde en je kan ze ook weer verwijderen.<br> (Let wel op dat als je een inrichting verwijderd die al in gebruik is dat de collectie dan ook verwijderd word)</p><br>

            <p class="text-lg text-gray-600 dark:text-gray-300 underline"><b>Profile:</b></p>
            <p class="text-gray-600 dark:text-gray-300">Hier kan je je eigen informatie inzien en eventueel bewerken of verwijderen.<br>(Let hier wel mee op want je verliest hiermee alle aangemaakte collecties)</p><br>

            <p class="text-lg text-gray-600 dark:text-gray-300 underline"><b>Evenementen:</b></p>
            <p class="text-gray-600 dark:text-gray-300">Hier kan je nieuwe Evenementen aanmaken voor je webpagina door op <span style="color:#0F83BB"><b>Evenementen toevoegen</b></style></span> te klikken.</p>
            <p class="text-gray-600 dark:text-gray-300">Zodra je daarop geklikt hebt, zie je een formulier voor je.</p>
            <p class="text-gray-600 dark:text-gray-300">Begin het formulier in te vullen, alles is vereist om ingevuld te worden.</p>
            <p class="text-gray-600 dark:text-gray-300">Klik daarna op <span style="color:#0F83BB"><b>Create Event</b></style></span> en in het overzicht zie je je toegevoegde event (De toegevoegde event staat nu ook op de webpagina onder "Events").</p>
            <p class="text-gray-600 dark:text-gray-300">In het overzicht kan je alle evenementen zien in een netjes gesorteerde orde en je kan ze ook weer verwijderen/bewerken.</p><br>

            <p class="text-lg text-gray-600 dark:text-gray-300 underline"><b>News:</b></p>
            <p class="text-gray-600 dark:text-gray-300">Hier kan je nieuwe News items aanmaken voor je webpagina door op <span style="color:#0F83BB"><b>News toevoegen</b></style></span> te klikken.</p>
            <p class="text-gray-600 dark:text-gray-300">Zodra je daarop geklikt hebt, zie je een formulier voor je.</p>
            <p class="text-gray-600 dark:text-gray-300">Begin het formulier in te vullen, alles is vereist om ingevuld te worden.</p>
            <p class="text-gray-600 dark:text-gray-300">Klik daarna op <span style="color:#0F83BB"><b>Create News</b></style></span> en in het overzicht zie je het toegevoegde news item (Het toegevoegde news item staat nu ook op de webpagina onder "News").</p>
            <p class="text-gray-600 dark:text-gray-300">In het overzicht kan je alle News items zien in een netjes gesorteerde orde en je kan ze ook weer verwijderen/bewerken.</p><br>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

