/*
 * This script contains AJAX methods
 */
var xmlHttp;
var numDrivers = 0;  //total number of suggested movies titles
var activeDriver = -1;  //movie title currently being selected
var searchBoxObj, suggestionBoxObj;

//this function creates a XMLHttpRequest object. It should work with most types of browsers.
function createXmlHttpRequestObject() {
    // create a XMLHttpRequest object compatible to most browsers
    if (window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else {
        alert("Error creating the XMLHttpRequest object.");
        return false;
    }
}

//initial actions to take when the page load
window.onload = function () {
    //create an XMLHttpRequest object by calling the createXmlHttpRequestObject function
    xmlHttp = createXmlHttpRequestObject();

    //DOM objects
    searchBoxObj = document.getElementById('searchtextbox');
    suggestionBoxObj = document.getElementById('suggestionDiv');
};

window.onclick = function () {
    suggestionBoxObj.style.display = 'none';
};

//set and send XMLHttp request. The parameter is the search term
function suggest(query) {
    //if the search term is empty, clear the suggestion box.
    if (query === "") {
        suggestionBoxObj.innerHTML = "";
        return;
    }

    //proceed only if the search term isn't empty
    // open an asynchronous request to the server.
    xmlHttp.open("GET", base_url + "/" + driver + "/suggest/" + query, true);

    //handle server's responses
    xmlHttp.onreadystatechange = function () {
        // proceed only if the transaction has completed and the transaction completed successfully
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            // extract the JSON received from the server
            var drivers = JSON.parse(xmlHttp.responseText);
            //console.log(titlesJSON);
            // display suggested titles in a div block
            displayDrivers(drivers);
        }
    };

    // make the request
    xmlHttp.send(null);
}


/* This function populates the suggestion box with spans containing all the titles
 * The parameter of the function is a JSON object
 * */
function displayDrivers(drivers) {
    numDrivers = drivers.length;
    //console.log(numTitles);
    activeDriver = -1;
    if (numDrivers === 0) {
        //hide all suggestions
        suggestionBoxObj.style.display = 'none';
        return false;
    }

    var divContent = "";
    //retrive the titles from the JSON doc and create a new span for each title
    for (i = 0; i < drivers.length; i++) {
        divContent += "<span id=s_" + i + " onclick='clickDriver(this)'>" + drivers[i] + "</span>";
    }
    //display the spans in the div block
    suggestionBoxObj.innerHTML = divContent;
    suggestionBoxObj.style.display = 'block';
}

//This function handles keyup event. The function is called for every keystroke.
function handleKeyUp(e) {
    // get the key event for different browsers
    e = (!e) ? window.event : e;

    /* if the keystroke is not up arrow or down arrow key,
     * call the suggest function and pass the content of the search box
     */
    if (e.keyCode !== 38 && e.keyCode !== 40) {
        suggest(e.target.value);
        return;
    }

    //if the up arrow key is pressed
    if (e.keyCode === 38 && activeDriver > 0) {
        //add code here to handle up arrow key. e.g. select the previous item
        activeDriverObj.style.backgroundColor = "#FFF";
        activeDriver--;
        activeDriverObj = document.getElementById("s_" + activeDriver);
        activeDriverObj.style.backgroundColor = "#F5DEB3";
        searchBoxObj.value = activeDriverObj.innerHTML;
        return;
    }

    //if the down arrow key is pressed
    if (e.keyCode === 40 && activeDriver < numDrivers - 1) {
        //add code here to handle down arrow key, e.g. select the next item

        if(typeof(activeDriverObj) != "undefined") {
            activeDriverObj.style.backgroundColor = "#FFF";
        }
        activeDriver++;
        activeDriverObj = document.getElementById("s_" + activeDriver);
        activeDriverObj.style.backgroundColor = "#F5DEB3";
        searchBoxObj.value = activeDriverObj.innerHTML;
    }
}



//when a title is clicked, fill the search box with the title and then hide the suggestion list
function clickDriver(driver) {
    //display the title in the search box
    searchBoxObj.value = driver.innerHTML;

    //hide all suggestions
    suggestionBoxObj.style.display = 'none';
}