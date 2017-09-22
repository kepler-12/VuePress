# vuepress

> vue/wordpress spa

## Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build
```

For detailed explanation on how things work, consult the [docs for vue-loader](http://vuejs.github.io/vue-loader).


## Required WordPress Settings

- General
	- Check “Anyone can register”
  - New User Default Role should be "Author"
- Reading
	- Static front page w/ slug of “home”
- Discussion
	- Uncheck “Users must be registered and logged in to comment“
	- Uncheck “ Enable threaded (nested) comments  (x) levels deep”
	- Uncheck Comment must be manually approved
	- Uncheck Comment author must have a previously approved comment

## Socket Setup
``` bash
# -- Ubuntu firewall
# open up port
sudo ufw allow 3020

# reload the firewall
sudo ufw reload

# Install node process manager
sudo npm install -g pm2

# Start the node process
cd install/wp-content/theme/vuepress
pm2 start Socket.js
```
