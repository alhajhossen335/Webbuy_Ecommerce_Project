        <!-- Bottom footer part-->
        <footer>
            <section class="bottom-footer">
                <div class="common-block clearfix">
                    <p>&copy; <?php echo date('Y') ?> Webbuy.com | All Rights Reserved.</p>
                </div>
            </section>
        </footer>
        
        <script>
            // Admin Menubar
            document.querySelector(".sidebar").addEventListener("click", function() {
                document.querySelector(".sidebar-menu").classList.add("open");
            });
            document.querySelector(".closeMenu").addEventListener("click", function() {
                document.querySelector(".sidebar-menu").classList.remove("open");
            });
        </script>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/myScript.js"></script>
    </body>
</html>