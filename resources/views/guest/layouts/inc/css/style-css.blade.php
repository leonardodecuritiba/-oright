<style>
    /*********************************************************************************************
Project:      Hinata | App Landing Page
Version:      1.0
Last change:  25/10/2017

[ CSS Structure ]

1. Color Codes
2. General Style
3. NavBar
4. Header
4.1 Home Page Header
4.2 Sub Pages Header
5. Main Content
6. Mini Feature
6.1 Mini Feature Style1
6.2 Mini Feature Style2
7 Screen Shots
7.1 Screen Shots Style1
7.2 Screen Shots Style2
7.3 mobile mockup
7.4 slider arrows
8. Features
8.1 Feature Style1
8.2 Feature Style2
9 Download
10 Pricing
11 Testimonials
12 Team
12.1 Team Style2
12.1 Team Style1
13 Video
13.1 Video Section
13.2 Video PopUp
14 FAQ
15 Statistics
16 Blog
16.1 Normal Post
16.2 List Post
16.3 Single Post
16.4 Aside
17 Contact
17.1 Contact Style1
17.2 Contact Style2
18 Clients Logo
19 Subscribe
20 Footer
21 Loading
22 SUB PAGES ( 404 & Coming Soon )
23 Responsive

/*------------------------------------------------------------------------------------------*/
    /* 1. Color Codes */
    /*-----------------

$mainColor: #3483ff;
$secColor: #cd0fd8;

------------------------------------------------------------------*/
    /* 2. General Style
*********************************************/
    body {
        font-family: 'Open Sans', sans-serif;
        position: relative;
    }

    body.without_footer {
        padding-bottom: 0 !important;
    }

    h1, h2, h3, h4, h5, h6 {
        font-weight: 400;
    }

    p {
        font-weight: 300;
        font-size: 13px;
        letter-spacing: 0.4px;
        line-height: 24px;
    }

    .mb_50 {
        margin-bottom: 50px !important;
    }

    .border-main-color, .features__style-2 .feat-tabs li.active {
        border-color: #3483ff;
    }

    .main-color-bg, .appsLand-btn.appsLand-btn-blue, .appsLand-btn.appsLand-btn-blue.btn-rgba:hover, .appsLand-navbar.active-navbar .menu-toggle .chart {
        background: #3483ff;
    }

    .main-color-text, .appsLand-navbar.active-navbar .navbar-nav > li:hover, .appsLand-navbar.active-navbar .navbar-nav > li.active, .features__style-2 .feat-tabs li a:hover, .features__style-2 .feat-tabs li.active a, .team .team-member .member-info .member-social a:hover, .normal-post .entry-content .entry-post-info h4 a:hover, .normal-post .entry-content .entry-expert .post-readMore a.read-more-link, .list-post .entry-content .entry-post-info h4 a:hover, .list-post .entry-content .entry-expert .post-readMore a.read-more-link, .apps-footer .footer-bottom p a {
        color: #3483ff;
    }

    .sec-color-bg, .appsLand-btn.appsLand-btn-pink, .appsLand-btn.appsLand-btn-pink.btn-rgba:hover {
        background: #cd0fd8;
    }

    .sec-color-text, .normal-post .entry-content .entry-expert .post-readMore a:hover, .list-post .entry-content .entry-expert .post-readMore a:hover, .apps-footer .footer-bottom p a:hover {
        color: #cd0fd8;
    }

    .gradient-text, .section-title.style-gradient h2, .appsLand-btn.appsLand-btn-default, .appsLand-btn.appsLand-btn-gradient:hover span, .appsLand-btn.appsLand-btn-gradient:hover i, .appsLand-btn.appsLand-btn-gradient.btn-inverse span, .appsLand-btn.appsLand-btn-gradient.btn-inverse i, .mini-feature .mini-feature-box .icon-box i, .pricing .pricing-tables .pricing-price p {
        background: #3483ff;
        background: -webkit-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: -o-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: -moz-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        -webkit-background-clip: text;
        color: transparent;
    }

    .gradient-text-rgba, .testimonials .testimonials-template .testimonials-slide:before, .contact .contact-form:before {
        background: rgba(52, 131, 255, 0.2);
        background: -webkit-linear-gradient(-45deg, rgba(205, 15, 216, 0.2) 0%, rgba(52, 131, 255, 0.2) 100%);
        background: -o-linear-gradient(-45deg, rgba(205, 15, 216, 0.2) 0%, rgba(52, 131, 255, 0.2) 100%);
        background: -moz-linear-gradient(-45deg, rgba(205, 15, 216, 0.2) 0%, rgba(52, 131, 255, 0.2) 100%);
        background: linear-gradient(-45deg, rgba(205, 15, 216, 0.2) 0%, rgba(52, 131, 255, 0.2) 100%);
        -webkit-background-clip: text;
        color: transparent;
    }

    .gradient-bg, .appsLand-btn.appsLand-btn-gradient:before, .mini-feature .mini-feature-box .icon-box:before, .pricing .pricing-tables .pricing-recommended .pricing-price, .faq .questions-container .panel-heading a.gradient-bg, .normal-post .entry-content .entry-post-info .posted-on, .list-post .entry-content .entry-post-info .posted-on, .loading {
        background: #3483ff;
        background: -webkit-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: -o-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: -moz-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        color: #FFF;
    }

    .gradient-bg-rgba, .appsLand-navbar.navBar__style-2.active-navbar, .team__style-2 .team-member .member-info {
        background: rgba(52, 131, 255, 0.75);
        background: -webkit-linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);
        background: -o-linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);
        background: -moz-linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);
        background: linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);
        color: #FFF;
    }

    .app-overlay {
        background: rgba(52, 131, 255, 0.75);
        background: -webkit-linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);
        background: -o-linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);
        background: -moz-linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);
        background: linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);
    }

    .block {
        display: block;
    }

    .pointer {
        cursor: pointer;
    }

    .noselect, .appsLand-btn, .mini-feature__style-2 .mini-feature-box .icon-box img:nth-child(2) {
        -webkit-touch-callout: none;
        /* iOS Safari */
        -webkit-user-select: none;
        /* Safari */
        -khtml-user-select: none;
        /* Konqueror HTML */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* Internet Explorer/Edge */
        user-select: none;
        /* Non-prefixed version, currently
supported by Chrome and Opera */
    }

    .white-color {
        color: #FFFFFF !important;
    }

    .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover {
        background: transparent;
    }

    .section-title {
        text-align: center;
        margin-bottom: 90px;
    }

    .section-title h2 {
        margin: 0;
        font-weight: 300;
        font-size: 45px;
        display: inline-block;
        padding-bottom: 5px;
    }

    .section-title.style-gradient > span {
        display: block;
        font-size: 0;
        margin-top: 20px;
    }

    .section-title.style-gradient > span:before, .section-title.style-gradient > span:after {
        content: '';
        display: inline-block;
        height: 2px;
        width: 50px;
        vertical-align: middle;
    }

    .section-title.style-gradient > span:before {
        background: #3483ff;
        background: -webkit-linear-gradient(-45deg, #3483ff 0%, rgba(52, 131, 255, 0.3) 100%);
        background: -o-linear-gradient(-45deg, #3483ff 0%, rgba(52, 131, 255, 0.3) 100%);
        background: -moz-linear-gradient(-45deg, #3483ff 0%, rgba(52, 131, 255, 0.3) 100%);
        background: linear-gradient(-45deg, #3483ff 0%, rgba(52, 131, 255, 0.3) 100%);
    }

    .section-title.style-gradient > span:after {
        background: #cd0fd8;
        background: -webkit-linear-gradient(-45deg, rgba(205, 15, 216, 0.3) 0%, #cd0fd8 100%);
        background: -o-linear-gradient(-45deg, rgba(205, 15, 216, 0.3) 0%, #cd0fd8 100%);
        background: -moz-linear-gradient(-45deg, rgba(205, 15, 216, 0.3) 0%, #cd0fd8 100%);
        background: linear-gradient(-45deg, rgba(205, 15, 216, 0.3) 0%, #cd0fd8 100%);
    }

    .section-title.style-gradient > span > span {
        display: inline-block;
        width: 15px;
        height: 15px;
        border: 2px solid;
        border-image: 1 linear-gradient(0deg, #cd0fd8 0%, #3483ff 100%);
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        transform: rotate(-45deg);
        margin: 0 20px;
        vertical-align: middle;
    }

    .section-title.style-gradient.white-color h2 {
        color: #FFF;
    }

    .section-title.style-gradient.white-color > span:before, .section-title.style-gradient.white-color > span:after {
        background: #ffffff;
    }

    .section-title.style-gradient.white-color > span > span {
        border-image: none;
        border: 2px solid #FFF;
    }

    .section-title.title__style-2 h2 {
        font-weight: 300;
    }

    .section-title.title__style-2 > span,
    .section-title.title__style-2 h2 > span {
        display: block;
        font-size: 0;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .section-title.title__style-2 > span:before, .section-title.title__style-2 > span:after,
    .section-title.title__style-2 h2 > span:before,
    .section-title.title__style-2 h2 > span:after {
        content: '';
        display: inline-block;
        border-bottom: 2px solid;
        width: 50px;
        vertical-align: middle;
    }

    .section-title.title__style-2 > span > span,
    .section-title.title__style-2 h2 > span > span {
        display: inline-block;
        width: 15px;
        height: 15px;
        border: 2px solid;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        margin: 0 20px;
        vertical-align: middle;
        border-radius: 50px 0 0 0;
    }

    .section-title.title__style-2 p {
        margin-bottom: 0;
        font-size: 19px;
    }

    .table-row {
        display: table-row;
        width: 100%;
        height: 100%;
    }

    .table-row > [class*="col-"]:first-child {
        padding-left: 0 !important;
    }

    .table-row > [class*="col-"]:last-child {
        padding-right: 0 !important;
    }

    .table-cel {
        display: table-cell;
        height: 100%;
        vertical-align: middle;
        float: none;
    }

    .appsLand-btn {
        background: #FFF;
        display: inline-block;
        padding: 14px 28px;
        text-decoration: none;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        text-transform: uppercase;
        color: #333;
        font-weight: 700;
        box-shadow: 0 1px 5px rgba(2, 3, 3, 0.15);
        letter-spacing: 0.7px;
        border: 0;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .appsLand-btn i {
        margin-right: 5px;
    }

    .appsLand-btn:hover, .appsLand-btn:focus, .appsLand-btn:active {
        text-decoration: none;
        outline: none;
    }

    .appsLand-btn.appsLand-btn-blue {
        color: #FFF;
    }

    .appsLand-btn.appsLand-btn-blue.btn-rgba {
        background: rgba(52, 131, 255, 0.5);
    }

    .appsLand-btn.appsLand-btn-pink {
        color: #FFF;
    }

    .appsLand-btn.appsLand-btn-pink.btn-rgba {
        background: rgba(205, 15, 216, 0.5);
    }

    .appsLand-btn.appsLand-btn-gradient {
        color: #FFF;
        background: transparent;
    }

    .appsLand-btn.appsLand-btn-gradient:before {
        content: '';
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
    }

    .appsLand-btn.appsLand-btn-gradient span {
        position: relative;
        z-index: 2;
    }

    .appsLand-btn.appsLand-btn-gradient:hover {
        background: #FFF;
    }

    .appsLand-btn.appsLand-btn-gradient:hover:before {
        opacity: 0;
    }

    .appsLand-btn.appsLand-btn-gradient.btn-inverse {
        background: #FFF;
    }

    .appsLand-btn.appsLand-btn-gradient.btn-inverse:before {
        opacity: 0;
    }

    .appsLand-btn.appsLand-btn-gradient.btn-inverse:hover {
        background: transparent;
    }

    .appsLand-btn.appsLand-btn-gradient.btn-inverse:hover span, .appsLand-btn.appsLand-btn-gradient.btn-inverse:hover i {
        color: #FFF;
        background: transparent;
    }

    .appsLand-btn.appsLand-btn-gradient.btn-inverse:hover:before {
        opacity: 1;
    }

    .appsLand-btn:hover {
        box-shadow: 0 3px 25px rgba(2, 3, 3, 0.25);
    }

    .appsLand-btn.appsLand-btn-larg {
        padding: 20px 40px;
    }

    .appsLand-btn.appsLand-btn-larg i {
        margin-right: 9px;
        font-size: 24px;
        vertical-align: sub;
    }

    .hover-gradient {
        position: relative;
        overflow: hidden;
    }

    .hover-gradient:before {
        content: "";
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: #3483ff;
        background: -webkit-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: -o-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: -moz-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        opacity: 0;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        z-index: 1;
    }

    .hover-gradient * {
        position: relative;
        z-index: 2;
    }

    .hover-gradient:hover * {
        color: #FFF;
    }

    .hover-gradient:hover:before {
        opacity: 1;
    }

    .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
        color: inherit;
        background-color: inherit;
    }

    .scrollToTop {
        position: fixed;
        bottom: 30px;
        right: -70px;
        font-size: 21px;
        z-index: 3;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        padding: 0;
        -webkit-transform: rotate(-80deg);
        -moz-transform: rotate(-80deg);
        -o-transform: rotate(-80deg);
        -ms-transform: rotate(-80deg);
        transform: rotate(-80deg);
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    .scrollToTop i {
        margin: 0;
    }

    .scrollToTop.active {
        right: 30px;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    .without_bg_images header.appsLand-header,
    .without_bg_images main > section {
        background-image: none;
    }

    .without_bg_images .app-overlay {
        background: #3483ff;
        background: -webkit-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: -o-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: -moz-linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
        background: linear-gradient(-45deg, #cd0fd8 0%, #3483ff 100%);
    }

    .option-template-menu {
        width: 250px;
        position: fixed;
        right: -250px;
        top: 0px;
        height: 100%;
        box-shadow: -2px 1px 4px rgba(2, 3, 3, 0.15);
        background: #FFF;
        z-index: 9999;
        padding: 35px 25px;
        text-align: center;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
    }

    .option-template-menu.active {
        right: 0px;
    }

    .option-template-menu .option-template-menu-open {
        position: absolute;
        top: 180px;
        left: -40px;
        height: 40px;
        background: #ffffff;
        width: 40px;
        line-height: 40px;
        -webkit-border-radius: 5px 0 0 5px;
        -moz-border-radius: 5px 0 0 5px;
        border-radius: 5px 0 0 5px;
        box-shadow: -2px 1px 4px rgba(2, 3, 3, 0.15);
        cursor: pointer;
        font-size: 17px;
    }

    .option-template-menu .buy-now {
        margin-bottom: 30px;
    }

    .option-template-menu .apps-option-group {
        margin-bottom: 30px;
    }

    .option-template-menu .apps-option-group h5 {
        color: #000;
        text-transform: uppercase;
    }

    .option-template-menu .apps-option-group p {
        font-size: 11px;
        color: #777;
        margin-bottom: 25px;
    }

    .option-template-menu ul {
        overflow: hidden;
    }

    .option-template-menu ul li a {
        display: block;
        width: 30px;
        height: 30px;
        line-height: 30px;
        margin: auto;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        background: #000;
    }

    .option-template-menu ul li a:hover {
        box-shadow: 0px 0px 10px rgba(2, 3, 3, 0.25);
    }

    .option-template-menu ul li {
        width: 25%;
        float: left;
        margin-bottom: 15px;
    }

    .option-template-menu ul li.active a:after {
        content: "\f00c";
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: #fff;
    }

    .option-template-menu ul li:nth-child(1) a {
        background: linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);
    }

    .option-template-menu ul li:nth-child(2) a {
        background: #70e1f5;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(-45deg, #ff5f6d 0%, #ffc371 100%);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(-45deg, #ff5f6d 0%, #ffc371 100%);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .option-template-menu ul li:nth-child(3) a {
        background: #000000;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #4B1248 0%, #F0C27B 100%);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #4B1248 0%, #F0C27B 100%);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .option-template-menu ul li:nth-child(4) a {
        background: #ADD100;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #F9D423 0%, #FF4E50 100%);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #F9D423 0%, #FF4E50 100%);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .option-template-menu ul li:nth-child(5) a {
        background: #FF4E50;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #DC2424 0%, #4A569D 100%);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #DC2424 0%, #4A569D 100%);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .option-template-menu ul li:nth-child(6) a {
        background: #F0C27B;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #000000 0%, #53346D 100%);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #000000 0%, #53346D 100%);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .option-template-menu ul li:nth-child(7) a {
        background: #AAFFA9;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #108dc7 0%, #ef8e38 100%);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #108dc7 0%, #ef8e38 100%);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .option-template-menu ul li:nth-child(8) a {
        background: #9D50BB;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #5f2c82 0%, #49a09d 100%);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #5f2c82 0%, #49a09d 100%);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .demos-section .container {
        margin-bottom: -50px;
    }

    .demos-section .demo-box {
        text-align: center;
        margin-bottom: 50px;
    }

    .demos-section .demo-box a:first-child {
        display: block;
        position: relative;
        margin-bottom: 20px;
    }

    .demos-section .demo-box a:first-child:after {
        content: "";
        font: normal normal normal 14px/1 FontAwesome;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        font-size: 35px;
        color: #FFF;
        background: rgba(52, 131, 255, 0.9);
        background: -webkit-linear-gradient(-45deg, rgba(205, 15, 216, 0.9) 0%, rgba(52, 131, 255, 0.9) 100%);
        background: -o-linear-gradient(-45deg, rgba(205, 15, 216, 0.9) 0%, rgba(52, 131, 255, 0.9) 100%);
        background: -moz-linear-gradient(-45deg, rgba(205, 15, 216, 0.9) 0%, rgba(52, 131, 255, 0.9) 100%);
        background: linear-gradient(-45deg, rgba(205, 15, 216, 0.9) 0%, rgba(52, 131, 255, 0.9) 100%);
        opacity: 0;
        -webkit-transform: rotateY(-180deg) scale(0.3);
        -moz-transform: rotateY(-180deg) scale(0.3);
        -o-transform: rotateY(-180deg) scale(0.3);
        -ms-transform: rotateY(-180deg) scale(0.3);
        transform: rotateY(-180deg) scale(0.3);
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
    }

    .demos-section .demo-box a:first-child:hover:after {
        opacity: 1;
        -webkit-transform: rotateY(0deg) scale(1);
        -moz-transform: rotateY(0deg) scale(1);
        -o-transform: rotateY(0deg) scale(1);
        -ms-transform: rotateY(0deg) scale(1);
        transform: rotateY(0deg) scale(1);
    }

    .demos-section .demo-box img {
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 450px;
        margin: auto;
    }

    .demos-section .demo-box h4 {
        margin-top: 30px;
        margin-bottom: 10px;
    }

    .demos-section .demo-box .appsLand-btn {
        margin-top: 10px;
    }

    .demos-section:nth-child(even) {
        background: #f9f9f9;
    }

    .demos-section .demos-sub-box .section-title {
        text-align: left;
        margin-bottom: 30px;
    }

    .demos-section .demos-sub-box .section-title h2 {
        font-size: 25px;
        text-transform: uppercase;
        margin: 0;
        font-weight: 900;
    }

    .demos-section .demos-sub-box .section-title.title__style-2 > span:before, .demos-section .demos-sub-box .section-title.title__style-2 h2 > span:before {
        content: none;
    }

    .demos-section .demos-sub-box .section-title span > span {
        margin-left: 0;
        border-radius: 0;
    }

    /* 3. NavBar
*********************************************/
    .appsLand-navbar {
        background: rgba(255, 255, 255, 0.05);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 0;
        padding-top: 10px;
        padding-bottom: 10px;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        z-index: 99;
    }

    .appsLand-navbar .navbar-brand {
        padding: 0;
    }

    .appsLand-navbar .navbar-brand img {
        height: 60px;
        margin: 6px 0px;
    }

    .appsLand-navbar .navbar-nav > li {
        padding: 0 13px;
        color: #FFF;
    }

    .appsLand-navbar .navbar-nav > li:first-child {
        margin-bottom: 15px;
    }

    .appsLand-navbar .navbar-nav > li > a, .appsLand-navbar .navbar-nav > li > span {
        padding: 26px 0;
        color: inherit;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    .appsLand-navbar .navbar-nav > li > a:before, .appsLand-navbar .navbar-nav > li > span:before {
        content: '';
        display: block;
        position: absolute;
        bottom: 10px;
        border-bottom: 2px solid;
        width: 100%;
        -webkit-transition: bottom 0.25s ease-in-out 0s;
        -moz-transition: bottom 0.25s ease-in-out 0s;
        -o-transition: bottom 0.25s ease-in-out 0s;
        transition: bottom 0.25s ease-in-out 0s;
        -webkit-transition: bottom 0.25s ease-in-out, opacity 0.25s ease-in-out;
        -moz-transition: bottom 0.25s ease-in-out, opacity 0.25s ease-in-out;
        -ms-transition: bottom 0.25s ease-in-out, opacity 0.25s ease-in-out;
        -o-transition: bottom 0.25s ease-in-out, opacity 0.25s ease-in-out;
        transition: bottom 0.25s ease-in-out, opacity 0.25s ease-in-out;
        opacity: 0;
    }

    .appsLand-navbar .navbar-nav > li > a:focus, .appsLand-navbar .navbar-nav > li > span:focus {
        color: inherit;
    }

    .appsLand-navbar .navbar-nav > li > a:hover, .appsLand-navbar .navbar-nav > li > span:hover {
        color: inherit;
    }

    .appsLand-navbar .navbar-nav > li > a:hover:before, .appsLand-navbar .navbar-nav > li > span:hover:before {
        bottom: 15px;
        opacity: 1;
    }

    .appsLand-navbar .navbar-nav > li.active > a, .appsLand-navbar .navbar-nav > li.active > span {
        background: none;
        color: inherit;
    }

    .appsLand-navbar .navbar-nav > li.active > a:focus, .appsLand-navbar .navbar-nav > li.active > a:hover, .appsLand-navbar .navbar-nav > li.active > span:focus, .appsLand-navbar .navbar-nav > li.active > span:hover {
        color: inherit;
    }

    .appsLand-navbar .navbar-nav > li.active > a:before, .appsLand-navbar .navbar-nav > li.active > span:before {
        bottom: 15px;
        opacity: 1;
    }

    .appsLand-navbar.active-navbar {
        width: 100%;
        z-index: 999;
        background: #FFF;
        padding-top: 0;
        padding-bottom: 0;
        box-shadow: 0 1px 4px rgba(2, 3, 3, 0.15);
    }

    .appsLand-navbar.active-navbar .navbar-nav > li {
        color: #333;
    }

    .appsLand-navbar .dropdown.open .dropdown-menu {
        top: 100%;
        opacity: 1;
        visibility: visible;
    }

    .appsLand-navbar .dropdown-menu {
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
        display: block;
        border: 0;
        min-width: 200px;
        padding: 0;
        top: 110%;
        opacity: 0;
        visibility: hidden;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
    }

    .appsLand-navbar .dropdown-menu li:last-child a {
        border-radius: 0 0 5px 5px;
        border-bottom: 0;
    }

    .appsLand-navbar .dropdown-menu a {
        padding: 10px 0 10px 15px;
        border-bottom: 1px solid #EEE;
    }

    .appsLand-navbar .dropdown-menu .subMenu {
        line-height: 8px;
        font-size: 8px;
    }

    .appsLand-navbar .dropdown-menu:before {
        content: '';
        position: absolute;
        display: inline-block;
        border: 10px solid transparent;
        border-bottom-color: #FFF;
        top: -20px;
        right: 20px;
    }

    .appsLand-navbar .dropdown-menu > li > a {
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    .appsLand-navbar .dropdown-menu > li > a:hover, .appsLand-navbar .dropdown-menu > li > a:focus {
        background: #EEE;
    }

    .appsLand-navbar .menu-toggle {
        cursor: pointer;
        padding: 8px;
        display: none;
        margin: 5px 0;
        -webkit-transition: all 0.2s ease-in-out 0s;
        -moz-transition: all 0.2s ease-in-out 0s;
        -o-transition: all 0.2s ease-in-out 0s;
        transition: all 0.2s ease-in-out 0s;
        float: right;
        z-index: 2;
        position: relative;
    }

    .appsLand-navbar .menu-toggle .chart {
        display: block;
        width: 35px;
        height: 4px;
        background-color: #fff;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }

    .appsLand-navbar .menu-toggle .chart:nth-child(2) {
        margin: 6px 0;
    }

    .appsLand-navbar.mobile-menu-active .menu-toggle .chart:nth-child(2) {
        -webkit-transform: scale(0);
        -moz-transform: scale(0);
        -ms-transform: scale(0);
        -o-transform: scale(0);
        transform: scale(0);
    }

    .appsLand-navbar.mobile-menu-active .menu-toggle .chart:first-child {
        -webkit-transform: translateY(10px) rotate(45deg);
        -moz-transform: translateY(10px) rotate(45deg);
        -ms-transform: translateY(10px) rotate(45deg);
        -o-transform: translateY(10px) rotate(45deg);
        transform: translateY(10px) rotate(45deg);
    }

    .appsLand-navbar.mobile-menu-active .menu-toggle .chart:last-child {
        -webkit-transform: translateY(-10px) rotate(-45deg);
        -moz-transform: translateY(-10px) rotate(-45deg);
        -ms-transform: translateY(-10px) rotate(-45deg);
        -o-transform: translateY(-10px) rotate(-45deg);
        transform: translateY(-10px) rotate(-45deg);
    }

    .appsLand-navbar .mobile-dropdown-menu > span {
        position: relative;
    }

    .appsLand-navbar .mobile-dropdown-menu > span:after {
        content: "\f107";
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        position: absolute;
        z-index: 3;
        top: 20px;
        right: 20px;
        color: inherit;
    }

    .appsLand-navbar .mobile-dropdown-menu span[aria-expanded="true"]:after {
        content: "\f106";
        color: inherit;
    }

    .appsLand-navbar .mobile-dropdown-menu span[aria-expanded="true"] {
        background: #f9f9f9;
    }

    .appsLand-navbar .mobile-dropdown-menu .collapse.in,
    .appsLand-navbar .mobile-dropdown-menu .collapsing {
        background: #f9f9f9;
    }

    .appsLand-navbar .mobile-dropdown-menu a {
        font-weight: 600;
        letter-spacing: 0.7px;
        display: block;
        padding: 15px 45px;
        text-decoration: none;
        color: #777;
        border-top: 1px solid #EEE;
        font-size: 13px;
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    .appsLand-navbar .mobile-dropdown-menu a:hover {
        color: #333;
    }

    .appsLand-navbar.navBar__style-2.active-navbar {
        width: 100%;
        z-index: 999;
        padding-top: 10px;
        padding-bottom: 10px;
        box-shadow: 0 0px 25px rgba(2, 3, 3, 0.3);
    }

    .appsLand-navbar.navBar__style-2.active-navbar .navbar-nav > li > a, .appsLand-navbar.navBar__style-2.active-navbar .navbar-nav > li > span {
        color: #FFF;
    }

    .appsLand-navbar.navBar__style-2.active-navbar .navbar-nav > li > a:before, .appsLand-navbar.navBar__style-2.active-navbar .navbar-nav > li > span:before {
        border-color: #FFF;
    }

    .appsLand-navbar.navBar__style-2.active-navbar .navbar-nav > li > a:hover, .appsLand-navbar.navBar__style-2.active-navbar .navbar-nav > li > span:hover {
        color: #FFF;
    }

    .appsLand-navbar.navBar__style-2.active-navbar .navbar-nav > li.active > a, .appsLand-navbar.navBar__style-2.active-navbar .navbar-nav > li.active > span {
        color: #FFF;
    }

    .appsLand-navbar.navBar__style-2.active-navbar .navbar-nav > li.active > a:hover, .appsLand-navbar.navBar__style-2.active-navbar .navbar-nav > li.active > span:hover {
        color: #FFF;
    }

    .appsLand-navbar.navBar__style-2.active-navbar .menu-toggle .chart {
        background: #FFF;
    }

    /* 4. Header
*********************************************/
    /* 4.1 Home Page Header */
    header.appsLand-header {
        background: url("http://placehold.it/1980x1080") top center no-repeat fixed;
        background-size: cover;
        color: #FFFFFF;
        position: relative;
        z-index: 3;
        overflow: hidden;
    }

    header.appsLand-header.particle-header {
        position: relative;
    }

    header.appsLand-header.particle-header canvas {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
    }

    header.appsLand-header.bg-video .the-video {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    header.appsLand-header.bg-video .the-video video {
        width: 100%;
    }

    header.appsLand-header .app-overlay {
        padding-top: 202px;
        padding-bottom: 100px;
        position: relative;
        z-index: 2;
    }

    header.appsLand-header .header-content .site-intro-content h1 {
        font-weight: 900;
        text-transform: uppercase;
        font-size: 50px;
        text-shadow: 1px 1px 4px rgba(2, 3, 3, 0.25);
        margin-top: 0;
        margin-bottom: 20px;
    }

    header.appsLand-header .header-content .site-intro-content p {
        text-shadow: 1px 1px 1px rgba(2, 3, 3, 0.5);
        margin-bottom: 30px;
    }

    header.appsLand-header .header-content .site-intro-content .header-links {
        margin-left: -10px;
        margin-bottom: 0;
    }

    header.appsLand-header .header-content .site-intro-content .header-links > li {
        padding-right: 10px;
        padding-left: 10px;
    }

    header.appsLand-header.cloud-bg .app-overlay > * {
        position: relative;
        z-index: 3;
    }

    header.appsLand-header.cloud-bg .app-overlay:after {
        content: '';
        position: absolute;
        bottom: 0;
        display: block;
        height: 120px;
        width: 100%;
        background: url(../images/SVG/cloud.svg);
        background-size: 218vh 100%;
        z-index: 2;
    }

    header.appsLand-header.triangle-up-bg .app-overlay > * {
        position: relative;
        z-index: 3;
    }

    header.appsLand-header.triangle-up-bg .app-overlay:after {
        content: '';
        position: absolute;
        bottom: 0;
        display: block;
        height: 120px;
        width: 100%;
        background: url(../images/SVG/triangle.svg);
        background-size: cover;
        -webkit-transform: rotateX(180deg);
        -moz-transform: rotateX(180deg);
        -o-transform: rotateX(180deg);
        -ms-transform: rotateX(180deg);
        transform: rotateX(180deg);
        z-index: 2;
    }

    header.appsLand-header.triangle-down-bg-1 .app-overlay * {
        position: relative;
        z-index: 3;
    }

    header.appsLand-header.triangle-down-bg-1 .app-overlay:after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: -6px;
        display: block;
        height: 133px;
        width: calc(100% + 12px);
        background: url(../images/SVG/triangle2.svg);
        background-size: cover;
        background-position: center bottom;
        z-index: 2;
    }

    header.appsLand-header.triangle-down-bg-2 .app-overlay > * {
        position: relative;
        z-index: 3;
    }

    header.appsLand-header.triangle-down-bg-2 .app-overlay:after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: -6px;
        display: block;
        height: 133px;
        width: calc(100% + 12px);
        background: url(../images/SVG/triangle2.svg);
        background-size: auto;
        background-position: center bottom;
        background-repeat: repeat-x;
        z-index: 2;
    }

    header.appsLand-header.custom-shape-1 .app-overlay * * {
        position: relative;
        z-index: 9;
    }

    header.appsLand-header.custom-shape-1 .app-overlay:after {
        content: '';
        display: block;
        height: 500%;
        width: 100%;
        background: #FFF;
        position: absolute;
        top: 100%;
        -webkit-transform: skewY(-12deg);
        -moz-transform: skewY(-12deg);
        -ms-transform: skewY(-12deg);
        -o-transform: skewY(-12deg);
        transform: skewY(-12deg);
        transform-origin: top left;
    }

    /* 4.2 Sub Pages Header */
    .inner-header {
        background: url("http://placehold.it/1980x1080") bottom center no-repeat fixed;
        background-size: cover;
        color: #FFFFFF;
        position: relative;
        z-index: 3;
        overflow: hidden;
    }

    .inner-header .app-overlay {
        padding-top: 212px;
        padding-bottom: 110px;
    }

    .inner-header .header-content {
        text-align: center;
    }

    .inner-header .header-content h1 {
        font-weight: 900;
        text-transform: uppercase;
        text-shadow: 1px 1px 4px rgba(2, 3, 3, 0.25);
        margin-top: 0;
        margin-bottom: 30px;
    }

    .inner-header .header-content .header-links {
        margin-bottom: 0;
    }

    .inner-header .header-content .header-links li {
        font-size: 17px;
        position: relative;
        padding-left: 15px;
        margin-left: 15px;
        padding-right: 0;
        text-transform: uppercase;
        font-weight: 900;
    }

    .inner-header .header-content .header-links li:before {
        content: '/';
        position: absolute;
        left: -4px;
    }

    .inner-header .header-content .header-links li:first-child {
        padding-left: 0;
        margin-left: 0;
    }

    .inner-header .header-content .header-links li:first-child:before {
        content: none;
    }

    .inner-header .header-content .header-links a {
        color: #FFF;
        text-decoration: none;
    }

    .inner-header .header-content .header-links span {
        color: #BBB;
    }

    /* 5. Main Content
*********************************************/
    .entry-main {
        position: relative;
        z-index: 2;
        background: #fff;
    }

    .entry-main > section, .entry-main > div {
        padding: 130px 0;
        overflow: hidden;
    }

    .entry-main > section.section-bg-img, .entry-main > div.section-bg-img {
        padding: 0;
    }

    .entry-main > section.section-bg-img .app-overlay, .entry-main > div.section-bg-img .app-overlay {
        padding: 130px 0;
    }

    .entry-main > section.section-bg-img.section-without-title, .entry-main > div.section-bg-img.section-without-title {
        padding: 0;
    }

    .entry-main > section.section-bg-img.section-without-title .app-overlay, .entry-main > div.section-bg-img.section-without-title .app-overlay {
        padding: 90px 0;
    }

    .entry-main > section.section-without-title, .entry-main > div.section-without-title {
        padding: 90px 0;
    }

    /* 6. Mini Feature
*********************************************/
    /* 6.1 Mini Feature Style1 */
    .mini-feature .container {
        margin-bottom: -30px;
    }

    .mini-feature .mini-feature-box {
        text-align: center;
        margin-bottom: 30px;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        padding: 50px 30px;
    }

    .mini-feature .mini-feature-box .icon-box {
        font-size: 40px;
        line-height: 80px;
        width: 80px;
        height: 80px;
        margin: auto;
        -webkit-box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        -o-box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .mini-feature .mini-feature-box .icon-box:before {
        content: "";
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        z-index: 1;
    }

    .mini-feature .mini-feature-box .icon-box:after {
        content: "";
        display: block;
        width: 90%;
        height: 90%;
        position: absolute;
        border: 2px dotted #FFF;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        top: 5%;
        left: 5%;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        z-index: 2;
    }

    .mini-feature .mini-feature-box .icon-box * {
        position: relative;
        z-index: 2;
    }

    .mini-feature .mini-feature-box h3 {
        margin-bottom: 10px;
        margin-top: 30px;
    }

    .mini-feature .mini-feature-box p {
        margin-bottom: 0;
        margin-top: 0;
    }

    .mini-feature .mini-feature-box:hover, .mini-feature .mini-feature-box.active {
        -webkit-box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        -o-box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        -webkit-transform: scale(1.03);
        -moz-transform: scale(1.03);
        -o-transform: scale(1.03);
        -ms-transform: scale(1.03);
        transform: scale(1.03);
    }

    .mini-feature .mini-feature-box:hover .icon-box *, .mini-feature .mini-feature-box.active .icon-box * {
        color: #FFF;
    }

    .mini-feature .mini-feature-box:hover .icon-box:before, .mini-feature .mini-feature-box.active .icon-box:before {
        opacity: 1;
    }

    /* 6.2 Mini Feature Style2 */
    .mini-feature__style-2 .container {
        margin-bottom: -30px;
    }

    .mini-feature__style-2 .mini-feature-box {
        margin-bottom: 30px;
        padding: 25px;
        overflow: hidden;
        position: relative;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
    }

    .mini-feature__style-2 .mini-feature-box .icon-box {
        font-size: 40px;
        line-height: 1;
        width: 60px;
        float: left;
        position: static;
    }

    .mini-feature__style-2 .mini-feature-box .icon-box img {
        width: 60px;
        display: inline-block;
    }

    .mini-feature__style-2 .mini-feature-box .icon-box img:nth-child(2) {
        position: absolute;
        top: 25px;
        left: 25px;
        opacity: 1;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
    }

    .mini-feature__style-2 .mini-feature-box .data-box {
        width: calc(100% - 60px);
        float: left;
        padding-left: 25px;
        position: relative;
        z-index: 2;
    }

    .mini-feature__style-2 .mini-feature-box .data-box h3 {
        margin-top: 0;
    }

    .mini-feature__style-2 .mini-feature-box .data-box p {
        margin-bottom: 0;
    }

    .mini-feature__style-2 .mini-feature-box:hover {
        -webkit-box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
        -o-box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
        -webkit-transform: scale(1.03);
        -moz-transform: scale(1.03);
        -o-transform: scale(1.03);
        -ms-transform: scale(1.03);
        transform: scale(1.03);
    }

    .mini-feature__style-2 .mini-feature-box:hover .icon-box img:nth-child(2) {
        top: calc(100% - 90px);
        left: calc(100% - 90px);
        -webkit-transform: rotate(-45deg) scale(1.5);
        -moz-transform: rotate(-45deg) scale(1.5);
        -o-transform: rotate(-45deg) scale(1.5);
        -ms-transform: rotate(-45deg) scale(1.5);
        transform: rotate(-45deg) scale(1.5);
        opacity: 0.4;
    }

    /* 7 Screen Shots
*********************************************/
    /* 7.1 Screen Shots Style1 */
    .app-screen {
        position: relative;
        padding-top: 64px;
    }

    .screenShots {
        background: #F9F9F9;
    }

    .screenShots .swiper-container {
        width: 100%;
        overflow: hidden;
    }

    .screenShots .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 250px;
    }

    /* 7.2 Screen Shots Style2 */
    .screenShots__style-2 {
        background: #F9F9F9;
    }

    .screenShots__style-2 .screenshots-slider-container__2 {
        width: 250px;
        margin: auto;
    }

    .screenShots__style-2 .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 250px;
    }

    /* 7.3 mobile mockup */
    .mobile-mockup {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    .mobile-mockup img {
        width: 285px;
    }

    /* 7.4 slider arrows */
    .custom_slider_arrows {
        text-align: center;
    }

    .custom_slider_arrows ul {
        margin-top: 90px;
    }

    .custom_slider_arrows .appsLand-btn {
        width: 45px;
        height: 45px;
        padding: 0;
        line-height: 45px;
        border: 0;
        font-size: 21px;
        text-align: center;
    }

    .custom_slider_arrows .appsLand-btn i {
        margin: 0;
    }

    /* 8. Features
*********************************************/
    /* 8.1 Feature Style1 */
    .features .appInfo-row {
        margin-bottom: 60px;
    }

    .features .appInfo-row:last-child {
        margin-bottom: 0;
    }

    .features .appInfo-data {
        padding-top: 100px;
    }

    .features .appInfo-data h2 {
        color: #000;
        margin-top: 0;
        margin-bottom: 20px;
    }

    .features .appInfo-data p {
        color: #777;
        margin-bottom: 30px;
        font-size: 19px;
    }

    /* 8.2 Feature Style2 */
    .features__style-2 .feat-tabs {
        font-size: 0;
        border: 0;
        -webkit-box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
        -o-box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
    }

    .features__style-2 .feat-tabs li {
        width: calc(100% / 6);
        padding: 0;
        font-size: 14px;
        border-bottom: 1px solid #EEE;
    }

    .features__style-2 .feat-tabs li a {
        display: block;
        text-align: center;
        margin-right: 0;
        border: 0;
        padding: 25px 10px;
        text-transform: uppercase;
        font-weight: bold;
        color: #34495e;
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    .features__style-2 .feat-tabs li a i {
        margin-right: 10px;
    }

    .features__style-2 .feat-tabs li a:hover, .features__style-2 .feat-tabs li a:focus {
        border: 0;
        background: none;
    }

    .features__style-2 .feat-tabs li.active {
        border-bottom: 1px solid;
    }

    .features__style-2 .tab-content {
        padding-top: 60px;
    }

    .features__style-2 .tab-content .appInfo-data h2 {
        color: #000;
        margin-top: 0;
        margin-bottom: 20px;
    }

    .features__style-2 .tab-content .appInfo-data p {
        color: #777;
        margin-bottom: 30px;
        font-size: 19px;
    }

    /* 9 Download
*********************************************/
    .download {
        background: url("{{asset('assets/images/backgrounds/copyrights-protegidos.jpg')}}") center center no-repeat fixed;
        background-size: cover;
    }

    .download .download-buttons {
        text-align: center;
    }

    /* 10 Pricing
*********************************************/
    .pricing .container {
        margin-bottom: -30px;
    }

    .pricing .pricing-tables {
        text-align: center;
    }

    .pricing .pricing-tables .pricing-table {
        background: #FFFFFF;
        -webkit-box-shadow: 1px 1px 25px rgba(2, 3, 3, 0.15);
        -moz-box-shadow: 1px 1px 25px rgba(2, 3, 3, 0.15);
        -o-box-shadow: 1px 1px 25px rgba(2, 3, 3, 0.15);
        box-shadow: 1px 1px 25px rgba(2, 3, 3, 0.15);
        margin-bottom: 30px;
    }

    .pricing .pricing-tables .pricing-recommended .pricing-price p {
        background: transparent;
        color: #FFF;
    }

    .pricing .pricing-tables .pricing-header {
        padding: 30px 25px;
        text-transform: uppercase;
    }

    .pricing .pricing-tables .pricing-header h2 {
        margin: 0;
    }

    .pricing .pricing-tables .pricing-price {
        background: #F9F9F9;
        padding: 40px 25px;
    }

    .pricing .pricing-tables .pricing-price p {
        margin: 0;
        font-size: 50px;
        line-height: 1;
        font-weight: bold;
    }

    .pricing .pricing-tables .pricing-price p .sup {
        font-size: 20px;
        vertical-align: top;
    }

    .pricing .pricing-tables .pricing-price p .price {
        vertical-align: middle;
    }

    .pricing .pricing-tables .pricing-price p .sub {
        font-size: 13px;
        vertical-align: bottom;
    }

    .pricing .pricing-tables .pricing-feature {
        margin: 0;
    }

    .pricing .pricing-tables .pricing-feature li {
        padding: 25px;
        border-bottom: 1px solid #EEE;
        overflow: hidden;
        font-weight: bold;
        line-height: 1;
    }

    .pricing .pricing-tables .pricing-feature li > span:first-child {
        float: left;
    }

    .pricing .pricing-tables .pricing-feature li > span:last-child {
        float: right;
        min-width: 20px;
        display: inline-block;
    }

    .pricing .pricing-tables .pricing-btn {
        padding: 25px;
    }

    /* 11 Testimonials
*********************************************/
    .testimonials {
        background: url("{{asset('assets/images/backgrounds/testemonials.png')}}") bottom center no-repeat fixed;
        background-size: cover;
    }

    .testimonials .testimonials-template .testimonials-slide {
        background: #FFF;
        padding: 70px;
        width: 100%;
    }

    .testimonials .testimonials-template .testimonials-slide:before {
        content: "\f10d";
        position: absolute;
        right: 50px;
        bottom: 30px;
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: 130px;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .testimonials .testimonials-template .testimonials-slide .row {
        margin-right: -45px;
        margin-left: -45px;
    }

    .testimonials .testimonials-template .testimonials-slide [class*="col-"] {
        padding-left: 45px;
        padding-right: 45px;
    }

    .testimonials .testimonials-template .testimonials-slide .col-left {
        border-right: 1px solid #EEE;
    }

    .testimonials .testimonials-template .testimonials-slide .col-right {
        -webkit-box-shadow: -1px 0px 0px #EEE;
        -moz-box-shadow: -1px 0px 0px #EEE;
        -o-box-shadow: -1px 0px 0px #EEE;
        box-shadow: -1px 0px 0px #EEE;
    }

    .testimonials .testimonials-template .testimonials-slide .client-info {
        text-align: center;
    }

    .testimonials .testimonials-template .testimonials-slide .client-info .client-pic img {
        width: 100px;
        height: 100px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .testimonials .testimonials-template .testimonials-slide .client-info .client-name {
        margin-top: 20px;
        margin-bottom: 5px;
        color: #000;
        font-size: 17px;
    }

    .testimonials .testimonials-template .testimonials-slide .client-info .client-career {
        margin: 0;
    }

    .testimonials .testimonials-template .testimonials-slide .client-review p {
        color: #777;
        font-style: italic;
        font-size: 14px;
        line-height: 24px;
        font-weight: 500;
        margin: 0;
    }

    /* 12 Team
*********************************************/
    /* 12.1 Team Style2 */
    .team .container {
        margin-bottom: -30px;
    }

    .team .team-member {
        -webkit-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.25);
        -moz-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.25);
        -o-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.25);
        box-shadow: 0 3px 25px rgba(2, 3, 3, 0.25);
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 1px solid #EEE;
        overflow: hidden;
        padding-bottom: 76px;
        margin-bottom: 30px;
    }

    .team .team-member .team-member-content {
        position: relative;
    }

    .team .team-member .member-pic {
        position: relative;
        background: #EEEEEE;
    }

    .team .team-member .member-pic:after {
        content: '';
        display: block;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.25);
        top: 0;
        left: 0;
        position: absolute;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        opacity: 0;
    }

    .team .team-member .member-pic img {
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        margin: auto;
    }

    .team .team-member:hover .member-info {
        top: calc(100% - 56px);
    }

    .team .team-member:hover .member-pic img {
        -webkit-transform: scale(1.1) translateY(-40px);
        -moz-transform: scale(1.1) translateY(-40px);
        -o-transform: scale(1.1) translateY(-40px);
        -ms-transform: scale(1.1) translateY(-40px);
        transform: scale(1.1) translateY(-40px);
    }

    .team .team-member:hover .member-pic:after {
        opacity: 1;
    }

    .team .team-member:hover .member-info .member-social li {
        opacity: 1;
        top: 0px;
        -webkit-transform: rotate(0deg) translateY(0px);
        -moz-transform: rotate(0deg) translateY(0px);
        -o-transform: rotate(0deg) translateY(0px);
        -ms-transform: rotate(0deg) translateY(0px);
        transform: rotate(0deg) translateY(0px);
    }

    .team .team-member:hover .member-info .member-social li:nth-child(1) {
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    .team .team-member:hover .member-info .member-social li:nth-child(2) {
        -webkit-transition: all 0.25s ease-in-out 0.1s;
        -moz-transition: all 0.25s ease-in-out 0.1s;
        -o-transition: all 0.25s ease-in-out 0.1s;
        transition: all 0.25s ease-in-out 0.1s;
    }

    .team .team-member:hover .member-info .member-social li:nth-child(3) {
        -webkit-transition: all 0.25s ease-in-out 0.2s;
        -moz-transition: all 0.25s ease-in-out 0.2s;
        -o-transition: all 0.25s ease-in-out 0.2s;
        transition: all 0.25s ease-in-out 0.2s;
    }

    .team .team-member:hover .member-info .member-social li:nth-child(4) {
        -webkit-transition: all 0.25s ease-in-out 0.3s;
        -moz-transition: all 0.25s ease-in-out 0.3s;
        -o-transition: all 0.25s ease-in-out 0.3s;
        transition: all 0.25s ease-in-out 0.3s;
    }

    .team .team-member:hover .member-info .member-social li:nth-child(5) {
        -webkit-transition: all 0.25s ease-in-out 0.4s;
        -moz-transition: all 0.25s ease-in-out 0.4s;
        -o-transition: all 0.25s ease-in-out 0.4s;
        transition: all 0.25s ease-in-out 0.4s;
    }

    .team .team-member .member-info {
        padding: 20px;
        position: absolute;
        z-index: 3;
        top: 100%;
        width: 100%;
        background: #FFF;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
    }

    .team .team-member .member-info .name-career {
        border-bottom: 1px solid #EEE;
        padding-bottom: 15px;
        margin-bottom: 15px;
    }

    .team .team-member .member-info .name-career h4 {
        margin: 0;
        margin-bottom: 5px;
        font-size: 15px;
        color: #000;
    }

    .team .team-member .member-info .name-career span {
        font-size: 12px;
        color: #777;
    }

    .team .team-member .member-info .member-social li {
        position: relative;
        top: 20px;
        opacity: 1;
        -webkit-transform: rotate(30deg) translateY(20px);
        -moz-transform: rotate(30deg) translateY(20px);
        -o-transform: rotate(30deg) translateY(20px);
        -ms-transform: rotate(30deg) translateY(20px);
        transform: rotate(30deg) translateY(20px);
    }

    .team .team-member .member-info .member-social li:nth-child(1) {
        -webkit-transition: all 0.25s ease-in-out 0.4s;
        -moz-transition: all 0.25s ease-in-out 0.4s;
        -o-transition: all 0.25s ease-in-out 0.4s;
        transition: all 0.25s ease-in-out 0.4s;
    }

    .team .team-member .member-info .member-social li:nth-child(2) {
        -webkit-transition: all 0.25s ease-in-out 0.3s;
        -moz-transition: all 0.25s ease-in-out 0.3s;
        -o-transition: all 0.25s ease-in-out 0.3s;
        transition: all 0.25s ease-in-out 0.3s;
    }

    .team .team-member .member-info .member-social li:nth-child(3) {
        -webkit-transition: all 0.25s ease-in-out 0.2s;
        -moz-transition: all 0.25s ease-in-out 0.2s;
        -o-transition: all 0.25s ease-in-out 0.2s;
        transition: all 0.25s ease-in-out 0.2s;
    }

    .team .team-member .member-info .member-social li:nth-child(4) {
        -webkit-transition: all 0.25s ease-in-out 0.1s;
        -moz-transition: all 0.25s ease-in-out 0.1s;
        -o-transition: all 0.25s ease-in-out 0.1s;
        transition: all 0.25s ease-in-out 0.1s;
    }

    .team .team-member .member-info .member-social li:nth-child(5) {
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    .team .team-member .member-info .member-social a {
        color: #777;
    }

    /* 12.1 Team Style1 */
    .team__style-2 .container {
        margin-bottom: -30px;
    }

    .team__style-2 .team-member {
        -webkit-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.25);
        -moz-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.25);
        -o-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.25);
        box-shadow: 0 3px 25px rgba(2, 3, 3, 0.25);
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 1px solid #EEE;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .team__style-2 .team-member .team-member-content {
        position: relative;
    }

    .team__style-2 .team-member .member-pic {
        position: relative;
        background: #EEEEEE;
    }

    .team__style-2 .team-member .member-pic img {
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        margin: auto;
    }

    .team__style-2 .team-member:hover .member-info {
        opacity: 1;
        visibility: visible;
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -o-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }

    .team__style-2 .team-member:hover .member-pic img {
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -o-transform: scale(1.2);
        -ms-transform: scale(1.2);
        transform: scale(1.2);
    }

    .team__style-2 .team-member .member-info {
        padding: 20px;
        position: absolute;
        z-index: 3;
        top: 0;
        width: 100%;
        height: 100%;
        color: #fff;
        text-align: center;
        display: flex;
        justify-content: center;
        justify-items: center;
        align-content: center;
        align-items: center;
        opacity: 0;
        visibility: hidden;
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -o-transform: scale(1.2);
        -ms-transform: scale(1.2);
        transform: scale(1.2);
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
    }

    .team__style-2 .team-member .member-info .name-career {
        margin-bottom: 10px;
    }

    .team__style-2 .team-member .member-info .name-career h4 {
        margin: 0;
        margin-bottom: 5px;
        font-size: 19px;
        color: #FFF;
        text-transform: uppercase;
    }

    .team__style-2 .team-member .member-info .name-career span {
        font-size: 13px;
        color: #EEEEEE;
    }

    .team__style-2 .team-member .member-info .member-social {
        margin-bottom: 0;
    }

    .team__style-2 .team-member .member-info .member-social a {
        color: #EEE;
        margin: 0 5px;
    }

    .team__style-2 .team-member .member-info .member-social a:hover {
        color: #FFF;
    }

    /* 13 Video
*********************************************/
    /* 13.1 Video Section */
    .video {
        background: url("http://placehold.it/1980x1080") center center no-repeat fixed;
        background-size: cover;
        text-align: center;
    }

    .video .play-video-icon img {
        cursor: pointer;
    }

    /* 13.2 Video PopUp */
    .apps-video .close-video-btn {
        position: absolute;
        top: 30px;
        right: 30px;
        font-size: 30px;
        opacity: 1;
        color: #fff;
    }

    /* 14 FAQ
*********************************************/
    .faq .questions-container .panel {
        border: 0;
        margin-bottom: 15px;
        -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        -o-box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
    }

    .faq .questions-container .panel-body {
        padding: 20px;
    }

    .faq .questions-container .panel-heading {
        padding: 0;
    }

    .faq .questions-container .panel-heading a {
        padding: 20px 40px 20px 20px;
        display: block;
        text-decoration: none;
        background: #FFF;
        font-size: 17px;
        position: relative;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }

    .faq .questions-container .panel-heading a:after {
        content: "\f106";
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        position: absolute;
        z-index: 3;
        top: 20px;
        right: 20px;
        color: #FFF;
    }

    .faq .questions-container .panel-heading a:hover:after {
        color: #FFF;
    }

    .faq .questions-container .panel-heading a:before {
        opacity: 1;
    }

    .faq .questions-container .panel-heading a * {
        color: #FFF;
    }

    .faq .questions-container .panel-heading a.collapsed:after {
        content: "\f107";
        color: inherit;
    }

    .faq .questions-container .panel-heading a.collapsed:before {
        opacity: 0;
    }

    .faq .questions-container .panel-heading a.collapsed * {
        color: inherit;
    }

    .faq .questions-container .panel-body p {
        margin: 0;
        color: #777;
    }

    /* 15 Statistics
*********************************************/
    .statistics {
        background: url("http://placehold.it/1980x1080") bottom center no-repeat fixed;
        background-size: cover;
    }

    .statistics .download-buttons {
        text-align: center;
    }

    .statistics .app-overlay .container {
        margin-bottom: -30px;
    }

    .statistics .stats {
        position: relative;
        color: #fff;
        padding-left: 75px;
        margin-bottom: 30px;
    }

    .statistics .stats .stats-icon {
        position: absolute;
        width: 50px;
        height: 50px;
        left: 0;
        top: 3px;
        line-height: 50px;
        text-align: center;
        border: 1px solid #FFF;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        font-size: 20px;
    }

    .statistics .stats p {
        font-size: 27px;
        margin-top: 0;
        margin-bottom: 14px;
        line-height: 1;
    }

    .statistics .stats h5 {
        margin-top: 0;
        margin-bottom: 0;
        text-transform: uppercase;
    }

    /* 16 Blog
*********************************************/
    .blog .container {
        margin-bottom: -30px;
    }

    /* 16.1 Normal Post */
    .normal-post {
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
        margin-bottom: 30px;
        overflow: hidden;
        background: #ffffff;
        -webkit-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.15);
        -moz-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.15);
        -o-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.15);
        box-shadow: 0 3px 25px rgba(2, 3, 3, 0.15);
    }

    .normal-post .entry-header {
        position: relative;
    }

    .normal-post .entry-header .post-image {
        position: relative;
    }

    .normal-post .entry-content {
        padding: 20px;
        position: relative;
    }

    .normal-post .entry-content .entry-post-info {
        padding-bottom: 15px;
        margin-bottom: 15px;
        border-bottom: 1px solid #EEE;
    }

    .normal-post .entry-content .entry-post-info h4 {
        margin: 0;
    }

    .normal-post .entry-content .entry-post-info h4 a {
        color: #333;
        text-decoration: none;
        font-size: 16px;
        font-weight: 700;
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    .normal-post .entry-content .entry-post-info .posted-on {
        font-size: 14px;
        margin-bottom: 0;
        color: #FFF;
        position: absolute;
        right: 25px;
        top: -32px;
        height: 64px;
        width: 64px;
        text-align: center;
        font-weight: bold;
        text-transform: uppercase;
        padding: 14px 0;
        line-height: 1;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        -webkit-box-shadow: 0 3px 15px rgba(2, 3, 3, 0.25);
        -moz-box-shadow: 0 3px 15px rgba(2, 3, 3, 0.25);
        -o-box-shadow: 0 3px 15px rgba(2, 3, 3, 0.25);
        box-shadow: 0 3px 15px rgba(2, 3, 3, 0.25);
    }

    .normal-post .entry-content .entry-post-info .posted-on span {
        display: block;
        margin-bottom: 7px;
    }

    .normal-post .entry-content .entry-expert p {
        font-weight: 400;
        margin-bottom: 0;
        font-size: 13px;
        line-height: 24px;
        color: #777;
    }

    .normal-post .entry-content .entry-expert .post-readMore {
        overflow: hidden;
        padding-top: 15px;
    }

    .normal-post .entry-content .entry-expert .post-readMore a {
        font-size: 13px;
        text-decoration: none;
        font-weight: 700;
        color: #999;
        text-transform: uppercase;
        -webkit-transition: all 0.2s ease-in-out 0s;
        -moz-transition: all 0.2s ease-in-out 0s;
        -o-transition: all 0.2s ease-in-out 0s;
        transition: all 0.2s ease-in-out 0s;
    }

    .normal-post .entry-content .entry-expert .post-readMore a i {
        margin-left: 5px;
    }

    .normal-post .entry-footer {
        padding: 15px 20px 5px;
        border-top: 1px solid #EEE;
    }

    /* 16.2 List Post */
    .list-post {
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
        margin-bottom: 30px;
        overflow: hidden;
        background: #ffffff;
        -webkit-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.15);
        -moz-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.15);
        -o-box-shadow: 0 3px 25px rgba(2, 3, 3, 0.15);
        box-shadow: 0 3px 25px rgba(2, 3, 3, 0.15);
        overflow: hidden;
    }

    .list-post .entry-header {
        position: relative;
        width: 40%;
        float: left;
    }

    .list-post .entry-header .post-image {
        position: relative;
    }

    .list-post .entry-content-footer {
        width: 60%;
        float: left;
        position: relative;
    }

    .list-post .entry-content {
        padding: 20px;
    }

    .list-post .entry-content .entry-post-info {
        padding-bottom: 15px;
        margin-bottom: 15px;
        border-bottom: 1px solid #EEE;
    }

    .list-post .entry-content .entry-post-info h4 {
        margin: 0;
    }

    .list-post .entry-content .entry-post-info h4 a {
        color: #333;
        text-decoration: none;
        font-size: 16px;
        font-weight: 700;
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    .list-post .entry-content .entry-post-info .posted-on {
        font-size: 14px;
        margin-bottom: 0;
        color: #FFF;
        position: absolute;
        left: -84px;
        top: 20px;
        height: 64px;
        width: 64px;
        text-align: center;
        font-weight: bold;
        text-transform: uppercase;
        padding: 14px 0;
        line-height: 1;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        -webkit-box-shadow: 0 3px 15px rgba(2, 3, 3, 0.25);
        -moz-box-shadow: 0 3px 15px rgba(2, 3, 3, 0.25);
        -o-box-shadow: 0 3px 15px rgba(2, 3, 3, 0.25);
        box-shadow: 0 3px 15px rgba(2, 3, 3, 0.25);
    }

    .list-post .entry-content .entry-post-info .posted-on span {
        display: block;
        margin-bottom: 7px;
    }

    .list-post .entry-content .entry-expert p {
        font-weight: 400;
        margin-bottom: 0;
        font-size: 13px;
        line-height: 24px;
        color: #777;
    }

    .list-post .entry-content .entry-expert .post-readMore {
        overflow: hidden;
        padding-top: 15px;
    }

    .list-post .entry-content .entry-expert .post-readMore a {
        font-size: 13px;
        text-decoration: none;
        font-weight: 700;
        color: #999;
        text-transform: uppercase;
        -webkit-transition: all 0.2s ease-in-out 0s;
        -moz-transition: all 0.2s ease-in-out 0s;
        -o-transition: all 0.2s ease-in-out 0s;
        transition: all 0.2s ease-in-out 0s;
    }

    .list-post .entry-content .entry-expert .post-readMore a i {
        margin-left: 5px;
    }

    .list-post .entry-footer {
        padding: 15px 20px 5px;
        border-top: 1px solid #EEE;
    }

    /* 16.3 Single Post */
    .single-post {
        margin-bottom: 30px;
    }

    .single-post .entry-header {
        position: relative;
    }

    .single-post .entry-post-info {
        text-align: center;
        color: #FFF;
        position: absolute;
        top: 0;
        width: 100%;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0));
        padding: 40px 0;
    }

    .single-post .entry-post-info h2 {
        font-weight: 300;
        margin-top: 0;
        font-size: 36px;
    }

    .single-post .entry-Categories {
        color: #FFF;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0));
        padding: 30px;
        margin: 0;
        line-height: 1;
    }

    .single-post .entry-Categories li {
        font-size: 17px;
        position: relative;
        padding-left: 15px;
        margin-left: 15px;
        padding-right: 0;
        text-transform: uppercase;
        line-height: 1;
    }

    .single-post .entry-Categories li:before {
        content: '/';
        position: absolute;
        left: -4px;
    }

    .single-post .entry-Categories li:first-child {
        padding-left: 0;
        margin-left: 0;
    }

    .single-post .entry-Categories li:first-child:before {
        content: none;
    }

    .single-post .entry-Categories a {
        color: #FFF;
        text-decoration: none;
    }

    .single-post .entry-content {
        padding-top: 30px;
    }

    .single-post .entry-content p {
        font-size: 17px;
        line-height: 24px;
        color: #000;
        font-weight: 400;
    }

    .single-post .entry-content blockquote {
        font-style: italic;
        padding: 30px;
        font-size: 14px;
        background: #FBFBFB;
    }

    .single-post .entry-footer .post-footer-data {
        border-top: 1px solid #BBB;
        border-bottom: 1px solid #BBB;
        padding: 15px 15px 5px;
        overflow: hidden;
        margin: 20px 0 40px;
    }

    .single-post .entry-footer .post-footer-data .comment-share li {
        padding: 0;
    }

    .single-post .entry-footer .post-footer-data .comment-share > li:first-child {
        border-right: 1px solid #BBB;
        font-weight: 600;
        text-transform: uppercase;
        color: #333;
        padding-right: 15px;
        margin-right: 5px;
    }

    .single-post .entry-footer .post-footer-data .share-links li:last-child a {
        padding-right: 0;
    }

    .single-post .entry-footer .post-footer-data .share-links a {
        color: #777;
        text-decoration: none;
        padding: 0 10px;
    }

    .single-post .entry-footer .post-footer-data .share-links a:hover {
        color: #000;
    }

    .single-post .entry-footer .post-comments {
        margin-top: 15px;
        margin-bottom: 0;
    }

    .single-post .entry-footer .post-comments li {
        overflow: hidden;
        margin-bottom: 15px;
    }

    .single-post .entry-footer .post-comments li:last-child {
        margin-bottom: 0;
    }

    .single-post .entry-footer .post-comments .user-photo {
        width: 70px;
        height: 70px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        float: left;
    }

    .single-post .entry-footer .post-comments .the-comment {
        width: calc(100% - 100px);
        float: left;
        margin-left: 30px;
    }

    .single-post .entry-footer .post-comments .the-comment .comment-header {
        position: relative;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #cacaca;
    }

    .single-post .entry-footer .post-comments .the-comment .comment-header h4 {
        margin-bottom: 5px;
        margin-top: 0;
    }

    .single-post .entry-footer .post-comments .the-comment .comment-header p {
        font-size: 12px;
        color: #777;
        margin: 0;
    }

    .single-post .entry-footer .post-comments .the-comment .comment-header .comment-replay {
        position: absolute;
        top: 0;
        right: 0;
        color: #777;
        font-size: 12px;
        text-decoration: none;
    }

    .single-post .entry-footer .post-comments .the-comment .comment-box {
        background: #EEE;
        padding: 25px;
        position: relative;
    }

    .single-post .entry-footer .post-comments .the-comment .comment-box:before {
        content: '';
        display: block;
        width: 0px;
        height: 0px;
        border: 10px solid #EEE;
        border-bottom-color: transparent;
        border-left-color: transparent;
        position: absolute;
        top: 0;
        left: -20px;
    }

    .single-post .entry-footer .post-comments .the-comment .comment-box p {
        margin: 0;
    }

    .single-post .entry-footer .replay-form {
        margin-top: 40px;
    }

    .single-post .entry-footer .replay-form h3 {
        margin-bottom: 30px;
        margin-top: 0;
    }

    .single-post .entry-footer .replay-form .form-control {
        background: #EEEEEE;
        border-radius: 0;
        border: 0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
        outline: 0;
        padding: 15px 20px;
        height: 50px;
        color: #000;
    }

    .single-post .entry-footer .replay-form .form-control:focus {
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
        outline: 0;
    }

    .single-post .entry-footer .replay-form textarea.form-control {
        height: 210px;
        resize: none;
    }

    /* 16.4 Aside */
    .aside-box {
        margin-top: 30px;
    }

    .aside-box:last-child {
        margin-bottom: 30px;
    }

    .aside-box h4 {
        margin-top: 0;
        margin-bottom: 25px;
        font-weight: 600;
    }

    .aside-box ul {
        margin-bottom: 0;
    }

    .search-form .form-group {
        margin-bottom: 30px;
    }

    .search-form .search-input-group {
        position: relative;
    }

    .search-form .search-input-group .form-control {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        padding: 6px 50px 6px 25px;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
    }

    .search-form .search-btn {
        width: 35px;
        height: 35px;
        padding: 0;
        line-height: 35px;
        text-align: center;
        float: right;
        margin: 7px 7px 7px 0;
        position: relative;
        z-index: 2;
    }

    .search-form .search-btn i {
        margin: 0;
    }

    .entry-tags {
        margin-bottom: 0;
    }

    .entry-tags li {
        padding-bottom: 10px;
    }

    .entry-tags a {
        text-transform: uppercase;
        text-decoration: none;
        display: inline-block;
        color: #777;
        letter-spacing: 0.4px;
        font-weight: 600;
        -webkit-transition: all 0.2s ease-in-out 0s;
        -moz-transition: all 0.2s ease-in-out 0s;
        -o-transition: all 0.2s ease-in-out 0s;
        transition: all 0.2s ease-in-out 0s;
    }

    .entry-tags a:hover {
        color: #000;
    }

    .categories li:last-child a {
        margin-bottom: 0;
    }

    .categories a {
        color: #000;
        text-decoration: none;
        padding-bottom: 15px;
        margin-bottom: 15px;
        display: block;
        border-bottom: 1px solid #DDD;
    }

    .categories a span {
        float: right;
    }

    .popular-posts li {
        overflow: hidden;
        margin-bottom: 10px;
    }

    .popular-posts .post-image {
        width: 80px;
        float: left;
    }

    .popular-posts .post-data {
        width: calc(100% - 80px);
        float: left;
        padding-left: 15px;
    }

    .popular-posts .post-data p {
        margin: 0;
        color: #BBB;
        font-weight: 600;
    }

    .popular-posts .post-data h5 {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .popular-posts .post-data h5 a {
        color: #000;
        text-decoration: none;
    }

    /* 17 Contact
*********************************************/
    /* 17.1 Contact Style1 */
    .contact {
        background: url("{{asset('assets/images/contact.tif')}}") center center no-repeat fixed;
        background-size: cover;
    }

    .contact .contact-form {
        background: #FFFFFF;
        padding: 70px;
        overflow: hidden;
        position: relative;
    }

    .contact .contact-form .form-control {
        background: #EEEEEE;
        border-radius: 0;
        border: 0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
        outline: 0;
        padding: 15px 20px;
        height: 50px;
        color: #000;
    }

    .contact .contact-form .form-control:focus {
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
        outline: 0;
    }

    .contact .contact-form textarea.form-control {
        height: 210px;
        resize: none;
    }

    .contact .contact-form .btn-box {
        padding-top: 15px;
    }

    .contact .contact-form:before {
        content: "\f003";
        position: absolute;
        right: -20px;
        bottom: -20px;
        -webkit-transform: rotate(-25deg);
        -moz-transform: rotate(-25deg);
        -o-transform: rotate(-25deg);
        -ms-transform: rotate(-25deg);
        transform: rotate(-25deg);
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: 170px;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .contact .contact-info {
        background: #EEEEEE;
        padding: 35px 25px;
        text-align: center;
        margin-bottom: 15px;
    }

    .contact .contact-info .info-box {
        padding-bottom: 35px;
        margin-bottom: 35px;
        border-bottom: 1px solid #CACACA;
    }

    .contact .contact-info .info-box:last-child {
        padding-bottom: 0;
        margin-bottom: 0;
        border-bottom: 0;
    }

    .contact .contact-info .info-box i {
        font-size: 35px;
    }

    .contact .contact-info .info-box h5 {
        margin-top: 20px;
        margin-bottom: 5px;
        color: #000;
        font-weight: 400;
    }

    .contact .contact-info .info-box p {
        margin-bottom: 0;
        color: #777;
    }

    /* 17.2 Contact Style2 */
    .contact__style-2 .contact-form {
        background: transparent;
        padding: 0;
        overflow: visible;
    }

    .contact__style-2 .contact-form .form-control {
        background: rgba(255, 255, 255, 0.2);
        color: #FFF;
    }

    .contact__style-2 .contact-form .form-control:focus {
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
        background: rgba(255, 255, 255, 0.4);
        outline: 0;
    }

    .contact__style-2 .contact-form .form-control::-webkit-input-placeholder {
        color: #EEE;
    }

    .contact__style-2 .contact-form .form-control::-moz-placeholder {
        color: #EEE;
    }

    .contact__style-2 .contact-form .form-control:-ms-input-placeholder {
        color: #EEE;
    }

    .contact__style-2 .contact-form .form-control:-moz-placeholder {
        color: #EEE;
    }

    .contact__style-2 .contact-form:before {
        content: none;
    }

    .contact__style-2 .contact-info {
        background: rgba(255, 255, 255, 0.2);
        color: #EEE;
    }

    .contact__style-2 .contact-info .info-box {
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .contact__style-2 .contact-info .info-box h5 {
        color: #FFF;
    }

    .contact__style-2 .contact-info .info-box p {
        color: #EEE;
    }

    /* 18 Clients Logo
*********************************************/
    .entry-main > div.clients-logo {
        padding: 0;
        -webkit-box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.25);
        -o-box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.25);
        box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.25);
        overflow: hidden;
    }

    .entry-main > div.clients-logo .clientLogos-slider-container {
        width: 100%;
        padding: 15px 0;
    }

    .entry-main > div.clients-logo .clientLogos-slider-container .swiper-slide a {
        display: block;
        padding: 35px;
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    .entry-main > div.clients-logo .clientLogos-slider-container .swiper-slide a:hover {
        -webkit-box-shadow: 0 4px 15px -3px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0 4px 15px -3px rgba(0, 0, 0, 0.25);
        -o-box-shadow: 0 4px 15px -3px rgba(0, 0, 0, 0.25);
        box-shadow: 0 4px 15px -3px rgba(0, 0, 0, 0.25);
        -webkit-transform: translateY(-5px);
        -moz-transform: translateY(-5px);
        -o-transform: translateY(-5px);
        -ms-transform: translateY(-5px);
        transform: translateY(-5px);
    }

    .entry-main > div.clients-logo .clientLogos-slider-container .swiper-slide img {
        float: none;
        margin: auto;
        max-height: 32px;
        width: auto;
    }

    /* 19 Subscribe
*********************************************/
    .custom-input-group {
        position: relative;
    }

    .custom-input-group .form-control {
        position: absolute;
        height: 100%;
        left: 0;
        top: 0;
        padding-left: 35px;
        padding-right: 155px;
        font-size: 17px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        border-color: #EEE;
        -webkit-box-shadow: 0 0 25px #b7b7b7;
        -moz-box-shadow: 0 0 25px #b7b7b7;
        -o-box-shadow: 0 0 25px #b7b7b7;
        box-shadow: 0 0 25px #b7b7b7;
    }

    .custom-input-group .subscribe-btn {
        float: right;
        position: relative;
        z-index: 2;
        margin: 10px;
    }

    /* 20 Footer
*********************************************/
    .apps-footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        background: #282d30;
        color: #9ba0a2;
    }

    .apps-footer .footer-top {
        padding: 50px 0;
    }

    .apps-footer .footer-top .apps-short-info {
        margin-bottom: 30px;
    }

    .apps-footer .footer-top .apps-short-info a {
        display: inline-block;
    }

    .apps-footer .footer-top .apps-short-info h5 {
        margin: 0;
        text-transform: uppercase;
    }

    .apps-footer .footer-top ul {
        margin: 0;
    }

    .apps-footer .footer-top .footer-social-links li {
        padding: 0 10px;
    }

    .apps-footer .footer-top .footer-social-links a {
        color: #9ba0a2;
        display: block;
        font-size: 20px;
        width: 60px;
        line-height: 60px;
        height: 60px;
        background: #25282a;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -moz-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .apps-footer .footer-top .footer-social-links a:hover {
        color: #FFFFFF;
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }

    .apps-footer .footer-bottom {
        background: #25282a;
        padding: 25px 0;
    }

    .apps-footer .footer-bottom ul {
        margin-bottom: 0;
    }

    .apps-footer .footer-bottom p {
        margin-bottom: 0;
        font-weight: 700;
    }

    .apps-footer .footer-bottom p a {
        text-decoration: none;
        -webkit-transition: all 0.25s ease-in-out 0s;
        -moz-transition: all 0.25s ease-in-out 0s;
        -o-transition: all 0.25s ease-in-out 0s;
        transition: all 0.25s ease-in-out 0s;
    }

    /* 21 Loading
*********************************************/
    .loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        display: flex;
        justify-content: center;
        justify-items: center;
        align-content: center;
        align-items: center;
    }

    .loading .spinner {
        width: 40px;
        height: 40px;
        position: relative;
        margin: 100px auto;
    }

    .loading .double-bounce1, .loading .double-bounce2 {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #FFF;
        opacity: 0.6;
        position: absolute;
        top: 0;
        left: 0;
        -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
        animation: sk-bounce 2.0s infinite ease-in-out;
    }

    .loading .double-bounce2 {
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
    }

    @-webkit-keyframes sk-bounce {
        0%, 100% {
            -webkit-transform: scale(0);
        }
        50% {
            -webkit-transform: scale(1);
        }
    }

    @keyframes sk-bounce {
        0%, 100% {
            transform: scale(0);
            -webkit-transform: scale(0);
        }
        50% {
            transform: scale(1);
            -webkit-transform: scale(1);
        }
    }

    /* 22 SUB PAGES ( 404 & Coming Soon )
*********************************************/
    .inner-header._sub-pages .app-overlay {
        padding-top: 172px;
        min-height: 100vh;
    }

    .inner-header._sub-pages .header-content h1 {
        font-size: 15vw;
        line-height: 1em;
        color: #FFF;
        margin-top: 0;
        margin-bottom: 70px;
    }

    .inner-header._sub-pages .header-content p {
        font-size: 35px;
        margin-bottom: 40px;
        font-weight: 900;
        line-height: inherit;
    }

    .inner-header._sub-pages .header-content .form-control {
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
    }

    .countdown {
        overflow: hidden;
        margin-bottom: 70px;
    }

    .countdown > div {
        width: 25%;
        float: left;
    }

    .countdown > div > span:first-child {
        font-size: 65px;
        display: block;
    }

    /* 23 Responsive
*********************************************/
    @media (min-width: 768px) {
        /* popUp Video */
        .apps-video .modal-dialog {
            width: 750px;
            margin: 100px auto;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        /* Contact Info */
        .contact .contact-info {
            margin-bottom: 15px;
            overflow: hidden;
        }

        .contact .contact-info .info-box {
            width: 50%;
            float: left;
            border-bottom: 0;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .contact .contact-info .info-box:first-child {
            border-right: 1px solid #CACACA;
        }
    }

    @media (max-width: 991px) {
        .appsLand-btn.appsLand-btn-larg {
            padding: 20px 27px;
        }

        .features__style-2 .feat-tabs {
            text-align: center;
        }

        .features__style-2 .feat-tabs li {
            width: auto;
            display: inline-block;
            float: none;
            border-bottom: 0;
        }

        .features__style-2 .feat-tabs li.active {
            border-bottom: 0;
        }

        .clients-logo .clientLogos-slider-container .swiper-slide a {
            padding: 30px 20px;
        }
    }

    @media (max-width: 767px) {
        /* General Style */
        body {
            padding-bottom: 0 !important;
        }

        footer {
            position: static !important;
        }

        header.appsLand-header .app-overlay {
            padding-top: 172px;
            padding-bottom: 100px;
        }

        header.appsLand-header .header-content .site-intro-content h1 {
            font-size: 30px;
        }

        .entry-main > section, .entry-main > div {
            padding: 90px 0;
        }

        .entry-main > section.section-bg-img, .entry-main > div.section-bg-img {
            padding: 0;
        }

        .entry-main > section.section-bg-img .app-overlay, .entry-main > div.section-bg-img .app-overlay {
            padding: 90px 0;
        }

        .entry-main > section.section-bg-img.section-without-title, .entry-main > div.section-bg-img.section-without-title {
            padding: 0;
        }

        .entry-main > section.section-bg-img.section-without-title .app-overlay, .entry-main > div.section-bg-img.section-without-title .app-overlay {
            padding: 60px 0;
        }

        .entry-main > section.section-without-title, .entry-main > div.section-without-title {
            padding: 60px 0;
        }

        .section-title {
            margin-bottom: 60px;
        }

        .section-title h1 {
            margin: 0;
            font-size: 36px;
        }

        /* navbar */
        .appsLand-navbar.active-navbar {
            padding-top: 7px;
            padding-bottom: 7px;
        }

        .appsLand-navbar .navbar-header {
            margin: 0;
        }

        .appsLand-navbar .menu-toggle {
            display: block;
        }

        .appsLand-navbar .app-links {
            position: fixed;
            visibility: hidden;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            box-shadow: 5px 0 25px rgba(0, 0, 0, 0.25);
            background: rgba(0, 0, 0, 0.25);
        }

        .appsLand-navbar .app-links .navbar-nav {
            background: #FFF;
            margin: 0;
            position: absolute;
            top: 0;
            left: -300px;
            height: 100%;
            width: 270px;
            overflow: auto;
            -webkit-transition: all 0.5s ease-in-out 0s;
            -moz-transition: all 0.5s ease-in-out 0s;
            -o-transition: all 0.5s ease-in-out 0s;
            transition: all 0.5s ease-in-out 0s;
        }

        .appsLand-navbar .app-links .navbar-nav > li {
            padding: 0;
            border-bottom: 1px solid #F1F1F1;
        }

        .appsLand-navbar .app-links .navbar-nav > li.mobile-size-logo {
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
            z-index: 2;
            padding: 25px 0;
        }

        .appsLand-navbar .app-links .navbar-nav > li.mobile-size-logo a {
            padding: 0;
            display: inline-block;
        }

        .appsLand-navbar .app-links .navbar-nav > li.mobile-size-logo a:hover {
            background: none;
        }

        .appsLand-navbar .app-links .navbar-nav > li.mobile-size-logo img {
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.25);
        }

        .appsLand-navbar .app-links .navbar-nav > li > a, .appsLand-navbar .app-links .navbar-nav > li > span {
            color: #333;
            padding: 15px 30px;
        }

        .appsLand-navbar .app-links .navbar-nav > li > a:hover, .appsLand-navbar .app-links .navbar-nav > li > span:hover {
            background: #f9f9f9;
            color: #3483ff;
        }

        .appsLand-navbar .app-links .navbar-nav > li > a:before, .appsLand-navbar .app-links .navbar-nav > li > span:before {
            content: none;
        }

        .appsLand-navbar .app-links .navbar-nav > li.active > a, .appsLand-navbar .app-links .navbar-nav > li.active > span {
            color: #3483ff;
            background: #f9f9f9;
        }

        .appsLand-navbar .app-links .navbar-nav > li .dropdown-menu {
            opacity: 1;
            visibility: visible;
            border: 0;
            width: 100%;
            min-width: 0;
            position: static;
            box-shadow: none;
        }

        .appsLand-navbar .navbar-brand img {
            margin: 0;
            height: 100%;
        }

        .appsLand-navbar.mobile-menu-active .app-links {
            visibility: visible;
        }

        .appsLand-navbar.mobile-menu-active .app-links .navbar-nav {
            left: 0;
        }

        /* features */
        .features .appInfo-data {
            padding-top: 0;
        }

        /* Download */
        .first-download-btn {
            text-align: left;
            margin-bottom: 15px;
        }

        .third-download-btn {
            text-align: right;
            margin-top: 15px;
        }

        /* testimonials */
        .testimonials {
            text-align: center;
        }

        .testimonials .testimonials-template .testimonials-slide .row.table-row {
            display: block;
            margin-right: 0;
            margin-left: 0;
        }

        .testimonials .testimonials-template .testimonials-slide .row.table-row .table-cel {
            display: block;
            float: none;
            width: 100%;
            border: 0;
            box-shadow: none;
        }

        .testimonials .testimonials-template .testimonials-slide {
            padding: 40px;
        }

        .testimonials .testimonials-template .testimonials-slide [class*="col-"] {
            padding: 0;
        }

        .testimonials .testimonials-template .testimonials-slide .client-info {
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #EEE;
        }

        .testimonials .testimonials-template .testimonials-slide:before {
            content: none;
        }

        /* statistics */
        .statistics .stats {
            text-align: center;
            padding: 0;
        }

        .statistics .stats .stats-icon {
            position: static;
            margin: 0 auto 15px;
        }

        .statistics .stats p {
            margin-bottom: 10px;
        }

        /* Contact */
        .contact .contact-form {
            padding: 40px;
        }

        .contact .contact-form:before {
            content: none;
        }

        /* blog */
        .blog .list-post .entry-header {
            width: 100%;
            float: none;
        }

        .blog .list-post .entry-content .entry-post-info .posted-on {
            left: auto;
            right: 20px;
            top: -32px;
        }

        .blog .list-post .entry-content-footer {
            width: 100%;
            float: none;
        }

        .single-post .entry-post-info {
            position: static;
            background: none;
            color: inherit;
            padding: 0 0 15px 0;
        }

        .single-post .entry-post-info h2 {
            font-size: 24px;
        }

        .single-post .entry-Categories {
            position: static;
            background: none;
            padding: 0;
            color: inherit;
            margin-top: 20px;
        }

        .single-post .entry-Categories a {
            color: inherit;
        }

        .single-post .entry-Categories li {
            font-size: 14px;
        }

        .single-post .entry-content {
            padding-top: 20px;
        }

        .single-post .entry-content p {
            font-size: 14px;
        }

        .single-post .entry-footer .post-comments .user-photo {
            width: 40px;
            height: 40px;
        }

        .single-post .entry-footer .post-comments .the-comment {
            width: calc(100% - 50px);
            margin-left: 10px;
        }

        .single-post .entry-footer .post-comments .the-comment .comment-box:before {
            border-width: 4px;
            left: -8px;
        }
    }

    /*# sourceMappingURL=style.css.map */

</style>