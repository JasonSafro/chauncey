<?php $options = get_option('infinite_options'); ?>
<?php $template_dir = get_template_directory_uri(); ?>

<?php $choose_global_color = $options['choose_global_color']; ?>
<?php $select_title_position = $options['select_title_position']; ?>

/* Custom Color */

input.submit, input.submit:focus, input.submit:active {
	background: <?php echo $choose_global_color; ?>;
}
a { 
	color: <?php echo $choose_global_color; ?>;
}
#footer-bottom a:hover {
	color: <?php echo $choose_global_color; ?>;
}
::selection {
	background-color: <?php echo $choose_global_color; ?> !important;
}
#primary-menu .current {
	background-color: <?php echo $choose_global_color; ?>;
}
.fixed #primary-menu .current {	background-color: <?php echo $choose_global_color; ?>; 
}	
.team-member-info .social-personal li a:hover {
	color: <?php echo $choose_global_color; ?>;
}
.skills-graph li span {
	background-color: <?php echo $choose_global_color; ?>;
}
.archive-list a {
	color:<?php echo $choose_global_color; ?> !important; 
}
.section-title, .page-title {
	background-color: <?php echo $choose_global_color; ?>;
}
.services div:hover, .services div:hover a {
	background-color:<?php echo $choose_global_color; ?>; 
}
.grey:hover { background-color:<?php echo $choose_global_color; ?>; }
.highlight1 {
	background-color: <?php echo $choose_global_color; ?>;
}
.item-info-overlay {
	background-color: <?php echo $choose_global_color; ?>;
}
ul.item-nav li:hover {
	background-color: <?php echo $choose_global_color; ?>;
}
.contact-success {
	background-color: <?php echo $choose_global_color; ?>;
}
.form .contact-error {
    color: <?php echo $choose_global_color; ?>;
}
.widget ul#recentcomments a.url:hover {
    color: <?php echo $choose_global_color; ?>;
}
.flex-direction-nav li a, .tp-leftarrow.large:hover, .tp-rightarrow.large:hover { background-color: <?php echo $choose_global_color; ?> !important; }

.widget a:hover {
	color: <?php echo $choose_global_color; ?>;
}
.widget ul#recentcomments a.author:hover {
	color: <?php echo $choose_global_color; ?>;
}
.post-title h2.title a:hover {
	color: <?php echo $choose_global_color; ?>;
}
.post-meta a:hover {
	color: <?php echo $choose_global_color; ?>;
}
.post-info div.date {
	background-color: <?php echo $choose_global_color; ?>;
}
.comment .author a:hover {
	color: <?php echo $choose_global_color; ?>;
}
.comment .comment-meta .reply:hover {
	background-color:<?php echo $choose_global_color; ?>; 
}
.wp-pagenavi span.current {
	background-color: <?php echo $choose_global_color; ?>;
}
.tagcloud a:hover {
	background-color: <?php echo $choose_global_color; ?>;
}

.flickr_badge_image:hover {border-color:<?php echo $choose_global_color; ?>;}
.tagcloud a:hover, .footer-widget-column .tagcloud a:hover {background-color:<?php echo $choose_global_color; ?>;}

.filterable li.current a {
	color:<?php echo $choose_global_color; ?> !important;
	border-top: 1px solid <?php echo $choose_global_color; ?> !important;
}

.filterable li a:hover {
	color: <?php echo $choose_global_color; ?> !important;
}

.tweet_text a {
	color: <?php echo $choose_global_color; ?>;
}

.twitter_username:hover {
	color: <?php echo $choose_global_color; ?>;
}
.widget ul li a {
	color: <?php echo $choose_global_color; ?>;
}

#searchsubmit {
	background-color: <?php echo $choose_global_color; ?>;
}

.wpcf7-form-control.wpcf7-submit {
	background-color: <?php echo $choose_global_color; ?>;
}

.post-title h2.title, .post-title h2.title a {
	color: <?php echo $choose_global_color; ?>;
}

.tp-leftarrow.default, .tp-rightarrow.default {
	background-color: <?php echo $choose_global_color; ?> !important;
}

.tp-bullets.simplebullets.round .bullet {
	background: <?php echo $choose_global_color; ?> !important;
}