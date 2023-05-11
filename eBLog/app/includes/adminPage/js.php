    <script src="asserts/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="asserts/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asserts/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="asserts/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="asserts/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="asserts/js/custom.js"></script>
    <?php $path = basename($_SERVER['PHP_SELF']);?>
    <?php if ($path = "dashboard.php"): ?>
            <!--chartis chart-->
            <script src="asserts/plugins/bower_components/chartist/dist/chartist.min.js"></script>
            <script src="asserts/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
            <script src="asserts/js/pages/dashboards/dashboard1.js"></script>
    <?php endif ?>
    <!--This page JavaScript -->


