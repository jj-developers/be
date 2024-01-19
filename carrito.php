<?php
include('sesiones.php');
?>

<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">

<!-- Mirrored from bebifydemo.sedmex.com/cart/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 06:19:07 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="xmlrpc.php" />
    <title>Cart &#8211; bebify</title>
    <meta name='robots' content='max-image-preview:large, noindex, follow' />
    <link rel="alternate" type="application/rss+xml" title="bebify &raquo; Feed" href="feed/index.html" />
    <link rel="alternate" type="application/rss+xml" title="bebify &raquo; Feed de los comentarios"
        href="comments/feed/index.html" />
    <link rel="shortcut icon" href="wp-content/uploads/2023/11/favicon-32x32-1.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="wp-content/uploads/2023/11/Bebify-Logotipo-01.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="wp-content/uploads/2023/11/Bebify-Logotipo-01.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="wp-content/uploads/2023/11/Bebify-Logotipo-01.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="wp-content/uploads/2023/11/Bebify-Logotipo-01.png" />
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Cart" />
    <meta property="og:title" content="Cart" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="index.html" />
    <meta property="og:site_name" content="bebify" />
    <meta property="og:description" content="" />

    <meta property="og:image" content="wp-content/uploads/2023/11/Bebify-Logotipo-01.png" />
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
    <link rel='stylesheet' id='wp-block-library-css'
        href='wp-includes/css/dist/block-library/style.min1e39.css?ver=6.4.2' media='all' />
    <style id='wp-block-library-theme-inline-css'>
    .wp-block-audio figcaption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .wp-block-audio figcaption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-audio {
        margin: 0 0 1em
    }

    .wp-block-code {
        border: 1px solid #ccc;
        border-radius: 4px;
        font-family: Menlo, Consolas, monaco, monospace;
        padding: .8em 1em
    }

    .wp-block-embed figcaption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .wp-block-embed figcaption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-embed {
        margin: 0 0 1em
    }

    .blocks-gallery-caption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .blocks-gallery-caption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-image figcaption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .wp-block-image figcaption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-image {
        margin: 0 0 1em
    }

    .wp-block-pullquote {
        border-bottom: 4px solid;
        border-top: 4px solid;
        color: currentColor;
        margin-bottom: 1.75em
    }

    .wp-block-pullquote cite,
    .wp-block-pullquote footer,
    .wp-block-pullquote__citation {
        color: currentColor;
        font-size: .8125em;
        font-style: normal;
        text-transform: uppercase
    }

    .wp-block-quote {
        border-left: .25em solid;
        margin: 0 0 1.75em;
        padding-left: 1em
    }

    .wp-block-quote cite,
    .wp-block-quote footer {
        color: currentColor;
        font-size: .8125em;
        font-style: normal;
        position: relative
    }

    .wp-block-quote.has-text-align-right {
        border-left: none;
        border-right: .25em solid;
        padding-left: 0;
        padding-right: 1em
    }

    .wp-block-quote.has-text-align-center {
        border: none;
        padding-left: 0
    }

    .wp-block-quote.is-large,
    .wp-block-quote.is-style-large,
    .wp-block-quote.is-style-plain {
        border: none
    }

    .wp-block-search .wp-block-search__label {
        font-weight: 700
    }

    .wp-block-search__button {
        border: 1px solid #ccc;
        padding: .375em .625em
    }

    :where(.wp-block-group.has-background) {
        padding: 1.25em 2.375em
    }

    .wp-block-separator.has-css-opacity {
        opacity: .4
    }

    .wp-block-separator {
        border: none;
        border-bottom: 2px solid;
        margin-left: auto;
        margin-right: auto
    }

    .wp-block-separator.has-alpha-channel-opacity {
        opacity: 1
    }

    .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
        width: 100px
    }

    .wp-block-separator.has-background:not(.is-style-dots) {
        border-bottom: none;
        height: 1px
    }

    .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
        height: 2px
    }

    .wp-block-table {
        margin: 0 0 1em
    }

    .wp-block-table td,
    .wp-block-table th {
        word-break: normal
    }

    .wp-block-table figcaption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .wp-block-table figcaption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-video figcaption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .wp-block-video figcaption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-video {
        margin: 0 0 1em
    }

    .wp-block-template-part.has-background {
        margin-bottom: 0;
        margin-top: 0;
        padding: 1.25em 2.375em
    }
    </style>
    <link rel='stylesheet' id='nta-css-popup-css'
        href='wp-content/plugins/whatsapp-for-wordpress/assets/dist/css/style1e39.css?ver=6.4.2' media='all' />
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
    <link rel='stylesheet' id='select2-css' href='wp-content/plugins/woocommerce/assets/css/select2ed84.css?ver=8.3.1'
        media='all' />
    <style id='woocommerce-inline-inline-css'>
    .woocommerce form .form-row .required {
        visibility: visible;
    }
    </style>
    <link rel='stylesheet' id='elementor-icons-css'
        href='wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min192d.css?ver=5.23.0' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css'
        href='wp-content/uploads/elementor/css/custom-frontend-lite.min8c65.css?ver=1700898238' media='all' />
    <link rel='stylesheet' id='swiper-css'
        href='wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min94a4.css?ver=8.4.5' media='all' />
    <link rel='stylesheet' id='elementor-post-1724-css'
        href='wp-content/uploads/elementor/css/post-17248c65.css?ver=1700898238' media='all' />
    <link rel='stylesheet' id='elementor-pro-css'
        href='wp-content/uploads/elementor/css/custom-pro-frontend-lite.min8c65.css?ver=1700898238' media='all' />
    <link rel='stylesheet' id='elementor-global-css'
        href='wp-content/uploads/elementor/css/global8c65.css?ver=1700898238' media='all' />
    <link rel='stylesheet' id='elementor-post-2334-css'
        href='wp-content/uploads/elementor/css/post-23345f27.css?ver=1701110075' media='all' />
    <link rel='stylesheet' id='elementor-post-2827-css'
        href='wp-content/uploads/elementor/css/post-28274f91.css?ver=1701110580' media='all' />
    <link rel='stylesheet' id='porto-css-vars-css'
        href='wp-content/uploads/porto_styles/theme_css_varsaf33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='bootstrap-css' href='wp-content/uploads/porto_styles/bootstrapaf33.css?ver=6.12.0'
        media='all' />
    <link rel='stylesheet' id='porto-plugins-css' href='wp-content/themes/porto/css/pluginsaf33.css?ver=6.12.0'
        media='all' />
    <link rel='stylesheet' id='porto-theme-css' href='wp-content/themes/porto/css/themeaf33.css?ver=6.12.0'
        media='all' />
    <link rel='stylesheet' id='porto-shortcodes-css'
        href='wp-content/uploads/porto_styles/shortcodesaf33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='porto-theme-shop-css' href='wp-content/themes/porto/css/theme_shopaf33.css?ver=6.12.0'
        media='all' />
    <link rel='stylesheet' id='porto-theme-elementor-css'
        href='wp-content/themes/porto/css/theme_elementoraf33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='porto-dynamic-style-css'
        href='wp-content/uploads/porto_styles/dynamic_styleaf33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='porto-type-builder-css'
        href='wp-content/plugins/porto-functionality/builders/assets/type-builderab7d.css?ver=2.9.2' media='all' />
    <link rel='stylesheet' id='porto-account-login-style-css'
        href='wp-content/themes/porto/css/theme/shop/login-style/account-loginaf33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='elementor-post-573-css'
        href='wp-content/uploads/elementor/css/post-573af33.css?ver=6.12.0' media='all' />
    <link rel='stylesheet' id='porto-style-css' href='wp-content/themes/porto/styleaf33.css?ver=6.12.0' media='all' />
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
        background-image: url(sw-themes.com/porto_dummy/wp-content/uploads/2020/12/pencil-1.png);
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
    </style>
    <link rel='stylesheet' id='styles-child-css' href='wp-content/themes/porto-child/style1e39.css?ver=6.4.2'
        media='all' />
    <link rel='stylesheet' id='google-fonts-1-css'
        href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=swap&amp;ver=6.4.2'
        media='all' />
    <link rel='stylesheet' id='elementor-icons-shared-0-css'
        href='wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min52d5.css?ver=5.15.3'
        media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-brands-css'
        href='wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min52d5.css?ver=5.15.3' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-solid-css'
        href='wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min52d5.css?ver=5.15.3' media='all' />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <script src="wp-includes/js/jquery/jquery.minf43b.js?ver=3.7.1" id="jquery-core-js"></script>
    <script src="wp-includes/js/jquery/jquery-migrate.min5589.js?ver=3.4.1" id="jquery-migrate-js"></script>
    <script src="wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min64af.js?ver=2.7.0-wc.8.3.1"
        id="jquery-blockui-js" defer data-wp-strategy="defer"></script>
    <script id="wc-add-to-cart-js-extra">
    var wc_add_to_cart_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
        "i18n_view_cart": "Ver carrito",
        "cart_url": "https:\/\/bebifydemo.sedmex.com\/cart\/",
        "is_cart": "1",
        "cart_redirect_after_add": "no"
    };
    </script>
    <script src="wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.mined84.js?ver=8.3.1"
        id="wc-add-to-cart-js" defer data-wp-strategy="defer"></script>
    <script src="wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.minaa02.js?ver=2.1.4-wc.8.3.1"
        id="js-cookie-js" defer data-wp-strategy="defer"></script>
    <script id="woocommerce-js-extra">
    var woocommerce_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%"
    };
    </script>
    <script src="wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.mined84.js?ver=8.3.1" id="woocommerce-js"
        defer data-wp-strategy="defer"></script>
    <script id="wc-country-select-js-extra">
    var wc_country_select_params = {
        "countries": "{\"MX\":{\"DF\":\"Ciudad de M\\u00e9xico\",\"JA\":\"Jalisco\",\"NL\":\"Nuevo Le\\u00f3n\",\"AG\":\"Aguascalientes\",\"BC\":\"Baja California\",\"BS\":\"Baja California Sur\",\"CM\":\"Campeche\",\"CS\":\"Chiapas\",\"CH\":\"Chihuahua\",\"CO\":\"Coahuila\",\"CL\":\"Colima\",\"DG\":\"Durango\",\"GT\":\"Guanajuato\",\"GR\":\"Guerrero\",\"HG\":\"Hidalgo\",\"MX\":\"Estado de M\\u00e9xico\",\"MI\":\"Michoac\\u00e1n\",\"MO\":\"Morelos\",\"NA\":\"Nayarit\",\"OA\":\"Oaxaca\",\"PU\":\"Puebla\",\"QT\":\"Quer\\u00e9taro\",\"QR\":\"Quintana Roo\",\"SL\":\"San Luis Potos\\u00ed\",\"SI\":\"Sinaloa\",\"SO\":\"Sonora\",\"TB\":\"Tabasco\",\"TM\":\"Tamaulipas\",\"TL\":\"Tlaxcala\",\"VE\":\"Veracruz\",\"YU\":\"Yucat\\u00e1n\",\"ZA\":\"Zacatecas\"}}",
        "i18n_select_state_text": "Elige una opci\u00f3n\u2026",
        "i18n_no_matches": "No se han encontrado coincidencias",
        "i18n_ajax_error": "Error al cargar",
        "i18n_input_too_short_1": "Por favor, introduce 1 o m\u00e1s caracteres",
        "i18n_input_too_short_n": "Por favor, introduce %qty% o m\u00e1s caracteres",
        "i18n_input_too_long_1": "Por favor, borra 1 car\u00e1cter.",
        "i18n_input_too_long_n": "Por favor, borra %qty% caracteres",
        "i18n_selection_too_long_1": "Solo puedes seleccionar 1 art\u00edculo",
        "i18n_selection_too_long_n": "Solo puedes seleccionar %qty% art\u00edculos",
        "i18n_load_more": "Cargando m\u00e1s resultados\u2026",
        "i18n_searching": "Buscando\u2026"
    };
    </script>
    <script src="wp-content/plugins/woocommerce/assets/js/frontend/country-select.mined84.js?ver=8.3.1"
        id="wc-country-select-js" defer data-wp-strategy="defer"></script>
    <script id="wc-address-i18n-js-extra">
    var wc_address_i18n_params = {
        "locale": "{\"default\":{\"first_name\":{\"required\":true,\"autocomplete\":\"given-name\"},\"last_name\":{\"required\":true,\"autocomplete\":\"family-name\"},\"company\":{\"autocomplete\":\"organization\",\"required\":false},\"country\":{\"type\":\"country\",\"required\":true,\"autocomplete\":\"country\"},\"address_1\":{\"required\":true,\"autocomplete\":\"address-line1\"},\"address_2\":{\"label_class\":[\"screen-reader-text\"],\"autocomplete\":\"address-line2\",\"required\":false},\"city\":{\"required\":true,\"autocomplete\":\"address-level2\"},\"state\":{\"type\":\"state\",\"required\":true,\"validate\":[\"state\"],\"autocomplete\":\"address-level1\"},\"postcode\":{\"required\":true,\"validate\":[\"postcode\"],\"autocomplete\":\"postal-code\"}},\"MX\":{\"first_name\":{\"required\":true,\"autocomplete\":\"given-name\"},\"last_name\":{\"required\":true,\"autocomplete\":\"family-name\"},\"company\":{\"autocomplete\":\"organization\",\"required\":false},\"country\":{\"type\":\"country\",\"required\":true,\"autocomplete\":\"country\"},\"address_1\":{\"required\":true,\"autocomplete\":\"address-line1\"},\"address_2\":{\"label_class\":[\"screen-reader-text\"],\"autocomplete\":\"address-line2\",\"required\":false},\"city\":{\"required\":true,\"autocomplete\":\"address-level2\"},\"state\":{\"type\":\"state\",\"required\":true,\"validate\":[\"state\"],\"autocomplete\":\"address-level1\"},\"postcode\":{\"required\":true,\"validate\":[\"postcode\"],\"autocomplete\":\"postal-code\"}}}",
        "locale_fields": "{\"address_1\":\"#billing_address_1_field, #shipping_address_1_field\",\"address_2\":\"#billing_address_2_field, #shipping_address_2_field\",\"state\":\"#billing_state_field, #shipping_state_field, #calc_shipping_state_field\",\"postcode\":\"#billing_postcode_field, #shipping_postcode_field, #calc_shipping_postcode_field\",\"city\":\"#billing_city_field, #shipping_city_field, #calc_shipping_city_field\"}",
        "i18n_required_text": "obligatorio",
        "i18n_optional_text": "opcional"
    };
    </script>
    <script src="wp-content/plugins/woocommerce/assets/js/frontend/address-i18n.mined84.js?ver=8.3.1"
        id="wc-address-i18n-js" defer data-wp-strategy="defer"></script>
    <script id="wc-cart-js-extra">
    var wc_cart_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
        "update_shipping_method_nonce": "8db84e5428",
        "apply_coupon_nonce": "9ea3523e44",
        "remove_coupon_nonce": "ccaa88e7f1"
    };
    </script>
    <script src="wp-content/plugins/woocommerce/assets/js/frontend/cart.mined84.js?ver=8.3.1" id="wc-cart-js" defer
        data-wp-strategy="defer"></script>
    <script src="wp-content/plugins/woocommerce/assets/js/selectWoo/selectWoo.full.min45e9.js?ver=1.0.9-wc.8.3.1"
        id="selectWoo-js" defer data-wp-strategy="defer"></script>
    <script id="wc-cart-fragments-js-extra">
    var wc_cart_fragments_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
        "cart_hash_key": "wc_cart_hash_1ed5101e229084b8b45e7bc5eb7110df",
        "fragment_name": "wc_fragments_1ed5101e229084b8b45e7bc5eb7110df",
        "request_timeout": "5000"
    };
    </script>
    <script src="wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.mined84.js?ver=8.3.1"
        id="wc-cart-fragments-js" defer data-wp-strategy="defer"></script>
    <link rel="https://api.w.org/" href="wp-json/index.html" />
    <link rel="alternate" type="application/json" href="wp-json/wp/v2/pages/13.json" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" />
    <meta name="generator" content="WordPress 6.4.2" />
    <meta name="generator" content="WooCommerce 8.3.1" />
    <link rel="canonical" href="index.html" />
    <link rel='shortlink' href='index2dc4.html?p=13' />
    <link rel="alternate" type="application/json+oembed"
        href="wp-json/oembed/1.0/embed022b.json?url=https%3A%2F%2Fbebifydemo.sedmex.com%2Fcart%2F" />
    <link rel="alternate" type="text/xml+oembed"
        href="wp-json/oembed/1.0/embed9608?url=https%3A%2F%2Fbebifydemo.sedmex.com%2Fcart%2F&amp;format=xml" />
    <script type="text/javascript">
    WebFontConfig = {
        google: {
            families: ['Poppins:400,500,600,700,800']
        }
    };
    (function(d) {
        var wf = d.createElement('script'),
            s = d.scripts[d.scripts.length - 1];
        wf.src = 'wp-content/themes/porto/js/libs/webfont.js';
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
</head>

<body data-rsssl=1
    class="page-template-default page page-id-13 wp-custom-logo wp-embed-responsive theme-porto woocommerce-cart woocommerce-page woocommerce-no-js login-popup full blog-1 elementor-default elementor-kit-1724">

    <div class="page-wrapper">
        <!-- page wrapper -->
        <?php include "header.php" ?>
        <!-- header wrapper -->
       

        <div class="woo-page-header page-header-8">
            <ul class="breadcrumb text-center">
                <li class="current">
                    <a href="index.html">Carrito de Compras</a>
                </li>
                <li class="">
                    <i class="delimiter delimiter-2"></i>
                    <a href="checkout/index.html">Detalles del Pedido</a>
                </li>
                <li class="disable">
                    <i class="delimiter delimiter-2"></i>
                    <a href="#" class="nolink">Completar Pedido</a>
                </li>
            </ul>
        </div>

        <div id="main" class="column1 boxed">
            <!-- main -->

            <div class="container">
                <div class="row main-content-wrap">

                    <!-- main content -->
                    <div class="main-content col-lg-12">


                        <div id="content" role="main">

                            <article class="post-13 page type-page status-publish hentry">

                                <h2 class="entry-title" style="display: none;">Cart</h2><span class="vcard"
                                    style="display: none;"><span class="fn"><a href="author/operez/index.html"
                                            title="Entradas de operez" rel="author">operez</a></span></span><span
                                    class="updated" style="display:none">2023-11-06T00:02:18+00:00</span>
                                <div class="page-content">
                                    <div class="woocommerce">
                                        <div class="woocommerce-notices-wrapper"></div>
                                        <div class="featured-box featured-box-primary align-left">
                                            <div class="box-content">
                                            <?php
    $subtotalnew=0;
    $totalpzasnew=0;
    $carrito="SELECT * from carritos ca inner join productos p 
    on p.IdProducto=ca.IdProducto INNER JOIN usuarios u 
    on u.IdUsuario=ca.IdCliente inner JOIN precioproductomembresia pm 
    on pm.IdProducto=p.IdProducto where ca.IdCliente={$_SESSION['IdUsuario']} 
    and ca.Estatus=1 and pm.IdMembresia=$TipoCosto
    ";
    $rescarrito=mysqli_query($con,$carrito);
    $totalcarrito=mysqli_num_rows($rescarrito);
    
    //valido si el cliente tiene descuentos vigentes
    $fechaactual=date('Y-m-d');
    $sqldesc="SELECT * FROM  descuentos d WHERE Estatus=1 
    AND d.Disponibles>0 AND d.FechaVencimiento>='$fechaactual' 
    AND d.IdCliente=$usr_idUsuario LIMIT 1";
    $queryDes=mysqli_query($con,$sqldesc);
    $dataDes=mysqli_num_rows($queryDes);
    //termina validación
    ?>


                                                <form class="woocommerce-cart-form" id="formcartactualizar"
                                                    action="" method="post">
                                                    <table
                                                        class="shop_table responsive cart woocommerce-cart-form__contents"
                                                        cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-remove">&nbsp;</th>
                                                                <th class="product-thumbnail">&nbsp;</th>
                                                                <th class="product-name"><span>Producto</span></th>
                                                                <th class="product-price"><span>Precio</span></th>
                                                                <th class="product-quantity"><span>Cantidad</span></th>
                                                                <th class="product-subtotal"><span>Subtotal</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php // consulto los productos del carrito
                
                $i=0;
                while ($regcarrito=mysqli_fetch_array($rescarrito)){
                    $subtotal=($regcarrito['Precio']*$regcarrito["Cantidad"]);
                    $subtotalnew=$subtotalnew+$subtotal;
                    $totalpzas=$regcarrito['Cantidad'];
                    $totalpzasnew=$totalpzasnew+$totalpzas;
                 ?>
                                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                <td class="product-remove">
                                                                    <a id="btnView" data-id="<?php echo $regcarrito['IdCarrito'] ?>"
                                                                        class="remove remove-product"
                                                                        aria-label="Eliminar"
                                                                        data-product_id="768" data-product_sku=""
                                                                        data-cart_id="3a835d3215755c435ef4fe9965a3f2a0">&times;</a>
                                                                </td>
                                                                <td class="product-thumbnail">
                                                                    <a
                                                                        href="producto.php?idp=<?php echo $regcarrito['IdProducto'] ?>"><img
                                                                            decoding="async" width="300" height="300"
                                                                            src="plataforma/<?php echo $regcarrito['Imagen'] ?>"
                                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                            alt="" /></a>
                                                                </td>
                                                                <td class="product-name">
                                                                    <a
                                                                    href="producto.php?idp=<?php echo $regcarrito['IdProducto'] ?>"><?php echo $regcarrito['Nombre'] ?></a>
                                                                </td>
                                                                <td class="product-price">
                                                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol">&#36;</span><?php echo number_format($regcarrito['Precio'], 2, '.', ',') ?></bdi></span>
                                                                </td>
                                                                <td class="product-quantity">
                                                                    <div class="quantity buttons_added">
                                                                        <button type="button" value="-"
                                                                            class="minus">-</button>
                                                                            <input type="hidden" name="idprodcarrito[]" value="<?php echo $regcarrito['IdCarrito'] ?>">
                      <input type="hidden" id="precio" name="precio[]" value="<?php echo $regcarrito['Precio'] ?>">
                                                                        <input type="number" 
                                                                            class="input-text qty text" step="1" min="0"
                                                                            max=""
                                                                            id="cantidad<?php echo $i;?>" name="cantidad<?php echo $i;?>"
                                                                            value="<?php echo $regcarrito['Cantidad'] ?>" aria-label="Cantidad de productos"
                                                                            size="4" placeholder=""
                                                                            inputmode="numeric" />
                                                                        <button type="button" value="+"
                                                                            class="plus">+</button>
                                                                    </div>
                                                                </td>
                                                                <td class="product-subtotal" data-title="Subtotal">
                                                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol">&#36;</span><?php echo number_format($regcarrito['Precio']*$regcarrito["Cantidad"], 2, '.', ',') ?></bdi></span>
                                                                </td>
                                                            </tr>
                                                            <?php $i++;} ?>
                                                            <tr>
                                                                <td colspan="6" class="actions">
                                                                <?php if($dataDes==1){ 
          ?>

                                                                    <div class="coupon pt-left">
                                                                        <label for="coupon_code">Cupón:</label> <input
                                                                            type="text"
                                                                            class="input-text" id="codigodescuento" name="codigodescuento"
                                                                            placeholder="Código de cupón" /> <input
                                                                            type="button" id="aplicardescuento"
                                                                            class="btn text-uppercase btn-default"
                                                                            name="apply_coupon" value="Aplicar cupón" />
                                                                    </div>
                                                                    <?php }?>

                                                                    <div class="cart-actions pt-right">
                                                                        <button type="submit"
                                                                            class="btn btn-default text-uppercase"
                                                                            name=""
                                                                            value="Actualizar carrito">Actualizar
                                                                            carrito</button>
                                                                    </div>
                                                                    <input type="hidden" id="_wpnonce" name="_wpnonce"
                                                                        value="7f5d29721f" /><input type="hidden"
                                                                        name="_wp_http_referer" value="/cart/" />
                                                                </td>
                                                            </tr>
                               <?php                              
                  $ivaD=$subtotalnew*.16;
                  $nuevoE=$ivaD+$subtotalnew;
                  $sqlEnvio="SELECT * FROM costosenvio  ce WHERE ce.Desde<=$nuevoE AND ce.Hasta>=$nuevoE AND ce.Estatus=1 LIMIT 1";
                  $resEnd=mysqli_query($con,$sqlEnvio);
                  $dataen=mysqli_fetch_array($resEnd);
                  if($dataen){
                    $costoEnvio=$dataen['Precio'];
                  }else{
                    $costoEnvio=0;
                  }
                  ?> 

                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>


                                        <div class="cart-collaterals">
                                            <div class="featured-box featured-box-primary align-left">
                                                <div class="box-content">
                                                    <div class="cart_totals">
                                                        <h4><b>Totales del carrito</b></h4>
                                                        <table class="shop_table responsive cart-total" cellspacing="0">
                                                            <tr class="cart-subtotal">
                                                                <th>Subtotal</th>
                                                                <td><span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol">&#36;</span><?php echo number_format($subtotalnew, 2, '.', ',')?></bdi></span>
                                                                </td>
                                                            </tr>
                                                            <tr class="woocommerce-shipping-totals shipping">
                                                                <td colspan="2" class="text-start" data-title="Envío">
                                                                    <h4 class="m-b-sm">Envío</h4>
                                                                    <ul id="shipping_method"
                                                                        class="woocommerce-shipping-methods">
                                                                        <li>
                                                                            <div
                                                                                class="porto-radio porto-control-disable">
                                                                                <input type="hidden"
                                                                                    name="shipping_method[0]"
                                                                                    data-index="0"
                                                                                    id="shipping_method_0_flat_rate1"
                                                                                    value="flat_rate:1"
                                                                                    class="shipping_method porto-control-input" /><label
                                                                                    class="porto-control-label text-capitalize font-weight-normal"
                                                                                    for="shipping_method_0_flat_rate1">Envío
                                                                                    Bebify: <span
                                                                                        class="woocommerce-Price-amount amount"><bdi><span
                                                                                                class="woocommerce-Price-currencySymbol">&#36;</span><?php echo number_format($costoEnvio, 2, '.', ',') ?></bdi></span></label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                   



                                                                  

                                                                </td>
                                                            </tr>
                                                            <tr class="tax-rate tax-rate-mx-iva-1">
                                                                <th>IVA</th>
                                                                <td data-title="IVA"><span
                                                                        class="woocommerce-Price-amount amount"><span
                                                                            class="woocommerce-Price-currencySymbol">&#036;</span><?php echo number_format($iva=$subtotalnew*.16, 2, '.', ',')?></span>
                                                                </td>
                                                            </tr>
                                                            <tr class="tax-rate tax-rate-mx-iva-2">
                                                                <th>Descuento</th>
                                                                <td data-title="Descuento"><span
                                                                        class="woocommerce-Price-amount amount"><span
                                                                            class="woocommerce-Price-currencySymbol">&#036;</span><?php echo number_format(0, 2, '.', ',') ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr class="order-total">
                                                                <th class="text-md">Total</th>
                                                                <td data-title="Total"><strong><span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span><?php echo number_format($subtotalnew+$iva+$costoEnvio, 2, '.', ',') ?></bdi></span></strong>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                        <div class="wc-proceed-to-checkout">
                                                            <a href="detalles.php"
                                                                class="checkout-button button alt wc-forward btn-v-dark px-4 py-3">
                                                                Finalizar compra</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>



                    </div><!-- end main content -->

                    <div class="sidebar-overlay"></div>

                </div>
            </div>



        </div><!-- end main -->


        <?php include "footer.php" ?>


    </div><!-- end wrapper -->

    <div class="panel-overlay"></div>
    <a href="#" aria-label="Mobile Close" class="side-nav-panel-close"><i class="fas fa-times"></i></a>
    <div id="side-nav-panel" class="">

    <?php include "headerm.php" ?>

        <div class="share-links"> <a target="_blank" rel="nofollow noopener noreferrer" class="share-facebook" href="#"
                title="Facebook"></a>
            <a target="_blank" rel="nofollow noopener noreferrer" class="share-twitter" href="#" title="Twitter"></a>
            <a target="_blank" rel="nofollow noopener noreferrer" class="share-instagram" href="#"
                title="Instagram"></a>
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
    <div data-elementor-type="popup" data-elementor-id="3118" class="elementor elementor-3118 elementor-location-popup"
        data-elementor-settings="{&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;timing&quot;:[]}"
        data-elementor-post-type="elementor_library">
        <div class="elementor-element elementor-element-a6817b9 e-flex e-con-boxed e-con e-parent" data-id="a6817b9"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-2df727d elementor-widget elementor-widget-image"
                    data-id="2df727d" data-element_type="widget" data-widget_type="image.default">
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
                        </style> <img loading="lazy" width="300" height="103"
                            src="wp-content/uploads/2023/11/Bebify-Logotipo-01-e1700457076300-300x103.png"
                            class="attachment-medium size-medium wp-image-1733" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-f1ed158 e-flex e-con-boxed e-con e-parent" data-id="f1ed158"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-20906e9 elementor-widget elementor-widget-heading"
                    data-id="20906e9" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">Iniciar Sesión</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-df29d0c e-flex e-con-boxed e-con e-parent" data-id="df29d0c"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-0bcb356 elementor-widget__width-initial elementor-widget elementor-widget-login"
                    data-id="0bcb356" data-element_type="widget" data-widget_type="login.default">
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
                        <form class="elementor-login elementor-form" method="post"
                            action="https://bebifydemo.sedmex.com/wp-login.php">
                            <input type="hidden" name="redirect_to" value="/cart/">
                            <div class="elementor-form-fields-wrapper">
                                <div
                                    class="elementor-field-type-text elementor-field-group elementor-column elementor-col-100 elementor-field-required">
                                    <label for="user">Correo electrónico</label> <input size="1" type="text" name="log"
                                        id="user" placeholder="Username or Email Address"
                                        class="elementor-field elementor-field-textual elementor-size-sm">
                                </div>
                                <div
                                    class="elementor-field-type-text elementor-field-group elementor-column elementor-col-100 elementor-field-required">
                                    <label for="password">Contraseña</label> <input size="1" type="password" name="pwd"
                                        id="password" placeholder="Password"
                                        class="elementor-field elementor-field-textual elementor-size-sm">
                                </div>


                                <div
                                    class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100">
                                    <button type="submit" class="elementor-size-sm elementor-button" name="wp-submit">
                                        <span class="elementor-button-text">Ingresar</span>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-0ec223e e-flex e-con-boxed e-con e-parent" data-id="0ec223e"
            data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"
            data-core-v316-plus="true">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-defde2c elementor-widget elementor-widget-text-editor"
                    data-id="defde2c" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p>¿No tienes una cuenta? <a href="registro/index.html">Registrate aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/funciones.js"></script>


    <script type="text/javascript">
    (function() {
        var c = document.body.className;
        c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
        document.body.className = c;
    })();
    </script>
    <link rel='stylesheet' id='elementor-post-3118-css'
        href='wp-content/uploads/elementor/css/post-3118ec81.css?ver=1700898239' media='all' />
    <link rel='stylesheet' id='e-animations-css'
        href='wp-content/plugins/elementor/assets/lib/animations/animations.min8864.css?ver=3.17.3' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css'
        href='wp-content/plugins/revslider/public/assets/css/rs6e8c6.css?ver=6.6.13' media='all' />
    <style id='rs-plugin-settings-inline-css'>
    #rs-demo-id {}
    </style>
    <script src="wp-content/plugins/revslider/public/assets/js/rbtools.mine8c6.js?ver=6.6.13" defer async
        id="tp-tools-js"></script>
    <script src="wp-content/plugins/revslider/public/assets/js/rs6.mine8c6.js?ver=6.6.13" defer async id="revmin-js">
    </script>
    <script src="wp-content/plugins/whatsapp-for-wordpress/assets/dist/js/njt-whatsapp6ad2.js?ver=3.4.0.1"
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
    <script src="wp-content/plugins/whatsapp-for-wordpress/assets/js/whatsapp-button6ad2.js?ver=3.4.0.1"
        id="nta-js-global-js"></script>
    <script id="porto-live-search-js-extra">
    var porto_live_search = {
        "nonce": "b5be765f33"
    };
    </script>
    <script src="wp-content/themes/porto/inc/lib/live-search/live-search.minaf33.js?ver=6.12.0"
        id="porto-live-search-js"></script>
    <script src="wp-content/themes/porto/js/bootstrap972f.js?ver=5.0.1" id="bootstrap-js"></script>
    <script src="wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.minf7e1.js?ver=1.4.1-wc.8.3.1"
        id="jquery-cookie-js" defer data-wp-strategy="defer"></script>
    <script src="wp-content/themes/porto/js/libs/owl.carousel.min531b.js?ver=2.3.4" id="owl.carousel-js"></script>
    <script src="wp-includes/js/imagesloaded.minbb93.js?ver=5.0.0" id="imagesloaded-js"></script>
    <script async="async" src="wp-content/themes/porto/js/libs/jquery.magnific-popup.minf488.js?ver=1.1.0"
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
    <script src="wp-content/themes/porto/js/themeaf33.js?ver=6.12.0" id="porto-theme-js"></script>
    <script src="wp-content/themes/porto/js/footer-reveal.minaf33.js?ver=6.12.0" id="porto-footer-reveal-js"></script>
    <script async="async" src="wp-content/themes/porto/js/theme-asyncaf33.js?ver=6.12.0" id="porto-theme-async-js">
    </script>
    <script src="wp-content/themes/porto/js/woocommerce-themeaf33.js?ver=6.12.0" id="porto-woocommerce-theme-js">
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
    <script src="wp-content/plugins/whatsapp-for-wordpress/assets/js/whatsapp-popup1e39.js?ver=6.4.2"
        id="nta-js-popup-js"></script>
    <script src="wp-content/plugins/pro-elements/assets/js/webpack-pro.runtime.min5d63.js?ver=3.17.1"
        id="elementor-pro-webpack-runtime-js"></script>
    <script src="wp-content/plugins/elementor/assets/js/webpack.runtime.min8864.js?ver=3.17.3"
        id="elementor-webpack-runtime-js"></script>
    <script src="wp-content/plugins/elementor/assets/js/frontend-modules.min8864.js?ver=3.17.3"
        id="elementor-frontend-modules-js"></script>
    <script src="wp-includes/js/dist/vendor/wp-polyfill-inert.min0226.js?ver=3.1.2" id="wp-polyfill-inert-js"></script>
    <script src="wp-includes/js/dist/vendor/regenerator-runtime.min6c85.js?ver=0.14.0" id="regenerator-runtime-js">
    </script>
    <script src="wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0" id="wp-polyfill-js"></script>
    <script src="wp-includes/js/dist/hooks.min2ebd.js?ver=c6aec9a8d4e5a5d543a1" id="wp-hooks-js"></script>
    <script src="wp-includes/js/dist/i18n.minf92f.js?ver=7701b0c3857f914212ef" id="wp-i18n-js"></script>
    <script id="wp-i18n-js-after">
    wp.i18n.setLocaleData({
        'text direction\u0004ltr': ['ltr']
    });
    </script>
    <script id="elementor-pro-frontend-js-before">
    var ElementorProFrontendConfig = {
        "ajaxurl": "https:\/\/bebifydemo.sedmex.com\/wp-admin\/admin-ajax.php",
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
    <script src="wp-content/plugins/pro-elements/assets/js/frontend.min5d63.js?ver=3.17.1"
        id="elementor-pro-frontend-js"></script>
    <script src="wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js?ver=4.0.2"
        id="elementor-waypoints-js"></script>
    <script src="wp-includes/js/jquery/ui/core.min3f14.js?ver=1.13.2" id="jquery-ui-core-js"></script>
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
            "id": 13,
            "title": "Cart%20%E2%80%93%20bebify",
            "excerpt": "",
            "featuredImage": false
        }
    };
    </script>
    <script src="wp-content/plugins/elementor/assets/js/frontend.min8864.js?ver=3.17.3" id="elementor-frontend-js">
    </script>
    <script src="wp-content/plugins/pro-elements/assets/js/elements-handlers.min5d63.js?ver=3.17.1"
        id="pro-elements-handlers-js"></script>
</body>

<!-- Mirrored from bebifydemo.sedmex.com/cart/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 06:19:11 GMT -->

</html>