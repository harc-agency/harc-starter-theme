#!/bin/bash

pwd

# Check if the Harc starter theme is installed
if [ ! -d "wp-content/themes/harc-starter-theme" ]; then
    echo "Harc starter theme is not installed"
    echo "Installing Harc starter theme"

    wp theme install https://github.com/harc-agency/harc-starter-theme/archive/refs/heads/master.zip --activate > /dev/null

    # Check if the installation was successful
    if [ $? -eq 0 ]; then
        echo "Harc starter theme installation completed"
    else
        echo "Harc starter theme installation failed"
    fi
else
    echo "Harc starter theme is already installed"
fi




# check if vendor folder exists
if [ ! -d "wp-content/themes/harc-starter-theme/vendor" ]; then
    echo "vendor folder does not exist"
    echo "Installing composer dependencies"
    cd wp-content/themes/harc-starter-theme
    composer install
    cd ../../../
else
    echo "vendor folder exists"
fi



# check if node_modules folder exists
if [ ! -d "wp-content/themes/harc-starter-theme/node_modules" ]; then
    echo "node_modules folder does not exist"
    echo "Installing npm dependencies"
    cd wp-content/themes/harc-starter-theme
    npm install
    npm run dev
    cd ../../../
else
    echo "node_modules folder exists"
fi

# Install Harc starter theme .env file
if [ -f "wp-content/themes/harc-starter-theme/.env" ]; then
    echo "Harc starter theme .env file is installed"
else
    echo "Installing Harc starter theme .env file"
    cp wp-content/themes/harc-starter-theme/.env.example wp-content/themes/harc-starter-theme/.env
fi

# check if acf plugin is installed
if [ ! -d "wp-content/plugins/advanced-custom-fields-pro" ]; then
    echo "acf plugin is not installed"
    echo "Installing acf plugin"
    # wp plugin install advanced-custom-fields-pro --activate
    wp plugin install advanced-custom-fields --activate
else
    echo "acf plugin is already installed"
fi

# check if woocommerce plugin is installed
if [ ! -d "wp-content/plugins/woocommerce" ]; then
    echo "woocommerce plugin is not installed"
    echo "Installing woocommerce plugin"
    wp plugin install woocommerce --activate
else
    echo "woocommerce plugin is already installed"
fi

# all-in-one-wp-migration
if [ ! -d "wp-content/plugins/all-in-one-wp-migration" ]; then
    echo "all-in-one-wp-migration plugin is not installed"
    echo "Installing all-in-one-wp-migration plugin"
    wp plugin install all-in-one-wp-migration --activate
else
    echo "all-in-one-wp-migration plugin is already installed"
fi




# check if homepage exists
if wp post list --post_type=page | grep -q 'Homepage'; then
    echo "Homepage exists"
else
    echo "Homepage does not exist"
    homepageId=$(wp post create --post_type=page --post_status=publish --post_title='Homepage' --porcelain)
fi

# check if blog exists
if wp post list --post_type=page | grep -q 'Blog'; then
    echo "Blog exists"
else
    echo "Blog does not exist"
    blogId=$(wp post create --post_type=page --post_status=publish --post_title='Blog' --porcelain)
fi

# set front page to homepage
wp option update show_on_front 'page'
wp option update page_on_front $homepageId

# set posts page to blog
wp option update page_for_posts $blogId



# check if main-menu exists
if wp menu list | grep -q 'main-menu'; then
    echo "The 'main-menu' was found"
else
    echo "The 'main-menu' was not found."
    wp menu create "main-menu"
    wp menu location assign main-menu primary
fi

# check if homepage is in main-menu
if ![wp menu list | grep -q 'Homepage']; then
    echo "Homepage is not in main-menu"
    wp menu item add-post main-menu $homepageId --title="Homepage"
else
    echo "Homepage is in main-menu"
fi

# check if blog is in main-menu
if ![wp menu list | grep -q 'Blog']; then
    echo "Blog is not in main-menu"
    wp menu item add-post main-menu $blogId --title="Blog"
else
    echo "Blog is in main-menu"
fi


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

# Clear WordPress cache (if using a caching plugin)
wp cache flush

# Enable WP_DEBUG mode
wp config set WP_DEBUG true --raw
wp config set WP_DEBUG_LOG true --raw
