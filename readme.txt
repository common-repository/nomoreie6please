=== NoMoreIE6Please ===
Contributors: gilu
Donate link: http://download.cornhole.ch/nomoreie6please/
Tags: browser, ie6, stop ie6, kill ie6
Requires at least: 3.0
Tested up to: 3.3.1 
Stable tag: 1.2

NoMoreIE6Please displays a custom message to update to new browser as specified.

== Description ==
NoMoreIE6Please is a widget for WordPress which displays a custom message to update to new browser as specified.
You can specify MSIE minimum version 7, meaning, if the user has MSIE 6, a custom message is displayed. Specify Firefox version 13, well, pretty much any Firefox will get this message then.

You can also choose the size of the icons to display, and which browsers you want to show to the MSIE6 user.
I.E. disable MSIE and Firefox, then it'll display only Chrome, Safari and Opera download link.

== Installation ==
1. Upload directory `nomoreie6please` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place the widget 'nomoreie6please' wherever you like
1. Customize it.
1. Done.

== Frequently Asked Questions ==
= Can I display the current browser and version? =

Sure! Just add somewhere in the warning message %ver% for version and %browser% for browser.
New in 1.2: Add %minver% to show minimum allowed version to user.


== Screenshots ==
1. Widget after inserting into the sidebar
2. Widget at work

== Changelog ==

= 1.2 =
* Added possibility to individually set each browser with it's minimum allowed version.
* Added %minver% variable to warning message to show minimum allowed version to user.
* Repaired the getBrowser function. It sometimes showed an error message.
* Need to round browser version to two digits (1.2.3 is not a number!).

= 1.1 =
* Added Border Width and Border and Background Color to Widget Admin (screenshot is up to date)
* Insert default values for Title, Border and Background Color if left blank.
* To be safe, requires at least WordPress 3.0. I don't have a way to test all versions. Sorry.
* Typo in readme.txt
* Some Code cleanup

= 1.0 =
* April 11. 2012 - First release.

== Upgrade Notice ==

= 1.2 =
* Individually set each browser with it's minimum allowed version.
* Added %minver% variable.
* Bugfix

= 1.1 =
* Updated a few admin things.
* WordPress 3.0 as minimum requirement.

= 1.0 =
* you want it, install it.