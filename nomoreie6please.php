<?php
/*
Plugin Name: NoMoreIE6Please
Plugin URI: http://download.cornhole.ch/nomoreie6please/
Description: This widget gives e custom warning to a user with any old Browser and kindly asks to update it a.s.a.p.
Author: Gilbert Fürer
Version: 1.2
Author URI: http://www.cornhole.ch
*/

class NoMoreIE6Please extends WP_Widget { 
	
		function ReturnBrowsers() {
			/* You can edit this array to fit your needs - remeber, that after an update all changes are lost! */
			/* You also may need to change the function getBrowser() */
			$arr_browser =  array('firefox' => 'Mozilla Firefox', 'chrome' => 'Google Chrome', 'msie' => 'Microsoft Internet Explorer', 'opera' => 'Opera', 'safari' => 'Apple Safari');
			reset($arr_browser);
			return $arr_browser;
		}
		
	function ReturnIconSizes() {
			/* You can edit this array to fit your needs - remeber, that after an update all changes are lost! */
			/* You also need to create new icons and copy them into the images folder (iconsize_browsername.png)*/
			$arr_icons =  array('16', '24', '32');
			reset($arr_icons);
			return $arr_icons;
		}
		
    /* Main Function */
		function NoMoreIE6Please() {  
			$widget_ops = array('classname' => 'NoMoreIE6Please', 'description' => __("Warn User to stop using IE6, please!", "NoMoreIE6Please") );
			$this->WP_Widget('NoMoreIE6Please', __("NoMoreIE6Please", "NoMoreIE6Please"), $widget_ops);			
		}
		
		/* outputs the options form on admin */
		function form($instance) {
			$defaults = array( 
				'title' => __('Browser obsolete!', 'NoMoreIE6Please'), 
				'nmwarning' => __('Browser has expired! Please install new one!', 'NoMoreIE6Please'),
				'nmiconsize' => '32',
				'nmbgwarning' => 'ffff00',
				'nmbrdwarning' => 'ea3d3d',
				'nmbrdwidthwarning' => '4',
				'nmmsie' => true,
				'nmfirefox' => true,
				'nmchrome' => true,
				'nmsafari' => true,
				'nmopera' => true,
				'nmversionmsie' => '7',
				'nmversionfirefox' => '3.6',
				'nmversionchrome' => '7',
				'nmversionsafari' => '4',
				'nmversionopera' => '8',
				'nmbrowserinvalidmsie' => true,
				'nmbrowserinvalidfirefox' => true,
				'nmbrowserinvalidchrome' => true,
				'nmbrowserinvalidsafari' => true,
				'nmbrowserinvalidopera' => true
			);
			$instance = wp_parse_args( (array) $instance, $defaults );
			
	?>
<!-- Widget Title: Text Input -->
<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>">
  <?php _e('Title:', 'NoMoreIE6Please'); ?>
  </label>
  <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
</p>
<!-- Your Warning: Text Input -->
<p>
  <label for="<?php echo $this->get_field_id('nmwarning'); ?>">
  <?php _e('Warning Message:', 'NoMoreIE6Please'); ?>
  </label>
  <input id="<?php echo $this->get_field_id('nmwarning'); ?>" name="<?php echo $this->get_field_name( 'nmwarning' ); ?>" value="<?php echo $instance['nmwarning']; ?>" style="width:100%;" />
</p>
<!-- Warning Backgroundcolor: Text Input -->
<p>
  <label for="<?php echo $this->get_field_id('nmbgwarning'); ?>">
  <?php _e('Warning Background-Color (hex):', 'NoMoreIE6Please'); ?>
  </label><br />
  <input id="<?php echo $this->get_field_id('nmbgwarning'); ?>" name="<?php echo $this->get_field_name( 'nmbgwarning' ); ?>" value="<?php echo $instance['nmbgwarning']; ?>" style="width:50px;" />
</p>
<!-- Warning Bordercolor: Text Input -->
<p>
  <label for="<?php echo $this->get_field_id('nmbrdwarning'); ?>">
  <?php _e('Warning Border-Color (hex) and Width (px):', 'NoMoreIE6Please'); ?>
  </label><br />
  <input id="<?php echo $this->get_field_id('nmbrdwarning'); ?>" name="<?php echo $this->get_field_name( 'nmbrdwarning' ); ?>" value="<?php echo $instance['nmbrdwarning']; ?>" style="width:50px;" />
    <input id="<?php echo $this->get_field_id('nmbrdwidthwarning'); ?>" name="<?php echo $this->get_field_name( 'nmbrdwidthwarning' ); ?>" value="<?php echo $instance['nmbrdwidthwarning']; ?>" style="width:20px;" />
</p>
<!-- Browsers: Check Boxes -->
<p>
  <label for="<?php echo $this->get_field_id('nmbrowsers'); ?>">
  <?php _e('Available Browsers for Download:', 'NoMoreIE6Please'); ?>
  </label>
  <br />
  <input class="checkbox" type="checkbox" <?php checked( $instance['nmChrome'], true ); ?> id="<?php echo $this->get_field_id( 'nmChrome' ); ?>" name="<?php echo $this->get_field_name( 'nmChrome' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'nmChrome' ); ?>">Chrome</label>
  <br />
  <input class="checkbox" type="checkbox" <?php checked( $instance['nmFirefox'], true ); ?> id="<?php echo $this->get_field_id( 'nmFirefox' ); ?>" name="<?php echo $this->get_field_name( 'nmFirefox' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'nmFirefox' ); ?>">Firefox</label>
  <br />
  <input class="checkbox" type="checkbox" <?php checked( $instance['nmMSIE'], true ); ?> id="<?php echo $this->get_field_id( 'nmMSIE' ); ?>" name="<?php echo $this->get_field_name( 'nmMSIE' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'nmMSIE' ); ?>">MSIE</label>
  <br />
  <input class="checkbox" type="checkbox" <?php checked( $instance['nmOpera'], true ); ?> id="<?php echo $this->get_field_id( 'nmOpera' ); ?>" name="<?php echo $this->get_field_name( 'nmOpera' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'nmOpera' ); ?>">Opera</label>
  <br />
  <input class="checkbox" type="checkbox" <?php checked( $instance['nmSafari'], true ); ?> id="<?php echo $this->get_field_id( 'nmSafari' ); ?>" name="<?php echo $this->get_field_name( 'nmSafari' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'nmSafari' ); ?>">Safari</label>
  <br />
</p>
<!-- Icon Sizes: Select Box -->
<p>
  <label for="<?php echo $this->get_field_id( 'nmiconsize' ); ?>">
  <?php _e('Icon Size in Pixels:', 'NoMoreIE6Please'); ?>
  </label>
  <select id="<?php echo $this->get_field_id( 'nmiconsize' ); ?>" name="<?php echo $this->get_field_name( 'nmiconsize' ); ?>" class="widefat" style="width:100%;">
    
<?php
    $arr_icons = $this->ReturnIconSizes();
		foreach( $arr_icons as $size )
		{
    ?>
    <option <?php if ( $size  == $instance['nmiconsize'] ) echo 'selected="selected"'; ?>><?php echo $size; ?></option>
    <?php } ?>
  </select>
</p>
<!-- Expired Browser Name: Text Input -->
<!-- Minimum Browser Version: Text Input -->
<p>
  <label for="<?php echo $this->get_field_id('nmbrowserinvalid'); ?>">
  <?php _e('Expired Browser(s) and minimum required version:', 'nmbrowserinvalid'); ?>
  </label>
  <div style="display:table;width:100%">
		<?php
		$arr_browsers = $this->ReturnBrowsers();
		foreach( $arr_browsers as $code => $label )
		{
		?>
		<div style="display:table-row;">
			<div style="display:table-cell;width:15px;">
			<input type="checkbox" <?php checked( $instance['nmbrowserinvalid'.$code], true ); ?> id="<?php echo $this->get_field_id( 'nmbrowserinvalid'.$code ); ?>" name="<?php echo $this->get_field_name('nmbrowserinvalid'.$code); ?>" />
			</div>
			<div style="display:table-cell;width:170px;text-align:left;">
			<label for="<?php echo $this->get_field_id('nmbrowserinvalid'.$code); ?>" ><?php echo $label; ?></label>
			</div>
			<div style="display:table-cell;">
			<input id="<?php echo $this->get_field_id('nmversion'.$code); ?>" name="<?php echo $this->get_field_name( 'nmversion'.$code ); ?>" value="<?php echo $instance['nmversion'.$code]; ?>" style="width:25px" />
			</div>
		</div>
	<?php
	 }
	?>
	</div>
</p>
 
<?php
	$arr_browsers ="";
		}
		
		/* processes widget options to be saved */
		function update($new_instance, $old_instance)
		{  
			$instance = $old_instance;
			
			$instance = array('nmMSIE' => 0, 'nmFirefox' => 0, 'nmChrome' => 0, 'nmSafari' => 0, 'nmOpera' => 0);
			foreach ( $instance as $field => $val ) {
				if ( isset($new_instance[$field]) )
					$instance[$field] = 1;
			}
			
			$arr_browsers = $this->ReturnBrowsers();
			foreach( $arr_browsers as $code => $label )
			{
				$instance['nmbrowserinvalid'.$code] = strip_tags( $new_instance['nmbrowserinvalid'.$code]);
				$instance['nmversion'.$code] = strip_tags( $new_instance['nmversion'.$code]);
				
				if ( isset($new_instance['nmbrowserinvalid'.$code]) )
					$instance['nmbrowserinvalid'.$code] = 1;
					
				if ( $instance['nmversion'.$code] == NULL ) { $instance['nmversion'.$code] = '1';}
			}

			$instance['title'] = strip_tags( $new_instance['title']);
			$instance['nmwarning'] = strip_tags( $new_instance['nmwarning'] );
			$instance['nmbgwarning'] = strip_tags( $new_instance['nmbgwarning'] );
			$instance['nmbrdwarning'] = strip_tags( $new_instance['nmbrdwarning'] );
			$instance['nmbrdwidthwarning'] = strip_tags( $new_instance['nmbrdwidthwarning'] );			
			$instance['nmiconsize'] = $new_instance['nmiconsize'];
			
			if ($instance['title'] == null) {  $instance['title'] = 'Browser obsolete!';}
			if ($instance['nmwarning'] == null) {  $instance['nmwarning'] = 'Warning! Browser obsolete!';}
			if ($instance['nmbgwarning'] == null) {  $instance['nmbgwarning'] = 'ffff00';}
			if ($instance['nmbrdwarning'] == null) {  $instance['nmbrdwarning'] = 'ea3d3d';}
			if ($instance['nmbrdwidthwarning'] == null) {  $instance['nmbrdwidthwarning'] = '4';}

			$arr_browsers = "";
			
			return $instance;  
		}  
		
		function widget($args, $instance) { 

			/* outputs the content of the widget */
			
			$title = apply_filters('widget_title', $instance['title'] );
			$nmwarning = $instance['nmwarning'];
			
			$nmbgwarning = isset( $instance['nmbgwarning'] ) ? $instance['nmbgwarning'] : 'ffff00';
			$nmbrdwarning = isset( $instance['nmbrdwarning'] ) ? $instance['nmbrdwarning'] : 'ea3d3d';
			$nmbrdwidthwarning = isset( $instance['nmbrdwidthwarning'] ) ? $instance['nmbrdwidthwarning'] : '4';
			$nmbrowserinvalid = isset( $instance['nmbrowserinvalid'] ) ? $instance['nmbrowserinvalid'] : 'MSIE';
			$nmiconsize = isset( $instance['nmiconsize'] ) ? $instance['nmiconsize'] : '32';
			
			$nmMSIE = isset( $instance['nmMSIE'] ) ? $instance['nmMSIE'] : true;
			$nmFirefox = isset( $instance['nmFirefox'] ) ? $instance['nmFirefox'] : true;
			$nmChrome = isset( $instance['nmChrome'] ) ? $instance['nmChrome'] : true;
			$nmSafari = isset( $instance['nmSafari'] ) ? $instance['nmSafari'] : true;
			$nmOpera = isset( $instance['nmOpera'] ) ? $instance['nmOpera'] : true;
						
			$arr_browsers = $this->ReturnBrowsers();
			foreach( $arr_browsers as $code => $label )
			{
				${"nmversion".$code} = isset( $instance['nmversion'.$code] ) ? $instance['nmversion'.$code] : '1';
			}


      /* Start Browser Detection */
			$ua = $this->getBrowser();

			/* Condition to show message: */
			
			//$arr_browsers = $this->ReturnBrowsers();
			foreach( $arr_browsers as $code => $label )
			{
				
				if (strtolower($ua['shortname']) == strtolower($code) && $instance['nmbrowserinvalid'.strtolower($code)] == '1' )
				{
				
					$instance['nmversion'.$code] = strip_tags( $new_instance['nmversion'.$code]);
					$testversion = isset( $instance['nmversion'.$code] ) ? $instance['nmversion'.$code] : '1';

					// $instance['nmbrowserinvalid'.strtolower($code)] //true or false!
					// echo "Browser Match: ". $code ."<br/>";
					// echo $ua['version']." - ".${"nmversion".$code};
					
					/* minimum Browser Version */
					$testversion = ${"nmversion".$code};
					
					// echo intval($testversion);
					// echo " :  " .round($ua['version'],2);
					
					if (round($ua['version'],2) < $testversion) {				
						/* Before widget (defined by themes). */
						echo $before_widget;
						/* Display the widget title if one was input (before and after defined by themes). */
						if ( $title )
						echo $before_title . '<div id="nomoreie6please" style="background-color: #'. $nmbgwarning .'; border-style:solid; border-width:'. $nmbrdwidthwarning .'px; border-color:#'. $nmbrdwarning .'; padding:3px 3px;"> <div class="widget-title"><h3 class="widgettitle">'. $title .'</h3></div>' . $after_title;

						$outputbrowser = '<div id="nmbrowserlogo" align="center">';

						if ($nmChrome)
						$outputbrowser .= '<a href="http://www.google.com/chrome/"><img src="' . plugin_dir_url( __FILE__ ) . 'images/'.$nmiconsize.'_chrome.png" alt="Google Chrome" title="Google Chrome" /></a> ';

						if ($nmFirefox)
						$outputbrowser .= '<a href="http://www.mozilla.com/firefox/"><img src="' . plugin_dir_url( __FILE__ ) . 'images/'.$nmiconsize.'_firefox.png" alt="Mozilla Firefox" title="Mozilla Firefox" /></a> ';

						if ($nmMSIE)
						$outputbrowser .= '<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx"><img src="' . plugin_dir_url( __FILE__ ) . 'images/'.$nmiconsize.'_ie.png" alt="Internet Explorer" title="Internet Explorer" /></a> ';

						if ($nmOpera)
						$outputbrowser .= '<a href="http://www.opera.com/download/"><img src="' . plugin_dir_url( __FILE__ ) . 'images/'.$nmiconsize.'_opera.png" alt="Opera" title="Opera" /></a> ';
						
						if ($nmSafari)
						$outputbrowser .= '<a href="http://www.apple.com/safari/download/"><img src="' . plugin_dir_url( __FILE__ ) . 'images/'.$nmiconsize.'_safari.png" alt="Apple Safari" title="Apple Safari" /></a> ';
						
						$outputbrowser .= '</div></div>';
									
						$nmwarning = str_replace( '%ver%', $ua['version'], $nmwarning );
						$nmwarning = str_replace( '%minver%', $testversion, $nmwarning );
						$nmwarning = str_replace( '%browser%', $ua['name'], $nmwarning );
						
						print '<p>' .$nmwarning . $outputbrowser . '</p>';

						/* After widget (defined by themes). */
						echo $after_widget;
						
					}
				}
			}
			$arr_browsers="";
		}  
    
    /* Thanks to "ruudrp" from http://www.php.net/manual/de/function.get-browser.php */
		function getBrowser()
		{
				$u_agent = $_SERVER['HTTP_USER_AGENT'];
				$bname = 'unbekannt';
				$platform = 'unbekannt';
				$version= "";

				//First get the platform?
				if (preg_match('/linux/i', $u_agent)) {
						$platform = 'linux';
				}
				elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
						$platform = 'mac';
				}
				elseif (preg_match('/windows|win32/i', $u_agent)) {
						$platform = 'windows';
				}
			 
				// Next get the name of the useragent yes seperately and for good reason
				if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
				{
						$bname = 'Internet Explorer';
						$ub = "MSIE";
				}
				elseif(preg_match('/Firefox/i',$u_agent))
				{
						$bname = 'Mozilla Firefox';
						$ub = "Firefox";
				}
				elseif(preg_match('/Chrome/i',$u_agent))
				{
						$bname = 'Google Chrome';
						$ub = "Chrome";
				}
				elseif(preg_match('/Safari/i',$u_agent))
				{
						$bname = 'Apple Safari';
						$ub = "Safari";
				}
				elseif(preg_match('/Opera/i',$u_agent))
				{
						$bname = 'Opera';
						$ub = "Opera";
				}
				elseif(preg_match('/Netscape/i',$u_agent))
				{
						$bname = 'Netscape';
						$ub = "Netscape";
				}
			 
				// finally get the correct version number
				$known = array('Version', $ub, 'other');
				$pattern = '#(?<browser>' . join('|', $known) .
				')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
				if (!preg_match_all($pattern, $u_agent, $matches)) {
						// we have no matching number just continue
				}
			 
				// see how many we have
				$i = count($matches['browser']);
				if ($i != 1) {
						//we will have two since we are not using 'other' argument yet
						//see if version is before or after the name
						if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
								$version= $matches['version'][0];
						}
						else {
								$version= $matches['version'][1];
						}
				}
				else {
						$version= $matches['version'][0];
				}
			 
				// check if we have a number
				if ($version==null || $version=="") {$version="?";}
			 
				return array(
						'userAgent' => $u_agent,
						'name'      => $bname,
						'version'   => $version,
						'platform'  => $platform,
						'pattern'    => $pattern,
						'shortname' => $ub
				);
		} 
}
    
add_action( 'widgets_init', create_function('', 'return register_widget("NoMoreIE6Please");') );
?>