<template>
  <aside class="app-header">

    <!-- Header -->
    <header class="sidebar-header">
      <p class="appname" to="/">VuePress</p>
      <small>
        {{ user.name }}
        <span class="logout" @click="logout()">(Logout)</span>
      </small>
    </header>

    <!-- Channel Listing -->
    <section class="sidebar-list">
      <h2 class="sidebar-heading">
        Channels
        <router-link to="/create" class="add-new">+</router-link>
      </h2>
      <list type="posts" :limit="10" />
    </section>

    <!-- Pages Listing -->
    <section class="sidebar-list">
      <h2 class="sidebar-heading">Pages</h2>
      <list type="pages" :limit="10" />
    </section>

  </aside>
</template>

<script>
import list from '../components/List.vue'

export default {
  name: 'app-header',
  props: ['user'],
  components: {
    list
  },
  methods: {
    logout() {
      const logoutNonce = document.head.querySelector('meta[name="logout-nonce"]').content
      window.location.href = `/wp-login.php?action=logout&_wpnonce=${logoutNonce}`
    }
  }
}
</script>

<style lang="scss">
.appname {
  margin: 0;
  font-size: 1.5em;
  font-weight: 500;
}

.app-header {
  display: flex;
  flex-direction: column;
  width: 250px;
}

.app-header {
  background-color: #233842;
  color: #e3e3e3;
}

.app-header a {
  color: inherit;
}

nav {
  display: flex;
  flex-direction: column;
}

.app-header a {
  text-decoration: none;
}

.sidebar-list {
  margin-bottom: 1em;
}

.sidebar-list a {
  font-size: .85em;
  padding: .5em;

  &:not(.router-link-active):hover {
    background-color: rgba(255, 255, 255, .15);
  }
}

.router-link-exact-active:not([href="/create"]) {
  background-color: salmon;
}

.sidebar-heading {
  font-weight: 100;
  font-size: 1em;
  padding: .5em;
}

.sidebar-header {
  padding: .5em;

  &:hover {
    background-color: rgba(0, 0, 0, .25);
  }
}

.sidebar-header * {
  display: block;
}

a.add-new {
  float: right;
  border-radius: 999999px;
  border: 1px solid currentcolor;
  font-size: .75em;
  line-height: 1.2em;
  height: 1.4em;
  text-align: center;
  width: 1.4em;
  cursor: pointer;
  opacity: .75;
  padding: 0;

  &:hover {
    opacity: 1;
  }
}

.logout {
  display: inline;
  cursor: pointer;
}
</style>
