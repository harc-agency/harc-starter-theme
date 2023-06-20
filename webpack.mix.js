let mix = require("laravel-mix")
let path = require("path")
require("laravel-mix-tailwind")

mix.js("src/js/app.js", "dist")
    .vue({ version: 3 })
    .setPublicPath("dist")
    .postCss("src/css/app.css", ".", [
        require("tailwindcss")
    ])
    .webpackConfig({
        resolve: {
            alias: {
                "~": path.resolve(__dirname),
                "@": path.resolve("src/js")
            }
        }
    })
    .version()
    .tailwind()

//browserSync
mix.browserSync({
    proxy: 'site.local',
    files: [
        "dist/**/*", //src files
        "**/*.php", //wordpress files
        "src/css/*.css"
    ],
    open: true, // Don't automatically open the browser after running Browsersync
    notify: false, // Don't show any notifications in the browser.
    ghostMode: false // Disable syncing multiple tabs
})
