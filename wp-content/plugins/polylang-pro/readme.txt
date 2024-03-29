=== Polylang ===
Contributors: Chouby, manooweb
Donate link: http://polylang.pro
Tags: multilingual, bilingual, translate, translation, language, multilanguage, international, localization
Requires at least: 4.7
Tested up to: 5.2
Stable tag: 2.6
License: GPLv3 or later

Making WordPress multilingual

== Description ==

= Features  =

Polylang allows you to create a bilingual or multilingual WordPress site. You write posts, pages and create categories and post tags as usual, and then define the language for each of them. The translation of a post, whether it is in the default language or not, is optional.

* You can use as many languages as you want. RTL language scripts are supported. WordPress languages packs are automatically downloaded and updated.
* You can translate posts, pages, media, categories, post tags, menus, widgets...
* Custom post types, custom taxonomies, sticky posts and post formats, RSS feeds and all default WordPress widgets are supported.
* The language is either set by the content or by the language code in url, or you can use one different subdomain or domain per language
* Categories, post tags as well as some other metas are automatically copied when adding a new post or page translation
* A customizable language switcher is provided as a widget or in the nav menu

> The author does not provide support on the wordpress.org forum. Support and extra features are available to [Polylang Pro](http://polylang.pro) users.

If you wish to migrate from WPML, you can use the plugin [WPML to Polylang](http://wordpress.org/plugins/wpml-to-polylang/)

If you wish to use a professional or automatic translation service, you can install [Lingotek Translation](http://wordpress.org/plugins/lingotek-translation/), as an addon of Polylang. Lingotek offers a complete translation management system which provides services such as translation memory or semi-automated translation processes (e.g. machine translation > human translation > legal review).

= Credits =

Thanks a lot to all translators who [help translating Polylang](http://translate.wordpress.org/projects/wp-plugins/polylang).
Thanks a lot to [Alex Lopez](http://www.alexlopez.rocks/) for the design of the logo.
Most of the flags included with Polylang are coming from [famfamfam](http://famfamfam.com/) and are public domain.
Wherever third party code has been used, credit has been given in the code’s comments.

= Do you like Polylang? =

Don't hesitate to [give your feedback](http://wordpress.org/support/view/plugin-reviews/polylang#postform).

== Installation ==

1. Make sure you are using WordPress 4.7 or later and that your server is running PHP 5.2.4 or later (same requirement as WordPress itself)
1. If you tried other multilingual plugins, deactivate them before activating Polylang, otherwise, you may get unexpected results!
1. Install and activate the plugin as usual from the 'Plugins' menu in WordPress.
1. Go to the languages settings page and create the languages you need
1. Add the 'language switcher' widget to let your visitors switch the language.
1. Take care that your theme must come with the corresponding .mo files (Polylang automatically downloads them when they are available for themes and plugins in this repository). If your theme is not internationalized yet, please refer to the [Theme Handbook](http://developer.wordpress.org/themes/functionality/internationalization/) or ask the theme author to internationalize it.

== Frequently Asked Questions ==

= Where to find help ? =

* First time users should read [Polylang - Getting started](http://polylang.pro/doc-category/getting-started/), which explains the basics with a lot of screenshots.
* Read the [documentation](http://polylang.pro/doc/). It includes a [FAQ](http://polylang.pro/doc-category/faq/) and the [documentation for developers](http://polylang.pro/doc-category/developers/).
* Search the [community support forum](http://wordpress.org/search/). You will probably find your answer here.
* Read the sticky posts in the [community support forum](http://wordpress.org/support/plugin/polylang).
* If you still have a problem, open a new thread in the [community support forum](http://wordpress.org/support/plugin/polylang).
* [Polylang Pro](http://polylang.pro) users have access to our helpdesk.

= Is Polylang compatible with WooCommerce? =

* You need a separate addon to make Polylang and WooCommerce work together. [A Premium addon](http://polylang.pro/downloads/polylang-for-woocommerce/) is available.

= Do you need translation services? =

* If you want to use professional or automatic translation services, install and activate the [Lingotek Translation](http://wordpress.org/plugins/lingotek-translation/) plugin.

== Screenshots ==

1. The Polylang languages admin panel
2. The Strings translations admin panel
3. Multilingual media library
4. The Edit Post screen with the Languages metabox

== Changelog ==

= 2.6 (2019-06-26) =

* Pro: Remove all languages files. All translations are now maintained on TranslationsPress
* Pro: Move the languages metabox to a block editor plugin
* Pro: Better management of user capabilities when synchronizing posts
* Pro: Separate REST requests from the frontend
* Pro: Copy the post slug when duplicating a post
* Pro: Duplicate ACF term metas when terms are automatically duplicated when creating a new post translation
* Pro: Fix hierarchy lost when duplicating terms
* Pro: Fix page shared slugs with special characters
* Pro: Fix synchronized posts sharing their slug when the language is set from the content
* Pro: Fix PHP warning with ACF Pro 5.8.1
* Pro: Fix ACF clone fields not translated in repeaters
* Better management of user capablities when synchronizing taxonomies terms and custom fields
* Extend string translations search to translated strings #207
* Update plugin updater to 1.6.18
* Honor the filter `pll_flag` when performing the flag validation when creating a new language
* Modify the title and the label for the language switcher menu items #307
* Add support for international domain names
* Add a title to the link icon used to add a translation #325
* Add a notice when a static front page is not translated in a language
* Add support for custom term fields in wpml-config.xml
* Add filter `pll_admin_languages_filter` for the list of items the admin bar language filter
* Add compatibility with WP Offload Media Lite. Props Daniel Berkman
* Yoast SEO: Add post type archive url in all languages to the sitemap
* Fix www. not redirected to not www. for the home page in multiple domains #311
* Fix cropped images not being synchronized
* Fix auto added page to menus when the page is created with the block editor
* Fix embed of translated static front page #318
* Fix a possible infinite redirect if the static front page is not translated
* Fix incorrect behavior of action 'wpml_register_single_string' when updating the string source
* Fix fatal error with Jetpack when no languages has been defined yet #330
* Fix a conflict with Laravel Valet. Props @chesio. #250
* Fix a conflict with Thesis.
* Fix a conflict with Pods in the block editor. Props Jory Hogeveen. #369
* Fix fatal error with Twenty Fourteen introduced in version 2.5.4. #374

= 2.5.4 (2019-05-28) =

* Add Kannada to the predefined languages list
* Yoast SEO: Fix primary product cat not copied or synchronized
* WPMU Domain Mapping: Fix incorrect domain used for the theme
* Fix style-rtl.css not loaded when the language is set from the content #356
* Fix Jetpack featured pages not working. Props Anis Ladram. #357
* Fix Call to undefined function wp_generate_attachment_metadata()

= 2.5.3 (2019-04-16) =

* Add de_AT and pt_AO to the predefined languages list
* Pro: Add filter pll_translate_blocks
* Pro: fix PHP notice when the queried post type has been modified to an array
* Pro: fix PHP warning when combined with The Event Calendar and Page builder by SiteOrigin

= 2.5.2 (2019-02-12) =

* Pro: Fix translated slugs not accepting forward slashes
* Pro: Fix fatal error with ACF Pro 5.7.11
* Fix parent categories incorrectly synchronized #327

= 2.5.1 (2019-01-16) =

* Security: Fix categories and media duplication not protected from CSRF
* Pro: Allow to update the plugin with WP CLI
* Pro: Fix search in the button block not filtered in the correct language (needs WP 5.1)
* Add Saraiki to the predefined languages list
* Fix a conflict causing a blank page with Divi

= 2.5 (2018-12-06) =

* Add compatibility with WP 5.0
* Fix custom flags when the WP content folder is not in the WP install folder
* Fix PHP notice if a language has no flag

= 2.4.1 (2018-11-27) =

* Pro: Add compatibility with REST API changes made in WP 5.0
* Pro: Fix sticky posts in the REST API
* Pro: Fix overwritten custom post slug when the post is updated with the REST API
* Pro: Fix bulk translate for media
* Fix a conflict with Custom sidebars and Content aware sidebars
* Fix a conflict with the theme Pokemania
* Fix PHP notices when using the function 'icl_link_to_element' for terms
* Fix title slugs for posts written in German

= 2.4 (2018-11-12) =

* Minimum WordPress version is now 4.7
* Pro: Add the possibility to bulk duplicate or bulk synchronize posts.
* Pro: Add compatibility with Admin Columns
* Pro: Add synchronized posts to the REST API
* Pro: Fix variations messed when changing WooCommerce attributes slugs
* Pro: Fix incorrect language for ajax requests made on front by The Events Calendar
* Pro: Fix term not duplicated correctly when the language is set from the content
* Refactor the core to activate on front and for the REST api actions that were previously available only in the backend (language checks, synchronizations...).
* Add flags to widgets displayed in only one language (Props Jory Hogeveen) #257
* Honor the filter 'pll_the_language_args' for all options in menus #237
* Add better filters for default flags and custom flags
* Custom flags can now be stored in the polylang directory in the theme
* Custom flags can now use SVG
* Add compatibility with Jetpack featured content module
* Fix Twenty Fourteen featured posts possibly not filtered per language
* Fix home url not working with WordPress MU Domain mapping
* Fix Assigning a parent category breaking the hierarchy of translated category
* Fix: Accept 0,1 and 1.0 as q factors in browser preferred language detection (Props Dominic Rubas)
* Fix performance issue when using hundreds of widgets
* Fix translations possibly wrong if the post language is changed without saving the post after

See [changelog.txt](http://plugins.svn.wordpress.org/polylang/trunk/changelog.txt) for older changelog
