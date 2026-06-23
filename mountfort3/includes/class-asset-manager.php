<?php
namespace Mountfort3;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Asset_Manager {

	public function __construct() {
		add_action( 'wp_head', array( $this, 'output_head_assets' ), 1 );
		add_action( 'wp_footer', array( $this, 'output_footer_assets' ), 99 );
	}

	public function output_head_assets() {
		$site_url = rtrim( site_url(), '/' );
		?>
		<script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-5F3SQM6J"></script>
		<script type="text/javascript" charset="UTF-8" async="" src="https://consent.cookiebot.com/Scripts/widgetIcon.min.js"></script>
		<script type="text/javascript" charset="UTF-8" async="" src="https://consentcdn.cookiebot.com/consentconfig/89edad7e-6fc5-41b7-91a2-04a65c8d6afa/state.js"></script>
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="89edad7e-6fc5-41b7-91a2-04a65c8d6afa" data-blockingmode="auto" type="text/javascript" data-astro-exec=""></script>
		<style type="text/css" id="CookieConsentStateDisplayStyles">.cookieconsent-optin,.cookieconsent-optin-preferences,.cookieconsent-optin-statistics,.cookieconsent-optin-marketing{display:block;display:initial;}.cookieconsent-optout-preferences,.cookieconsent-optout-statistics,.cookieconsent-optout-marketing,.cookieconsent-optout{display:none;}</style>
		<script data-cookieconsent="ignore" data-astro-exec="">
			window.dataLayer = window.dataLayer || []
			function gtag() {
				// eslint-disable-next-line prefer-rest-params
				dataLayer.push(arguments)
			}
			gtag('consent', 'default', {
				ad_personalization: 'denied',
				ad_storage: 'denied',
				ad_user_data: 'denied',
				analytics_storage: 'denied',
				functionality_storage: 'denied',
				personalization_storage: 'denied',
				security_storage: 'granted',
				wait_for_update: 500
			})
			gtag('set', 'ads_data_redaction', true)
			gtag('set', 'url_passthrough', false)
		</script>
		<script type="text/javascript" data-cookieconsent="statistics" data-astro-exec="">
			;(function (w, d, s, l, i) {
				w[l] = w[l] || []
				w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' })
				const f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != 'dataLayer' ? '&l=' + l : ''
				j.async = true
				j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl
				f.parentNode.insertBefore(j, f)
			})(window, document, 'script', 'dataLayer', 'GTM-5F3SQM6J')
		</script>
		<script type="module" src="<?php echo $site_url; ?>/_astro/ClientRouter.astro_astro_type_script_index_0_lang.WONxKOw9.js" data-astro-exec=""></script>
		<link rel="stylesheet" href="<?php echo $site_url; ?>/_astro/_slug_.B97dlsMJ.css">
		<style>[data-astro-transition-scope="astro-smooz4hq-1"] { view-transition-name: none; }@layer astro { ::view-transition-old(none) { animation: none; opacity: 0; mix-blend-mode: normal; }::view-transition-new(none) { animation: none; mix-blend-mode: normal; }::view-transition-group(none) { animation: none } }[data-astro-transition-fallback="old"] [data-astro-transition-scope="astro-smooz4hq-1"],
					[data-astro-transition-fallback="old"][data-astro-transition-scope="astro-smooz4hq-1"] { animation: none; mix-blend-mode: normal; }[data-astro-transition-fallback="new"] [data-astro-transition-scope="astro-smooz4hq-1"],
					[data-astro-transition-fallback="new"][data-astro-transition-scope="astro-smooz4hq-1"] { animation: none; mix-blend-mode: normal; }</style>
		<style data-savepage-fontface="">@font-face { font-family: Century Gothic; src: url('<?php echo $site_url; ?>/assets/fonts/CenturyGothic.woff2'); font-weight: 400;  }</style>
		<style data-savepage-fontface="">@font-face { font-family: Century Gothic; src: url('<?php echo $site_url; ?>/assets/fonts/CenturyGothic-Bold.woff2'); font-weight: 700;  }</style>
		<style data-savepage-fontface="">@font-face { font-family: Josefin Sans; src: url('<?php echo $site_url; ?>/assets/fonts/JosefinSans-Light.woff2'); font-weight: 300;  }</style>
		<link rel="modulepreload" as="script" crossorigin="" href="<?php echo $site_url; ?>/_astro/KTX2Loader.DxCkVlRj.js">
		<link rel="modulepreload" as="script" crossorigin="" href="<?php echo $site_url; ?>/_astro/index.Brfk6Bdo.js">
		<link rel="modulepreload" as="script" crossorigin="" href="<?php echo $site_url; ?>/_astro/ScrollTrigger.6qCihK2t.js">
		<link rel="modulepreload" as="script" crossorigin="" href="<?php echo $site_url; ?>/_astro/router.B-sij-_X.js">
		<link rel="modulepreload" as="script" crossorigin="" href="<?php echo $site_url; ?>/_astro/visitedNews.BmN7K1ri.js">
		<?php
	}

	public function output_footer_assets() {
		$site_url = rtrim( site_url(), '/' );
		?>
		<script type="module" src="<?php echo $site_url; ?>/_astro/WebGL.astro_astro_type_script_index_0_lang.ClLv70z8.js" data-astro-exec=""></script>
		<script type="module" src="<?php echo $site_url; ?>/_astro/Solutions.astro_astro_type_script_index_0_lang.DH4T_DBQ.js" data-astro-exec=""></script>
		<script type="module" src="<?php echo $site_url; ?>/_astro/Social.astro_astro_type_script_index_0_lang.DMS86Kjn.js" data-astro-exec=""></script>
		<script type="module" src="<?php echo $site_url; ?>/_astro/ChaptersNavigation.astro_astro_type_script_index_0_lang.DYrj7sV6.js" data-astro-exec=""></script>
		<script type="module" data-astro-exec="">let e=document.querySelector("#footer"),o=e.querySelectorAll(".office");const n=(a="light")=>{e=document.querySelector("#footer"),e&&(o=e.querySelectorAll(".office")),e&&(e.dataset.theme=a),o&&o.length>0&&o.forEach(t=>{t.dataset.theme=a})},r=()=>{const t=document.querySelector("main")?.dataset.footer;n(t||"light")},c=()=>{r()},i=()=>{};document.addEventListener("astro:page-load",c);document.addEventListener("astro:before-preparation",i);</script>
		<script type="module" src="<?php echo $site_url; ?>/_astro/Layout.astro_astro_type_script_index_0_lang.DbdhcTQd.js" data-astro-exec=""></script>
		<?php
	}
}
