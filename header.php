
<!-- header wrapper -->
<div class="header-wrapper">

<header id="header" class="header-builder header-builder-p">
    <div data-elementor-type="header" data-elementor-id="2334"
        class="elementor elementor-2334 elementor-location-header"
        data-elementor-post-type="elementor_library">
        
        <style>
                                /*! elementor - v3.17.0 - 08-11-2023 */
                                .elementor-heading-title {
                                    padding: 0;
                                    margin: 0;
                                    line-height: 1
                                }

                                .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a {
                                    color: inherit;
                                    font-size: inherit;
                                    line-height: inherit
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                    font-size: 15px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                    font-size: 19px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                    font-size: 29px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                    font-size: 39px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                    font-size: 59px
                                }
                                </style>
<?php
$con = conexion();

$IdBanner = null;
$Banner = null;
$Url = null;
$Estatus = null;

// Realiza una consulta para obtener el hash almacenado en la base de datos
$query = "CALL banner()";
$stmt = mysqli_prepare($con, $query);

if ($stmt) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $IdBanner, $Banner, $Url, $Estatus);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Resto del código si es necesario después de cerrar la sentencia
} else {
    echo "Error en la preparación de la sentencia: " . mysqli_error($con);
}
if($Estatus==true){
?>


<section class="elementor-section elementor-top-section elementor-element elementor-element-6323f0e7 background-color-dark top-bar elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="6323f0e7" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5b1d1ba3 elementor-hidden-tablet elementor-hidden-mobile"
            data-id="5b1d1ba3" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-4935f7b9 me-1 elementor-widget elementor-widget-heading"
                    data-id="4935f7b9" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h4 class="elementor-heading-title elementor-size-default"><?php echo $Banner; ?></h4>
                    </div>
                </div>
                <div class="elementor-element elementor-element-57df717 elementor-widget elementor-widget-heading"
                    data-id="57df717" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h5 class="elementor-heading-title elementor-size-default"><a href="<?php echo $Url; ?>">Ver más</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <?php
}
?>
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-67661c46 elementor-section-content-middle py-2 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="67661c46" data-element_type="section"
            data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">

            <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1eedb946"
                    data-id="1eedb946" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-23b17753 me-auto mb-0 d-none d-md-block elementor-widget elementor-widget-porto_info_box"
                            data-id="23b17753" data-element_type="widget"
                            data-widget_type="porto_info_box.default">
                            <div class="elementor-widget-container">
                                <div class="porto-sicon-box style_1 default-icon">
                                    <div class="porto-sicon-default">
                                        <div class="porto-just-icon-wrapper porto-icon none"
                                            style="margin-right:0.25rem;"><i
                                                class="porto-icon-shipping"></i></div>
                                    </div>
                                    <div class="porto-sicon-header">
                                        <h3 class="porto-sicon-title" style="">Envíos en menos de 24 horas
                                            en CDMX</h3>
                                    </div> <!-- header -->
                                </div><!-- porto-sicon-box -->
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-4a263f1e elementor-hidden-tablet elementor-hidden-phone elementor-widget elementor-widget-porto_hb_divider"
                            data-id="4a263f1e" data-element_type="widget"
                            data-widget_type="porto_hb_divider.default">
                            <div class="elementor-widget-container">
                                <span class="separator"></span>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-98fa900 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons"
                            data-id="98fa900" data-element_type="widget"
                            data-widget_type="social-icons.default">
                            <div class="elementor-widget-container">
                                <style>
                                /*! elementor - v3.17.0 - 08-11-2023 */
                                .elementor-widget-social-icons.elementor-grid-0 .elementor-widget-container,
                                .elementor-widget-social-icons.elementor-grid-mobile-0 .elementor-widget-container,
                                .elementor-widget-social-icons.elementor-grid-tablet-0 .elementor-widget-container {
                                    line-height: 1;
                                    font-size: 0
                                }

                                .elementor-widget-social-icons:not(.elementor-grid-0):not(.elementor-grid-tablet-0):not(.elementor-grid-mobile-0) .elementor-grid {
                                    display: inline-grid
                                }

                                .elementor-widget-social-icons .elementor-grid {
                                    grid-column-gap: var(--grid-column-gap, 5px);
                                    grid-row-gap: var(--grid-row-gap, 5px);
                                    grid-template-columns: var(--grid-template-columns);
                                    justify-content: var(--justify-content, center);
                                    justify-items: var(--justify-content, center)
                                }

                                .elementor-icon.elementor-social-icon {
                                    font-size: var(--icon-size, 25px);
                                    line-height: var(--icon-size, 25px);
                                    width: calc(var(--icon-size, 25px) + (2 * var(--icon-padding, .5em)));
                                    height: calc(var(--icon-size, 25px) + (2 * var(--icon-padding, .5em)))
                                }

                                .elementor-social-icon {
                                    --e-social-icon-icon-color: #fff;
                                    display: inline-flex;
                                    background-color: #69727d;
                                    align-items: center;
                                    justify-content: center;
                                    text-align: center;
                                    cursor: pointer
                                }

                                .elementor-social-icon i {
                                    color: var(--e-social-icon-icon-color)
                                }

                                .elementor-social-icon svg {
                                    fill: var(--e-social-icon-icon-color)
                                }

                                .elementor-social-icon:last-child {
                                    margin: 0
                                }

                                .elementor-social-icon:hover {
                                    opacity: .9;
                                    color: #fff
                                }

                                .elementor-social-icon-android {
                                    background-color: #a4c639
                                }

                                .elementor-social-icon-apple {
                                    background-color: #999
                                }

                                .elementor-social-icon-behance {
                                    background-color: #1769ff
                                }

                                .elementor-social-icon-bitbucket {
                                    background-color: #205081
                                }

                                .elementor-social-icon-codepen {
                                    background-color: #000
                                }

                                .elementor-social-icon-delicious {
                                    background-color: #39f
                                }

                                .elementor-social-icon-deviantart {
                                    background-color: #05cc47
                                }

                                .elementor-social-icon-digg {
                                    background-color: #005be2
                                }

                                .elementor-social-icon-dribbble {
                                    background-color: #ea4c89
                                }

                                .elementor-social-icon-elementor {
                                    background-color: #d30c5c
                                }

                                .elementor-social-icon-envelope {
                                    background-color: #ea4335
                                }

                                .elementor-social-icon-facebook,
                                .elementor-social-icon-facebook-f {
                                    background-color: #3b5998
                                }

                                .elementor-social-icon-flickr {
                                    background-color: #0063dc
                                }

                                .elementor-social-icon-foursquare {
                                    background-color: #2d5be3
                                }

                                .elementor-social-icon-free-code-camp,
                                .elementor-social-icon-freecodecamp {
                                    background-color: #006400
                                }

                                .elementor-social-icon-github {
                                    background-color: #333
                                }

                                .elementor-social-icon-gitlab {
                                    background-color: #e24329
                                }

                                .elementor-social-icon-globe {
                                    background-color: #69727d
                                }

                                .elementor-social-icon-google-plus,
                                .elementor-social-icon-google-plus-g {
                                    background-color: #dd4b39
                                }

                                .elementor-social-icon-houzz {
                                    background-color: #7ac142
                                }

                                .elementor-social-icon-instagram {
                                    background-color: #262626
                                }

                                .elementor-social-icon-jsfiddle {
                                    background-color: #487aa2
                                }

                                .elementor-social-icon-link {
                                    background-color: #818a91
                                }

                                .elementor-social-icon-linkedin,
                                .elementor-social-icon-linkedin-in {
                                    background-color: #0077b5
                                }

                                .elementor-social-icon-medium {
                                    background-color: #00ab6b
                                }

                                .elementor-social-icon-meetup {
                                    background-color: #ec1c40
                                }

                                .elementor-social-icon-mixcloud {
                                    background-color: #273a4b
                                }

                                .elementor-social-icon-odnoklassniki {
                                    background-color: #f4731c
                                }

                                .elementor-social-icon-pinterest {
                                    background-color: #bd081c
                                }

                                .elementor-social-icon-product-hunt {
                                    background-color: #da552f
                                }

                                .elementor-social-icon-reddit {
                                    background-color: #ff4500
                                }

                                .elementor-social-icon-rss {
                                    background-color: #f26522
                                }

                                .elementor-social-icon-shopping-cart {
                                    background-color: #4caf50
                                }

                                .elementor-social-icon-skype {
                                    background-color: #00aff0
                                }

                                .elementor-social-icon-slideshare {
                                    background-color: #0077b5
                                }

                                .elementor-social-icon-snapchat {
                                    background-color: #fffc00
                                }

                                .elementor-social-icon-soundcloud {
                                    background-color: #f80
                                }

                                .elementor-social-icon-spotify {
                                    background-color: #2ebd59
                                }

                                .elementor-social-icon-stack-overflow {
                                    background-color: #fe7a15
                                }

                                .elementor-social-icon-steam {
                                    background-color: #00adee
                                }

                                .elementor-social-icon-stumbleupon {
                                    background-color: #eb4924
                                }

                                .elementor-social-icon-telegram {
                                    background-color: #2ca5e0
                                }

                                .elementor-social-icon-thumb-tack {
                                    background-color: #1aa1d8
                                }

                                .elementor-social-icon-tripadvisor {
                                    background-color: #589442
                                }

                                .elementor-social-icon-tumblr {
                                    background-color: #35465c
                                }

                                .elementor-social-icon-twitch {
                                    background-color: #6441a5
                                }

                                .elementor-social-icon-twitter {
                                    background-color: #1da1f2
                                }

                                .elementor-social-icon-viber {
                                    background-color: #665cac
                                }

                                .elementor-social-icon-vimeo {
                                    background-color: #1ab7ea
                                }

                                .elementor-social-icon-vk {
                                    background-color: #45668e
                                }

                                .elementor-social-icon-weibo {
                                    background-color: #dd2430
                                }

                                .elementor-social-icon-weixin {
                                    background-color: #31a918
                                }

                                .elementor-social-icon-whatsapp {
                                    background-color: #25d366
                                }

                                .elementor-social-icon-wordpress {
                                    background-color: #21759b
                                }

                                .elementor-social-icon-xing {
                                    background-color: #026466
                                }

                                .elementor-social-icon-yelp {
                                    background-color: #af0606
                                }

                                .elementor-social-icon-youtube {
                                    background-color: #cd201f
                                }

                                .elementor-social-icon-500px {
                                    background-color: #0099e5
                                }

                                .elementor-shape-rounded .elementor-icon.elementor-social-icon {
                                    border-radius: 10%
                                }

                                .elementor-shape-circle .elementor-icon.elementor-social-icon {
                                    border-radius: 50%
                                }
                                </style>
                                <div class="elementor-social-icons-wrapper elementor-grid">
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-f3e033c"
                                            href="https://www.instagram.com/bebify.mx/" target="_blank">
                                            <span class="elementor-screen-only">Instagram</span>
                                            <i class="fab fa-instagram"></i> </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-8e035de"
                                            href="https://www.facebook.com/people/Bebify/61553628214594/?mibextid=LQQJ4d"
                                            target="_blank">
                                            <span class="elementor-screen-only">Facebook</span>
                                            <i class="fab fa-facebook"></i> </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-repeater-item-ffcff70"
                                            href="https://www.linkedin.com/company/grupo-primo-bebidas"
                                            target="_blank">
                                            <span class="elementor-screen-only">Linkedin</span>
                                            <i class="fab fa-linkedin"></i> </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-c79480e elementor-hidden-tablet elementor-hidden-phone elementor-widget elementor-widget-porto_hb_menu"
                            data-id="c79480e" data-element_type="widget"
                            data-widget_type="porto_hb_menu.default">
                            <div class="elementor-widget-container">
                                <ul id="menu-secondary-menu" class="top-links mega-menu">
                                    <li id="nav-menu-item-1745"
                                        class="menu-item menu-item-type-post_type menu-item-object-page narrow">
                                        <a href="buscador">Productos</a>
                                    </li>
                                    <li id="nav-menu-item-1759"
                                        class="menu-item menu-item-type-post_type menu-item-object-page narrow">
                                        <a href="conocenos">Conócenos</a>
                                    </li>
                                    <li id="nav-menu-item-1746"
                                        class="menu-item menu-item-type-post_type menu-item-object-page narrow">
                                        <a href="contactanos">Contáctanos</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-88341a6 ms-3 me-0 elementor-hidden-phone elementor-widget elementor-widget-porto_hb_divider"
                            data-id="88341a6" data-element_type="widget"
                            data-widget_type="porto_hb_divider.default">
                            <div class="elementor-widget-container">
                                <span class="separator"></span>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-44b775d4 elementor-widget elementor-widget-porto_hb_social"
                            data-id="44b775d4" data-element_type="widget"
                            data-widget_type="porto_hb_social.default">
                            <div class="elementor-widget-container">
                                <div class="share-links"> <a target="_blank"
                                        rel="nofollow noopener noreferrer" class="share-facebook" href="#"
                                        title="Facebook"></a>
                                    <a target="_blank" rel="nofollow noopener noreferrer"
                                        class="share-twitter" href="#" title="Twitter"></a>
                                    <a target="_blank" rel="nofollow noopener noreferrer"
                                        class="share-instagram" href="#" title="Instagram"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-3a8f2ab elementor-section-content-middle py-2 pt-lg-4 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="3a8f2ab" data-element_type="section">

            <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-558c6397"
                    data-id="558c6397" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-22a0617c me-0 elementor-hidden-desktop elementor-widget elementor-widget-porto_hb_menu_icon"
                            data-id="22a0617c" data-element_type="widget"
                            data-widget_type="porto_hb_menu_icon.default">
                            <div class="elementor-widget-container">
                                <a aria-label="Mobile Menu" href="#" class="mobile-toggle ps-0"><i
                                        class="fas fa-bars"></i></a>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-6f722895 me-auto me-xl-5 elementor-widget-mobile__width-initial elementor-widget elementor-widget-porto_hb_logo"
                            data-id="6f722895" data-element_type="widget"
                            data-widget_type="porto_hb_logo.default">
                            <div class="elementor-widget-container">

                                <div class="logo">
                                    <a href="index" title="bebify - " rel="home">
                                        <img fetchpriority="high"
                                            class="img-responsive standard-logo retina-logo" width="8000"
                                            height="4500"
                                            src="wp-content/uploads/2023/11/Bebify-Logotipo-01.png"
                                            alt="bebify" /> </a>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-6995e231 search-lg-auto flex-lg-grow-1 flex-grow-0 elementor-widget-mobile__width-initial elementor-widget__width-initial elementor-widget elementor-widget-porto_hb_search_form"
                            data-id="6995e231" data-element_type="widget"
                            data-widget_type="porto_hb_search_form.default">
                            <div class="elementor-widget-container">
                                <div class="searchform-popup advanced-popup "><a class="search-toggle"
                                        aria-label="Search Toggle" href="#"><i
                                            class="porto-icon-magnifier"></i><span
                                            class="search-text">Search</span></a>
                                    <form action="buscador" method="get" class="searchform search-layout-advanced">
                                        <div class="searchform-fields">
                                            <span class="text"><input name="s" type="text" value=""
                                                    placeholder="Buscar..." autocomplete="off" /></span>
                                            <span class="button-wrap">
                                                <button class="btn btn-special" title="Search"
                                                    type="submit">
                                                    <i class="porto-icon-magnifier"></i>
                                                </button>

                                            </span>
                                        </div>
                                        <div class="live-search-list"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-5c1dab2e ms-lg-3 me-sm-3 pe-lg-1 elementor-widget-mobile__width-initial elementor-widget elementor-widget-porto_hb_divider"
                            data-id="5c1dab2e" data-element_type="widget"
                            data-widget_type="porto_hb_divider.default">
                            <div class="elementor-widget-container">
                                <span class="separator"></span>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-aa412ef elementor-hidden-tablet elementor-hidden-phone elementor-widget elementor-widget-porto_info_box"
                            data-id="aa412ef" data-element_type="widget"
                            data-widget_type="porto_info_box.default">
                            <div class="elementor-widget-container">
                                <a class="porto-sicon-box-link" href="tel:">
                                    <div class="porto-sicon-box style_1 default-icon">
                                        <div class="porto-sicon-default">
                                            <div class="porto-just-icon-wrapper porto-icon none"
                                                style="margin-right:0.25rem;"><i
                                                    class="fab fa-whatsapp"></i></div>
                                        </div>
                                        <div class="porto-sicon-header">
                                            <h4 class="porto-sicon-title" style="">Atención a Clientes</h4>
                                            <p>56 5092 9066</p>
                                        </div> <!-- header -->
                                    </div><!-- porto-sicon-box -->
                                </a>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-59401c99 ms-3 me-4 elementor-hidden-tablet elementor-hidden-phone elementor-widget elementor-widget-porto_hb_divider"
                            data-id="59401c99" data-element_type="widget"
                            data-widget_type="porto_hb_divider.default">
                            <div class="elementor-widget-container">
                                <span class="separator"></span>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-b0b6c4f d-none d-sm-block elementor-widget elementor-widget-porto_info_box"
                            data-id="b0b6c4f" data-element_type="widget"
                            data-widget_type="porto_info_box.default">
                            <div class="elementor-widget-container">
                                <a class="porto-sicon-box-link"
                                href="acceso">
                                                                                <div class="porto-sicon-box style_1 default-icon">
                                        <div class="porto-sicon-default">
                                            <div class="porto-just-icon-wrapper porto-icon none"
                                                style="margin-right:0.625rem;"><i
                                                    class="porto-icon-user-2"></i></div>
                                        </div>
                                        <div class="porto-sicon-header">
                                            <h5 class="porto-sicon-title" style="">
                                            <?php echo $Nombre ?></h5>
                                        
                                            <?php if($Nombre==null){ ?>
                                            <p><a href="acceso">Iniciar Sesión / Registro</a></p>

                                            <?php }else{ ?>
                                                <p><a href="micuenta">Mi cuenta</a></p>
<?php                                                            
                                            }
                                                ?>
                                        </div> <!-- header -->
                                    </div><!-- porto-sicon-box -->
                                </a>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-257e7e21 d-sm-none elementor-widget-mobile__width-initial elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-porto_hb_myaccount"
                            data-id="257e7e21" data-element_type="widget"
                            data-widget_type="porto_hb_myaccount.default">
                            <div class="elementor-widget-container">
                                <a href="registro" title="My Account"
                                    class="my-account  porto-link-login"><i
                                        class="porto-icon-user-2"></i></a>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-5b1f808d ms-sm-2 me-3 elementor-hidden-tablet elementor-hidden-phone elementor-widget elementor-widget-porto_hb_divider"
                            data-id="5b1f808d" data-element_type="widget"
                            data-widget_type="porto_hb_divider.default">
                            <div class="elementor-widget-container">
                                <span class="separator"></span>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-0859f36 elementor-hidden-desktop elementor-hidden-tablet elementor-view-default elementor-widget elementor-widget-icon"
                            data-id="0859f36" data-element_type="widget" data-widget_type="icon.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-icon-wrapper">
                                    <a class="elementor-icon" href="acceso">
                                        <i aria-hidden="true" class="fas fa-user"></i> </a>
                                </div>
                            </div>
                        </div>
<?php if($usr_idUsuario !== null){ ?>
                        <div class="elementor-element elementor-element-74ebdf32 elementor-widget-mobile__width-initial elementor-widget elementor-widget-porto_hb_mini_cart"
                            data-id="74ebdf32" data-element_type="widget"
                            data-widget_type="porto_hb_mini_cart.default">
                            <div class="elementor-widget-container">
                                <div id="mini-cart" class="mini-cart simple minicart-offcanvas">
                                    <div class="cart-head">
                                        <span class="cart-icon"><i
                                                class="minicart-icon porto-icon-cart-thick"></i><span
                                                class="cart-items">0</span></span><span
                                            class="cart-items-text">0 items</span>
                                    </div>
                                    <div class="cart-popup widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">
                                            <div class="cart-loading"></div>
                                        </div>
                                    </div>
                                    <div class="minicart-overlay"><svg viewBox="0 0 32 32"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                                <style>
                                                .minicart-svg {
                                                    fill: none;
                                                    stroke: #fff;
                                                    stroke-linecap: round;
                                                    stroke-linejoin: round;
                                                    stroke-width: 2px;
                                                }
                                                </style>
                                            </defs>
                                            <g id="cross">
                                                <line class="minicart-svg" x1="7" x2="25" y1="7" y2="25" />
                                                <line class="minicart-svg" x1="7" x2="25" y1="25" y2="7" />
                                            </g>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
<?php }?>

                    </div>
                </div>
            </div>
        </section>
        <div class="elementor-element elementor-element-e444529 e-flex e-con-boxed e-con e-parent"
            data-id="e444529" data-element_type="container"
            data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-0963011 elementor-widget elementor-widget-porto_hb_menu"
                    data-id="0963011" data-element_type="widget" data-widget_type="porto_hb_menu.default">
                    <div class="elementor-widget-container">
                        <ul id="menu-menu-principal" class="main-menu mega-menu">
                            <li id="nav-menu-item-2372"
                                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat current-menu-item  narrow">
                                <a href="buscador?categoria=1" class=" "><i
                                        class="fa fa-tint"></i>Aguas</a>
                            </li>
                            <li id="nav-menu-item-2235"
                                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat narrow">
                                <a href="buscador?categoria=2"><i
                                        class="fa fa-beer"></i>Cervezas</a>
                            </li>
                            <li id="nav-menu-item-2236"
                                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat narrow">
                                <a href="buscador?categoria=3"><i
                                        class="fas fa-glass-cheers"></i>Destilados</a>
                            </li>
                            <li id="nav-menu-item-2241"
                                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat narrow">
                                <a href="buscador?categoria=4"><i
                                        class="fas fa-glass-whiskey"></i>Refrescos</a>
                            </li>
                            <li id="nav-menu-item-2242"
                                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat narrow">
                                <a href="buscador?categoria=5"><i
                                        class="fa fa-solid fa-wine-bottle"></i>Vinos</a>
                            </li>
                            <li id="nav-menu-item-2374"
                                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat narrow">
                                <a href="buscador?categoria=6"><i
                                        class="fas fa-cocktail"></i>Otras Bebidas</a>
                            </li>
                            <li id="nav-menu-item-2240"
                                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat narrow">
                                <a href="buscador?categoria=7"><i
                                        class="fa fa-shopping-basket"></i>Otros</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

</div>