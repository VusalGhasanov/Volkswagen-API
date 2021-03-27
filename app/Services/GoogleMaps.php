<?php

namespace App\Classes;

class GoogleMaps
{
    /* Script */
    public function script()
    {
        $html = '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=drawing&key=' . env('GOOGLE_APP_KEY') . '"></script>';
        return $html;
    }

    /* Map */
    public function map($y = null, $x = null)
    {
        $y = @$y ? $y : '40.3898364';
        $x = @$x ? $x : '49.8512908';
        $html = "
            <script>
                window.onload = function() {
                    var latlng = new google.maps.LatLng(" . $y . ", " . $x . ");
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: latlng,
                        zoom: 15,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    var marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        title: 'Set lat/lon values for this property',
                        draggable: true
                    });
                    google.maps.event.addListener(marker, 'dragend', function(a) {
                        var google_y = document.getElementById('_google_map_y_');
                        var google_x = document.getElementById('_google_map_x_');
                        google_y.value = a.latLng.lat().toFixed(4);
                        google_x.value = a.latLng.lng().toFixed(4);
                    });
                };
            </script>
        ";
        return $html;
    }

    /* Multi Market */
    public function mapMarkers($markers = null)
    {
        $markers = @$markers ? $markers : json_encode([]);
        $html = "
            <script>
                /*var markers = [
                    ['Name', y, x, 'url'],
                ];*/
                var markers = " . $markers . ";
                var demoCenter = new google.maps.LatLng(40.3898364,49.8512908);

                var map;
                function initialize()
                {
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                        center: demoCenter,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    addMarkers();
                }

                function addMarkers()
                {
                    var marker, i;
                    for (var i = 0; i < markers.length; i++)
                    {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(markers[i]['y'], markers[i]['x']),
                            map: map,
                            id: i,
                            title: markers[i]['name']
                        });

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                const itemBlock = $('#_google_maps-block').find('.item');
                                const data = markers[i];
                                itemBlock.show();
                                itemBlock.find('img').attr('src', data.photo);
                                itemBlock.find('.title').attr('href', data.url).text(data.name);
                            }
                        })(marker, i)); //end add marker listener
                    } //endfor
                }//end function

                initialize();
            </script>
        ";
        return $html;
    }

    /* Drawing Search */
    public function mapDrawingSearch()
    {
        $html = "
            <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: 40.3898364,
                            lng: 49.8512908
                        },
                        zoom: 13
                    });

                    var drawingManager = new google.maps.drawing.DrawingManager({
                        drawingMode: google.maps.drawing.OverlayType.POLYGON,
                        drawingControl: false,
                        drawingControlOptions: {
                            position: google.maps.ControlPosition.TOP_CENTER,
                            drawingModes: ['polygon', 'circle']
                        },
                        polygonOptions: {
                            editable: true
                        }

                    });
                    drawingManager.setMap(map);

                    google.maps.event.addListener(drawingManager, 'overlaycomplete',
                        function(event) {
                            const location = [];
                            /*event.overlay.set('editable', false);
                            drawingManager.setMap(null);*/
                            const data = event.overlay.latLngs.g[0].g;
                            $.each(data, function (key, val) {
                                 location.push({
                                     y: val.lat(),
                                     x: val.lng()
                                 });
                            })
                            console.log(location);
                        });

                }
                initMap()
            </script>
        ";
        return $html;
    }

    /* Html */
    public function html($params = null)
    {
        $params['width'] = @$params['width'] ? $params['width'] : '100%';
        $params['height'] = @$params['height'] ? $params['height'] : '400px';
        $html = '<div id="_google_maps-block">';
        $html .= '<div id="map" style="width: ' . $params['width'] . '; height: ' . $params['height'] . ';"></div>';
        $html .= '<input type="hidden" id="_google_map_y_" name="google_y" value="' . @$params['google_y'] . '">';
        $html .= '<input type="hidden" id="_google_map_x_" name="google_x" value="' . @$params['google_x'] . '">';
        $html .= '
            <div class="item">
                <figure>
                    <i class="icon icon-remove" onclick=\'$(this).closest(".item").hide()\'></i>
                    <img src="" alt="">
                </figure>
                <a href="" target="_blank" class="title"></a>
            </div>
        ';
        $html .= '</div>';
        return $html;
    }

}

