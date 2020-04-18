<script type="text/javascript">
    var files = [];

    function dropZone_trigger() {
        Dropzone.autoDiscover = false;
        var key;

        for (var i = 1; i <= $('.upload-drop-zone').length; i++) {
            (function (i) {

                $('#drop-zone-' + i).dropzone(
                        {
                            init: function () {

                                $('.dz-hidden-input').css('display', 'none');

                                this.on("addedfile", function (file, dataUrl) {


                                    var currentObj = this;

                                    $('.dz-preview').css('display', 'none');
                                    $('.preloader').show();

                                    var formData = new FormData();

                                    formData.append('image', file);

                                    $.ajax({
                                        headers: {'X-CSRF-Token': $('input[name="_token"]').attr('value')},
                                        'url': '{{route('validate.image')}}',
                                        'data': formData,
                                        'method': 'POST',
                                        dataType: 'json',
                                        processData: false,
                                        contentType: false,
                                        'success': function (response) {
                                            $('.step-3-errorMessages').html('');
                                            $('.preloader').hide();
                                            //we also hide the input again as it changes it's display when a new image added
                                            $('.dz-hidden-input').css('display', 'none');

                                            if (typeof response.errors == 'undefined') {
                                                files.push(file);

                                                var fr = new FileReader();

                                                fr.readAsDataURL(file);

                                                fr.onload = function () {

                                                    var html = '<div fileName="' + file.name + '" class="list-group-item list-group-item-default"><img src="' + fr.result + '" style="width : 20 px; height: 10px; border-radius:50%">' + file.name + ' <button class="btn btn-danger btn-sm delete"> <i class="glyphicon glyphicon-trash"></i> <span>إزاله</span> </button><input type="hidden" name="dropimages[images]['+i+'][]" value="'+ file.name +'" />';

                                                    $('.imageUploads-' + i).append(html);

                                                    $('.imageUploads-' + i).find('div[fileName="' + file.name + '"]').on('click',
                                                            function () {
                                                                currentObj.removeFile(file);
                                                            });
                                                }

                                                return true;
                                            }

                                            else {
                                                currentObj.removeFile(file);
                                                //example of response error
                                                // {email : [error messages] , mobile : [error messages]}
                                                response = response.errors;

                                                for (var fieldName in response) {
                                                    for (var message in response[fieldName]) {
                                                        var html = '<div class="alert alert-danger" role="alert">' + response[fieldName][message] + '</div>'
                                                        $('.step-3-errorMessages').append(html);
                                                    }
                                                }
                                            }
                                        }
                                    });


                                });

                                this.on("removedfile", function (file, dataUrl) {
                                    var fileToRemoveIndex = files.indexOf(file);
                                    files.splice(fileToRemoveIndex, 1);
                                    $('.imageUploads-' + i).find('div[fileName="' + file.name + '"]').remove();
                                });

                            },

                            url: "#",
                            autoProcessQueue: false,

                        });

            })(i); // closure for i needed for iteration
        }

        console.log("Here test \n");
        console.log(files);
        return files;
    }

    $(document).ready(function() {

        if($('.upload-drop-zone').length == 1) {

            $('#drop-zone').dropzone({
                init: function () {
                    $('.dz-hidden-input').css('display', 'none');
                    this.on("addedfile", function (file, dataUrl) {

                        var currentObj = this;

                        $('.dz-preview').css('display', 'none');
                        $('.preloader').show();

                        var formData = new FormData();

                        formData.append('image', file);

                        $.ajax({
                            headers: {'X-CSRF-Token': $('input[name="_token"]').attr('value')},
                            'url': '{{route('validate.image')}}',
                            'data': formData,
                            'method': 'POST',
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            'success': function (response) {
                                $('.step-3-errorMessages').html('');
                                $('.preloader').hide();
                                //we also hide the input again as it changes it's display when a new image added
                                $('.dz-hidden-input').css('display', 'none');

                                if (typeof response.errors == 'undefined') {
                                    files.push(file);

                                    var fr = new FileReader();

                                    fr.readAsDataURL(file);

                                    fr.onload = function () {

                                        var html = '<div fileName="' + file.name + '" class="list-group-item list-group-item-default"><img src="' + fr.result + '" style="width : 20 px; height: 10px; border-radius:50%">' + file.name + ' <button class="btn btn-danger btn-sm delete"> <i class="glyphicon glyphicon-trash"></i> <span>إزاله</span> </button>';

                                        $('.imageUploads').append(html);

                                        $('.imageUploads').find('div[fileName="' + file.name + '"]').on('click',
                                                function () {
                                                    currentObj.removeFile(file);
                                                });
                                    }

                                    return true;
                                }

                                else {
                                    currentObj.removeFile(file);
                                    //example of response error
                                    // {email : [error messages] , mobile : [error messages]}
                                    response = response.errors;

                                    for (var fieldName in response) {
                                        for (var message in response[fieldName]) {
                                            var html = '<div class="alert alert-danger" role="alert">' + response[fieldName][message] + '</div>'
                                            $('.step-3-errorMessages').append(html);
                                        }
                                    }
                                }
                            }
                        });


                    });

                    this.on("removedfile", function (file, dataUrl) {
                        var fileToRemoveIndex = files.indexOf(file);
                        files.splice(fileToRemoveIndex, 1);
                        $('.imageUploads').find('div[fileName="' + file.name + '"]').remove();
                    });

                },

                url: "#",
                autoProcessQueue: false,

            });
        }



        var formRedirectCounter = 1;

        $("form").submit(function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('.preloader').show();

            if (formRedirectCounter == 2)
            {
                $('.preloader').hide();
                window.location = '{{route('home')}}';
                return 0;
            }
            var formData = new FormData(this);
            //append files to form data if any are found
            $.each(files, function (key, value) {
                formData.append('places_images[]', value);
            });

            $.ajax({
                headers: {'X-CSRF-Token': $('input[name="_token"]').attr('value')},
                url: '/register',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    //clear any validation error message
                    $('.step-4-errorMessages').html(' ');
                    $('.preloader').hide();

                    if(data.success == true)
                    {
                        var html = '<div class="alert alert-success" role="alert">'+data.message+'</div>'
                        $('.step-4-errorMessages').append(html);
                        formRedirectCounter++;

                    }
                    else{
                        //example of response error
                        // {email : [error messages] , mobile : [error messages]}
                        response = data.errors;

                        for (var fieldName in response ){
                            for (var message in response[fieldName] ){
                                var html = '<div class="alert alert-danger" role="alert">'+response[fieldName][message]+'</div>'
                                $('.step-4-errorMessages').append(html);
                            }
                        }
                    }


                }
            });



        });
    });
</script>