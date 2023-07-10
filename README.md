## WordPress/Vue Starter Theme Using Inertia.js

Harc's starter theme using Inertia with Vue, and the WordPress Inertia adapter.

### Installation
Clone this repository into the WordPress themes directory.

```bash
curl -s https://raw.githubusercontent.com/harc-agency/harc-starter-theme/master/install-theme.sh | bash -s
```

### Usage
Use the above command to install the theme. This will create a new directory in the themes folder called `harc-starter-theme`. This is where all edits for pages and components will be made.

```bash
cd wp-content/themes/harc-starter-theme
```

### Development
To start developing, run the following command from the theme directory: 

```bash
npm run watch
```

### Configuration
if you want to use BrowserSync, in `webpack.mix.js` rename the `proxy` from `site.local` to what ever the projects name is. webpack.mix.js to your local site url. BrowserSync will proxy this url.

```bash
proxy: site.local to proxy: nameofsite.local
``` 

NOTE: Browsersync has some limitation. You get one link then then you will have to refresh the page, its a bug, but it works.
 
### Index.php

The index.php file is the main file for the theme. It is used to render the initial page, and then Vue takes over from there. The index.php file is also used to render the WordPress admin pages.
