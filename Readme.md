## Architecture MVC

### Dossier `public`
- Il contient tout éléments dit "publique" de l'application web.
- Il contient les assets statics du front-end/client-side (css, js, images, ...).
- Il contient la ou les pages PHP d'entrée de l'application comme les pages web à afficher ou les point d'entrée permettant le traitement des formulaires.

### Dossier `controller`
- Il contient uniquement des fichiers PHP qui traiteront la finalité des formulaires, des données en base de données et "actions" de l'application.

### Dossier `view` (`template`, ou `vue`)
- Il contient les view en PHP ou des composants de view en PHP.

### Dossier `model` (ou `entity`)
- Il contient des fichiers PHP gérant/représentant les données d'une base de données (comme MySQL).