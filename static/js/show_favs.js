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
            console.log(favDriverIDs);

            // get the div content from another function
            let _innerHTML = displayDrivers(favDriverIDs);


            //lastly, fill the div with user's favorite driver(s)
            document.getElementById('fill_favs').innerHTML = _innerHTML;
        }};

        //favDrivers.forEach(item)

    xhr.send(null);
};


// using ids to retrieve more details about the favorite drivers
function displayDrivers(ids) {

    let _innerHTML = "";

    ids.forEach(function (id) {

    });

    return _innerHTML;
}