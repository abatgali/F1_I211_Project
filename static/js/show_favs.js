// to display favorites on the profile page asynchronously


// onload execute function
window.onload = function () {

    var xhr = new XMLHttpRequest();

    // getting the user who's logged in
    var user = document.getElementById('username').value;
    console.log(user);

    // fetch favorites by sending request to favorite_controller
    xhr.open("GET", "http://localhost/I211/F1_I211_Project/favorite/drivers/?user="+user, true);

    xhr.onreadystatechange = function () {

        // proceed only if the transaction has completed and the transaction completed successfully
        if (xhr.readyState === 4 && xhr.status === 200) {
            // extract the JSON received from the server
            var favDriverIDs = JSON.parse(xhr.responseText);

            // processed result
            console.log("driver ids: ", favDriverIDs);

            //lastly, fill the div with user's favorite driver(s)
            displayDrivers(favDriverIDs);

        }};

    xhr.send(null);
};


// using ids to retrieve more details about the favorite drivers
function displayDrivers(ids) {

    let _innerHTML = "<ul class=\"list-group list-group-flush\">";

    let xhr = new XMLHttpRequest();

    // constructing query string to send
    // array via GET to driver controller
    let queryString = "?";
    ids.forEach(function (id) {
        queryString += "ids[]="+id+"&";
    });

    //console.log(queryString);

    // defining the request that calls the favorites func returning the drivers object
    xhr.open("GET", "http://localhost/I211/F1_I211_Project/driver/favorites/"+queryString, true);

    xhr.onreadystatechange = function () {

        // proceed only if the transaction has completed and the transaction completed successfully
        if (xhr.readyState === 4 && xhr.status === 200) {

            // extract the JSON received from the server i.e. driver details
            var drivers = JSON.parse(xhr.responseText);

            //console.log("Favorite Drivers: ",drivers);

            // processing object to prepare div content
            for (let i in drivers) {
                console.log(drivers[i]);

                // enclosing details within a link that takes the user to the driver's detail page
                _innerHTML += "<li class=\"list-group-item noDecor\"><a  href='http://localhost/I211/F1_I211_Project/driver/detail/"+i+"'>"
                +"<img src=\"http://localhost/I211/F1_I211_Project/static/img/drivers/"+i+".jpeg\" class=\"img-thumbnail\" style='max-height: 6em'>";

                for (let j in drivers[i]) {
                    console.log(j);
                   _innerHTML += "<span>"+drivers[i][j]+"</span>&emsp;";

                }

                _innerHTML += "</a></li>";
            }
            _innerHTML += "</ul>";
            document.getElementById('fill_favs').innerHTML = _innerHTML;
        }

    };

    xhr.send(null);

}