<?php

if(!defined('e107_INIT'))
{
	exit;
}

// This theme uses Bootstrap with version 3.x.
define('BOOTSTRAP', 3);
// This theme uses Font-Awesome with version 4.x.
define('FONTAWESOME', 4);
// Define view-port meta tag.
define('VIEWPORT', 'width=device-width, initial-scale=1.0');

// Fontello.
// FIXME use library manager instead?
e107::css('social', 'css/fontello.css');

// Activate bootstrap tooltips.
// FIXME is this really needed?
e107::js("footer-inline", "$('.e-tip').tooltip({container: 'body'})");

// Theme main js file.
e107::js("footer", "{e_THEME}e107hungary/js/e107hungary.js", 'jquery', 2);


define('OTHERNEWS_COLS', false); // no tables, only divs.
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS', false); // no tables, only divs.
define('OTHERNEWS2_LIMIT', 3); // Limit to 3. 
define('COMMENTLINK', e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', '');
define('PRE_EXTENDEDSTRING', '<br />');


function tablestyle($caption, $text, $id = '', $info = array())
{
	$style = $info['setStyle'];
	$html = "<!-- tablestyle: style=" . $style . " id=" . $id . " -->\n\n";

	switch($style)
	{
		case 'navdoc':
		case 'none':
		case 'menu-without-caption':
			$html .= $text;
			break;

		case 'no-caption':
			$html .= '<div class="no-caption-container">' . $text . '</div>';
			break;

		case 'jumbotron':
			$html .= '<div class="jumbotron">';
			$html .= '<div class="container">';
			$html .= '<h1>' . $caption . '</h1>';
			$html .= '<p>' . $text . '</p>';
			$html .= '</div>';
			$html .= '</div>';
			break;

		case 'menu-with-h2-caption':
			$html .= '<h2>' . $caption . '</h2>' . $text;
			break;

		case 'menu-with-h4-caption':
			$html .= '<h4>' . $caption . '</h4>' . $text;
			break;

		case 'menu-panel-default':
			$html .= '<div class="panel panel-default">';
			$html .= '<div class="panel-heading">' . $caption . '</div>';
			$html .= '<div class="panel-body">' . $text . '</div>';
			$html .= '</div>';
			break;

		case 'menu-panel-default-without-caption':
			$html .= '<div class="panel panel-default">';
			$html .= '<div class="panel-body">' . $text . '</div>';
			$html .= '</div>';
			break;

		case 'menu-panel-default-chatbox':
			$html .= '<div class="panel panel-default">';
			$html .= '<div class="panel-heading"><i class="fa fa-comments"></i> ' . $caption . '</div>';
			$html .= '<div class="panel-body">' . $text . '</div>';
			$html .= '</div>';
			break;

		case 'menu-panel-default-facebook':
			$html .= '<div class="panel panel-default">';
			$html .= '<div class="panel-heading"><i class="fa fa-thumbs-up"></i> ' . $caption . '</div>';
			$html .= '<div class="panel-body">' . $text . '</div>';
			$html .= '</div>';
			break;

		case 'menu-panel-default-latest-forum-posts':
			$html .= '<div class="panel panel-default">';
			$html .= '<div class="panel-heading"><i class="fa fa-bell"></i> ' . $caption . '</div>';
			$html .= '<div class="panel-body">' . $text . '</div>';
			$html .= '</div>';
			break;

		case 'menu-panel-default-testimonials':
			$html .= '<div class="panel panel-default">';
			$html .= '<div class="panel-heading"><i class="fa fa-heart"></i> ' . $caption . '</div>';
			$html .= '<div class="panel-body">' . $text . '</div>';
			$html .= '</div>';
			break;

		case 'menu-panel-default-donation':
			$html .= '<div class="panel panel-default">';
			$html .= '<div class="panel-heading"><i class="fa fa-medkit"></i> ' . $caption . '</div>';
			$html .= '<div class="panel-body">' . $text . '</div>';
			$html .= '</div>';
			break;

		default:
			$html .= '<h2>' . $caption . '</h2>' . $text;
			break;
	}

	echo $html;
	return;
}

$LAYOUT['_header_'] = '
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : \'151469215003509\',
      xfbml      : true,
      version    : \'v2.9\'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, \'script\', \'facebook-jssdk\'));
</script>

<div class="navbar navbar-e107hungary navbar-fixed-top" role="navigation" id="slide-nav">
	<div class="container navbar-container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="{SITEURL}">
				<img class="logo" src="' . THEME_ABS . 'logo.png" width="30" height="30" alt="{SITENAME}" /> {SITENAME}
			</a>
		</div>

		<div id="slidemenu">
			{NAVIGATION=main}
			{BOOTSTRAP_USERNAV}
			{BOOTSTRAP_NODEJS_PM}
			{BOOTSTRAP_NODEJS_ONLINE}
		</div><!--/.navbar-collapse -->

		{SETSTYLE=default}
	</div>
</div>
';

$LAYOUT['_footer_'] = '
	<footer>
		<div class="container">
			<div class="row">
	            <div class="col-xs-12 col-md-4" data-appear-animation="fadeInLeft">
	                <a class="footer-logo" href="{SITEURL}">
						<img class="img-responsive" src="' . e_IMAGE_ABS . 'admin_images/credits_logo.png" alt="e107" width="304" height="114" />
					</a>
		        </div>

				<div class="col-xs-12 col-md-8 text-right" data-appear-animation="fadeInRight">
					{SETSTYLE=menu-without-caption}
					{MENU=5}
					{SETSTYLE=default}
				</div>
			</div>

			<div class="row last-row">
				<div class="col-lg-6" data-appear-animation="fadeInLeft">
	                {SITEDISCLAIMER}
	            </div>
	            <div class="col-lg-6 text-right" data-appear-animation="fadeInRight">
	                {XURL_ICONS: size=2x}
	            </div>
			</div>

			<div class="row last-row-links">
				<div class="col-xs-12" data-appear-animation="fadeInUp">
	                {SETSTYLE=menu-without-caption}
					{CMENU=footer-links}
					{SETSTYLE=default}
	            </div>
			</div>
		</div>
	</footer>
';

$LAYOUT['home'] = '
{SETSTYLE=none}
{FEATUREBOX}

<div id="social-buttons" class="hidden-print">
    <div class="container">
        <ul class="list-inline">
            <li>
                <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=e107inc&amp;repo=e107&amp;type=watch&amp;count=true" allowtransparency="true" scrolling="0" width="100px" frameborder="0" height="20px"></iframe>
            </li>
            <li>
                <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=e107inc&amp;repo=e107&amp;type=fork&amp;count=true" allowtransparency="true" scrolling="0" width="102px" frameborder="0" height="20px"></iframe>
            </li>
            <li>
                <div class="fb-like" data-href="https://www.facebook.com/e107hungary" data-width="180" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
            </li>
        </ul>
    </div>
</div>

{SETSTYLE=default}
<div class="container">
    {ALERTS}
    {MENU=1}
    <div class="home-main-container">
        {---}
    </div>
</div>

<div class="container">
    <div class="row padding-50">
        <div class="col-xs-12 col-md-8" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-without-caption}
            {CMENU=bemutatas}
        </div>
        <div class="col-xs-12 col-md-4" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-without-caption}
            {CMENU=letoltes}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-4 padding-25" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-with-h4-caption}
            {CMENU=telepithetoseg}
        </div>
        <div class="col-xs-12 col-md-4 padding-25" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-with-h4-caption}
            {CMENU=idotakarekossag}
        </div>
        <div class="col-xs-12 col-md-4 padding-25" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-with-h4-caption}
            {CMENU=bootstrap}
        </div>
        <div class="col-xs-12 col-md-4 padding-25" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-with-h4-caption}
            {CMENU=hasznalhatosag}
        </div>
        <div class="col-xs-12 col-md-4 padding-25" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-with-h4-caption}
            {CMENU=multimedia}
        </div>
        <div class="col-xs-12 col-md-4 padding-25" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-with-h4-caption}
            {CMENU=backwards}
        </div>
        <div class="col-xs-12 col-md-4 padding-25" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-with-h4-caption}
            {CMENU=testreszabhatosag}
        </div>
        <div class="col-xs-12 col-md-4 padding-25" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-with-h4-caption}
            {CMENU=keresobarat}
        </div>
        <div class="col-xs-12 col-md-4 padding-25" data-appear-animation="fadeInUp">
            {SETSTYLE=menu-with-h4-caption}
            {CMENU=fejlesztes}
        </div>
    </div>
</div>

<div class="bg-1">
    <div class="container">
        <div class="row padding-50">
            <div class="col-xs-12 col-md-4" data-appear-animation="fadeInUp">
                {SETSTYLE=menu-with-h2-caption}
                {CMENU=miert}
            </div>
            <div class="col-xs-12 col-md-8" data-appear-animation="fadeInUp">
                {SETSTYLE=menu-without-caption}
                {CMENU=azert}
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-4 padding-25 color-1" data-appear-animation="fadeInUp">
                {SETSTYLE=menu-with-h4-caption}
                {CMENU=weboldalkell}
            </div>
            <div class="col-xs-12 col-md-4 padding-25 color-1" data-appear-animation="fadeInUp">
                {SETSTYLE=menu-with-h4-caption}
                {CMENU=pluginfejleszto}
            </div>
            <div class="col-xs-12 col-md-4 padding-25 color-1" data-appear-animation="fadeInUp">
                {SETSTYLE=menu-with-h4-caption}
                {CMENU=themekeszito}
            </div>
        </div>
    </div>
</div>
';

$LAYOUT['full'] = '
{SETSTYLE=default}
<div class="container">
    <div class="col-xs-12">
        {ALERTS}
        {MENU=1}
        <div id="content">
        	{---}
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        {SETSTYLE=menu-panel-default}
        {MENU=2}
    </div>
    <div class="col-xs-12 col-md-6">
        {SETSTYLE=menu-panel-default}
        {MENU=3}
    </div>
    <div class="col-xs-12">
        {MENU=4}
    </div>
</div>
';

$LAYOUT['sidebar_left'] = '
{SETSTYLE=default}
<div class="container main-container">
    {ALERTS}
    <div class="row">
    	<div id="sidebar" class="col-xs-12 col-md-4">
            {SETSTYLE=menu-panel-default}
            {MENU=1}
        </div>
        <div class="col-xs-12 col-md-8">
        	<div id="content">
        		{SETSTYLE=default}
            	{---}
            </div>
        </div>
    </div>
</div>
';

$LAYOUT['sidebar_right'] = '
{SETSTYLE=default}
<div class="container main-container">
    {ALERTS}
    <div class="row">
        <div class="col-xs-12 col-md-8">
        	<div id="content">
        	    {SETSTYLE=default}
            	{---}
            </div>

            {SETSTYLE=menu-panel-default}
            {MENU=4}

            {SETSTYLE=menu-panel-default-latest-forum-posts}
			{MENU=6}

			{SETSTYLE=menu-panel-default}
            {MENU=7}
        </div>
        <div id="sidebar" class="col-xs-12 col-md-4">
            {SETSTYLE=menu-panel-default}
            {MENU=1}

            {SETSTYLE=menu-panel-default-chatbox}
            {MENU=2}

            {SETSTYLE=menu-panel-default}
            {MENU=3}
        </div>
    </div>
</div>
';

$LAYOUT['sidebar_right_other'] = '
{SETSTYLE=default}
<div class="container main-container">
    {ALERTS}
    <div class="row">
        <div class="col-xs-12 col-md-8">
        	<div id="content">
        	    {SETSTYLE=default}
            	{---}
            </div>

            {SETSTYLE=menu-panel-default}
            {MENU=4}
        </div>
        <div id="sidebar" class="col-xs-12 col-md-4">
            {SETSTYLE=menu-panel-default}
            {MENU=1}

            {SETSTYLE=menu-panel-default-chatbox}
            {MENU=2}

            {SETSTYLE=menu-panel-default}
            {MENU=3}
        </div>
    </div>
</div>
';

$LAYOUT['contact'] = '
{SETSTYLE=default}
<div class="container main-container">
    {ALERTS}
    <div class="row">
        <div class="col-xs-12 col-md-8">
        	<div id="content">
            	{---}
            </div>

            <div class="row">
                <div class="col-xs-12">
                    {SETSTYLE=menu-panel-default-testimonials}
                    {MENU=4}

                    {SETSTYLE=menu-panel-default}
                    {MENU=5}
                </div>
    	    </div>
        </div>
        <div id="sidebar" class="col-xs-12 col-md-4">
            {SETSTYLE=menu-panel-default-donation}
            {MENU=1}

            {SETSTYLE=menu-panel-default-facebook}
            {MENU=2}

            {SETSTYLE=menu-panel-default}
            {MENU=3}
        </div>
    </div>
</div>
';

$LAYOUT['user_profile'] = '
{SETSTYLE=default}
<div class="container main-container">
    {ALERTS}
    <div class="row">
        <div class="col-xs-12 col-md-8">
        	<div id="content">
            	{---}
            </div>

			{SETSTYLE=menu-panel-default}
			{MENU=4}
        </div>
        <div id="sidebar" class="col-xs-12 col-md-4">
            {SETSTYLE=menu-panel-default}
            {MENU=1}

            {SETSTYLE=menu-panel-default-chatbox}
            {MENU=2}

            {SETSTYLE=menu-panel-default}
            {MENU=3}
        </div>
    </div>
</div>
';

$LAYOUT['news_item'] = '
{SETSTYLE=default}
<div class="container main-container">
    {ALERTS}
    <div class="row">
        <div class="col-xs-12 col-md-8">
        	<div id="content">
            	{---}
            </div>

			{SETSTYLE=menu-panel-default}
			{MENU=4}
        </div>
        <div id="sidebar" class="col-xs-12 col-md-4">
            {SETSTYLE=menu-panel-default}
            {MENU=1}

            {SETSTYLE=menu-panel-default-chatbox}
            {MENU=2}

            {SETSTYLE=menu-panel-default}
            {MENU=3}
        </div>
    </div>
</div>
';

$LAYOUT['notifications'] = '
{SETSTYLE=default}
<div class="container main-container">
    {ALERTS}
    <div class="row">
        <div class="col-xs-12 col-md-8">
        	<div id="content">
            	{---}
            </div>

			{SETSTYLE=menu-panel-default}
			{MENU=4}
        </div>
        <div id="sidebar" class="col-xs-12 col-md-4">
            {SETSTYLE=menu-panel-default}
            {MENU=1}

            {SETSTYLE=menu-panel-default-chatbox}
            {MENU=2}

            {SETSTYLE=menu-panel-default}
            {MENU=3}
        </div>
    </div>
</div>
';
