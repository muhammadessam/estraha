<script type="text/javascript">

    $(document).ready(function() {
        var files = [];


        $('#drop-zone').dropzone({
                    init: function () {

                        this.on("addedfile", function (file, dataUrl) {

                            var formData = new FormData();
                            formData.append('image',file);
                            var currentObj = this;
                            $.ajax({
                                headers: {'X-CSRF-Token': $('input[name="_token"]').attr('value')},
                                'url' : '{{route('validate.image')}}',
                                'data' : formData,
                                'method' : 'POST',
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                'success':function(response){
                                    $('.step-4-errorMessages').html('');
                                    if (typeof response.errors == 'undefined')
                                    {
                                        files.push(file);
                                        return true;
                                    }

                                    else
                                    {
                                        currentObj.removeFile(file);
                                        //example of response error
                                        // {email : [error messages] , mobile : [error messages]}
                                        response = response.errors;

                                        for (var fieldName in response) {
                                            for (var message in response[fieldName]) {
                                                var html = '<div class="alert alert-danger" role="alert">' + response[fieldName][message] + '</div>'
                                                $('.step-4-errorMessages').append(html);
                                            }
                                        }
                                    }
                                }
                            });


                        });

                        this.on("removedfile",function(file,dataUrl){

                            var  fileToRemoveIndex = files.indexOf(file);
                            files.splice(fileToRemoveIndex, 1);

                        });
                        $(".ajaxForm").submit(function (e) {

                            e.preventDefault();
                            var formData = new FormData(this);
                            //append files to form data if any are found
                            $.each(files, function (key, value) {
                                formData.append('places_images[]', value);
                            });

                            $.ajax({
                                headers: {'X-CSRF-Token': $('input[name="_token"]').attr('value')},
                                url: $(this).attr('action'),
                                type: 'POST',
                                data: formData,
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                success: function (data) {
                                    $('.step-4-errorMessages').html('');

                                    if(typeof data.success != 'undefined')
                                    {
                                        window.location.href = data.success;
                                        return true;
                                    }
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
                            });
                        });


                    },

                    url: "#",
                    autoProcessQueue: false,
                    addRemoveLinks : true

                });
    });
</script>