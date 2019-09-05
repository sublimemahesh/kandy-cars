<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            html,
            body,
            #map-canvas {
                height: 100%;
                width: 100%;
                margin: 0px;
                padding: 0px
            }
        </style>
    </head>
    <body>

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBowwQmOfERv2WsBHHvFs2rNTwQex9r1A&libraries=places&reigion=lk"></script>
        <input type="button" id="routebtn" value="route" />
          <input type="button" id="routebtn2" value="route2" />
        <div id="map-canvas"></div>
    </body>
    <script src="js/map.js" type="text/javascript"></script>
</html>
