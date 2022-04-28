
// takes driver id and username as the arguments sent by clicking fav button
function fav(driverID, username) {

    //create an XMLHttpRequest object by calling the createXmlHttpRequestObject function
    xmlHttp = new XMLHttpRequest();

    // sending request to the following url:
    //console.log("http://localhost/I211/F1_I211_Project/favorite/save/?driverID=" + driverID + "&user=" + username);

    // send request to favorites controller
    xmlHttp.open("GET", "http://localhost/I211/F1_I211_Project/favorite/save/?driverID=" + driverID + "&user=" + username, true);

    //handle server's responses
    xmlHttp.onreadystatechange = function () {
        // proceed only if the transaction has completed and the transaction completed successfully
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            // extract the JSON received from the server
            var answer = JSON.parse(xmlHttp.responseText);
            console.log(answer);
        }
    };

    xmlHttp.send(null);


}

