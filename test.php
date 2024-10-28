<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Testing</title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,500);

    @keyframes effect {
        100%{
            opacity:0;
            transform:scale(2.5);
        }
    }

    *, *:before, *:after{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }


    body {
        background:#8BC34A;
        width: 100%;
        font-family: 'Roboto', Arial, serif;
        font-weight:400;
        font-size:14px;
    }

    h1 {
        font-weight: 300;
        margin: 0;
        font-size:2.2em;
    }

    h2{
        font-weight: 400;
    }

    button{
        outline:none;
        overflow:hidden;
        border: none;
    }

    button:focus {
        outline:none;
    }

    button:hover {
        cursor: pointer;
    }

    button span{
        display: block;
        user-select: none;
        position: relative;

    }

    a:link {
        text-decoration:none;
    }

    a.tooltip{
        position:relative;
    }

    a.tooltip::before {
        content: attr(data-tooltip);
        position:absolute;
        top: 25px;
        left: -30px;
        z-index: 999;
        white-space:nowrap;
        background:rgba(0,0,0,0.25);
        color:#fff;
        padding:0px 7px;
        line-height: 24px;
        height: 24px;
        font-weight:400;
        font-size:12px;

        opacity: 0;
        transition:opacity 0.5s ease-out;
    }

    a.tooltip:hover::before {
        opacity: 1;
    }

    input {
        margin-top:10px;
        width:100%;
        font-family: 'Roboto', Arial, serif;
        font-size: 17px;
        font-weight:400;
        color: #9A9A9A;
        line-height:28px;
        border: none;
        border-bottom: 1px solid;
        border-color:  #9A9A9A;
    }

    input:focus {
        border-bottom: 2px solid;
        border-color: #2497F3;
        outline:none;
        color:#000;
        transform-origin:top left;
        transition: color .3s ease-out, border-color .3s ease-out;
    }

    label {
        color: #9A9A9A;
    }

    .container {
        width:100%;
    }

    header {
        margin: 15px 0 0 15px;
        display:block;
    }

    .brand{
        float:left;
    }

    .header-icon {
        font-size:.85em;
    }

    .nav {
        float:right;
        margin-right: 10px;
    }

    .nav i {
        margin: 0 5px;
    }

    .nav button{
        padding-top:4px;
        width: 35px;
        height:35px;
        background:none;
        border-radius:50%;
        -moz-border-radius:50%;
        -webkit-border-radius:50%;
        overflow:hidden;
        -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC); //Fixes radius masking

    }

    .health-container {
        clear:both;
        padding-top: 75px;
    }

    .player-container {
        text-align:center;
        max-width:150px;
        max-height: 310px;
        margin: 0 auto;
    }

    .player-container button {
        width: 125px;
        height: 75px;
        background: #689F38;
        color:#fff;
        font-size:3em;
    }

    .player-container button span {
        padding:20px;
        margin-top:-5px;
    }

    .circle{
        display:block;
        position:absolute;
        background:rgba(0,0,0,.10);
        border-radius:50%;
        transform:scale(0);
    }

    .circle.animate{
        animation:effect 0.5s ease-in;
    }

    .text-color {
        color: #689F38;
    }

    .health-text{
        margin:20px 0;
        font-size: 4em;
        font-weight:300;
    }

    .modal-dialog{
        position:absolute;
        top:0;
        bottom:0;
        right: 0;
        left:0;
        margin:20px;
        z-index:99999;
        opacity:0;
        -webkit-transition: opacity .2s ease-out;
        -moz-transition: opacity .2s ease-out;
        transition:opacity .2s ease-out;
        pointer-events: none;
    }

    .modal-dialog:target {
        opacity:1;
        pointer-events:auto;
    }

    .modal-dialog > div {
        max-width:400px;
        height: 350px;
        position:relative;
        margin: 10% auto;
        background:#fff;
        padding: 20px 12px 0 20px;
        -webkit-box-shadow: 0px 15px 40px 3px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 15px 40px 3px rgba(0,0,0,0.3);
        box-shadow: 0px 15px 40px 3px rgba(0,0,0,0.3);
    }

    .modal-button {
        background:none;
        color: #2497F3;
        font-family: 'Roboto', Arial, serif;
        font-size: 15px;
        text-transform:uppercase;
        font-weight:500;
        padding: 10px 20px;
    }

    .modal-button:hover{
        background:#F2F2F2;
    }

    .modal-body {
        padding: 20px 0;
        height:100%;
    }

    .modal-footer{
        margin-top: -75px;
        text-align: right;
    }

</style>

</head>
<body>
<!-- GSAP and ScrollTrigger -->

<div class="container">
    <header>
        <div class="brand">
            <h1 class="text-color">
                <i class="material-icons header-icon text-color">Cody Becco</i>
                HP
            </h1>
        </div>

    </header>
    <div class="health-container">
        <div class="player-container">
            <button id="add">
                <span>+</span>
            </button>
            <div class="health-text text-color" id="health"> 24 </div>
            <button id="sub">
                <span>-</span>
            </button>
        </div>
    </div>
    <!--div orizzontale per mostrare il mana -->





</div>
<!--This is the end -->



</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>

    //Counter
    //mi salvo la mia vita  in una variabile sessione per non perderla o cookie
    var myHealth = localStorage.getItem('myHealth') ? parseInt(localStorage.getItem('myHealth')) : 23;
    var startHealth = 30;
    var goodHealth = myHealth * 0.75;
    var critHealth = myHealth * 0.25;


    //HP State Colors
    var goodLightColor = "#8BC34A";
    var goodDarkColor = "#689F38";
    var midLightColor = "#FFC107"
    var midDarkColor = "#FF8f00"
    var criticalLightColor = "#F44336";
    var criticalDarkColor = "#C62828";
    var animSpeed = "200";


    function updateHealth(newHealth) {
        myHealth = newHealth;
        localStorage.setItem('myHealth', myHealth);
        $('#health').html(myHealth);
    }

    $('#update').click(function(e){
        var newHealth = $('#hp').val();
        updateHealth(newHealth);
    });



    //Set state ranges
    stateRanges();
    function stateRanges(){
        goodHealth = myHealth *.75;
        critHealth = myHealth *.25;
    };

    //Listen for sub button
    $('#sub').click(function(e){
        myHealth--; //subtract 1 to myHealth
        $('#health').html(myHealth); //update HP
        healthStateCheck();
        updateHealth(myHealth);
    });

    //Listen for add button
    $('#add').click(function(e){
        myHealth++; //Add 1 to my health
        $('#health').html(myHealth); //update HP
        healthStateCheck();
        updateHealth(myHealth);
    });


    function healthStateCheck(){
        if(myHealth >= goodHealth){

            $('body').animate({backgroundColor:goodLightColor}, animSpeed);
            $('.text-color').animate({color:goodDarkColor}, animSpeed);
            $('.player-container button').animate({backgroundColor:goodDarkColor}, animSpeed);
        } else if(myHealth < goodHealth && myHealth > critHealth){
            $('body').animate({backgroundColor:midLightColor}, animSpeed);
            $('.text-color').animate({color:midDarkColor}, animSpeed);
            $('.player-container button').animate({backgroundColor:midDarkColor}, animSpeed);
        } else {
            $('body').animate({backgroundColor:criticalLightColor}, animSpeed);
            $('.text-color').animate({color:criticalDarkColor}, animSpeed);
            $('.player-container button').animate({backgroundColor:criticalDarkColor}, animSpeed);
        }
    }

    //appena carica la pagina
    healthStateCheck();
    //mostro la vita iniziale
    $('#health').html(myHealth);

    //Credit to: https://codepen.io/madshaakansson/pen/ykode
    var element, circle, d, x, y;

    $("button span").click(function(e){

        element = $(this);

        if(element.find(".circle").length == 0)
            element.prepend("<span class='circle'></span>");

        circle = element.find(".circle");
        circle.removeClass("animate");

        if(!circle.height() && !circle.width())
        {
            d = Math.max(element.outerWidth(), element.outerHeight());
            circle.css({height: d, width: d});
        }

        x = e.pageX - element.offset().left - circle.width()/2;
        y = e.pageY - element.offset().top - circle.height()/2;

        circle.css({top: y+'px', left: x+'px'}).addClass("animate");
    });

</script>
</html>
