The project generates a tracking script in the form of a javascript snippet. The user can copy it and add it to the page it wants the tracking to be done.
There is an user interface, with a basic login to it. Every member can have his tracking snippet.
The uniqueness is tracked by a local storage variable, so we avoid cookie cross-domain issues. The url is taken from js file. The url will not work propperly if it is added to an iframe.
There is an interface showing the urls and the unique visits and the url based on a time search.
The data is stored on an hourly based time frame(of course it can be more granular), so it is basically a cache, since we do not want to have a big table to query from in case of large amounts of traffic.
