
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/switchery/switchery.min.js') }}"></script>

     
        <!-- Counter Up  -->
        <script src="{{ asset('admin/assets/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
        
        @yield('scripts')
        <!-- App js -->
        <script src="{{ asset('admin/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.app.js') }}"></script>

        

        <script>
            //
            //var iScrollPos = 0;
 
            /*$(window).scroll(function () {
                var iCurScrollPos = $(this).scrollTop();
                if (iCurScrollPos > iScrollPos) {
                    //scroll down
                    $( ".topbar-main" ).fadeOut( 300, "linear" );
                } else {
                    $( ".topbar-main" ).fadeIn( 300, "linear" );
                }
                iScrollPos = iCurScrollPos;*/
            //});

            var width = 100,
            perfData = window.performance.timing, // The PerformanceTiming interface represents timing-related performance information for the given page.
            EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
            time = parseInt((EstimatedTime/15)%6)*1;

            // Loadbar Animation
            $(".loadbar").animate({
                width: width + "%"
            }, time);

            // Loadbar Glow Animation
            $(".glow").animate({
                width: width + "%"
            }, time);

            // Percentage Increment Animation
            var PercentageID = $("#precent"),
                start = 0,
                end = 100,
                durataion = time;
                animateValue(PercentageID, start, end, durataion);
                            
            function animateValue(id, start, end, duration) {
                    
                var range = end - start,
                current = start,
                increment = end > start? 1 : -1,
                stepTime = Math.abs(Math.floor(duration / range)),
                obj = $(id);
                
                var timer = setInterval(function() {
                    current += increment;
                    $(obj).text(current + "%");
                //obj.innerHTML = current;
                     if (current == end) {
                        clearInterval(timer);
                    }
                }, stepTime);
            }

                    // Fading Out Loadbar on Finised
            setTimeout(function(){
                $('.preloader-wrap').fadeOut(300);
            }, time);

            
        </script>

      
    </body>

</html>