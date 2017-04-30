<?php

/**
 * @file
 * Class installation to define theme shortcodes.
 */


/**
 * Class theme_shortcodes.
 */
class theme_shortcodes extends e_shortcode
{

	/**
	 * theme_shortcodes constructor.
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Main navigation.
	 *
	 * @return string
	 */
	function sc_bootstrap_usernav()
	{
		$tp = e107::getParser();

		include_lan(e_PLUGIN . "login_menu/languages/" . e_LANGUAGE . ".php");
		require_once(e_PLUGIN . "login_menu/login_menu_shortcodes.php");

		$userReg = defset('USER_REGISTRATION');

		// Logged Out.
		if(!USERID)
		{
			$text = '<ul class="nav navbar-nav navbar-right">';

			if($userReg == 1)
			{
				// Signup.
				$text .= '<li><a href="' . e_SIGNUP . '">' . LAN_LOGINMENU_3 . '</a></li>';
			}


			$text .= '
			<li class="divider-vertical"></li>
			<li class="dropdown">
				<a class="dropdown-toggle" href="#" data-toggle="dropdown">' . LAN_LOGIN . ' <strong class="caret"></strong></a>
				<div class="dropdown-menu col-sm-12" style="min-width:250px; padding: 15px; padding-bottom: 0px;">
				{SOCIAL_LOGIN: size=1x}
			';


			if(!empty($userReg)) // value of 1 or 2 = login okay. 
			{
				$text .= '
				<form method="post" onsubmit="hashLoginPassword(this);return true" action="' . e_REQUEST_HTTP . '" accept-charset="UTF-8">
					<div class="form-group">
						{LM_USERNAME_INPUT}
					</div>

					<div class="form-group">
						{LM_PASSWORD_INPUT}
					</div>

					{LM_IMAGECODE_NUMBER}
					{LM_IMAGECODE_BOX}
				
					<div class="checkbox">
						<label class="string optional">
							<input style="margin-right: 10px;" type="checkbox" name="autologin" id="autologin" value="1"> ' . LAN_LOGINMENU_6 . '
						</label>
					</div>
					<input class="btn btn-primary btn-block" type="submit" name="userlogin" id="userlogin" value="' . LAN_LOGIN . '">

					<a href="{LM_FPW_LINK=href}" class="btn btn-default btn-sm  btn-block">' . LAN_LOGINMENU_4 . '</a>
					<a href="{LM_RESEND_LINK=href}" class="btn btn-default btn-sm  btn-block">' . LAN_LOGINMENU_40 . '</a>
					<p></p>
				</form>
				';
			}

			$text .= "</div></li></ul>";

			$login_menu_shortcodes = vartrue($login_menu_shortcodes, null);
			return $tp->parseTemplate($text, true, $login_menu_shortcodes);
		}


		// Logged in. 
		//TODO Generic LANS. (not theme LANs)
		$text = '
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					{SETIMAGE: w=20} {USER_AVATAR: shape=circle} ' . USERNAME . ' <b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="{LM_USERSETTINGS_HREF}"><span class="glyphicon glyphicon-cog"></span> Fiókbeállítások</a>
					</li>
					<li>
						<a href="' . e_HTTP . 'notifications"><span class="glyphicon glyphicon-flag"></span> Webes értesítések</a>
					</li>
					<li>
						<a class="dropdown-toggle no-block" role="button" href="{LM_PROFILE_HREF}"><span class="glyphicon glyphicon-user"></span> ' . LAN_LOGINMENU_13 . '</a>
					</li>
					<li class="divider"></li>';

		if(ADMIN)
		{
			$text .= '<li><a href="' . e_ADMIN_ABS . '"><span class="fa fa-cogs"></span> ' . LAN_LOGINMENU_11 . '</a></li>';
			$text .= '<li><a href="' . e_HTTP . 'webmail" target="_blank"><span class="fa fa-envelope"></span> Webmail</a></li>';
		}

		$text .= '
					<li>
						<a href="' . e_HTTP . 'index.php?logout"><span class="glyphicon glyphicon-off"></span> ' . LAN_LOGOUT . '</a>
					</li>
				</ul>
			</li>
		</ul>';

		$login_menu_shortcodes = vartrue($login_menu_shortcodes, null);
		return $tp->parseTemplate($text, true, $login_menu_shortcodes);
	}


	/**
	 * Render NodeJS PM menu if plugin is installed, and user is logged in.
	 *
	 * @return string $output
	 *  Full HTML output of menu is rendered, or empty string if not.
	 */
	function sc_bootstrap_nodejs_pm()
	{
		$output = '';
		if(e107::isInstalled('nodejs_pm') && USER)
		{
			e107::lan('nodejs_pm', false, true);

			$template = e107::getTemplate('nodejs_pm');
			$sc = e107::getScBatch('nodejs_pm', true);
			$tp = e107::getParser();
			$db = e107::getDb();

			$new = $db->count('private_msg', '(*)', "WHERE pm_read = 0 AND pm_to = '" . USERID . "' AND pm_read_del != 1");
			$sc->setVars(array(
				'new' => $new,
			));

			$output = $tp->parseTemplate($template['MENU'], true, $sc);
		}

		return $output;
	}


	/**
	 * Shortcode to render content with GitHub releases.
     *
     * FIXME lan
	 */
	function sc_e107_downloads()
	{
		$html = '';

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL            => 'https://api.github.com/repos/e107inc/e107/releases',
			CURLOPT_USERAGENT      => 'e107 Hungary',
		));
		$data = curl_exec($curl);
		curl_close($curl);

		$releases = json_decode($data, true);

		if(!$releases)
		{
			return $html;
		}

		$stable = array();
		$others = array();

		foreach($releases as $release)
		{
			if(empty($stable) && $release['prerelease'] == false)
			{
				$stable = $release;
			}
			else
			{
				$others[] = $release;
			}
		}

		if(!empty($stable))
		{
			$html .= '<h5><strong>e107 v2 legutóbbi, stabil kiadása:</strong></h5>';
			$html .= '<ul>';
			$html .= '<li><a href="' . $stable['html_url'] . '" target="_blank">' . $stable['name'] . '</a></li>';
			$html .= '</ul>';
		}

		if(!empty($others))
		{
			$html .= '<h5><strong>e107 v2 egyéb (régebbi) kiadásai:</strong></h5>';
			$html .= '<ul>';
			foreach($others as $other)
			{
				$html .= '<li><a href="' . $other['html_url'] . '" target="_blank">' . $other['name'] . '</a></li>';
			}
			$html .= '</ul>';
		}

		$html .= '<h5><strong>e107 v2 nyelvi csomagok:</strong></h5>';
		$html .= '<ul>';
		$html .= '<li><a href="https://github.com/e107inc/e107-v2.x-Language-Packs" target="_blank">e107inc / e107-v2.x-Language-Packs</a></li>';
		$html .= '</ul>';

		return $html;
	}


	/**
	 * Render NodeJS Online menu if plugin is installed, and user is logged in.
	 *
	 * @return string $output
	 *  Full HTML output of menu is rendered, or empty string if not.
	 */
	function sc_bootstrap_nodejs_online()
	{
		$output = '';
		if(e107::isInstalled('nodejs_online') && USER)
		{
			e107::lan('nodejs_online', false, true);

			$template = e107::getTemplate('nodejs_online');
			$sc = e107::getScBatch('nodejs_online', true);
			$tp = e107::getParser();

			e107_require_once(e_PLUGIN . 'nodejs_online/includes/nodejs_online.php');

			$users = nodejs_online_get_online_users();

			$sc->setVars(array(
				'count' => count($users),
			));
			$output = $tp->parseTemplate($template['MENU']['HEADER'], true, $sc);

			foreach($users as $uid => $user)
			{
				$sc->setVars(array(
					'user' => $user,
				));
				$output .= $tp->parseTemplate($template['MENU']['ITEM'], true, $sc);
			}

			$output .= $tp->parseTemplate($template['MENU']['FOOTER'], true);
		}

		return $output;
	}

}
