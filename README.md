## WordPress/Vue Starter Theme Using Inertia.js

A bare-bones example theme using Inertia with Vue, and the WordPress Inertia adapter.

### Installation
Clone this repository into the WordPress themes directory.



```bash
curl -s https://raw.githubusercontent.com/harc-agency/harc-starter-theme/master/install-theme.sh | bash -s
```


After creating the Local Project open in a shell and run the following

```bash
wp theme install https://github.com/harc-agency/harc-starter-theme/archive/refs/heads/master.zip --activate

cd wp-content/themes/harc-starter-theme/

composer install
npm install
npm run dev
```

### References
https://inertiajs.com/
https://github.com/boxybird/inertia-wordpress
https://vuejs.org/


### License
[MIT license](https://opensource.org/licenses/MIT)
