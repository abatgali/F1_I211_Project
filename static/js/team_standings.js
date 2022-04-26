// This file fetches current points each team has


//create a XMLHttpRequest object
const xmlHttp = new XMLHttpRequest();

// defining the request to retrieve the latest points
xmlHttp.open('GET', 'http://ergast.com/api/f1/current/constructorStandings.json', true);

var teamStandings = [];

xmlHttp.onload = function () {
    // parses server response
    let result = JSON.parse(xmlHttp.responseText);

    // outputs TeamStandings array to console
    console.log(result["MRData"]["StandingsTable"]["StandingsLists"][0]["ConstructorStandings"]);

    // storing it in a global variable
    teamStandings = result["MRData"]["StandingsTable"]["StandingsLists"][0]["ConstructorStandings"];

    let _innerHTML = "";

    // looping through the standings array
    // to prepare inner HTML
    teamStandings.forEach(function (item) {
    console.log(item["position"],item["Constructor"]["name"], item["Constructor"]["nationality"], item["points"], item["wins"]);

        // appending data row each cycle
        _innerHTML += "<tr><th>"+item["position"]+"</th><td>"+item["Constructor"]["name"]+"</td><td>"+item["Constructor"]["nationality"]+"</td><td>"+item["points"]+
            "</td><td>"+item["wins"]+"</td></tr>";
    });

    document.getElementById('fill_ajax').innerHTML = _innerHTML;
};

xmlHttp.send(null);
