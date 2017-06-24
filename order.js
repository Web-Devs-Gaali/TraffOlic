    var map, watchId, userPin,loc;
    

    // URL to the data source that powers the locator. 
    var dataSourceUrl = 'https://spatial.virtualearth.net/REST/v1/data/515d38d4d4e348d9a61c615f59704174/CoffeeShops/CoffeeShop'; 
 
    // A setting for specifying the distance units displayed. Possible values are 'km' and 'mi'. 
    var distanceUnits = 'km'; 

    var sdsDataSourceUrl = 'https://spatial.virtualearth.net/REST/v1/data/f22876ec257b474b82fe2ffcb8393150/NavteqNA/NavteqPOIs';

    function GetMap()
    {
        var stall = new Microsoft.Maps.Location(17.426083, 78.340969);

        map = new Microsoft.Maps.Map('#myMap', {
            credentials: 'Aq1oJgTquQcxx0RjsrTa9y8ovWyKWL3wFToBfY-g0JUfYEs_2m1TRcqCQ5psocb5'
        });
        //Request the user's location
        navigator.geolocation.getCurrentPosition(function (position) {
                loc = new Microsoft.Maps.Location(
                position.coords.latitude,
                position.coords.longitude);

            //Add a pushpin at the user's location.
            var pin = new Microsoft.Maps.Pushpin(loc,{color : 'green', text:'A' ,title: 'Your Location'});
            map.entities.push(pin);

            //Center the map on the user's location.
            map.setView({ center: loc, zoom: 17 });
        });
        // api to add tilelayer on map 
    
        Microsoft.Maps.loadModule('Microsoft.Maps.Traffic', { callback: trafficModuleLoaded }); 
        
        StartTracking();
        
        var pushpin = new Microsoft.Maps.Pushpin(stall,{color : 'red',text:'B' , title: 'Stall Location',action: { label: 'Buy now', eventHandler: function () 
            {
                alert('Handler1');
            }}
        });
        map.entities.push(pushpin);
        pushpin.setOptions({ enableHoverStyle: true, enableClickedStyle: true });
        var infobox = new Microsoft.Maps.Infobox(stall, { title: 'traff-O-lic', description: 'Stall', actions: [{ label: 'Buy now', eventHandler: function () {
                location.href = 'index.html#food';
            }
        }
        ] ,visible: false});
        infobox.setMap(map);
        Microsoft.Maps.Events.addHandler(pushpin, 'click', function () {
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
        userPin = new Microsoft.Maps.Pushpin(map.getCenter(), { visible: false });
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
