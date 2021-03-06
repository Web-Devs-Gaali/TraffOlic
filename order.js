    var map, watchId, userPin,loc;
    

    // URL to the data source that powers the locator. 
    var dataSourceUrl = 'https://spatial.virtualearth.net/REST/v1/data/515d38d4d4e348d9a61c615f59704174/CoffeeShops/CoffeeShop'; 
 
    // A setting for specifying the distance units displayed. Possible values are 'km' and 'mi'. 
    var distanceUnits = 'km'; 

    var sdsDataSourceUrl = 'https://spatial.virtualearth.net/REST/v1/data/f22876ec257b474b82fe2ffcb8393150/NavteqNA/NavteqPOIs';

    function GetMap()
    {
        var stall = new Microsoft.Maps.Location(17.426083, 78.340969);
        var stall1 = new Microsoft.Maps.Location(17.426768, 78.415439);

        map = new Microsoft.Maps.Map('#myMap', {
            credentials: 'Aq1oJgTquQcxx0RjsrTa9y8ovWyKWL3wFToBfY-g0JUfYEs_2m1TRcqCQ5psocb5'
        });
        //Request the user's location
        navigator.geolocation.getCurrentPosition(function (position) {
                loc = new Microsoft.Maps.Location(
                position.coords.latitude,
                position.coords.longitude);

            /*//Add a pushpin at the user's location.
            var pin = new Microsoft.Maps.Pushpin(loc,{color : 'green', text:'A' ,title: 'Your Location'});
            map.entities.push(pin);
*/
            //Center the map on the user's location.
            map.setView({ center: loc, zoom: 17 });
        });
        // api to add tilelayer on map 
    
        Microsoft.Maps.loadModule('Microsoft.Maps.Traffic', { callback: trafficModuleLoaded }); 
        
        StartTracking();
        
        

        //await(1500);

        var pushpin = new Microsoft.Maps.Pushpin(stall,{color : 'red',text:'B' , title: 'Stall Location',action: { label: 'Buy now', eventHandler: function () 
            {
                alert('Handler1');
            }}
        });
        map.entities.push(pushpin);
        pushpin.setOptions({ enableHoverStyle: true, enableClickedStyle: true });
        var infoboxTemplate = '<div id="infoboxText" style="background-color:White; border-style:solid; border-width:medium; border-color:DarkOrange; min-height:100px; width: 240px; "><b id="infoboxTitle" style="position: absolute; top: 10px; left: 10px; width: 220px; ">{title}</b><b id="infoboxDescription" style="position: absolute; top: 30px; left: 10px; width: 220px; ">{description}</b><a id="infoboxDescription" style="text-align:center; position: absolute; top: 45px; width: 220px; " href="menu.html" >{handler}</a></div>';
        var infobox = new Microsoft.Maps.Infobox(stall, {htmlContent:infoboxTemplate.replace('{title}', 'traff-O-lic').replace('{description}', 'check-out zone').replace('{handler}', 'Buy now'), 
            actions: [{ label: 'Buy now', eventHandler: function () {
                location.href = 'menu.html';
            }
        }
        ] ,visible: false});
        infobox.setMap(map);
        Microsoft.Maps.Events.addHandler(pushpin, 'click', function () {
        infobox.setOptions({ visible: true });
        });

        var pushpin1 = new Microsoft.Maps.Pushpin(stall1,{color : 'red',text:'B' , title: 'Stall Location',action: { label: 'Buy now', eventHandler: function () 
            {
                alert('Handler1');
            }}
        });
        map.entities.push(pushpin1);
        pushpin1.setOptions({ enableHoverStyle: true, enableClickedStyle: true });
        var infoboxTemplate = '<div id="infoboxText" style="background-color:White; border-style:solid; border-width:medium; border-color:DarkOrange; min-height:100px; width: 240px; "><b id="infoboxTitle" style="position: absolute; top: 10px; left: 10px; width: 220px; ">{title}</b><b id="infoboxDescription" style="position: absolute; top: 30px; left: 10px; width: 220px; ">{description}</b><a id="infoboxDescription" style="text-align:center; position: absolute; top: 45px; width: 220px; " href="menu.html" >{handler}</a></div>';
        var infobox = new Microsoft.Maps.Infobox(stall1, {htmlContent:infoboxTemplate.replace('{title}', 'traff-O-lic').replace('{description}', 'check-out zone').replace('{handler}', 'Buy now'), 
            actions: [{ label: 'Buy now', eventHandler: function () {
                location.href = 'menu.html';
            }
        }
        ] ,visible: false});
        infobox.setMap(map);
        Microsoft.Maps.Events.addHandler(pushpin1, 'click', function () {
        infobox.setOptions({ visible: true });
        });


    }

    function trafficModuleLoaded()  
    { 
        //set center  
        map.setView({ center: new Microsoft.Maps.Location(40.71, -74.00), zoom:17}); 
        var trafficManager = new Microsoft.Maps.Traffic.TrafficManager(map); 
        // show all traffic data 
        trafficManager.show();
        trafficManager.showFlow();
        trafficManager.showIncidents();
        trafficManager.showLegend();
        trafficManager.setOptions({flowVisible:true,legendVisible:true,incidentsVisible:true}); 
    } 

    function StartTracking() {
        //Add a pushpin to show the user's location.
        userPin = new Microsoft.Maps.Pushpin(map.getCenter(),{color : 'green', text:'A' ,title: 'Your Location'});
        map.entities.push(userPin);

        //Watch the users location.
        watchId = navigator.geolocation.watchPosition(UsersLocationUpdated);
    }

    function UsersLocationUpdated(position) {
        loc = new Microsoft.Maps.Location(
                    position.coords.latitude,
                    position.coords.longitude);

        //Update the user pushpin.
        userPin.setLocation(loc);
        userPin.setOptions({ visible: true });

        //Center the map on the user's location.
        map.setView({ center: loc });
    }

    function StopTracking() {
        // Cancel the geolocation updates.
        navigator.geolocation.clearWatch(watchId);

        //Remove the user pushpin.
        map.entities.clear();
    }
