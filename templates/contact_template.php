<?php

/**
 * @file
 * Override e107_core/templates/contact_template.php file.
 */

if(!defined('e107_INIT'))
{
	exit;
}


$CONTACT_TEMPLATE['info'] = "
<div id='contactInfo' >
	<address>{SITECONTACTINFO}</address>
</div>
";

$CONTACT_TEMPLATE['menu'] = '
<div class="contactMenuForm">
	<div class="control-group form-group">
		<label >Name</label>
		{CONTACT_NAME}
	 </div>

	<div class="control-group form-group">
		<label class="control-label" for="contactEmail">Email</label>
		{CONTACT_EMAIL}
	</div>

	<div class="control-group form-group">
		<label>Comments</label>
		{CONTACT_BODY=rows=5&cols=30}
	</div>

	{CONTACT_SUBMIT_BUTTON}
</div>
';

$CONTACT_WRAPPER['form']['CONTACT_IMAGECODE'] = "<div class='control-group form-group'><label>" . LAN_ENTER_CODE . "</label> {---}";
$CONTACT_WRAPPER['form']['CONTACT_IMAGECODE_INPUT'] = "{---}</div>";
$CONTACT_WRAPPER['form']['CONTACT_EMAIL_COPY'] = "<div class='control-group form-group'>{---}" . LANCONTACT_07 . "</div>";
$CONTACT_WRAPPER['form']['CONTACT_PERSON'] = "<div class='control-group form-group'><label>" . LANCONTACT_14 . "</label>{---}</div>";

$CONTACT_TEMPLATE['form'] = "
<form action='" . e_SELF . "' method='post' id='contactForm' >
	{CONTACT_PERSON}

	<div class='control-group form-group'>
		{CONTACT_NAME}
	</div>

	<div class='control-group form-group'>
		{CONTACT_EMAIL}
	</div>

	<div class='control-group form-group'>
		{CONTACT_SUBJECT}
	</div>

	<div class='control-group form-group'>
		{CONTACT_BODY}
	</div>

	{CONTACT_EMAIL_COPY}

	{CONTACT_IMAGECODE}

	{CONTACT_IMAGECODE_INPUT}

	<div class='form-group'>
		{CONTACT_SUBMIT_BUTTON}
	</div>
</form>";

$CONTACT_TEMPLATE['email']['subject'] = "{CONTACT_SUBJECT}";
