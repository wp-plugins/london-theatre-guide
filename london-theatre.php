<?php /*

Plugin Name: London Theatre Guide
Version: 1.0
Plugin URI: http://www.londondrum.com/events/?page_id=5270
Description: Displays a list of upcoming theatre shows in London. All of the big theatres are included, with everything from big West End plays to stage musicals and Shakespearean tragedies. 
Author: London Drum
Author URI: http://www.londondrum.com/

Copyright (c) 2009
Released under the GPL license
http://www.gnu.org/licenses/gpl.txt

    This file is part of WordPress.
    WordPress is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
	
*/


function london_theatre_shows() {

	$itemnum = get_option('choose_itemnum');
		if($itemnum==''){$itemnum='5';}
	$itemdescr = get_option('choose_itemdescr');
		if($itemdescr==''){$itemdescr='true';}
	$hidedate = get_option('choose_hidedate');
		if($hidedate==''){$hidedate='true';}
	$itemdate = get_option('choose_itemdate');
		if($itemdate==''){$itemdate='d MMMM, yyyy';}
	
	echo "<div id=\"london_events\"><script src=\"http://feeds.feedburner.com/LondonTheatreShows?format=sigpro&nItems=".$itemnum."&displayExcerpts=".$itemdescr."&displayDate=".$hidedate."&dateFormat=".$itemdate."\" type=\"text/javascript\"></script><br style=\"clear:left;\"><sub><a href=\"http://www.londondrum.com/events/?cat=33\">London West End theatre guide</a></sub></div>";

}

function modify_menu() { // creates the admin page

	add_options_page(
	'London Theatre Guide', 'London Theatre Guide', 'manage_options', _File_, 'admin_londonevents_options'
	);
	
} add_action('admin_menu','modify_menu'); 

function admin_londonevents_options() { // creates the admin settings

	Print("<div style=\"margin:10px 6px 8px 0;padding:0 14px 0 14px;border:1px solid #CCC;\">
	<h2 style=\"margin:3px -11px 8px;padding:3px 6px;background:#999;color:#FAFAFA;font:bold 22px/22px arial,verdana,sans-serif;text-transform:uppercase;\">London Theatre Guide</h2>");
	
	if($_POST['submit']) {
		upate_londonevents_options();
	}
	
	print_londonevents_form();

}

function upate_londonevents_options(){ // creates the admin content

	if($_POST['choose_itemnum']) {
		update_option('choose_itemnum', $_POST['choose_itemnum']);
	}
	if($_POST['choose_itemdescr']) {
		update_option('choose_itemdescr', $_POST['choose_itemdescr']);
	}
	if($_POST['choose_hidedate']) {
		update_option('choose_hidedate', $_POST['choose_hidedate']);
	}
	if($_POST['choose_itemdate']) {
		update_option('choose_itemdate', $_POST['choose_itemdate']);
	}
	if($_POST['event_styles']) {
		update_option('event_styles', $_POST['event_styles']);
	}
	
}

function print_londonevents_form() { // prints out the admin settings

	$itemnum = get_option('choose_itemnum');
		if($itemnum==''){$itemnum='5';}
	$itemdescr = get_option('choose_itemdescr');
		if($itemdescr==''){$itemdescr='true';}
	$hidedate = get_option('choose_hidedate');
		if($hidedate==''){$hidedate='true';}
	$itemdate = get_option('choose_itemdate');
		if($itemdate==''){$itemdate='d MMMM, yyyy';}
	$styles = get_option('event_styles');
		if($styles==''){$styles='#london_events {   // main containing block
	background: transparent; border: none;
	}
#london_events li {   // containing block for each show
	display: block; clear: both; padding-bottom: 2px;
	}
#london_events li .headline {   // link to the show
	display: block; clear: both; font-size: 1.2em;
	}
#london_events li .date {   // date of the show
	color: #666; margin: 0;
	}
#london_events li div p img {   // image of the show
	display: inline; float: left; margin: 0 10px 6px 0 !important; border: 1px solid #CCC; vertical-align: top;
	}
#london_events sub {   // credit
	display: block; clear: both; margin-top: 6px;
	}';}

	echo "<div style=\"float:right;width:300px;margin:0 -6px 8px 1.2em;padding:0 10px 12px 12px;background:#FDFDFD;color:#555;border:1px solid #CCC;\">
	<p>Want to know where the events come from?</p>
	<p>The events are kept fresh at <a href=\"http://www.londondrum.com/\">www.londondrum.com</a>, so you&#8217;d need never worry about updating them.</p>
	</div>";
	
	echo "<p>There is a preview of the feed at the bottom of the page.</p>";
	
		
		echo "<h3 style=\"color:#444;font:bold 16px/16px arial,verdana,sans-serif;text-transform:uppercase;\">Step 1: &nbsp;<span style=\"color:#777;text-transform:none;\">Choose the number of shows</span></h3>
	
	<p>You can include between 1 and 10 shows:</p>";
	
		
		echo "<form method=\"post\">
			<select name=\"choose_itemnum\">
				
					<option value=\"1\"";
					if($itemnum == '1') { echo " selected=selected"; }
					echo ">1&nbsp;&nbsp;</option>
				
					<option value=\"2\"";
					if($itemnum == '2') { echo " selected=selected"; }
					echo ">2&nbsp;&nbsp;</option>
				
					<option value=\"3\"";
					if($itemnum == '3') { echo " selected=selected"; }
					echo ">3&nbsp;&nbsp;</option>
				
					<option value=\"4\"";
					if($itemnum == '4') { echo " selected=selected"; }
					echo ">4&nbsp;&nbsp;</option>
				
					<option value=\"5\"";
					if($itemnum == '5') { echo " selected=selected"; }
					echo ">5&nbsp;&nbsp;</option>
				
					<option value=\"6\"";
					if($itemnum == '6') { echo " selected=selected"; }
					echo ">6&nbsp;&nbsp;</option>
				
					<option value=\"7\"";
					if($itemnum == '7') { echo " selected=selected"; }
					echo ">7&nbsp;&nbsp;</option>
				
					<option value=\"8\"";
					if($itemnum == '8') { echo " selected=selected"; }
					echo ">8&nbsp;&nbsp;</option>
				
					<option value=\"9\"";
					if($itemnum == '9') { echo " selected=selected"; }
					echo ">9&nbsp;&nbsp;</option>
				
					<option value=\"10\"";
					if($itemnum == '10') { echo " selected=selected"; }
					echo ">10&nbsp;&nbsp;</option>
					
				</select>
			<input type=\"submit\" name=\"submit\" value=\"Submit\">
		</form>";
		
		echo "<h3 style=\"color:#444;font:bold 16px/16px arial,verdana,sans-serif;text-transform:uppercase;\">Step 2: &nbsp;<span style=\"color:#777;text-transform:none;\">Show / hide the image and description</span></h3>
	
	<p>If you wish, you can choose to hide the image and description, and just show the title and date.</p>";
	
		
		echo "<form method=\"post\">
			<select name=\"choose_itemdescr\">
				
					<option value=\"true\"";
					if($itemdescr == 'true') { echo " selected=selected"; }
					echo ">Show the title, date, image and description&nbsp;&nbsp;</option>
				
					<option value=\"false\"";
					if($itemdescr == 'false') { echo " selected=selected"; }
					echo ">Show the title and date, but hide the image and description&nbsp;&nbsp;</option>
					
				</select>
			<input type=\"submit\" name=\"submit\" value=\"Submit\">
		</form>";
		
		echo "<h3 style=\"color:#444;font:bold 16px/16px arial,verdana,sans-serif;text-transform:uppercase;\">Step 3: &nbsp;<span style=\"color:#777;text-transform:none;\">Show / hide the date</span></h3>
	
	<p>If you wish, you can choose to hide the date.</p>";
	
		echo "<form method=\"post\">
			<select name=\"choose_hidedate\">
				
					<option value=\"true\"";
					if($hidedate == 'true') { echo " selected=selected"; }
					echo ">Show the date&nbsp;&nbsp;</option>
				
					<option value=\"false\"";
					if($hidedate == 'false') { echo " selected=selected"; }
					echo ">Hide the date&nbsp;&nbsp;</option>
					
				</select>
			<input type=\"submit\" name=\"submit\" value=\"Submit\">
		</form>";
		
		echo "<h3 style=\"color:#444;font:bold 16px/16px arial,verdana,sans-serif;text-transform:uppercase;\">Step 4: &nbsp;<span style=\"color:#777;text-transform:none;\">Change the date format</span></h3>
	
	<p>This next part allows you to change how the date displays.<br>
	(This will obviously have no effect if you decide to hide the date.)</p>";
	
		echo "<form method=\"post\">
			<select name=\"choose_itemdate\">
				
					<option value=\"d/M/yyyy\"";
					if($itemdate == 'd/M/yyyy') { echo " selected=selected"; }
					echo ">25/12/2099&nbsp;&nbsp;</option>
				
					<option value=\"d-M-yyyy\"";
					if($itemdate == 'd-M-yyyy') { echo " selected=selected"; }
					echo ">25-12-2099&nbsp;&nbsp;</option>
					
					<option value=\"M/d/yyyy\"";
					if($itemdate == 'M/d/yyyy') { echo " selected=selected"; }
					echo ">12/25/2099&nbsp;&nbsp;</option>
					
					<option value=\"M-d-yyyy\"";
					if($itemdate == 'M-d-yyyy') { echo " selected=selected"; }
					echo ">12-25-2099&nbsp;&nbsp;</option>
				
					<option value=\"d MMM, yyyy\"";
					if($itemdate == 'd MMM, yyyy') { echo " selected=selected"; }
					echo ">25 Dec, 2099&nbsp;&nbsp;</option>
				
					<option value=\"MMM d, yyyy\"";
					if($itemdate == 'MMM d, yyyy') { echo " selected=selected"; }
					echo ">Dec 25, 2099&nbsp;&nbsp;</option>
				
					<option value=\"d MMMM, yyyy\"";
					if($itemdate == 'd MMMM, yyyy') { echo " selected=selected"; }
					echo ">25 December, 2099&nbsp;&nbsp;</option>
				
					<option value=\"MMMM d, yyyy\"";
					if($itemdate == 'MMMM d, yyyy') { echo " selected=selected"; }
					echo ">December 25, 2099&nbsp;&nbsp;</option>
					
				</select>
			<input type=\"submit\" name=\"submit\" value=\"Submit\">
		</form>";
		
		echo "<h3 style=\"color:#444;font:bold 16px/16px arial,verdana,sans-serif;text-transform:uppercase;\">Step 5: &nbsp;<span style=\"color:#777;text-transform:none;\">Change the styles</span></h3>
		<p>This next section shows the current CSS styles. You can change them to whatever you like.</p>";
		
		echo "<form method=\"post\">
				
			<textarea name=\"event_styles\" style=\"font-size:10px;\" cols=\"100\" rows=\"14\">".$styles."</textarea>

			<input type=\"submit\" name=\"submit\" value=\"Submit\">
		</form>";
		
		echo "<h3 style=\"color:#444;font:bold 16px/16px arial,verdana,sans-serif;text-transform:uppercase;\">Step 6: &nbsp;<span style=\"color:#777;text-transform:none;\">Add the shows to your site</span></h3>
		<p>There are two ways of adding the shows to your web page.<br>
		1) You can navigate to 'Appearance > Widgets' and drag the 'London Theatre Guide' widget onto your sidebar<br>
		2) You can add the following line to one of your Wordpress templates, where you&#8217;d like the shows to appear:</p>
		<div style=\"width:70%;padding:1em;background:#FFF;border:1px solid #AAA;\"><code>&lt;?php london_theatre_shows(); ?&gt;</code></div>";
		
		echo "<h3 style=\"margin-top:30px;color:#444;font:bold 16px/16px arial,verdana,sans-serif;text-transform:uppercase;\">Preview of the feed</span></h3>
		<div style=\"width:70%;margin-bottom:.1em;padding:1em 1em .5em;background:#FFF;border:1px solid #AAA;\"><div id=\"london_events\">";
		
		echo "<script src=\"http://feeds.feedburner.com/LondonTheatreShows?format=sigpro&nItems=".$itemnum."&displayExcerpts=".$itemdescr."&displayDate=".$hidedate."&dateFormat=".$itemdate."\" type=\"text/javascript\"></script>";
	
	echo "</div></div><p>A very small one-line credit will appear underneath the listing.<br>If you appreciate all of the hard work that we put in every day to keep these listings up-to-date, then we'd be grateful if you leave it in place. You can, of course, style it however you wish to match your site.</p></div>";

}

function londonevents_styles() { // adds the custom styles to the header

	$styles = get_option('event_styles');
		if($styles==''){$styles='#london_events {   // main containing block
	background: transparent; border: none;
	}
#london_events li {   // containing block for each show
	display: block; clear: both; padding-bottom: 2px;
	}
#london_events li .headline {   // link to the show
	display: block; clear: both; font-size: 1.2em;
	}
#london_events li .date {   // date of the show
	color: #666; margin: 0;
	}
#london_events li div p img {   // image of the show
	display: inline; float: left; margin: 0 10px 6px 0 !important; border: 1px solid #CCC; vertical-align: top;
	}
#london_events sub {   // credit
	display: block; clear: both; margin-top: 6px;
	}';}
	echo "<style type=\"text/css\">".$styles."
	#creditfooter{display:none;}</style>";
  
} add_action('wp_head', 'londonevents_styles'); add_action('admin_head', 'londonevents_styles');

function widget_londonevents($args) { // widgetizes the events function
  extract($args);
  $options = get_option("widget_londonevents");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'Upcoming shows'
      );
  }      
  echo $before_widget;
  echo $before_title;echo $options['title'];echo $after_title;
  london_theatre_shows();
  echo $after_widget;
}

function londonevents_control()
{ $options = get_option("widget_londonevents");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'Upcoming shows'
      );
  } if ($_POST['londonevents-Submit'])
  {
    $options['title'] = htmlspecialchars($_POST['londonevents-WidgetTitle']);
    update_option("widget_londonevents", $options);
  } ?>
  <p>
    <label for="londonevents-WidgetTitle">Title: </label>
    <input type="text" id="londonevents-WidgetTitle" name="londonevents-WidgetTitle" value="<?php echo $options['title']; ?>" />
	<input type="hidden" id="londonevents-Submit" name="londonevents-Submit" value="1" />
  </p>
<?php }

function londonevents_init()
{
  register_sidebar_widget(__('London Theatre Guide'), 'widget_londonevents'); 
  register_widget_control(   'London Theatre Guide', 'londonevents_control', 200, 200 );
}
add_action("plugins_loaded", "londonevents_init");

?>