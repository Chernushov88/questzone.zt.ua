<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="content">
	<a href="/">Перейти к главной странице</a>
</div>
<style type="text/css">
/*html, body {width:100%;height:100%;overflow:hidden;margin:0px;padding:0px;font-family:'Open Sans',sans-serif;font-size:16px}
body {background:url('/404.png') center no-repeat #333039}*/
.content {background:url('/404.png') center no-repeat #333039; width:100%;text-align:center; position: absolute; bottom: 200px;  top: 120px;}
.content a {display:inline-block;text-decoration:none;    bottom: 50px; position: absolute; left: 0; right: 0; margin: 0 auto;}
.content a, .content a:hover {color:rgba(255,255,255,0.3);}
.content a:hover {color:rgba(255,255,255,0.5);}
/*@media only screen and (max-width: 460px), screen and (max-height: 700px) {
.content {position:static;}
.content a {display:block;width:100%;height:100%;position:absolute;top:0px;left:0px;font-size:0px;opacity:0;}
body {background-size:cover}
}*/
.qroom-footer{position: fixed;bottom:0;width: 100%;}
</style>
<?php get_footer(); ?>
 