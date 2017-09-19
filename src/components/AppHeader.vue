<template>
  <header class="header">
    <router-link to="/">VuePress</router-link>

    <nav>
      <router-link to="/sample-page">Sample Page</router-link>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'app-header'
}
</script>

<style>
.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1em;
}

.header,
.header a {
  background-color: salmon;
  color: #79251b;
}

.header a {
  padding: 1em;
  text-decoration: none;
}
</style>
