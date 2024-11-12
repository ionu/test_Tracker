The project generates a tracking script in the form of a javascript snippet. The user can copy it and add it to the page it wants the tracking to be done. 
You need to register as a new user in order to access the members area.
Inside members area there is a tracking code page, where you can copy the js snippet.
The stats are time based, showing the unique number of visits per url.


The uniqueness is tracked by a local storage variable, so we avoid cookie cross-domain issues. The url is taken from js file. The url will not work propperly if it is added to an iframe.
The data is stored on an hourly based time frame(of course it can be more granular), so it is basically a cache, since we do not want to have a big table to query from in case of large amounts of traffic.
The codebase contains the docker files as well (they are missing comoser and npm, I installed them by hand). I used mariadb instead of mysql, but that is upt to one point a drop in replacement.

Main files:
The code that generates the javascript is in the file src/resources/views/front/snippet.blade.php
viists table model: src/app/Models/Visits.php
the js file for the search : src/public/js/visits_display.js
