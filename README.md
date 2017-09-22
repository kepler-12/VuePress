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
