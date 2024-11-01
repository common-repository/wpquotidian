<?php
/*
 * Plugin Name: WPQuotidian
 * Version: 0.6
 * Plugin URI: http://www.bsmithsolutions.com/wordpress/plugins/wpquotidian/
 * Description: WPQuotidian generates a daily or random quote from a text file and displays it in a widget. You can have up to 366 daily quotes or as many random quotes as you like in the file, using the provided text file or one you create yourself.
 * Author: Bruce Smith (thisbrucesmith)
 * Author URI: http://www.bsmithsolutions.com/
*/
/*
 Copyright 2011  Bruce E. Smith  (email : bruce_e_smith@yahoo.com)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License, version 2, as 
 published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
class WPQuotidianWidget extends WP_Widget
{
	/**
	* Declares the WPQuotidianWidget class.
	*
	*/
	function WPQuotidianWidget(){
		$widget_ops = array('classname' => 'widget_WPQuotidian', 'description' => __( "Widget to display a quote of the day") );
		$control_ops = array('width' => 300, 'height' => 300);
		$this->WP_Widget('quotidian', __('Quotidian'), $widget_ops, $control_ops);
	}
	
	/**
	* Find which quote from the quotes file to display
	*
	*/
	function getQuoteLine($randomchecked){
		
		# initialization
		$dayOfYear = date("z")+1;
		$fileName = "quotes.txt";
		
		# open the quotes file and get the number of lines
		$quoteFile = fopen($fileName, "r", 1);
		$lineCount = count(file($fileName, 1));
		
		# figure out what line we need from the file
		# random quote
		if ( $randomchecked ) $linePosition = rand(1, $lineCount);
		else
			# daily quote
			{
			if ($dayOfYear < $lineCount) $linePosition = $dayOfYear;
				else $linePosition = $dayOfYear % $lineCount;
			}
		$lineNumber = 1;
		do {
			$currentQuote = fgets($quoteFile);
			$lineNumber++;
		} while ($lineNumber < $linePosition);
	
		# clean up the file handle and return the current quote
		fclose($quoteFile);
		
		return $currentQuote;
		}
			
		
	/**
	* Displays the Widget
	*
	*/
	function widget($args, $instance){
		extract($args);
		$randomchecked = isset( $instance['randomchecked'] ) ? $instance['randomchecked'] : false;
		$quoteLine = $this->getQuoteLine($randomchecked);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);
		$quotation = empty($instance['quotation']) ?  substr($quoteLine, 0, strpos($quoteLine, "|")): $instance['quotation'];
		$attribution = empty($instance['attribution']) ? "- " . substr($quoteLine, strpos($quoteLine, "|")+1) : $instance['attribution'];
		
		# Before the widget
		echo $before_widget;
		
		# The title
		if ( $title )
			echo $before_title . $title . $after_title;
		
		# Make the WPQuotidian widget
		echo '<div style="font-style:italic;padding:10px;">' . $quotation . '<br />' . $attribution . "</div>";
		
		# After the widget
		echo $after_widget;
	}
	
	/**
	* Saves the widgets settings.
	*
	*/
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['quotation'] = strip_tags(stripslashes($new_instance['quotation']));
		$instance['attribution'] = strip_tags(stripslashes($new_instance['attribution']));
		$instance['randomchecked'] = $new_instance['randomchecked'];
		
		return $instance;
	}
	
	/**
	* Creates the edit form for the widget.
	*
	*/
	function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'randomchecked'=>'off') );
		
		$title = htmlspecialchars($instance['title']);
		$randomchecked = htmlspecialchars($instance['randomchecked']);
		
		
		
		# Output the options
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('title') . '">' . __('Title:') . ' <input style="width: 250px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';
		echo '<p><label for="' . $this->get_field_name('randomchecked') . '">' . __('Make Random? ') . ' <input id="' . $this->get_field_id('randomchecked') . '" name="' . $this->get_field_name('randomchecked') . '" type="checkbox" ' . checked( $instance['randomchecked'], on, false ) . ' /></label></p>';
	}

}// END class
	
	/**
	* Register WPQuotidian widget.
	*
	* Calls 'widgets_init' action after the WPQuotidian widget has been registered.
	*/
	function WPQuotidianInit() {
	register_widget('WPQuotidianWidget');
	}	
	add_action('widgets_init', 'WPQuotidianInit');
?>