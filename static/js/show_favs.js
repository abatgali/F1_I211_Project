


// onload execute function
window.onload = function () {

    var xhr = new XMLHttpRequest();

    // fetch favorites by sending request
    xhr.open("GET", "http://localhost/I211/F1_I211_Project/favorite/drivers/?user=someone", true);

    xhr.onreadystatechange = function () {

        // proceed only if the transaction has completed and the transaction completed successfully
        if (xhr.readyState === 4 && xhr.status === 200) {
            // extract the JSON received from the server
            var favDrivers = JSON.parse(xhr.responseText);

            // processed result
            console.log(favDrivers);

            displayDrivers(favDrivers);
        }};

        //favDrivers.forEach(item)

    xhr.send(null);
};


function displayDrivers(ids) {



}