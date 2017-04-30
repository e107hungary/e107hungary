<?php

/**
 * @file
 * Override e107_plugins/news/templates/news_template.php file.
 */

if(!defined('e107_INIT'))
{
	exit;
}

global $sc_style;

$NEWS_MENU_TEMPLATE['list']['start'] = '<div class="thumbnails">';
$NEWS_MENU_TEMPLATE['list']['end'] = '</div>';

// Template/CSS to be reviewed for best bootstrap implementation.
$NEWS_TEMPLATE['list']['caption'] = '{NEWSCATEGORY}';
$NEWS_TEMPLATE['list']['start'] = '{SETIMAGE: w=400&h=350&crop=1}';
$NEWS_TEMPLATE['list']['end'] = '';
$NEWS_TEMPLATE['list']['item'] = '
<div class="row row-fluid news-item-container">
	<div class="col-md-3">
		<div class="thumbnail">
			{NEWSTHUMBNAIL=placeholder}
		</div>
	</div>
	<div class="col-md-9">
		<h3 class="media-heading">{NEWSTITLELINK}</h3>
		<div class="row">
			<div class="col-xs-12 col-md-6">
				{GLYPH=pencil} {NEWSAUTHOR} - {GLYPH=time} {NEWSDATE=short}
			</div>
			<div class="col-xs-12 col-md-6 text-right options">
				{GLYPH=tags} &nbsp;{NEWSTAGS} &nbsp; {GLYPH=folder-open} &nbsp;{NEWSCATEGORY}
			</div>
		</div>
		<p></p>
		<p>{NEWSSUMMARY}</p>
		<p><a href="{NEWSURL}" class="btn btn-xs btn-primary pull-right">' . LAN_READ_MORE . '</a></p>
	</div>
</div>
';

$NEWS_TEMPLATE['default']['item'] = '
{SETIMAGE: w=400&h=350&crop=1}
<div class="row row-fluid news-item-container">
	<div class="col-md-3">
		<div class="thumbnail">
			{NEWSTHUMBNAIL=placeholder}
		</div>
	</div>
	<div class="col-md-9">
		<h3 class="media-heading">{NEWSTITLELINK}</h3>
		<div class="row">
			<div class="col-xs-12 col-md-6">
				{GLYPH=pencil} {NEWSAUTHOR} - {GLYPH=time} {NEWSDATE=short}
			</div>
			<div class="col-xs-12 col-md-6 text-right options">
				{GLYPH=tags} &nbsp;{NEWSTAGS} &nbsp; {GLYPH=folder-open} &nbsp;{NEWSCATEGORY}
			</div>
		</div>
		<p></p>
		<p>{NEWSSUMMARY}</p>
		<p><a href="{NEWSURL}" class="btn btn-xs btn-primary pull-right">' . LAN_READ_MORE . '</a></p>
	</div>
</div>
';

$NEWS_TEMPLATE['view']['item'] = '
{SETIMAGE: w=900&h=300}

<div class="view-item">
	<h2>{NEWSTITLELINK}</h2>
	<div class="row">
		<div class="col-xs-12 col-md-6">
			{GLYPH=pencil} {NEWSAUTHOR} - {GLYPH=time} {NEWSDATE=short}
		</div>
		<div class="col-xs-12 col-md-6 text-right options">
			{GLYPH=tags} &nbsp;{NEWSTAGS} &nbsp; {GLYPH=folder-open} &nbsp;{NEWSCATEGORY}
		</div>
	</div>
    <hr>
    {NEWSIMAGE: item=1}
	{NEWSVIDEO: item=1}
    <hr>
    <p class="lead">{NEWSSUMMARY}</p>
    <hr>
	<div class="body">
		{NEWSVIDEO: item=2}
		{NEWSVIDEO: item=3}
		{NEWSBODY=body}
		<br />
		{SETIMAGE: w=400&h=400}
		<div class="row news-images-1">
			<div class="col-md-6">{NEWSIMAGE: item=2}</div>
			<div class="col-md-6">{NEWSIMAGE: item=3}</div>
		</div>
		<div class="row news-images-2">
			<div class="col-md-6">{NEWSIMAGE: item=4}</div>
			<div class="col-md-6">{NEWSIMAGE: item=5}</div>
		</div>
		{NEWSVIDEO: item=4}
		{NEWSVIDEO: item=5}
		<div class="body-extended">
			{NEWSBODY=extended}
		</div>
	</div>
	<hr>
	<div class="options ">
		<div class="btn-group">
			{NEWSCOMMENTLINK: glyph=comments&class=btn btn-default}{PRINTICON: class=btn btn-default}{ADMINOPTIONS: class=btn btn-default}{SOCIALSHARE}
		</div>
	</div>
</div>
{NEWSRELATED}
<hr>
{NEWSNAVLINK}
';

$NEWS_TEMPLATE['category']['body'] = '
<div style="padding:5px">
	<div style="border-bottom:1px inset black; padding-bottom:1px;margin-bottom:5px">
		{NEWSCATICON}&nbsp;{NEWSCATEGORY}
	</div>
	{NEWSCAT_ITEM}
</div>
';

$NEWS_TEMPLATE['category']['item'] = '
<div style="width:100%;padding-bottom:2px">
	<table style="width:100%" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td style="width:2px;vertical-align:top">&#8226;</td>
			<td style="text-align:left;vertical-align:top;padding-left:3px">
				{NEWSTITLELINK}
				<br />
			</td>
		</tr>
	</table>
</div>
';
