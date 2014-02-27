webSci_lab4
Lab 4 for Web Science 2014

IN ORDER TO USE THIS APPLICATION CORRECTLY YOU MUST CHANGE THE OAUTH_CALLBACK FUNCTION IN config.php TO THE PATH OF THE callback.php FILE. THIS IS THE ONLY WAY IT WILL REDIRECT PROPERLY! (the reason for websci.dev is that this is what my local server name is for these projects. Also webSci_lab4 is the subdirectory so that path is needed to call the right file.)


This application connects and consumes the twitter API to prompt the user to log into twitter. They will then be redirected to the callback.php which will process the request and save all the information related to the user in a Session variable. This information is then used to pull the users name and location as well as a list of the 100 most recent tweets on their home timeline. The application makes a call through ajax to a php function that pulls all the information to the html page for displaying. JQuery Mobile is used to create the responsive layout by using the included grid classes as well as css media queries to ensure breakpoints. The design is set up with mobile first. As the browser is increased more layout information is added. The abraham twitteroauth php library is used to simplify the connectivity to the Twitter API. 




REFERENCES:
JQuery Mobile -> Used for Mobil layout and media queries to design breakpoints.
	http://demos.jquerymobile.com/1.4.1/
GitHub Library -> Used to set up twitter Authentication to pull tweets from api.
	https://github.com/abraham/twitteroauth