# SETUP
1. Variabelnamn är i camelCase
2. Camlecase på separata php-filer
3. Inputnamn använder sig utav småbokstäver & _ tex: "create_first_Name"

## HTML
1. Följ BEM-naming convention.

## DESIGN
1. Vi använder Gulp som scss-compiler. Följ gulp setup guide för att få igång det https://gulpjs.com/docs/en/getting-started/quick-start.
2. Se till att .gitignore tar bort node_modules, annars blire kaos.
2. Varje ny Scss-fil börjar med ett underscore "_" (t.ex: _navbar.scss) och inkluderas i Main.scss-filen utan underscoret (t.ex: include("navbar.scss"))
3. Uppdatera önskad Scss-fil i scss-mappen och skriv "gulp styles" för att lägga till det i projektets Css-fil.
