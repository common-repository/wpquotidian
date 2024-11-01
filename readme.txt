=== WPQuotidian ===
Contributors: thisbrucesmith
Donate link: http://www.bsmithsolutions.com/wordpress/plugins/wpquotidian/
Tags: quotes, widgets
Requires at least: 3.3
Tested up to: 3.3
Stable tag: trunk

A simple plugin that displays a random or daily quote in a widget.

== Description ==

WPQuotidian is a simple plugin that displays a random or daily quote in a widget. You can use the provided text file with inspirational quotes, edit it, or upload your own. Up to 366 daily quotes with attributions are allowed. If using the random option, you can have as many quotes and attributions as you like.

== Installation ==

1. Download and unzip `WPQuotidian.zip`
2. Upload the resulting WPQuotidian folder to the /wp-content/plugins directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Optionally, customize the quotes.txt file. (Do NOT rename the file; ONLY "quotes.txt" is recognized in this release.)
5. Drag the Quotidian widget into any sidebar and assign a title ("Thought for the Day", etc.)
6. For a random quote with each page or post, check the "Make Random" box; for daily quotes leaved unchecked.
7. Click "Save" to save your settings.

== Frequently Asked Questions ==

= Can I change the quotes in the "quotes.txt" file?  =

Yes. Either open quotes.txt in the Plugin Editor interface and add or subtract lines, or upload your own file. Just be sure to use the pipe character ("|") between your quote and attribution as shown in the sample quotes.txt file. Don't change the name of quotes.txt or the plugin will not work correctly. Also, make sure there are no blank lines within or at the end of your quotes.txt file. If you're upgrading from the previous version and have changed the "quotes.txt" file, be sure to back up your "quotes.txt" before proceeding. Then copy it back into the plugin folder after the new version is installed.

= I added or subtracted lines from quotes.txt; why did my quote change in my widget? =

If you choose the daily option to display quotes, WPQuotidian cycles through all the quotes in order from top to bottom of the quotes.txt file and determines today's quote based on the day of the year and the number of lines in the file. Adding or subtracting lines from the file will cause the selected quote to fall lower or higher in the list than it did before the file was changed. If you choose the "make random" option this does not apply.

= Can I do anything about the text being in italics or the dash before the attribution? =

Not for this release. If there is interest I will work on building more options into the plugin for a future release.

== Screenshots ==

1. You can use the Wordpress plugin editor to customize the quotes.txt file. Note the format with the pipe ("|") between each quote and attribution.
2. When ready, just drag the widget into whatever area you want, set the title, choose daily or random display, and "Save".

== Changelog ==

= 0.6 =
* Added random option to allow a different quote each time a new page or post is loaded.
* Added some quotes and attributions for those who use the quotes.txt file provided.

= 0.5 =
* Initial release.

== Upgrade Notice ==
 
 This is release 0.6, the second release of WPQuotidian. This release has only been tested on Wordpress 3.3, so if you are using an older version of Wordpress I cannot guarantee WPQuotidian 0.6 will work for you. Please note: If you are upgrading from release 0.5 and have changed the quotes.txt file, be sure to back it up before upgrading to release 0.6. After the upgrade is complete you can deactivate the plugin, copy your quotes.txt file back into the WPQuotidian plugin directory, and reactivate the plugin, and all should be well.