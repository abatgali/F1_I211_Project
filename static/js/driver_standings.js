// This file fetches current racing points each driver has earned via a F1 API


//create a XMLHttpRequest object
const xmlHttp = new XMLHttpRequest();

// defining the request to retrieve the latest points of each driver
xmlHttp.open('GET', 'http://ergast.com/api/f1/current/driverStandings.json', true);

var driverStandings = [];

xmlHttp.onload = function () {
    // parses server response
    let result = JSON.parse(xmlHttp.responseText);

    // outputs DriverStandings array to console
    console.log(result["MRData"]["StandingsTable"]["StandingsLists"][0]["DriverStandings"]);

    // storing it in a global variable
    driverStandings = result["MRData"]["StandingsTable"]["StandingsLists"][0]["DriverStandings"];

    let _innerHTML = "";

    // looping through the standings array
    // to prepare inner HTML
    driverStandings.forEach(function (item, index) {
    console.log(item["position"],item["Driver"]["givenName"], item["Driver"]["nationality"], item["points"], item["wins"])

        // appending data row each cycle
        _innerHTML += "<tr><th>" + item["position"] +"</th><td>"+item["Driver"]["permanentNumber"]+"&emsp;"+item["Driver"]["givenName"]+"</td><td>"+item["Driver"]["nationality"]+"</td>" +
            "<td>"+item["points"]+"</td><td>"+item["wins"]+"</td></tr>";
    });

    document.getElementById('fill_ajax').innerHTML = _innerHTML;
};

xmlHttp.send(null);
