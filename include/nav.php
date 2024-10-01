<link href="style/global.css" rel="stylesheet">

<?php

$page = basename($_SERVER['PHP_SELF'], ".php");
?>
<nav class="navbar navbar-expand-custom navbar-mainbg">
    <a class="navbar-brand navbar-logo" href="#">RPG</a>
    <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <div class="hori-selector"><div class="left"></div><div class="right"></div>
            </div>
            <li class="nav-item <?php echo ($page == 'index') ? 'active' : ''; ?>">
                <a class="nav-link" href="/">Home Page</a>
            </li>
            <li class="nav-item <?php echo ($page == 'ancestry') ? 'active' : ''; ?>">
                <a class="nav-link" href="/ancestry.php">Ancestry</a>
            </li>
            <li class="nav-item  <?php echo ($page == 'classes') ? 'active' : ''; ?>">
                <a class="nav-link" href="/classes.php">Classes</a>
            </li>
            <li class="nav-item  <?php echo ($page == 'roles') ? 'active' : ''; ?>">
                <a class="nav-link" href="/roles.php">Roles</a>
            </li>
            <li class="nav-item  <?php echo ($page == 'weapons') ? 'active' : ''; ?>">
                <a class="nav-link" href="/weapons.php">Weapons</a>
            </li>


        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
<script>
    // ---------Responsive-navbar-active-animation-----------
    function test() {
        var tabsNewAnim = $('#navbarSupportedContent');
        var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
        var activeItemNewAnim = tabsNewAnim.find('.active');
        var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
        var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
        var itemPosNewAnimTop = activeItemNewAnim.position();
        var itemPosNewAnimLeft = activeItemNewAnim.position();

        // Posiziona l'animazione del selettore orizzontale
        $(".hori-selector").css({
            "top": itemPosNewAnimTop.top + "px",
            "left": itemPosNewAnimLeft.left + "px",
            "height": activeWidthNewAnimHeight + "px",
            "width": activeWidthNewAnimWidth + "px"
        });

        $("#navbarSupportedContent").on("click", "li", function(e) {
            e.preventDefault(); // Prevenire l'immediato reindirizzamento
            var targetLink = $(this).find('a').attr('href'); // Prendi il link dell'elemento cliccato
            $('#navbarSupportedContent ul li').removeClass("active");
            $(this).addClass('active');
            var activeWidthNewAnimHeight = $(this).innerHeight();
            var activeWidthNewAnimWidth = $(this).innerWidth();
            var itemPosNewAnimTop = $(this).position();
            var itemPosNewAnimLeft = $(this).position();

            // Anima la barra selettore
            $(".hori-selector").css({
                "top": itemPosNewAnimTop.top + "px",
                "left": itemPosNewAnimLeft.left + "px",
                "height": activeWidthNewAnimHeight + "px",
                "width": activeWidthNewAnimWidth + "px"
            });
            // Ritarda il cambio di pagina fino a che l'animazione è completata
            setTimeout(function() {
                window.location.href = targetLink; // Reindirizzamento al link
            }, 500); // Tempo stimato per la durata dell'animazione (adatta questo valore se necessario)
        });
    }
    $(document).ready(function() {
        setTimeout(function() {
            test();
        });
    });
    $(window).on('resize', function() {
        setTimeout(function() {
            test();
        }, 500);
    });
    $(".navbar-toggler").click(function() {
        $(".navbar-collapse").slideToggle(300);
        setTimeout(function() {
            test();
        });
    });
</script>