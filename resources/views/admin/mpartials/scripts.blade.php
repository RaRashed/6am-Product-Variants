<script src="{{ asset('massets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('massets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('massets/vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('massets/vendors/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('massets/vendors/chartist/chartist.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('massets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('massets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('massets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->



<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>


    <script src="{{ asset('massets/vendors/select2/select2.min.js') }}"></script>

    <script src="{{ asset('massets/js/select2.js') }}"></script>

    <script>

        function changeLanguage(lang){
            window.location='{{url("change-language")}}/'+lang;
        }
        </script>

<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
