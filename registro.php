<?php
include('./conexion/conexion.php');

$con=conexion();
session_start();
if (isset($_SESSION['IdUsuario']) && $_SESSION['IdUsuario'] != null) {
    header('Location: index');
    exit();
}

?>

<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">

<!-- Mirrored from bebifydemo.sedmex.com/registro/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 06:17:39 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<head>
    <meta charset="UTF-8">
    <title>Registro &#8211; bebify</title>
    <meta name='robots' content='max-image-preview:large' />
    <link rel="alternate" type="application/rss+xml" title="bebify &raquo; Feed" href="../feed/index.html" />
    <link rel="alternate" type="application/rss+xml" title="bebify &raquo; Feed de los comentarios"
        href="./comments/feed/index.html" />
    <link rel="shortcut icon" href="./wp-content/uploads/2023/11/favicon-32x32-1.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="./wp-content/uploads/2023/11/Bebify-Logotipo-01.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="./wp-content/uploads/2023/11/Bebify-Logotipo-01.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="./wp-content/uploads/2023/11/Bebify-Logotipo-01.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="./wp-content/uploads/2023/11/Bebify-Logotipo-01.png" />
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Registro" />
    <meta property="og:title" content="Registro" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="index.php" />
    <meta property="og:site_name" content="bebify" />
    <meta property="og:description"
        content="¡Bienvenid@ a Bebify! Por favor, completa los siguientes campos para llevar a cabo tu registro.Te sugerimos tener disponible tu Constancia de Situación Fiscal (CSF) en formato PDF, así como todos los detalles de tu negocio, incluyendo sucursales y datos de contacto.¡Estamos emocionados de tenerte con&hellip;" />

    <meta property="og:image" content="./wp-content/uploads/2023/11/Bebify-Logotipo-01.png" />
    <script>
    window._wpemojiSettings = {
        "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
        "ext": ".png",
        "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
        "svgExt": ".svg",
        "source": {
            "concatemoji": "https:\/\/bebifydemo.sedmex.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.4.2"
        }
    };
    /*! This file is auto-generated */
    ! function(i, n) {
        var o, s, e;

        function c(e) {
            try {
                var t = {
                    supportTests: e,
                    timestamp: (new Date).valueOf()
                };
                sessionStorage.setItem(o, JSON.stringify(t))
            } catch (e) {}
        }

        function p(e, t, n) {
            e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
            var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
                r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e
                    .getImageData(0, 0, e.canvas.width, e.canvas.height).data));
            return t.every(function(e, t) {
                return e === r[t]
            })
        }

        function u(e, t, n) {
            switch (t) {
                case "flag":
                    return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !
                        n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e,
                            "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f",
                            "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"
                        );
                case "emoji":
                    return !n(e, "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff",
                        "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff")
            }
            return !1
        }

        function f(e, t, n) {
            var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(
                    300, 150) : i.createElement("canvas"),
                a = r.getContext("2d", {
                    willReadFrequently: !0
                }),
                o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
            return e.forEach(function(e) {
                o[e] = t(a, e, n)
            }), o
        }

        function t(e) {
            var t = i.createElement("script");
            t.src = e, t.defer = !0, i.head.appendChild(t)
        }
        "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
            everything: !0,
            everythingExceptFlag: !0
        }, e = new Promise(function(e) {
            i.addEventListener("DOMContentLoaded", e, {
                once: !0
            })
        }), new Promise(function(t) {
            var n = function() {
                try {
                    var e = JSON.parse(sessionStorage.getItem(o));
                    if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() <
                        e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                } catch (e) {}
                return null
            }();
            if (!n) {
                if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" !=
                    typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                    var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p
                            .toString()
                        ].join(",") + "));",
                        r = new Blob([e], {
                            type: "text/javascript"
                        }),
                        a = new Worker(URL.createObjectURL(r), {
                            name: "wpTestEmojiSupports"
                        });
                    return void(a.onmessage = function(e) {
                        c(n = e.data), a.terminate(), t(n)
                    })
                } catch (e) {}
                c(n = f(s, u, p))
            }
            t(n)
        }).then(function(e) {
            for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n
                .supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports
                    .everythingExceptFlag && n.supports[t]);
            n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n
                .DOMReady = !1, n.readyCallback = function() {
                    n.DOMReady = !0
                }
        }).then(function() {
            return e
        }).then(function() {
            var e;
            n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e
                .concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
        }))
    }((window, document), window._wpemojiSettings);
    </script>
    <style id='wp-emoji-styles-inline-css'>
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 0.07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
    </style>
    <link rel='stylesheet' id='nta-css-popup-css'
        href='./wp-content/plugins/whatsapp-for-wordpress/assets/dist/css/style1e39.css?ver=6.4.2' media='all' />
    <style id='classic-theme-styles-inline-css'>
    /*! This file is auto-generated */
    .wp-block-button__link {
        color: #fff;
        background-color: #32373c;
        border-radius: 9999px;
        box-shadow: none;
        text-decoration: none;
        padding: calc(.667em + 2px) calc(1.333em + 2px);
        font-size: 1.125em
    }

    .wp-block-file__button {
        background: #32373c;
        color: #fff;
        text-decoration: none
    }
    </style>
    <style id='global-styles-inline-css'>
    body {
        --wp--preset--color--black: #000000;
        --wp--preset--color--cyan-bluish-gray: #abb8c3;
        --wp--preset--color--white: #ffffff;
        --wp--preset--color--pale-pink: #f78da7;
        --wp--preset--color--vivid-red: #cf2e2e;
        --wp--preset--color--luminous-vivid-orange: #ff6900;
        --wp--preset--color--luminous-vivid-amber: #fcb900;
        --wp--preset--color--light-green-cyan: #7bdcb5;
        --wp--preset--color--vivid-green-cyan: #00d084;
        --wp--preset--color--pale-cyan-blue: #8ed1fc;
        --wp--preset--color--vivid-cyan-blue: #0693e3;
        --wp--preset--color--vivid-purple: #9b51e0;
        --wp--preset--color--primary: #183f72;
        --wp--preset--color--secondary: #e8465f;
        --wp--preset--color--tertiary: #000000;
        --wp--preset--color--quaternary: #000000;
        --wp--preset--color--dark: #212529;
        --wp--preset--color--light: #ffffff;
        --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
        --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
        --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
        --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
        --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
        --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
        --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
        --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
        --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
        --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
        --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
        --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
        --wp--preset--font-size--small: 13px;
        --wp--preset--font-size--medium: 20px;
        --wp--preset--font-size--large: 36px;
        --wp--preset--font-size--x-large: 42px;
        --wp--preset--spacing--20: 0.44rem;
        --wp--preset--spacing--30: 0.67rem;
        --wp--preset--spacing--40: 1rem;
        --wp--preset--spacing--50: 1.5rem;
        --wp--preset--spacing--60: 2.25rem;
        --wp--preset--spacing--70: 3.38rem;
        --wp--preset--spacing--80: 5.06rem;
        --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
        --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
        --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
        --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
        --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
    }

    :where(.is-layout-flex) {
        gap: 0.5em;
    }

    :where(.is-layout-grid) {
        gap: 0.5em;
    }

    body .is-layout-flow>.alignleft {
        float: left;
        margin-inline-start: 0;
        margin-inline-end: 2em;
    }

    body .is-layout-flow>.alignright {
        float: right;
        margin-inline-start: 2em;
        margin-inline-end: 0;
    }

    body .is-layout-flow>.aligncenter {
        margin-left: auto !important;
        margin-right: auto !important;
    }

    body .is-layout-constrained>.alignleft {
        float: left;
        margin-inline-start: 0;
        margin-inline-end: 2em;
    }

    body .is-layout-constrained>.alignright {
        float: right;
        margin-inline-start: 2em;
        margin-inline-end: 0;
    }

    body .is-layout-constrained>.aligncenter {
        margin-left: auto !important;
        margin-right: auto !important;
    }

    body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
        max-width: var(--wp--style--global--content-size);
        margin-left: auto !important;
        margin-right: auto !important;
    }

    body .is-layout-constrained>.alignwide {
        max-width: var(--wp--style--global--wide-size);
    }

    body .is-layout-flex {
        display: flex;
    }

    body .is-layout-flex {
        flex-wrap: wrap;
        align-items: center;
    }

    body .is-layout-flex>* {
        margin: 0;
    }

    body .is-layout-grid {
        display: grid;
    }

    body .is-layout-grid>* {
        margin: 0;
    }

    :where(.wp-block-columns.is-layout-flex) {
        gap: 2em;
    }

    :where(.wp-block-columns.is-layout-grid) {
        gap: 2em;
    }

    :where(.wp-block-post-template.is-layout-flex) {
        gap: 1.25em;
    }

    :where(.wp-block-post-template.is-layout-grid) {
        gap: 1.25em;
    }

    .has-black-color {
        color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-color {
        color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-color {
        color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-color {
        color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-color {
        color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-color {
        color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-color {
        color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-color {
        color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-color {
        color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-color {
        color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-color {
        color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-color {
        color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-background-color {
        background-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-background-color {
        background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-background-color {
        background-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-background-color {
        background-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-background-color {
        background-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-background-color {
        background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-background-color {
        background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-background-color {
        background-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-background-color {
        background-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-background-color {
        background-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-background-color {
        background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-background-color {
        background-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-border-color {
        border-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-border-color {
        border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-border-color {
        border-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-border-color {
        border-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-border-color {
        border-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-border-color {
        border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-border-color {
        border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-border-color {
        border-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-border-color {
        border-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-border-color {
        border-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-border-color {
        border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-border-color {
        border-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
        background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
    }

    .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
        background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
    }

    .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
        background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-orange-to-vivid-red-gradient-background {
        background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
    }

    .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
        background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
    }

    .has-cool-to-warm-spectrum-gradient-background {
        background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
    }

    .has-blush-light-purple-gradient-background {
        background: var(--wp--preset--gradient--blush-light-purple) !important;
    }

    .has-blush-bordeaux-gradient-background {
        background: var(--wp--preset--gradient--blush-bordeaux) !important;
    }

    .has-luminous-dusk-gradient-background {
        background: var(--wp--preset--gradient--luminous-dusk) !important;
    }

    .has-pale-ocean-gradient-background {
        background: var(--wp--preset--gradient--pale-ocean) !important;
    }

    .has-electric-grass-gradient-background {
        background: var(--wp--preset--gradient--electric-grass) !important;
    }

    .has-midnight-gradient-background {
        background: var(--wp--preset--gradient--midnight) !important;
    }

    .has-small-font-size {
        font-size: var(--wp--preset--font-size--small) !important;
    }

    .has-medium-font-size {
        font-size: var(--wp--preset--font-size--medium) !important;
    }

    .has-large-font-size {
        font-size: var(--wp--preset--font-size--large) !important;
    }

    .has-x-large-font-size {
        font-size: var(--wp--preset--font-size--x-large) !important;
    }

    .wp-block-navigation a:where(:not(.wp-element-button)) {
        color: inherit;
    }

    :where(.wp-block-post-template.is-layout-flex) {
        gap: 1.25em;
    }

    :where(.wp-block-post-template.is-layout-grid) {
        gap: 1.25em;
    }

    :where(.wp-block-columns.is-layout-flex) {
        gap: 2em;
    }

    :where(.wp-block-columns.is-layout-grid) {
        gap: 2em;
    }

    .wp-block-pullquote {
        font-size: 1.5em;
        line-height: 1.6;
    }
    </style>
    <style id='woocommerce-inline-inline-css'>
    .woocommerce form .form-row .required {
        visibility: visible;
    }
    </style>
    <link rel='stylesheet' id='elementor-icons-css'
        href='./wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min192d.css?ver=5.23.0'
        media='all' />
    <link rel='stylesheet' id='elementor-frontend-css'
        href='./wp-content/uploads/elementor/css/custom-frontend-lite.min8c65.css?ver=1700898238' media='all' />
    <link rel='stylesheet' id='swiper-css'
        href='./wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min94a4.css?ver=8.4.5' media='all' />
    <link rel='stylesheet' id='elementor-post-1724-css'
        href='./wp-content/uploads/elementor/css/post-17248c65.css?ver=1700898238' media='all' />
    <link rel='stylesheet' id='elementor-pro-css'
        href='./wp-content/uploads/elementor/css/custom-pro-frontend-lite.min8c65.css?ver=1700898238' media='all' />
    <link rel='stylesheet' id='elementor-global-css'
        href='./wp-content/uploads/elementor/css/global8c65.css?ver=1700898238' media='all' />
    <link rel='stylesheet' id='porto-css-vars-css'
        href='./wp-content/uploads/porto_styles/theme_css_varsaf33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='bootstrap-css' href='./wp-content/uploads/porto_styles/bootstrapaf33.css?ver=6.12.0'
        media='all' />
    <link rel='stylesheet' id='porto-plugins-css' href='./wp-content/themes/porto/css/pluginsaf33.css?ver=6.12.0'
        media='all' />
    <link rel='stylesheet' id='porto-theme-css' href='./wp-content/themes/porto/css/themeaf33.css?ver=6.12.0'
        media='all' />
    <link rel='stylesheet' id='porto-shortcodes-css'
        href='./wp-content/uploads/porto_styles/shortcodesaf33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='porto-theme-shop-css' href='./wp-content/themes/porto/css/theme_shopaf33.css?ver=6.12.0'
        media='all' />
    <link rel='stylesheet' id='porto-theme-elementor-css'
        href='./wp-content/themes/porto/css/theme_elementoraf33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='porto-dynamic-style-css'
        href='./wp-content/uploads/porto_styles/dynamic_styleaf33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='porto-type-builder-css'
        href='./wp-content/plugins/porto-functionality/builders/assets/type-builderab7d.css?ver=2.9.2' media='all' />
    <link rel='stylesheet' id='porto-account-login-style-css'
        href='./wp-content/themes/porto/css/theme/shop/login-style/account-loginaf33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='elementor-post-2534-css'
        href='./wp-content/uploads/elementor/css/post-253403a6.css?ver=1701132573' media='all' />
    <link rel='stylesheet' id='elementor-post-573-css'
        href='./wp-content/uploads/elementor/css/post-573af33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='porto-style-css' href='./wp-content/themes/porto/styleaf33.css?ver=6.12.0'
        media='all' />
    <style id='porto-style-inline-css'>
    .side-header-narrow-bar-logo {
        max-width: 160px
    }

    @media (min-width:992px) {}

    #header .header-main .header-left,
    #header .header-main .header-center,
    #header .header-main .header-right,
    .fixed-header #header .header-main .header-left,
    .fixed-header #header .header-main .header-right,
    .fixed-header #header .header-main .header-center,
    .header-builder-p .header-main {
        padding-top: 43px;
        padding-bottom: 32px
    }

    .page-top ul.breadcrumb>li.home {
        display: inline-block
    }

    .page-top ul.breadcrumb>li.home a {
        position: relative;
        width: 14px;
        text-indent: -9999px
    }

    .page-top ul.breadcrumb>li.home a:after {
        content: "\e883";
        font-family: 'porto';
        float: left;
        text-indent: 0
    }

    #login-form-popup {
        max-width: 480px
    }

    #header .currency-switcher>li.menu-item>a {
        font-size: 11px;
        font-weight: 400;
        text-transform: uppercase;
        line-height: 1;
        letter-spacing: .025em;
        color: #666666
    }

    #header .currency-switcher>li.menu-item:hover>a {
        color: #222529
    }

    #header .view-switcher>li.menu-item>a {
        font-size: 11px;
        font-weight: 400;
        text-transform: uppercase;
        line-height: 1;
        letter-spacing: .025em;
        color: #666666
    }

    #header .view-switcher>li.menu-item:hover>a {
        color: #222529
    }

    #header .currency-switcher>li.menu-item>a {
        font-size: 11px;
        font-weight: 400;
        text-transform: uppercase;
        line-height: 1;
        letter-spacing: .025em;
        color: #666666
    }

    #header .currency-switcher>li.menu-item:hover>a {
        color: #222529
    }

    #header .view-switcher>li.menu-item>a {
        font-size: 11px;
        font-weight: 400;
        text-transform: uppercase;
        line-height: 1;
        letter-spacing: .025em;
        color: #666666
    }

    #header .view-switcher>li.menu-item:hover>a {
        color: #222529
    }

    #header .top-links>li.menu-item>a {
        font-size: 11px;
        font-weight: 400;
        line-height: 1;
        letter-spacing: .025em;
        padding-left: 23px;
        padding-right: 23px;
        color: #666666
    }

    #header .share-links a {
        font-size: 15px;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        box-shadow: none
    }

    #header .share-links a:hover {
        color: rgba(40, 45, 59, 0.8);
        background-color: rgba(255, 255, 255, 0)
    }

    #header .mobile-toggle {
        font-size: 20px;
        background-color: rgba(255, 255, 255, 0.01);
        color: #0071dc
    }

    #header .searchform button,
    #header .searchform-popup .search-toggle {
        color: #222529
    }

    #header .searchform input,
    #header .searchform.searchform-cats input {
        width: 100%
    }

    #header .searchform input,
    #header .searchform select,
    #header .searchform .selectric .label,
    #header .searchform button {
        height: 48px;
        line-height: 48px
    }

    #header .searchform {
        border-width: 1px;
        border-color: #e7e7e7
    }

    #header .searchform-popup .search-toggle:after {
        border-bottom-color: #e7e7e7
    }

    #header .searchform {
        border-radius: 6px
    }

    #header .searchform input {
        border-radius: 6px 0 0 6px
    }

    #header .searchform button {
        border-radius: 0 6px 6px 0
    }

    #mini-cart .cart-icon {
        margin-left: 10px
    }

    .custom-font,
    .custom-font h2 {
        font-family: Segoe Script
    }

    .br-round {
        border-radius: 6px
    }

    .page-header-7 {
        margin-top: 2rem
    }

    .main-content,
    .left-sidebar,
    .right-sidebar {
        padding-top: 0
    }

    .wpcf7-submit {
        box-shadow: none !important
    }

    .intro-section .elementor-image {
        display: inline-block;
        max-width: 100%
    }

    .intro-banner {
        font-size: 1rem
    }

    .custom-com-1 sup {
        font-size: 33%;
        font-weight: 700;
        color: #222529;
        top: -2em;
        margin-right: 24px;
        letter-spacing: -0.03em
    }

    .sale-wrapper {
        padding-right: 34px
    }

    .sale-wrapper strong {
        display: inline-block;
        position: relative;
        color: #fff;
        line-height: 0.9;
        z-index: 1
    }

    .sale-wrapper small {
        display: block;
        font-size: .22222em;
        font-weight: 600;
        padding-right: 4px;
        letter-spacing: -.01em
    }

    .sale-text::before,
    .custom-com-1 .sale-wrapper strong::before {
        content: '';
        position: absolute;
        top: -9px;
        left: -8px;
        right: 0;
        bottom: -10px;
        width: 2.45em;
        background-color: #222529;
        z-index: -1;
        transform: rotate(-2deg)
    }

    .custom-text-1 {
        font-size: 2.5em;
        right: -1.56em;
        bottom: .65em
    }

    .custom-text-1::before {
        content: '';
        background-image: url(../../sw-themes.com/porto_dummy/wp-content/uploads/2020/12/pencil-1.png);
        position: absolute;
        right: .475em;
        bottom: -0.975em;
        width: 67px;
        height: 42px;
        transform: rotate(30deg)
    }

    .custom-text-2 {
        color: #ee8379;
        font-size: 1.625em;
        right: 2rem;
        bottom: 0.8rem;
        transform: rotate(-30deg)
    }

    .custom-text-3 {
        font-size: 1.601875em;
        right: 1.68552em;
        bottom: -0.6rem
    }

    .custom-text-1,
    .custom-text-3 {
        color: #e8465f;
        transform: rotate(-30deg)
    }

    .custom-sale-2 {
        padding-right: 27px
    }

    .custom-sale-2 sup {
        top: -1.1em
    }

    .custom-sale-2 strong::before {
        width: 2.35em !important
    }

    .custom-service {
        justify-content: center;
        box-shadow: 0 0 50px 20px rgba(0, 0, 0, 0.04)
    }

    .intro-banner.nav-style-1 .owl-nav [class*="owl-"] {
        font-size: 35px;
        color: #222529
    }

    .intro-banner.owl-carousel .owl-nav .owl-next {
        right: 10px
    }

    .intro-banner.owl-carousel .owl-nav .owl-prev {
        left: 3px
    }

    .intro-section>div>.elementor-row,
    .intro-section>.elementor-container {
        flex-wrap: wrap
    }

    .porto-products .inline-title {
        color: #183f72;
        font-size: 1.25em;
        text-transform: capitalize;
        letter-spacing: -.025em
    }

    .porto-products.filter-vertical .section-title {
        border-bottom: 1px solid rgba(0, 0, 0, .08);
        margin-bottom: 24px;
        padding-bottom: 14px
    }

    .porto-products.filter-vertical .product-categories a:before {
        content: none !important
    }

    .porto-products.filter-vertical .products-filter+div {
        width: calc(100% + 20px);
        flex: 0 0 auto;
        padding: 0;
        margin: 0 -10px
    }

    .products-filter {
        position: absolute;
        left: 160px;
        top: 0;
        width: auto !important;
        border-width: 0 !important
    }

    .porto-products.filter-vertical .products-filter li a {
        padding: 1px 11.5px;
        font-weight: 700;
        letter-spacing: -.015em
    }

    .products-filter li.current a,
    .products-filter li a:hover,
    .products-filter li a:focus,
    .products-filter li a:active {
        color: #e8465f
    }

    .products-filter li:not(.current) a {
        color: #222529;
        transition: color .3s
    }

    .products-filter .section-title {
        display: none
    }

    .products-filter .product-categories {
        display: flex
    }

    .porto-products.title-border-bottom>.section-title {
        padding-bottom: 15px
    }

    .product-image {
        border-width: 0
    }

    .owl-carousel.show-nav-title .owl-nav {
        right: 8px !important;
        top: -17px;
        left: auto
    }

    .owl-carousel.show-nav-title .owl-nav [class*="owl-"] {
        font-size: 29px !important
    }

    ul.products.yith-wcan-loading:after {
        position: absolute
    }

    .filter-vertical .porto-loading-icon {
        position: absolute !important
    }

    .products-slider .owl-stage-outer {
        margin-left: -10px;
        margin-right: -10px;
        padding-left: 10px;
        padding-right: 10px
    }

    .products-filter li:nth-child(2) {
        order: -1
    }

    ul.products .category-list {
        margin-bottom: 2px;
        font-family: "Open Sans", sans-serif;
        letter-spacing: .005em
    }

    ul.products li.product-col .price {
        font-family: "Open Sans", sans-serif
    }

    ul.products li.product-col h3 {
        margin-bottom: 8px;
        font-family: Poppins, sans-serif;
        font-weight: 500;
        letter-spacing: -.02em
    }

    .star-rating {
        font-size: 11.8px;
        letter-spacing: .07em
    }

    .custom-sale-3 sup {
        top: -1em
    }

    .custom-sale-3.sale-wrapper strong::before {
        top: -14px;
        left: -4px;
        bottom: -15px;
        width: 3em
    }

    .custom-special h2 i {
        margin-left: 3px;
        margin-right: 6px;
        vertical-align: -1px
    }

    .custom-special h2 i::before {
        content: '\e8c8';
        font: 400 27px "porto"
    }

    .custom-pr-margin .products li.product-col {
        margin-bottom: 14px
    }

    .custom-pr-margin {
        margin-bottom: 42px
    }

    ul.category-color-dark li.product-category .thumb-info-title {
        color: #183f72
    }

    .custom-category .products .product-category .thumb-info-title {
        padding-left: 2rem
    }

    .custom-category .products .sub-title {
        text-transform: none;
        font-size: 18px;
        letter-spacing: -.025em !important;
        line-height: 26px;
        font-weight: 700 !important
    }

    .custom-category .products .thumb-info-type {
        font-size: 13px;
        letter-spacing: -.02em;
        line-height: 22px !important;
        text-transform: none;
        color: #777
    }

    li.product-category .thumb-info-wrapper:after {
        border-radius: 4px
    }

    .widget-subscribe>.email {
        flex: 1
    }

    .widget-subscribe .wpcf7-email {
        padding: 15px 0 15px 17px;
        font-size: 13px;
        border: 1px solid #e7e7e7;
        border-radius: 6px 0 0 6px;
        border-right-width: 0
    }

    .widget-subscribe .wpcf7-submit {
        min-width: 215px;
        max-height: 53px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: -.025em;
        padding: 14px;
        border-radius: 0 6px 6px 0
    }

    .custom-subscribe .elementor-widget-shortcode {
        flex: 1
    }

    .newsletter-popup-form {
        max-width: 740px;
        position: relative
    }

    .wpcf7 form .wpcf7-response-output {
        margin: 15px 0
    }

    @media(max-width:1255px) {
        .intro-layer>.elementor-element-populated {
            padding: 20px !important;
            font-size: .85rem
        }

        .custom-service .porto-sicon-box {
            border-width: 0 !important
        }

        .custom-cta {
            font-size: .8rem !important
        }
    }

    @media(max-width:991px) {
        .intro-layer {
            padding-right: 0 !important
        }

        .intro-layer>.elementor-element-populated {
            padding: 4px !important;
            font-size: 0.875rem
        }

        .intro-layer .elementor-widget-wrap {
            max-width: 520px;
            margin: 20px auto
        }

        .intro-section .elementor-widget-image .elementor-widget-container {
            width: 100%;
            margin: 0
        }

        .custom-text-1,
        .custom-text-2 {
            display: inline-block;
            position: relative !important;
            transform: rotate(0deg);
            top: 20px;
            left: 0
        }

        .custom-text-1::before {
            right: 2px
        }

        .custom-subscribe .elementor-widget-wrap {
            flex-direction: column
        }
    }

    @media (max-width:767px) {
        .intro-layer>.elementor-element-populated {
            font-size: 0.8125rem
        }
    }

    @media (max-width:575px) {
        .intro-layer>.elementor-element-populated {
            font-size: 0.75rem
        }

        .newsletter-msg .porto-sicon-box {
            flex-direction: column
        }
    }

    @media (max-width:479px) {
        .products-filter {
            position: static
        }

        .owl-carousel.show-nav-title .owl-nav {
            top: -60px
        }

        .widget-subscribe {
            flex-direction: column;
            align-items: center
        }

        .widget-subscribe .wpcf7-email {
            border-right-width: 1px
        }

        .custom-subscribe input[type="email"],
        .custom-subscribe input[type="submit"] {
            border-radius: 6px !important
        }
    }

    @media (max-width:359px) {
        .intro-layer>.elementor-element-populated {
            font-size: .7rem
        }
    }

    .custom-form-style-1 .form-control {
        border-radius: 0;
        padding: 0.9rem 1.5rem;
        height: 2.95rem;
        color: #495057
    }

    .custom-form-style-1 .btn {
        height: 2.95rem
    }

    .custom-form-style-1-rounded {
        border-radius: 4px
    }

    .custom-form-style-1-rounded .form-control {
        border-radius: 3em
    }

    .custom-form-style-1 .form-control::-webkit-input-placeholder {
        color: #536f78;
        font-weight: 600
    }

    .custom-form-style-1 .form-control::placeholder {
        color: #536f78;
        font-weight: 600
    }

    .custom-form-style-1 .btn {
        padding-top: .625rem;
        padding-bottom: .625rem
    }

    @keyframes customLineProgressAnim {
        from {
            width: 0
        }

        to {
            width: 60px
        }
    }

    .fadeIn.customLineProgressAnim .elementor-divider-separator {
        animation-name: customLineProgressAnim;
        animation-duration: 1s
    }

    .custom-view-more .porto-sicon-default {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 43.19px;
        height: 43.19px;
        margin-right: 4px
    }

    .custom-phone:hover .porto-sicon-header p {
        color: #1c5fa8 !important
    }

    .transform3dxy-n50 {
        position: absolute;
        transform: translate3d(-50%, -50%, 0)
    }

    .auto-1 {
        top: 26%;
        left: 7%
    }

    .auto-2 {
        top: 32%;
        left: 85%
    }

    .auto-3 {
        top: 87%;
        left: 19%
    }

    .btn.btn-full-rounded {
        border-radius: 12px
    }

    @media(max-width:991px) {
        .auto-1 {
            top: 17%;
            left: 22%
        }

        .auto-3 {
            top: 81%
        }

        .custom-auto-img {
            margin: 0 auto
        }

        .custom-view-more .porto-sicon-box {
            justify-content: center
        }

        .custom-view-more .only-left .porto-sicon-box {
            justify-content: normal
        }

        .custom-view-more .only-left .porto-sicon-box {
            justify-content: normal
        }
    }

    @media(max-width:767px) {
        .w-md-max {
            width: 100% !important
        }
    }

    @media(max-width:575px) {
        .custom-view-more .porto-sicon-box {
            border-left-width: 0 !important
        }
    }
    </style>
    <link rel='stylesheet' id='styles-child-css' href='./wp-content/themes/porto-child/style1e39.css?ver=6.4.2'
        media='all' />
    <link rel='stylesheet' id='google-fonts-1-css'
        href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=swap&amp;ver=6.4.2'
        media='all' />
    <link rel='stylesheet' id='elementor-icons-shared-0-css'
        href='./wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min52d5.css?ver=5.15.3'
        media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-solid-css'
        href='./wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min52d5.css?ver=5.15.3' media='all' />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <script src="./wp-includes/js/jquery/jquery.minf43b.js?ver=3.7.1" id="jquery-core-js"></script>
    <script src="./wp-includes/js/jquery/jquery-migrate.min5589.js?ver=3.4.1" id="jquery-migrate-js"></script>
    <script
        src="./wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min64af.js?ver=2.7.0-wc.8.3.1"
        id="jquery-blockui-js" defer data-wp-strategy="defer"></script>
    <script id="wc-add-to-cart-js-extra">
    var wc_add_to_cart_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
        "i18n_view_cart": "Ver carrito",
        "cart_url": "https:\/\/bebifydemo.sedmex.com\/cart\/",
        "is_cart": "",
        "cart_redirect_after_add": "no"
    };
    </script>
    <script src="./wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.mined84.js?ver=8.3.1"
        id="wc-add-to-cart-js" defer data-wp-strategy="defer"></script>
    <script src="./wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.minaa02.js?ver=2.1.4-wc.8.3.1"
        id="js-cookie-js" defer data-wp-strategy="defer"></script>
    <script id="woocommerce-js-extra">
    var woocommerce_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%"
    };
    </script>
    <script src="./wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.mined84.js?ver=8.3.1"
        id="woocommerce-js" defer data-wp-strategy="defer"></script>
    <script id="wc-cart-fragments-js-extra">
    var wc_cart_fragments_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
        "cart_hash_key": "wc_cart_hash_1ed5101e229084b8b45e7bc5eb7110df",
        "fragment_name": "wc_fragments_1ed5101e229084b8b45e7bc5eb7110df",
        "request_timeout": "5000"
    };
    </script>
    <script src="./wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.mined84.js?ver=8.3.1"
        id="wc-cart-fragments-js" defer data-wp-strategy="defer"></script>
    <link rel="https://api.w.org/" href="./wp-json/index.html" />
    <link rel="alternate" type="application/json" href="./wp-json/wp/v2/pages/2534.json" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db0.php?rsd" />
    <meta name="generator" content="WordPress 6.4.2" />
    <meta name="generator" content="WooCommerce 8.3.1" />
    <link rel="canonical" href="index.php" />
    <link rel='shortlink' href='../indexed00.html?p=2534' />
    <link rel="alternate" type="application/json+oembed"
        href="./wp-json/oembed/1.0/embedfdf5.json?url=https%3A%2F%2Fbebifydemo.sedmex.com%2Fregistro%2F" />
    <link rel="alternate" type="text/xml+oembed"
        href="./wp-json/oembed/1.0/embedb3f9?url=https%3A%2F%2Fbebifydemo.sedmex.com%2Fregistro%2F&amp;format=xml" />
    <script type="text/javascript">
    WebFontConfig = {
        google: {
            families: ['Poppins:400,500,600,700,800']
        }
    };
    (function(d) {
        var wf = d.createElement('script'),
            s = d.scripts[d.scripts.length - 1];
        wf.src = './wp-content/themes/porto/js/libs/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
    </script>
    <noscript>
        <style>
        .woocommerce-product-gallery {
            opacity: 1 !important;
        }
        </style>
    </noscript>
    <meta name="generator"
        content="Elementor 3.17.3; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints, block_editor_assets_optimize, e_image_loading_optimization; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <meta name="generator"
        content="Powered by Slider Revolution 6.6.13 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
    <script>
    function setREVStartSize(e) {
        //window.requestAnimationFrame(function() {
        window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
        window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
        try {
            var pw = document.getElementById(e.c).parentNode.offsetWidth,
                newh;
            pw = pw === 0 || isNaN(pw) || (e.l == "fullwidth" || e.layout == "fullwidth") ? window.RSIW : pw;
            e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
            e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
            e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
            e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
            e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
            e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
            e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
            if (e.layout === "fullscreen" || e.l === "fullscreen")
                newh = Math.max(e.mh, window.RSIH);
            else {
                e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                for (var i in e.rl)
                    if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
                e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
                e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                for (var i in e.rl)
                    if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

                var nl = new Array(e.rl.length),
                    ix = 0,
                    sl;
                e.tabw = e.tabhide >= pw ? 0 : e.tabw;
                e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
                e.tabh = e.tabhide >= pw ? 0 : e.tabh;
                e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
                for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
                sl = nl[0];
                for (var i in nl)
                    if (sl > nl[i] && nl[i] > 0) {
                        sl = nl[i];
                        ix = i;
                    }
                var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
                newh = (e.gh[ix] * m) + (e.tabh + e.thumbh);
            }
            var el = document.getElementById(e.c);
            if (el !== null && el) el.style.height = newh + "px";
            el = document.getElementById(e.c + "_wrapper");
            if (el !== null && el) {
                el.style.height = newh + "px";
                el.style.display = "block";
            }
        } catch (e) {
            console.log("Failure at Presize of Slider:" + e)
        }
        //});
    };
    </script>
    <style id="wp-custom-css">
    .btn-gradient .btn {
        background: linear-gradient(135deg, #0055a2 0, #0055a2 80%);
        border: none;
        transition: background .3s;
    }

    .woocommerce-ordering {
        display: none;
    }

    #footer .footer-links a:not(:hover) {
        color: #000;
    }

    .faq-list .elementor-tab-title.elementor-active a {
        background-color: #0055a2;
    }

    article.post .post-meta>.post-views,
    article.post .post-meta>span {
        display: none;
        padding-right: 8px;
    }

    #footer .footer-links a:not(:hover) {
        color: #000;
    }

    .share-links .share-instagram {
        /* background: #7c4a3a; */
        display: none;
    }

    .share-links .share-facebook {
        background: #3b5a9a;
        display: none;
    }

    .share-links .share-twitter {
        background: #1aa9e1;
        display: none;
    }

    .elementor-2827 .elementor-element.elementor-element-5a76780b .elementor-heading-title {
        color: #000000;
        font-family: "Roboto", Poppins;
        font-size: 15px;
        font-weight: 600;
    }

    .elementor-2827 .elementor-element.elementor-element-5a76780b .elementor-heading-title {
        color: #000000;
        font-family: "Roboto", Poppins;
        font-size: 18px;
        font-weight: 600;
    }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
</head>

<body data-rsssl=1
    class="page-template page-template-elementor_canvas page page-id-2534 wp-custom-logo wp-embed-responsive theme-porto woocommerce-no-js login-popup full blog-1 elementor-default elementor-template-canvas elementor-kit-1724 elementor-page elementor-page-2534">
    <div data-elementor-type="wp-page" data-elementor-id="2534" class="elementor elementor-2534"
        data-elementor-post-type="page">
        <div class="elementor-element elementor-element-37a6d74 e-flex e-con-boxed e-con e-parent" data-id="37a6d74"
            data-element_type="container"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
            </div>
        </div>
        <div class="elementor-element elementor-element-a3e48cf e-flex e-con-boxed e-con e-parent" data-id="a3e48cf"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-464446d e-con-full e-flex e-con e-child"
                    data-id="464446d" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-4efa3b4 elementor-widget elementor-widget-theme-site-logo elementor-widget-image"
                        data-id="4efa3b4" data-element_type="widget" data-widget_type="theme-site-logo.default">
                        <div class="elementor-widget-container">
                            <style>
                            /*! elementor - v3.17.0 - 08-11-2023 */
                            .elementor-widget-image {
                                text-align: center
                            }

                            .elementor-widget-image a {
                                display: inline-block
                            }

                            .elementor-widget-image a img[src$=".svg"] {
                                width: 48px
                            }

                            .elementor-widget-image img {
                                vertical-align: middle;
                                display: inline-block
                            }
                            </style> <a href="index">
                                <img fetchpriority="high" decoding="async" width="6120" height="2106"
                                    src="./wp-content/uploads/2023/11/Bebify-Logotipo-01-e1700457076300.png"
                                    class="attachment-full size-full wp-image-1733" alt=""
                                    srcset="https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/Bebify-Logotipo-01-e1700457076300.png 6120w, https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/Bebify-Logotipo-01-e1700457076300-1024x352.png 1024w, https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/Bebify-Logotipo-01-e1700457076300-768x264.png 768w, https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/Bebify-Logotipo-01-e1700457076300-1536x529.png 1536w, https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/Bebify-Logotipo-01-e1700457076300-2048x705.png 2048w, https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/Bebify-Logotipo-01-e1700457076300-640x220.png 640w, https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/Bebify-Logotipo-01-e1700457076300-400x138.png 400w, https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/Bebify-Logotipo-01-e1700457076300-600x206.png 600w"
                                    sizes="(max-width: 6120px) 100vw, 6120px" /> </a>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-4647cf4 e-con-full e-flex e-con e-child"
                    data-id="4647cf4" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-ad906e9 e-flex e-con-boxed e-con e-parent" data-id="ad906e9"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-22fa61c e-con-full animated-slow e-flex elementor-invisible e-con e-child"
                    data-id="22fa61c" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;animation&quot;:&quot;fadeInLeft&quot;}">
                    <div class="elementor-element elementor-element-6f92850 elementor-widget elementor-widget-spacer"
                        data-id="6f92850" data-element_type="widget" data-widget_type="spacer.default">
                        <div class="elementor-widget-container">
                            <style>
                            /*! elementor - v3.17.0 - 08-11-2023 */
                            .elementor-column .elementor-spacer-inner {
                                height: var(--spacer-size)
                            }

                            .e-con {
                                --container-widget-width: 100%
                            }

                            .e-con-inner>.elementor-widget-spacer,
                            .e-con>.elementor-widget-spacer {
                                width: var(--container-widget-width, var(--spacer-size));
                                --align-self: var(--container-widget-align-self, initial);
                                --flex-shrink: 0
                            }

                            .e-con-inner>.elementor-widget-spacer>.elementor-widget-container,
                            .e-con>.elementor-widget-spacer>.elementor-widget-container {
                                height: 100%;
                                width: 100%
                            }

                            .e-con-inner>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer,
                            .e-con>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer {
                                height: 100%
                            }

                            .e-con-inner>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer>.elementor-spacer-inner,
                            .e-con>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer>.elementor-spacer-inner {
                                height: var(--container-widget-height, var(--spacer-size))
                            }

                            .e-con-inner>.elementor-widget-spacer.elementor-widget-empty,
                            .e-con>.elementor-widget-spacer.elementor-widget-empty {
                                position: relative;
                                min-height: 22px;
                                min-width: 22px
                            }

                            .e-con-inner>.elementor-widget-spacer.elementor-widget-empty .elementor-widget-empty-icon,
                            .e-con>.elementor-widget-spacer.elementor-widget-empty .elementor-widget-empty-icon {
                                position: absolute;
                                top: 0;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                margin: auto;
                                padding: 0;
                                width: 22px;
                                height: 22px
                            }
                            </style>
                            <div class="elementor-spacer">
                                <div class="elementor-spacer-inner"></div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-3f3dfc6 elementor-widget elementor-widget-image"
                        data-id="3f3dfc6" data-element_type="widget" data-widget_type="image.default">
                        <div class="elementor-widget-container">
                            <img decoding="async" width="626" height="522"
                                src="./wp-content/uploads/2023/11/ilustracion-isometrica-concepto-3d-plano-que-pone-marca-verificacion-pantalla-registro_18660-4621.jpg"
                                class="attachment-large size-large wp-image-2638" alt=""
                                srcset="https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/ilustracion-isometrica-concepto-3d-plano-que-pone-marca-verificacion-pantalla-registro_18660-4621.jpg 626w, https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/ilustracion-isometrica-concepto-3d-plano-que-pone-marca-verificacion-pantalla-registro_18660-4621-400x334.jpg 400w, https://bebifydemo.sedmex.com/wp-content/uploads/2023/11/ilustracion-isometrica-concepto-3d-plano-que-pone-marca-verificacion-pantalla-registro_18660-4621-600x500.jpg 600w"
                                sizes="(max-width: 626px) 100vw, 626px" />
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-e53eaad e-con-full animated-slow e-flex elementor-invisible e-con e-child"
                    data-id="e53eaad" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;animation&quot;:&quot;fadeInRight&quot;}">
                    <div class="elementor-element elementor-element-f24a664 elementor-widget elementor-widget-text-editor"
                        data-id="f24a664" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <style>
                            /*! elementor - v3.17.0 - 08-11-2023 */
                            .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                background-color: #69727d;
                                color: #fff
                            }

                            .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                color: #69727d;
                                border: 3px solid;
                                background-color: transparent
                            }

                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                margin-top: 8px
                            }

                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                width: 1em;
                                height: 1em
                            }

                            .elementor-widget-text-editor .elementor-drop-cap {
                                float: left;
                                text-align: center;
                                line-height: 1;
                                font-size: 50px
                            }

                            .elementor-widget-text-editor .elementor-drop-cap-letter {
                                display: inline-block
                            }
                            </style>
                            <p><strong>¡Bienvenid@ a Bebify!</strong> Por favor, completa los siguientes campos para
                                llevar a cabo tu registro.</p>
                            <p>Te sugerimos tener disponible tu Constancia de Situación Fiscal (CSF) en formato PDF, así
                                como todos los detalles de tu negocio, incluyendo sucursales y datos de contacto.</p>
                            <p><strong>¡Estamos emocionados de tenerte con nosotros!</strong></p>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-5902262 elementor-button-align-stretch elementor-widget elementor-widget-form"
                        data-id="5902262" data-element_type="widget"
                        data-settings="{&quot;step_next_label&quot;:&quot;Siguiente&quot;,&quot;step_previous_label&quot;:&quot;Regresar&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}"
                        data-widget_type="form.default">
                        <div class="elementor-widget-container">
                            <style>
                            /*! pro-elements - v3.17.0 - 01-11-2023 */
                            .elementor-button.elementor-hidden,
                            .elementor-hidden {
                                display: none
                            }

                            .e-form__step {
                                width: 100%
                            }

                            .e-form__step:not(.elementor-hidden) {
                                display: flex;
                                flex-wrap: wrap
                            }

                            .e-form__buttons {
                                flex-wrap: wrap
                            }

                            .e-form__buttons,
                            .e-form__buttons__wrapper {
                                display: flex
                            }

                            .e-form__indicators {
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                flex-wrap: nowrap;
                                font-size: 13px;
                                margin-bottom: var(--e-form-steps-indicators-spacing)
                            }

                            .e-form__indicators__indicator {
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                flex-basis: 0;
                                padding: 0 var(--e-form-steps-divider-gap)
                            }

                            .e-form__indicators__indicator__progress {
                                width: 100%;
                                position: relative;
                                background-color: var(--e-form-steps-indicator-progress-background-color);
                                border-radius: var(--e-form-steps-indicator-progress-border-radius);
                                overflow: hidden
                            }

                            .e-form__indicators__indicator__progress__meter {
                                width: var(--e-form-steps-indicator-progress-meter-width, 0);
                                height: var(--e-form-steps-indicator-progress-height);
                                line-height: var(--e-form-steps-indicator-progress-height);
                                padding-right: 15px;
                                border-radius: var(--e-form-steps-indicator-progress-border-radius);
                                background-color: var(--e-form-steps-indicator-progress-color);
                                color: var(--e-form-steps-indicator-progress-meter-color);
                                text-align: right;
                                transition: width .1s linear
                            }

                            .e-form__indicators__indicator:first-child {
                                padding-left: 0
                            }

                            .e-form__indicators__indicator:last-child {
                                padding-right: 0
                            }

                            .e-form__indicators__indicator--state-inactive {
                                color: var(--e-form-steps-indicator-inactive-primary-color, #c2cbd2)
                            }

                            .e-form__indicators__indicator--state-inactive [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none) {
                                background-color: var(--e-form-steps-indicator-inactive-secondary-color, #fff)
                            }

                            .e-form__indicators__indicator--state-inactive object,
                            .e-form__indicators__indicator--state-inactive svg {
                                fill: var(--e-form-steps-indicator-inactive-primary-color, #c2cbd2)
                            }

                            .e-form__indicators__indicator--state-active {
                                color: var(--e-form-steps-indicator-active-primary-color, #39b54a);
                                border-color: var(--e-form-steps-indicator-active-secondary-color, #fff)
                            }

                            .e-form__indicators__indicator--state-active [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none) {
                                background-color: var(--e-form-steps-indicator-active-secondary-color, #fff)
                            }

                            .e-form__indicators__indicator--state-active object,
                            .e-form__indicators__indicator--state-active svg {
                                fill: var(--e-form-steps-indicator-active-primary-color, #39b54a)
                            }

                            .e-form__indicators__indicator--state-completed {
                                color: var(--e-form-steps-indicator-completed-secondary-color, #fff)
                            }

                            .e-form__indicators__indicator--state-completed [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none) {
                                background-color: var(--e-form-steps-indicator-completed-primary-color, #39b54a)
                            }

                            .e-form__indicators__indicator--state-completed .e-form__indicators__indicator__label {
                                color: var(--e-form-steps-indicator-completed-primary-color, #39b54a)
                            }

                            .e-form__indicators__indicator--state-completed .e-form__indicators__indicator--shape-none {
                                color: var(--e-form-steps-indicator-completed-primary-color, #39b54a);
                                background-color: initial
                            }

                            .e-form__indicators__indicator--state-completed object,
                            .e-form__indicators__indicator--state-completed svg {
                                fill: var(--e-form-steps-indicator-completed-secondary-color, #fff)
                            }

                            .e-form__indicators__indicator__icon {
                                width: var(--e-form-steps-indicator-padding, 30px);
                                height: var(--e-form-steps-indicator-padding, 30px);
                                font-size: var(--e-form-steps-indicator-icon-size);
                                border-width: 1px;
                                border-style: solid;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                overflow: hidden;
                                margin-bottom: 10px
                            }

                            .e-form__indicators__indicator__icon img,
                            .e-form__indicators__indicator__icon object,
                            .e-form__indicators__indicator__icon svg {
                                width: var(--e-form-steps-indicator-icon-size);
                                height: auto
                            }

                            .e-form__indicators__indicator__icon .e-font-icon-svg {
                                height: 1em
                            }

                            .e-form__indicators__indicator__number {
                                width: var(--e-form-steps-indicator-padding, 30px);
                                height: var(--e-form-steps-indicator-padding, 30px);
                                border-width: 1px;
                                border-style: solid;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                margin-bottom: 10px
                            }

                            .e-form__indicators__indicator--shape-circle {
                                border-radius: 50%
                            }

                            .e-form__indicators__indicator--shape-square {
                                border-radius: 0
                            }

                            .e-form__indicators__indicator--shape-rounded {
                                border-radius: 5px
                            }

                            .e-form__indicators__indicator--shape-none {
                                border: 0
                            }

                            .e-form__indicators__indicator__label {
                                text-align: center
                            }

                            .e-form__indicators__indicator__separator {
                                width: 100%;
                                height: var(--e-form-steps-divider-width);
                                background-color: #babfc5
                            }

                            .e-form__indicators--type-icon,
                            .e-form__indicators--type-icon_text,
                            .e-form__indicators--type-number,
                            .e-form__indicators--type-number_text {
                                align-items: flex-start
                            }

                            .e-form__indicators--type-icon .e-form__indicators__indicator__separator,
                            .e-form__indicators--type-icon_text .e-form__indicators__indicator__separator,
                            .e-form__indicators--type-number .e-form__indicators__indicator__separator,
                            .e-form__indicators--type-number_text .e-form__indicators__indicator__separator {
                                margin-top: calc(var(--e-form-steps-indicator-padding, 30px) / 2 - var(--e-form-steps-divider-width, 1px) / 2)
                            }

                            .elementor-field-type-hidden {
                                display: none
                            }

                            .elementor-field-type-html {
                                display: inline-block
                            }

                            .elementor-login .elementor-lost-password,
                            .elementor-login .elementor-remember-me {
                                font-size: .85em
                            }

                            .elementor-field-type-recaptcha_v3 .elementor-field-label {
                                display: none
                            }

                            .elementor-field-type-recaptcha_v3 .grecaptcha-badge {
                                z-index: 1
                            }

                            .elementor-button .elementor-form-spinner {
                                order: 3
                            }

                            .elementor-form .elementor-button>span {
                                display: flex;
                                justify-content: center;
                                align-items: center
                            }

                            .elementor-form .elementor-button .elementor-button-text {
                                white-space: normal;
                                flex-grow: 0
                            }

                            .elementor-form .elementor-button svg {
                                height: auto
                            }

                            .elementor-form .elementor-button .e-font-icon-svg {
                                height: 1em
                            }

                            .elementor-select-wrapper .select-caret-down-wrapper {
                                position: absolute;
                                top: 50%;
                                transform: translateY(-50%);
                                inset-inline-end: 10px;
                                pointer-events: none;
                                font-size: 11px
                            }

                            .elementor-select-wrapper .select-caret-down-wrapper svg {
                                display: unset;
                                width: 1em;
                                aspect-ratio: unset;
                                fill: currentColor
                            }

                            .elementor-select-wrapper .select-caret-down-wrapper i {
                                font-size: 19px;
                                line-height: 2
                            }

                            .elementor-select-wrapper.remove-before:before {
                                content: "" !important
                            }
                            </style>
                            <form class="elementor-form" id="signUpForm"  method="post">
                                <input type="hidden" name="post_id" value="2534" />
                                <input type="hidden" name="form_id" value="5902262" />
                                <input type="hidden" name="referer_title" value="Registro" />

                                <input type="hidden" name="queried_id" value="2534" />

                                <div class="elementor-form-fields-wrapper elementor-labels-above">
                                    <div
                                        class="elementor-field-type-step elementor-field-group elementor-column elementor-field-group-field_4b36e6a elementor-col-100">
                                        <div class="e-field-step elementor-hidden" data-label="Nombre Comercial"
                                            data-previousButton="" data-nextButton="" data-iconUrl=""
                                            data-iconLibrary="fas fa-star" data-icon=""></div>

                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required elementor-mark-required">
                                        <label for="name" class="elementor-field-label">
                                            Nombre Comercial </label>
                                        <input size="1" id="name" type="text" name="name"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-upload elementor-field-group elementor-column elementor-field-group-email elementor-col-100 elementor-field-required elementor-mark-required">
                                        <label for="form-field-email" class="elementor-field-label">
                                            Constancia de Situación Fiscal (PDF) </label>
                                        <input id="constancia" type="file" accept=".PDF, .pdf" name="constancia"
                                            class="elementor-field elementor-size-sm  elementor-upload-field"
                                            required="required" aria-required="true" data-maxsize="5"
                                            data-maxsize-message="Tamaño maximo superado 5 MB.">

                                    </div>
                                    <div
                                        class="elementor-field-type-step elementor-field-group elementor-column elementor-field-group-field_1c729f2 elementor-col-100">
                                        <div class="e-field-step elementor-hidden" data-label="Datos Generales"
                                            data-previousButton="" data-nextButton="" data-iconUrl=""
                                            data-iconLibrary="fas fa-star" data-icon=""></div>

                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_a85f89c elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="first-name" class="elementor-field-label">
                                            Nombre </label>
                                        <input size="1" id="first-name" type="text" name="first-name"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_bccf3e3 elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="last-name" class="elementor-field-label">
                                            Apellido </label>
                                        <input size="1" id="last-name" type="text" name="last-name"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_0bff477 elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_0bff477" class="elementor-field-label">
                                            Giro Comercial </label>
                                        <div class="elementor-field elementor-select-wrapper remove-before ">
                                            <div class="select-caret-down-wrapper">
                                                <i aria-hidden="true" class="eicon-caret-down"></i>
                                            </div>
                                            <select
                                                class="elementor-field-textual elementor-size-sm form-label form-label-outside form-label-sm"
                                                data-placeholder="Select an option"
                                                data-minimum-results-for-search="Infinity" id="company" name="company"
                                                required="required" aria-required="true">

                                                <?php
    $query = "CALL giros()";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $IdGiroEmpresa, $Giro, $Estatus);

    // Itera sobre los resultados y crea opciones para cada giro
    while (mysqli_stmt_fetch($stmt)) {
        echo "<option value=\"$IdGiroEmpresa\">$Giro</option>";
    }

    mysqli_stmt_close($stmt);
    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_adf610b elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_adf610b" class="elementor-field-label">
                                            Puesto </label>
                                        <input size="1" id="city-town" type="text" name="city-town"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-field_f035186 elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_f035186" class="elementor-field-label">
                                            Email </label>
                                        <input size="1" id="email" type="email" name="email"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>

                                    <div
                                        class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-field_f035186 elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label id="lbcorreo" for="enviarCorreo" class="elementor-field-label">
                                            Validacion de correo </label>
                                            <button id="enviarCorreo" class="container elementor-button elementor-size-sm e-form__buttons__wrapper__button e-form__buttons__wrapper__button-previous">Enviar verificación</button>
                                      
                                            <div class="d-flex">
      <input class="input-sm container mr-3" required="required" placeholder="Código" style="display:none" id="textvalid" type="text"
                                            name="textvalid"><button class="container elementor-button elementor-size-sm e-form__buttons__wrapper__button e-form__buttons__wrapper__button-previous" id="validatxt"
                                            style="display:none">Confirmar</button>
</div>
                                        <div id="cuentaRegresiva" style="display:none;font-size:9pt" required
                                            >Tiempo restante para
                                             validacion del correo: <b id="conteo"
                                                style="color:green; font-size:13pt;">5:00</b></div>
                                    </div>

                                    <div
                                        class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-field_2506901 elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_2506901" class="elementor-field-label">
                                            Teléfono </label>
                                        <input size="1" id="phone" type="tel" name="phone"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true"
                                            title="Only numbers and phone characters (#, -, *, etc) are accepted.">

                                    </div>
                                    <div
                                        class="elementor-field-type-password elementor-field-group elementor-column elementor-field-group-field_e1eee38 elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_e1eee38" class="elementor-field-label">
                                            Contraseña </label>
                                        <input size="1" id="passw" type="password" name="passw"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-password elementor-field-group elementor-column elementor-field-group-field_a29eb65 elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_a29eb65" class="elementor-field-label">
                                            Confirmar Contraseña </label>
                                        <input size="1" id="confirmpassw" type="password" name="confirmpassw"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-step elementor-field-group elementor-column elementor-field-group-field_42be169 elementor-col-100">
                                        <div class="e-field-step elementor-hidden" data-label="Información Comercial"
                                            data-previousButton="" data-nextButton="" data-iconUrl=""
                                            data-iconLibrary="fas fa-star" data-icon=""></div>

                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_19f83aa elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_19f83aa" class="elementor-field-label">
                                            Número de Sucursales </label>
                                        <input size="1" id="nosucursales" type="number" name="nosucursales"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_cbc5af2 elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_cbc5af2" class="elementor-field-label">
                                            Ticket Promedio </label>
                                        <input size="1" id="ticketpromedio" type="number" name="ticketpromedio"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_410b852 elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_410b852" class="elementor-field-label">
                                            Número de Mesas </label>
                                        <input size="1" id="nomesas" type="number" name="nomesas"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_fb6f94e elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_fb6f94e" class="elementor-field-label">
                                            Número de Empleados </label>
                                        <input size="1" id="noempleados" type="number" name="noempleados"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_028bb5b elementor-col-50 elementor-field-required elementor-mark-required">
                                        <div class="form-group offset-top-24">
                                            <label class="form-label form-label-outside form-label-sm"
                                                for="montocredito">Monto de Crédito Solicitado</label><br>
                                            <input type="range" class="form-control-impressed" name="montocredito"
                                                id="montocredito" min="500" max="25000" step="500" value="500">
                                            <p>Monto: <output id="value"></output></p>
                                        </div>

                                    </div>
                                    <div
                                        class="elementor-field-type-step elementor-field-group elementor-column elementor-field-group-field_5173d6f elementor-col-100">
                                        <div class="e-field-step elementor-hidden" data-label="Referencias Comerciales"
                                            data-previousButton="Regresar" data-nextButton="Siguiente" data-iconUrl=""
                                            data-iconLibrary="fas fa-star" data-icon=""></div>

                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_7bd94fd elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_7bd94fd" class="elementor-field-label">
                                            Nombre </label>
                                        <input size="1" id="usr_nombrereferencia" type="text" name="usr_nombrereferencia"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-field_1d78666 elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_1d78666" class="elementor-field-label">
                                            Teléfono </label>
                                        <input size="1" id="usr_telefonoreferencia" type="phone" name="usr_telefonoreferencia"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true" 
                                            title="Only numbers and phone characters (#, -, *, etc) are accepted.">

                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_666ad00 elementor-col-50">
                                        <label for="form-field-field_666ad00" class="elementor-field-label">
                                            Dirección </label>
                                        <input size="1" type="text" id="usr_dirreferencia" type="text" name="usr_dirreferencia"
                                            class="elementor-field elementor-size-sm  elementor-field-textual">
                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_2f804ea elementor-col-50">
                                        <label for="form-field-field_2f804ea" class="elementor-field-label">
                                            Comentarios </label>
                                        <input size="1" id="usr_comreferencia" type="text" name="usr_comreferencia"
                                            class="elementor-field elementor-size-sm  elementor-field-textual">
                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_c5fb39f elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_c5fb39f" class="elementor-field-label">
                                            Nombre </label>
                                        <input size="1"  id="usr_nombrereferencia2" type="text" name="usr_nombrereferencia2"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true">
                                    </div>
                                    <div
                                        class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-field_26f17ae elementor-col-50 elementor-field-required elementor-mark-required">
                                        <label for="form-field-field_26f17ae" class="elementor-field-label">
                                            Teléfono </label>
                                        <input size="1" id="usr_telefonoreferencia2" type="phone" name="usr_telefonoreferencia2"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            required="required" aria-required="true" 
                                            title="Only numbers and phone characters (#, -, *, etc) are accepted.">

                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_1f16c7f elementor-col-50">
                                        <label for="form-field-field_1f16c7f" class="elementor-field-label">
                                            Dirección </label>
                                        <input size="1" id="usr_dirreferencia2" type="text" name="usr_dirreferencia2"
                                            class="elementor-field elementor-size-sm  elementor-field-textual">
                                    </div>
                                    <div
                                        class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_112c8c5 elementor-col-50">
                                        <label for="form-field-field_112c8c5" class="elementor-field-label">
                                            Comentarios </label>
                                        <input size="1" id="usr_comreferencia2" type="text" name="usr_comreferencia2"
                                            class="elementor-field elementor-size-sm  elementor-field-textual">
                                    </div>
                                <!--  <div
                                        class="elementor-field-type-step elementor-field-group elementor-column elementor-field-group-field_b3b27ef elementor-col-100">
                                        <div  class="e-field-step elementor-hidden" data-label="Finalizar Registro"
                                            data-previousButton="Finalizar registro"
                                            data-nextButton="Finalizar registro" data-iconUrl=""
                                            data-iconLibrary="fas fa-star" data-icon=""></div>

                                    </div>
                        -->
                                    <div
                                        class="elementor-field-type-acceptance elementor-field-group elementor-column elementor-field-group-field_921d4cc elementor-col-100 elementor-field-required elementor-mark-required">
                                        <div class="elementor-field-subgroup">
                                            <span class="elementor-field-option">
                                                <input type="checkbox" name="form_fields[field_921d4cc]"
                                                    id="form-field-field_921d4cc"
                                                    class="elementor-field elementor-size-sm  elementor-acceptance-field"
                                                    required="required" aria-required="true" required="required"  checked="checked">
                                                <label for="form-field-field_921d4cc">Al aceptar en este recuadro, se
                                                    entiende que ha leído todos y cada uno de los apartados de los
                                                    presentes Términos y Condiciones, aceptándolos de conformidad para
                                                    todos los efectos legales a que haya lugar.<br /><br /> <a
                                                        href="avisodeprivacidad" target="_blank">Aviso
                                                        de Privacidad</a> / <a
                                                        href="terminoaycondiciones"
                                                        target="_blank">Términos y Condiciones</a>

                                                </label> </span>
                                        </div>
                                    </div>
                                    <div
                                        class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                        <button style="display:block;" id="terminarregistro" type="submit" class="terminarregistro elementor-button elementor-size-sm ">
                                          Terminar Registro
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="elementor-message elementor-message-danger" style="display:none;"  role="alert"></div>
                            </form>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-1ae95be elementor-align-center elementor-widget elementor-widget-button"
                        data-id="1ae95be" data-element_type="widget" data-widget_type="button.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-button-wrapper">
                                <a class="elementor-button elementor-button-link elementor-size-sm"
                                    href="index">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text">Regresar al Inicio</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-cd28501 e-con-full e-flex e-con e-child"
                    data-id="cd28501" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-8780606 elementor-widget elementor-widget-spacer"
                        data-id="8780606" data-element_type="widget" data-widget_type="spacer.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-spacer">
                                <div class="elementor-spacer-inner"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-3e2b3ab e-flex e-con-boxed e-con e-parent" data-id="3e2b3ab"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-c834dda elementor-widget elementor-widget-spacer"
                    data-id="c834dda" data-element_type="widget" data-widget_type="spacer.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-spacer">
                            <div class="elementor-spacer-inner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-d2e0e9b e-flex e-con-boxed e-con e-parent" data-id="d2e0e9b"
            data-element_type="container"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
            </div>
        </div>
    </div>

    <script>
    window.RS_MODULES = window.RS_MODULES || {};
    window.RS_MODULES.modules = window.RS_MODULES.modules || {};
    window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
    window.RS_MODULES.defered = true;
    window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
    window.RS_MODULES.type = 'compiled';
    </script>
    <div id="wa"></div>
    <script type="text/javascript">
    (function() {
        var c = document.body.className;
        c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
        document.body.className = c;
    })();
    </script>
    <link rel='stylesheet' id='e-animations-css'
        href='./wp-content/plugins/elementor/assets/lib/animations/animations.min8864.css?ver=3.17.3' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css'
        href='./wp-content/plugins/revslider/public/assets/css/rs6e8c6.css?ver=6.6.13' media='all' />
    <style id='rs-plugin-settings-inline-css'>
    #rs-demo-id {}
    </style>
    <script src="./wp-content/plugins/revslider/public/assets/js/rbtools.mine8c6.js?ver=6.6.13" defer async
        id="tp-tools-js"></script>
    <script src="./wp-content/plugins/revslider/public/assets/js/rs6.mine8c6.js?ver=6.6.13" defer async id="revmin-js">
    </script>
    <script src="./wp-content/plugins/whatsapp-for-wordpress/assets/dist/js/njt-whatsapp6ad2.js?ver=3.4.0.1"
        id="nta-wa-libs-js"></script>
    <script id="nta-js-global-js-extra">
    var njt_wa_global = {
        "ajax_url": "https:\/\/bebifydemo.sedmex.com\/wp-admin\/admin-ajax.php",
        "nonce": "32b312fd35",
        "defaultAvatarSVG": "<svg width=\"48px\" height=\"48px\" class=\"nta-whatsapp-default-avatar\" version=\"1.1\" id=\"Layer_1\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\" xmlns:xlink=\"http:\/\/www.w3.org\/1999\/xlink\" x=\"0px\" y=\"0px\"\n            viewBox=\"0 0 512 512\" style=\"enable-background:new 0 0 512 512;\" xml:space=\"preserve\">\n            <path style=\"fill:#EDEDED;\" d=\"M0,512l35.31-128C12.359,344.276,0,300.138,0,254.234C0,114.759,114.759,0,255.117,0\n            S512,114.759,512,254.234S395.476,512,255.117,512c-44.138,0-86.51-14.124-124.469-35.31L0,512z\"\/>\n            <path style=\"fill:#55CD6C;\" d=\"M137.71,430.786l7.945,4.414c32.662,20.303,70.621,32.662,110.345,32.662\n            c115.641,0,211.862-96.221,211.862-213.628S371.641,44.138,255.117,44.138S44.138,137.71,44.138,254.234\n            c0,40.607,11.476,80.331,32.662,113.876l5.297,7.945l-20.303,74.152L137.71,430.786z\"\/>\n            <path style=\"fill:#FEFEFE;\" d=\"M187.145,135.945l-16.772-0.883c-5.297,0-10.593,1.766-14.124,5.297\n            c-7.945,7.062-21.186,20.303-24.717,37.959c-6.179,26.483,3.531,58.262,26.483,90.041s67.09,82.979,144.772,105.048\n            c24.717,7.062,44.138,2.648,60.028-7.062c12.359-7.945,20.303-20.303,22.952-33.545l2.648-12.359\n            c0.883-3.531-0.883-7.945-4.414-9.71l-55.614-25.6c-3.531-1.766-7.945-0.883-10.593,2.648l-22.069,28.248\n            c-1.766,1.766-4.414,2.648-7.062,1.766c-15.007-5.297-65.324-26.483-92.69-79.448c-0.883-2.648-0.883-5.297,0.883-7.062\n            l21.186-23.834c1.766-2.648,2.648-6.179,1.766-8.828l-25.6-57.379C193.324,138.593,190.676,135.945,187.145,135.945\"\/>\n        <\/svg>",
        "defaultAvatarUrl": "https:\/\/bebifydemo.sedmex.com\/wp-content\/plugins\/whatsapp-for-wordpress\/assets\/img\/whatsapp_logo.svg",
        "timezone": "+00:00",
        "i18n": {
            "online": "Online",
            "offline": "Offline"
        },
        "urlSettings": {
            "onDesktop": "api",
            "onMobile": "api",
            "openInNewTab": "ON"
        }
    };
    </script>
    <script src="./wp-content/plugins/whatsapp-for-wordpress/assets/js/whatsapp-button6ad2.js?ver=3.4.0.1"
        id="nta-js-global-js"></script>
    <script id="porto-live-search-js-extra">
    var porto_live_search = {
        "nonce": "b5be765f33"
    };
    </script>
    <script src="./wp-content/themes/porto/inc/lib/live-search/live-search.minaf33.js?ver=6.12.0"
        id="porto-live-search-js"></script>
    <script src="./wp-content/themes/porto/js/bootstrap972f.js?ver=5.0.1" id="bootstrap-js"></script>
    <script src="./wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.minf7e1.js?ver=1.4.1-wc.8.3.1"
        id="jquery-cookie-js" defer data-wp-strategy="defer"></script>
    <script src="./wp-content/themes/porto/js/libs/owl.carousel.min531b.js?ver=2.3.4" id="owl.carousel-js"></script>
    <script src="./wp-includes/js/imagesloaded.minbb93.js?ver=5.0.0" id="imagesloaded-js"></script>
    <script async="async" src="./wp-content/themes/porto/js/libs/jquery.magnific-popup.minf488.js?ver=1.1.0"
        id="jquery-magnific-popup-js"></script>
    <script id="porto-theme-js-extra">
    var js_porto_vars = {
        "rtl": "",
        "theme_url": "https:\/\/bebifydemo.sedmex.com\/wp-content\/themes\/porto-child",
        "ajax_url": "https:\/\/bebifydemo.sedmex.com\/wp-admin\/admin-ajax.php",
        "change_logo": "1",
        "container_width": "1236",
        "grid_gutter_width": "20",
        "show_sticky_header": "",
        "show_sticky_header_tablet": "1",
        "show_sticky_header_mobile": "1",
        "ajax_loader_url": "\/\/bebifydemo.sedmex.com\/wp-content\/themes\/porto\/images\/ajax-loader@2x.gif",
        "category_ajax": "1",
        "compare_popup": "",
        "compare_popup_title": "",
        "prdctfltr_ajax": "",
        "slider_loop": "",
        "slider_autoplay": "",
        "slider_autoheight": "",
        "slider_speed": "5000",
        "slider_nav": "",
        "slider_nav_hover": "1",
        "slider_margin": "",
        "slider_dots": "1",
        "slider_animatein": "fadeIn",
        "slider_animateout": "fadeOut",
        "product_thumbs_count": "4",
        "product_zoom": "0",
        "product_zoom_mobile": "1",
        "product_image_popup": "0",
        "zoom_type": "inner",
        "zoom_scroll": "1",
        "zoom_lens_size": "200",
        "zoom_lens_shape": "square",
        "zoom_contain_lens": "1",
        "zoom_lens_border": "1",
        "zoom_border_color": "#888888",
        "zoom_border": "0",
        "screen_xl": "1256",
        "screen_xxl": "1400",
        "mfp_counter": "%curr% of %total%",
        "mfp_img_error": "<a href=\"%url%\">The image<\/a> could not be loaded.",
        "mfp_ajax_error": "<a href=\"%url%\">The content<\/a> could not be loaded.",
        "popup_close": "Close",
        "popup_prev": "Previous",
        "popup_next": "Next",
        "request_error": "The requested content cannot be loaded.<br\/>Please try again later.",
        "loader_text": "Loading...",
        "submenu_back": "Back",
        "porto_nonce": "ebd4dfcdd1",
        "use_skeleton_screen": ["shop", "product", "quickview", "blog"],
        "user_edit_pages": "",
        "quick_access": "Click to edit this element.",
        "goto_type": "Go To the Type Builder.",
        "legacy_mode": "1",
        "quickview_skeleton": "<div class=\"quickview-wrap skeleton-body product\"><div class=\"row\"><div class=\"col-lg-6 summary-before\"><\/div><div class=\"col-lg-6 summary entry-summary\"><\/div><\/div><\/div>"
    };
    </script>
    <script src="./wp-content/themes/porto/js/themeaf33.js?ver=6.12.0" id="porto-theme-js"></script>
    <script src="./wp-content/themes/porto/js/footer-reveal.minaf33.js?ver=6.12.0" id="porto-footer-reveal-js">
    </script>
    <script async="async" src="./wp-content/themes/porto/js/theme-asyncaf33.js?ver=6.12.0" id="porto-theme-async-js">
    </script>
    <script src="./wp-content/themes/porto/js/woocommerce-themeaf33.js?ver=6.12.0" id="porto-woocommerce-theme-js">
    </script>
    <script id="nta-js-popup-js-extra">
    var njt_wa = {
        "gdprStatus": "",
        "accounts": [{
            "accountId": 2906,
            "accountName": "Bebify",
            "avatar": "https:\/\/bebifydemo.sedmex.com\/wp-content\/uploads\/2023\/11\/bebify-avatar.png",
            "number": "+525650929066",
            "title": "Atenci\u00f3n a Clientes",
            "predefinedText": "",
            "willBeBackText": "I will be back in [njwa_time_work]",
            "dayOffsText": "I will be back soon",
            "isAlwaysAvailable": "ON",
            "daysOfWeekWorking": {
                "sunday": {
                    "isWorkingOnDay": "OFF",
                    "workHours": [{
                        "startTime": "09:00",
                        "endTime": "19:00"
                    }]
                },
                "monday": {
                    "isWorkingOnDay": "ON",
                    "workHours": [{
                        "startTime": "09:00",
                        "endTime": "19:00"
                    }]
                },
                "tuesday": {
                    "isWorkingOnDay": "ON",
                    "workHours": [{
                        "startTime": "09:00",
                        "endTime": "19:00"
                    }]
                },
                "wednesday": {
                    "isWorkingOnDay": "ON",
                    "workHours": [{
                        "startTime": "09:00",
                        "endTime": "19:00"
                    }]
                },
                "thursday": {
                    "isWorkingOnDay": "ON",
                    "workHours": [{
                        "startTime": "09:00",
                        "endTime": "19:00"
                    }]
                },
                "friday": {
                    "isWorkingOnDay": "ON",
                    "workHours": [{
                        "startTime": "09:00",
                        "endTime": "19:00"
                    }]
                },
                "saturday": {
                    "isWorkingOnDay": "OFF",
                    "workHours": [{
                        "startTime": "08:00",
                        "endTime": "17:30"
                    }]
                }
            }
        }],
        "options": {
            "display": {
                "displayCondition": "showAllPage",
                "includePages": [],
                "excludePages": [],
                "includePosts": [],
                "showOnDesktop": "ON",
                "showOnMobile": "ON",
                "time_symbols": "h:m"
            },
            "styles": {
                "title": "Empezar pl\u00e1tica",
                "responseText": "El equipo suele responder en unos minutos",
                "description": "\u00a1Hola! Haga clic en uno de nuestros miembros a continuaci\u00f3n para chatear en WhatsApp",
                "backgroundColor": "#2db742",
                "textColor": "#fff",
                "scrollHeight": "500",
                "isShowScroll": "OFF",
                "isShowResponseText": "OFF",
                "isShowPoweredBy": "ON",
                "btnLabel": "Necesitas ayuda? <strong>Escr\u00edbenos<\/strong>",
                "btnLabelWidth": "180",
                "btnPosition": "right",
                "btnLeftDistance": "30",
                "btnRightDistance": "30",
                "btnBottomDistance": "60",
                "isShowBtnLabel": "ON",
                "isShowGDPR": "OFF",
                "gdprContent": "Please accept our <a href=\"https:\/\/ninjateam.org\/privacy-policy\/\">privacy policy<\/a> first to start a conversation.",
                "widgetType": "expandable"
            },
            "analytics": {
                "enabledGoogle": "OFF",
                "enabledFacebook": "OFF",
                "enabledGoogleGA4": "OFF"
            }
        }
    };
    </script>
    <script src="./wp-content/plugins/whatsapp-for-wordpress/assets/js/whatsapp-popup1e39.js?ver=6.4.2"
        id="nta-js-popup-js"></script>
    <script src="./wp-content/plugins/pro-elements/assets/js/webpack-pro.runtime.min5d63.js?ver=3.17.1"
        id="elementor-pro-webpack-runtime-js"></script>
    <script src="./wp-content/plugins/elementor/assets/js/webpack.runtime.min8864.js?ver=3.17.3"
        id="elementor-webpack-runtime-js"></script>
    <script src="./wp-content/plugins/elementor/assets/js/frontend-modules.min8864.js?ver=3.17.3"
        id="elementor-frontend-modules-js"></script>
    <script src="./wp-includes/js/dist/vendor/wp-polyfill-inert.min0226.js?ver=3.1.2" id="wp-polyfill-inert-js">
    </script>
    <script src="./wp-includes/js/dist/vendor/regenerator-runtime.min6c85.js?ver=0.14.0" id="regenerator-runtime-js">
    </script>
    <script src="./wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0" id="wp-polyfill-js"></script>
    <script src="./wp-includes/js/dist/hooks.min2ebd.js?ver=c6aec9a8d4e5a5d543a1" id="wp-hooks-js"></script>
    <script src="./wp-includes/js/dist/i18n.minf92f.js?ver=7701b0c3857f914212ef" id="wp-i18n-js"></script>
    <script id="wp-i18n-js-after">
    wp.i18n.setLocaleData({
        'text direction\u0004ltr': ['ltr']
    });
    </script>
    <script id="elementor-pro-frontend-js-before">
    var ElementorProFrontendConfig = {
        "nonce": "cd770f4258",
        "urls": {
            "assets": "https:\/\/bebifydemo.sedmex.com\/wp-content\/plugins\/pro-elements\/assets\/",
            "rest": "https:\/\/bebifydemo.sedmex.com\/wp-json\/"
        },
        "shareButtonsNetworks": {
            "facebook": {
                "title": "Facebook",
                "has_counter": true
            },
            "twitter": {
                "title": "Twitter"
            },
            "linkedin": {
                "title": "LinkedIn",
                "has_counter": true
            },
            "pinterest": {
                "title": "Pinterest",
                "has_counter": true
            },
            "reddit": {
                "title": "Reddit",
                "has_counter": true
            },
            "vk": {
                "title": "VK",
                "has_counter": true
            },
            "odnoklassniki": {
                "title": "OK",
                "has_counter": true
            },
            "tumblr": {
                "title": "Tumblr"
            },
            "digg": {
                "title": "Digg"
            },
            "skype": {
                "title": "Skype"
            },
            "stumbleupon": {
                "title": "StumbleUpon",
                "has_counter": true
            },
            "mix": {
                "title": "Mix"
            },
            "telegram": {
                "title": "Telegram"
            },
            "pocket": {
                "title": "Pocket",
                "has_counter": true
            },
            "xing": {
                "title": "XING",
                "has_counter": true
            },
            "whatsapp": {
                "title": "WhatsApp"
            },
            "email": {
                "title": "Email"
            },
            "print": {
                "title": "Print"
            }
        },
        "woocommerce": {
            "menu_cart": {
                "cart_page_url": "https:\/\/bebifydemo.sedmex.com\/cart\/",
                "checkout_page_url": "https:\/\/bebifydemo.sedmex.com\/checkout\/",
                "fragments_nonce": "424a18ef15"
            }
        },
        "facebook_sdk": {
            "lang": "es_ES",
            "app_id": ""
        },
        "lottie": {
            "defaultAnimationUrl": "https:\/\/bebifydemo.sedmex.com\/wp-content\/plugins\/pro-elements\/modules\/lottie\/assets\/animations\/default.json"
        }
    };
    </script>
    <script src="./wp-content/plugins/pro-elements/assets/js/frontend.min5d63.js?ver=3.17.1"
        id="elementor-pro-frontend-js"></script>
    <script src="./wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js?ver=4.0.2"
        id="elementor-waypoints-js"></script>
    <script src="./wp-includes/js/jquery/ui/core.min3f14.js?ver=1.13.2" id="jquery-ui-core-js"></script>
    <script id="elementor-frontend-js-before">
    var elementorFrontendConfig = {
        "environmentMode": {
            "edit": false,
            "wpPreview": false,
            "isScriptDebug": false
        },
        "i18n": {
            "shareOnFacebook": "Compartir en Facebook",
            "shareOnTwitter": "Compartir en Twitter",
            "pinIt": "Pinear",
            "download": "Descargar",
            "downloadImage": "Descargar imagen",
            "fullscreen": "Pantalla completa",
            "zoom": "Zoom",
            "share": "Compartir",
            "playVideo": "Reproducir v\u00eddeo",
            "previous": "Anterior",
            "next": "Siguiente",
            "close": "Cerrar",
            "a11yCarouselWrapperAriaLabel": "Carrusel | Scroll horizontal: Flecha izquierda y derecha",
            "a11yCarouselPrevSlideMessage": "Diapositiva anterior",
            "a11yCarouselNextSlideMessage": "Diapositiva siguiente",
            "a11yCarouselFirstSlideMessage": "Esta es la primera diapositiva",
            "a11yCarouselLastSlideMessage": "Esta es la \u00faltima diapositiva",
            "a11yCarouselPaginationBulletMessage": "Ir a la diapositiva"
        },
        "is_rtl": false,
        "breakpoints": {
            "xs": 0,
            "sm": 480,
            "md": 768,
            "lg": 991,
            "xl": 1440,
            "xxl": 1600
        },
        "responsive": {
            "breakpoints": {
                "mobile": {
                    "label": "M\u00f3vil vertical",
                    "value": 767,
                    "default_value": 767,
                    "direction": "max",
                    "is_enabled": true
                },
                "mobile_extra": {
                    "label": "M\u00f3vil horizontal",
                    "value": 880,
                    "default_value": 880,
                    "direction": "max",
                    "is_enabled": false
                },
                "tablet": {
                    "label": "Tableta vertical",
                    "value": 991,
                    "default_value": 1024,
                    "direction": "max",
                    "is_enabled": true
                },
                "tablet_extra": {
                    "label": "Tableta horizontal",
                    "value": 1200,
                    "default_value": 1200,
                    "direction": "max",
                    "is_enabled": false
                },
                "laptop": {
                    "label": "Port\u00e1til",
                    "value": 1366,
                    "default_value": 1366,
                    "direction": "max",
                    "is_enabled": false
                },
                "widescreen": {
                    "label": "Pantalla grande",
                    "value": 2400,
                    "default_value": 2400,
                    "direction": "min",
                    "is_enabled": false
                }
            }
        },
        "version": "3.17.3",
        "is_static": false,
        "experimentalFeatures": {
            "e_dom_optimization": true,
            "e_optimized_assets_loading": true,
            "e_optimized_css_loading": true,
            "additional_custom_breakpoints": true,
            "container": true,
            "e_swiper_latest": true,
            "theme_builder_v2": true,
            "block_editor_assets_optimize": true,
            "landing-pages": true,
            "e_image_loading_optimization": true,
            "e_global_styleguide": true,
            "page-transitions": true,
            "notes": true,
            "form-submissions": true,
            "e_scroll_snap": true
        },
        "urls": {
            "assets": "https:\/\/bebifydemo.sedmex.com\/wp-content\/plugins\/elementor\/assets\/"
        },
        "swiperClass": "swiper",
        "settings": {
            "page": [],
            "editorPreferences": []
        },
        "kit": {
            "viewport_tablet": "991",
            "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
            "global_image_lightbox": "yes",
            "lightbox_enable_counter": "yes",
            "lightbox_enable_fullscreen": "yes",
            "lightbox_enable_zoom": "yes",
            "lightbox_enable_share": "yes",
            "lightbox_title_src": "title",
            "lightbox_description_src": "description",
            "woocommerce_notices_elements": []
        },
        "post": {
            "id": 2534,
            "title": "Registro%20%E2%80%93%20bebify",
            "excerpt": "",
            "featuredImage": false
        }
    };
    </script>
    <script src="./wp-content/plugins/elementor/assets/js/frontend.min8864.js?ver=3.17.3" id="elementor-frontend-js">
    </script>
    <script src="./wp-content/plugins/pro-elements/assets/js/elements-handlers.min5d63.js?ver=3.17.1"
        id="pro-elements-handlers-js"></script>
		<script src="./js/registro-user.js"></script>

    <script>
		
    const value = document.querySelector("#value");
    const input = document.querySelector("#montocredito");
    value.textContent = input.value;
    input.addEventListener("input", (event) => {
        value.textContent = event.target.value;
    });
    </script>

<script>
  document.getElementById("enviarCorreo").addEventListener("click", function() {
    // Obtén el valor del correo ingresado por el usuario
    var email = document.getElementById("email").value;
    document.getElementById("enviarCorreo").style.display = "none";
    document.getElementById("lbcorreo").style.display = "none";

    var numeroAleatorio = generarCodigoAleatorio(6);


    $.ajax({
        type: "POST",
        url: "enviar-correo.php",
        data: {
            email: email,
            numeroAleatorio: numeroAleatorio
        },
        success: function(response) {
            console.log(response); 
        sessionStorage.setItem("PWDCC",numeroAleatorio);
        document.getElementById("enviarCorreo").style.display = "none";


        $("#validatxt").css("display", "block");
        $("#textvalid").css("display", "block");

        actualizarCuentaRegresiva();
       



        },
        error: function(error) {
            console.error('Error en la solicitud:', error);
            document.getElementById("enviarCorreo").style.display = "block";

        }
    });
});
function actualizarCuentaRegresiva() {
  const divCuentaRegresiva = document.getElementById("cuentaRegresiva");
  divCuentaRegresiva.style.display = "block";
  let segundos = 300; // El número inicial de segundos (dos minutos)
  const contadorSegundos = $("#conteo"); // Selecciona el elemento <b> dentro del <div>

  const intervalo = setInterval(function () {
    const minutos = Math.floor(segundos / 60);
    const segundosRestantes = segundos % 60;
    
    contadorSegundos.text(`${minutos}:${segundosRestantes < 10 ? '0' : ''}${segundosRestantes}`);
    segundos--;

    if (segundos < 0) {
      clearInterval(intervalo); // Detiene la cuenta regresiva cuando llega a 0
      divCuentaRegresiva.textContent = "¡Tiempo agotado! Vuelve a intentarlo";
      sessionStorage.removeItem("PWDCC");
      document.getElementById("enviarCorreo").style.display = "block";
      $("#enviarCorreo").text("Reenviar verificación")
      $("#validatxt").css("display", "none");
        $("#textvalid").css("display", "none");
    }
  }, 1000); // Actualiza cada segundo
}





document.getElementById("validatxt").addEventListener("click", function() {
  document.getElementById("enviarCorreo").style.display = "none";
 

    var textvalid = document.getElementById("textvalid").value;
if(textvalid == sessionStorage.getItem('PWDCC')){
 
  console.log('vaidado exitosamente');
  const divCuentaRegresiva = document.getElementById("cuentaRegresiva");
  divCuentaRegresiva.textContent ="Correo verificado.";

  document.getElementById("validatxt").style.display = "none"; 
  document.getElementById("textvalid").style.display = "none"; 
  document.getElementById("enviarCorreo").style.display = "none";
  
  document.getElementById("cheakexist").style.display = "block";
  document.getElementById("habilta").style.display = "block";

  var email = document.getElementById("email").value;


  $.ajax({
        type: "POST",
        url: "enviarCorreo.php",
        data: {
            email: email,
            mensaje: 'Hemos validado tu correo electronico, puedes continuar con tu registro.',
            asunto:'Verificacion de correo Bebify'
        },
        success: function(response) {
            console.log(response); 
    
        },
        error: function(error) {
            console.error('Error en la solicitud:', error);

        }
    });

}else{
  console.log('vaidado fallida');
  document.getElementById("enviarCorreo").style.display = "block";
  document.getElementById("validatxt").style.display = "none"; 
  document.getElementById("textvalid").style.display = "none"; 
alert ("Fallo la Validacion Favor de volverlo a intentar ");

}
});

function generarCodigoAleatorio(tamano) {
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789-';
    let codigo = '';

    for (let i = 0; i < tamano; i++) {
        const indiceAleatorio = Math.floor(Math.random() * caracteres.length);
        codigo += caracteres.charAt(indiceAleatorio);
    }

    return codigo;
}

  </script>

</body>

<!-- Mirrored from bebifydemo.sedmex.com/registro/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 06:17:44 GMT -->

</html>