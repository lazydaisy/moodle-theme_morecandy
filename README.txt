
/* How to copy and customise this theme.
----------------------------------------*/

This document describes how to copy and customise this theme so that
you can build on this to create a theme of your own. It assumes you have some
understanding of how themes work within Moodle 2.5, as well as a basic understanding
of HTML and CSS.

Getting started
---------------

From your Moodle theme directory right click on morecandy and then copy and paste back
into your Moodle theme directory. You should now have a folder called Copy of morecandy.
If you right click this folder you are given the option to Rename it. So rename this
folder to your chosen theme name, using only lower case letters, and if needed,
underscores. For the purpose of this tutorial we will call the theme 'mytheme'.

On opening 'mytheme' your you will find several files and sub-directories which have
files within them.

These are:

config.php
    Where all the theme configurations are made.
    (Contains some elements that require renaming).
lib.php
    Where all the functions for the themes settings are found.
    (Contains some elements that require renaming).
settings.php
    Where all the setting for this theme are created.
    (Contains some elements that require renaming).
version.php
    Where the version number and plugin component information is kept.
    (Contains some elements that require renaming).
/lang/
    This directory contains all language sub-directories for other languages
    if and when you want to add them.
/lang/en/
    This sub-directory contains your language files, in this case English.
/lang/en/theme_morecandy.php
    This file contains all the language strings for your theme.
    (Contains some elements that require renaming as well as the filename itself).
/layout/
    This directory contains all the layout files for this theme.
/layout/columns1.php
    Layout file for a one column layout (content only).
    (Contains some elements that require renaming).
/layout/columns2.php
    Layout file for a two column layout (side-pre and content).
    (Contains some elements that require renaming).
/layout/columns3.php
    Layout file for a three column layout (side-pre, content and side-post) and the front page.
    (Contains some elements that require renaming).
/layout/embedded.php
    Embedded layout file for embeded pages, like iframe/object embeded in moodleform.
    (Contains some elements that require renaming).
/layout/maintenance.php
    Maintenance layout file which does not have any blocks, links, or API calls that would lead to database or cache interaction.
    (Contains some elements that require renaming).
/layout/secure.php
    Secure layout file for safebrowser and securewindow.
    (Contains some elements that require renaming).
/style/
    This directory contains all the CSS files for this theme.
/style/custom.css
    This is where all the settings CSS is generated.
/pix/
    This directory contains a screen shot of this theme as well as a favicon
    and any images used in the theme.

Renaming elements
-----------------

The problem when copying a theme is that you need to rename all those instances
where the old theme name occurs, in this case morecandy. So using the above list as
a guide, search through and change all the instances of the theme name
'morecandy' to 'mytheme'. This includes the filename of the lang/en/theme_morecandy.php.
You need to change this to 'theme_mytheme.php'.

Installing your theme
---------------------

Once all the changes to the name have been made, you can safely install the theme.
If you are already logged in just refreshing the browser should trigger your Moodle
site to begin the install 'Plugins Check'.

If not then navigate to Administration > Notifications.

Once your theme is successfully installed you can select it and begin to modify
it using the custom settings page found by navigating to...
Administration > Site Administration > Appearance > Themes >>
and then click on (mytheme) or whatever you renamed your theme to,
from the list of theme names that appear at this point in the side block.

Customisation using custom theme settings
-----------------------------------------

The settings page for the morecandy theme can be located by navigating to:

Administration > Site Administration > Appearance > Themes > Morecandy

Customisation using the HTML Editor in Moodle
---------------------------------------------

This is all the HTML you will need to add a Carousel slider to your Moodle site.
Here are some simple steps:

1.  Go to the Home page of your Moodle site and choose 'Frontpage settings' from the Administration block,
    and proceed to enable 'Site topics' if it is not already enabled.

2.  Save settings and return to your site Frontpage and 'Turn editing on'.

3.  Open the 'Site topic' area. You should see a small icon that looks like a spanned.

4.  Next find the section 'Copy and Paste' the Carousel HTML from the bottom of this page, to the HTML part of the Editor, and save it.
4.  Now switch back to normal view in your editor and you should see four place-holder images. By just selecting each image in turn with your mouse you can edit it by clicking on the Image icon in your editor. Here you can choose an image of your own to upload. Any size will work but do take into consideration the size of your site topic area especially if you have blocks.
5. After adding your images save your work and sit back and watch how it works.
6. Once you are familiar with the editing part of this you can add your own captioss.
7. Remember too that this is only a prototype and as such is very basic, but it does demonstrate what can be done with the minimum of fuss.

<!-- COPY AND PASTE THIS CODE TO YOUR SITE TOPIC OR COURSE TOPIC -->
<div id="myslider" class="carousel slide"><!-- class of slide for animation -->
<div class="carousel-inner">
<div class="item active"><!-- class of active since it's the first item --> <img class="img-responsive" src="http://placehold.it/1200x200" alt="" />
<div class="carousel-caption">
<p>First caption text here</p>
</div>
</div>
<div class="item"><img class="img-responsive" src="http://placehold.it/1200x200" alt="" />
<div class="carousel-caption">
<p>Second caption text here</p>
</div>
</div>
<div class="item"><img class="img-responsive" src="http://placehold.it/1200x200" alt="" />
<div class="carousel-caption">
<p>Third caption text here</p>
</div>
</div>
<div class="item"><img class="img-responsive" src="http://placehold.it/1200x200" alt="" />
<div class="carousel-caption">
<p>Fourth caption text here</p>
</div>
</div>
</div>
<!-- /.carousel-inner --> <!--  Next and Previous controls below
        href values must reference the id for this carousel --> <a class="carousel-control left" href="#myslider" data-slide="prev">‹</a> <a class="carousel-control right" href="#myslider" data-slide="next">›</a></div>
<!-- / END -->

Moodle documentation
--------------------

Further information can be found on Moodle Docs: https://docs.moodle.org/29/en/Morecandy
