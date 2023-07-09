#!/bin/bash

pwd

# Check if the Harc starter theme is installed
if [ ! -d "wp-content/themes/harc-starter-theme" ]; then
    echo "Harc starter theme is not installed"
    echo "Installing Harc starter theme"
    wp theme install https://github.com/harc-agency/harc-starter-theme/archive/refs/heads/master.zip --activate
# else theme is installed
else
    echo "Harc starter theme is installed"
fi

# in the theme check if .env exists if not copy .env.example to .env
if [ ! -f "wp-content/themes/harc-starter-theme/.env" ]; then
    echo "Harc starter theme .env is not installed"
    echo "Installing Harc starter theme .env"
    cp wp-content/themes/harc-starter-theme/.env.example wp-content/themes/harc-starter-theme/.env
else
    echo "Harc starter theme .env is installed"
fi

# setup composer and npm
cd wp-content/themes/harc-starter-theme
composer update
npm install
npm run dev 
cd ../../../


# proxy: 'site.local' for browsersync change to name of the site by using the directory name up a couple of levels
# from public go up two levels to the project name and use that as the proxy name
# example: harc/app/public -> harc would be the proxy name but it could be anything so make it dynamic
# so if the current directory is harc/app/public then the proxy name would be harc
 


# Main Menu
wp menu create "main-menu"
#  add to the main-menu "homepage"








wp post create --post_type=page --post_title='Homepage' --post_status=publish --post_author=1 --post_category=1

slug="homepage"
homepageId=echo "<output>" | grep -oP "^\|\s+(\d+)\s+\|\s+$slug\s+\|.*$" | awk -F'|' '{print $2}'
echo $homepageId
# use xargs to get the id of the page and add it to the menu
wp menu item add-post main-menu $(wp post list --post_type=page --post_status=publish --post_title='Homepage' --field=ID | xargs -n1 wp post list --post_type=page --post_status=publish --post_title='Homepage' --field=ID) --title="Homepage"

wp post create --post_type=page --post_title='Blog' --post_status=publish --post_author=1 --post_category=1
wp menu item add-post main-menu $(wp post list --post_type=page --post_status=publish --post_title='Blog' --field=ID ) --title="Blog" 

# set front page to homepage
wp option update show_on_front 'page'
wp option update page_on_front $(wp post list --post_type=page --post_status=publish --post_title='Homepage' --field=ID )

# set posts page to blog
wp option update page_for_posts $(wp post list --post_type=page --post_status=publish --post_title='Blog' --field=ID )


# Set the default upload sizes
wp config set upload_max_filesize 3G --type=constant
wp config set post_max_size 3G --type=constant
wp config set memory_limit 256M --type=constant
wp config set max_execution_time 300 --type=constant
wp config set max_input_time 300 --type=constant

# Update WordPress permalink structure
wp rewrite structure '/%postname%/' --hard

# Set the timezone
wp option update timezone_string 'America/Denver'

# Enable automatic updates for plugins and themes
wp config set AUTOMATIC_UPDATER_DISABLED false --raw # Enable all updates
wp config set WP_AUTO_UPDATE_CORE minor --raw # Enable minor updates
wp config set WP_AUTO_UPDATE_CORE true --raw # Enable all updates

# Install plugins using WP-CLI

wp plugin install all-in-one-wp-migration --activate
wp plugin install woocommerce --activate
# wp plugin install advanced-custom-fields-pro --activate
wp plugin install advanced-custom-fields --activate


# Clear WordPress cache (if using a caching plugin)
wp cache flush



