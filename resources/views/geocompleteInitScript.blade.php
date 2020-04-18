<script>
    jQuery(function(){
        jQuery("#geocomplete").geocomplete({
            map: ".map_canvas",
            details: "form",
            types: ["geocode", "establishment"],
            location : [{{$geoLat}}, {{$geoLng}}],
            markerOptions: {
                draggable : true
            },
        }).bind("geocode:dragged", function(event, latLng){

            $("input[name=lat]").val(latLng.lat());
            $("input[name=lng]").val(latLng.lng());

            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'latLng': latLng }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        //address 0,1,3,5
                        var roadNumber = typeof results[0].address_components[0] == 'undefined' || results[0].address_components[0].long_name == 'Unnamed Road'? '' : results[0].address_components[0].long_name;
                        var road = typeof results[0].address_components[1] == 'undefined' || results[0].address_components[1].long_name == 'Unnamed Road'? '' : results[0].address_components[1].long_name;
                        var county = typeof results[0].address_components[4] =='undefined' || results[0].address_components[4].long_name == 'Unnamed Road' ? '' : results[0].address_components[4].long_name; //المحافظة او الولايه
                        var country = typeof results[0].address_components[5] =='undefined' ? '' : results[0].address_components[5].long_name;// الدولة
                        var postalCode = typeof results[0].address_components[6] =='undefined' ? '' :results[0].address_components[6].long_name ;

                        var addressDetails = results[0].formatted_address;
                        var address = roadNumber + ' , ' + road + ' , ' + results[0].address_components[3].long_name
                            + ' , ' + country;

                        $("input[name=geoaddress] , input[name=address]").val(address);
                        $("input[name=formatted_address]").val(addressDetails);
                        $("input[name=country]").val(country);
                        $("input[name=administrative_area_level_1]").val(county);
                        $("input[name=postal_code]").val(postalCode);
                        $("input[name=street_number]").val(roadNumber);
                        $("input[name=route]").val(road);
                    }
                }
            });

        });;


    });
</script>