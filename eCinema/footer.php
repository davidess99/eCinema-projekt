<?php ?>

        <!-- CRUD - Delete Modal -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Potvrďte odstránenie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Naozaj chcete odstrániť túto položku?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zrušiť</button>
                <button type="button" class="btn btn-primary confirm-delete-btn">Odstrániť</button>
            </div>
            </div>
        </div>
        </div>


        <footer class="footer">
            <span class="text-muted">Copyright © 2020 eCinema, created & design by Dávid Sabol.</span>
        </footer>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

        <!-- select2 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <!-- date time picker -->
        <script type="text/javascript" src="/assets/DateTimePicker.js"></script>

        <!-- fancyTable -->
        <script src="/assets/fancyTable.js"></script>

        <!-- owl.carousel -->
        <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/43033/owl.carousel.min.js'></script>


        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();


                $("a.custom-delete-item").click(function(event) {
                    event.preventDefault();
                    var href = $(this).attr("href");

                    $("#confirmDeleteModal .confirm-delete-btn").click(function() {
                        // trigger delete action after confirm via url
                        window.location.href = href;
                    });

                });

                
                //Replace all SVG images with inline SVG
                jQuery('img.svg').each(function(){
                    var $img = jQuery(this);
                    var imgID = $img.attr('id');
                    var imgClass = $img.attr('class');
                    var imgURL = $img.attr('src');

                    jQuery.get(imgURL, function(data) {
                        // Get the SVG tag, ignore the rest
                        var $svg = jQuery(data).find('svg');

                        // Add replaced image's ID to the new SVG
                        if(typeof imgID !== 'undefined') {
                            $svg = $svg.attr('id', imgID);
                        }
                        // Add replaced image's classes to the new SVG
                        if(typeof imgClass !== 'undefined') {
                            $svg = $svg.attr('class', imgClass+' replaced-svg');
                        }

                        // Remove any invalid XML tags as per http://validator.w3.org
                        $svg = $svg.removeAttr('xmlns:a');

                        // Replace image with new SVG
                        $img.replaceWith($svg);

                    }, 'xml');

                });

                // select2
                $('.select2').select2({
                    placeholder: "Vyberte:"
                });


                $("#dtBox").DateTimePicker();


                $(".table-fancy").fancyTable({
                    //sortColumn:0, // column number for initial sorting
                    sortOrder: 'ascending', // 'desc', 'descending', 'asc', 'ascending', -1 (descending) and 1 (ascending)
                    sortable: true,
                    pagination: true, // default: false
                    searchable: true,
                    globalSearch: true,
                    inputPlaceholder:"Zadajte hľadaný výraz...",
                    perPage: 6,
                    //globalSearchExcludeColumns: [2,5] // exclude column 2 & 5
                });

            });
        </script>


        <script>
            $(document).ready(function (e) {
                // Function to preview image after validation
                $(function() {
                    $("#file").change(function() {
                        $("#message").empty(); // To remove the previous error message
                        var file = this.files[0];
                        var imagefile = file.type;
                        var match= ["image/jpeg","image/png","image/jpg"];
                    
                        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))) {
                            $('#previewing').attr('src','noimage.png');
                            $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                            return false;
                        } else {
                            var reader = new FileReader();
                            reader.onload = imageIsLoaded;
                            reader.readAsDataURL(this.files[0]);
                        }
                    });
                });
                
                function imageIsLoaded(e) {
                    $("#file").css("color","green");
                    $('#previewing').attr('src', e.target.result);
                };
            });
        </script>


        <script>
            $.fn.andSelf = function() {
                return this.addBack.apply(this, arguments);
            }

            $('.owl-carousel').owlCarousel({
                stagePadding: 200,
                loop:true,
                margin:10,
                nav:false,
                navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                items:1,
                lazyLoad: true,
                nav:true,
                responsive:{
                    0:{
                        items:1,
                        stagePadding: 60
                    },
                    600:{
                        items:1,
                        stagePadding: 100
                    },
                    1000:{
                        items:1,
                        stagePadding: 200
                    },
                    1200:{
                        items:1,
                        stagePadding: 250
                    },
                    1400:{
                        items:1,
                        stagePadding: 300
                    },
                    1600:{
                        items:1,
                        stagePadding: 350
                    },
                    1800:{
                        items:1,
                        stagePadding: 400
                    }
                }
            })
        </script>

        <script>
            $(document).ready(function() {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    loop:true,
                    margin:10,
                });

                /*keyboard navigation*/
                $(document.documentElement).keyup(function(event) {    
                    if (event.keyCode == 37) { /*left key*/
                        owl.trigger('prev.owl.carousel', [700]);
                    } else if (event.keyCode == 39) { /*right key*/
                        owl.trigger('next.owl.carousel', [700]);
                    }
                });

            });
        </script>
    </body>
</html>