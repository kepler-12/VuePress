<template>
  <header class="header">
    <p>This is the header</p>

    <nav>
      <router-link to="/">Home</router-link>
      <router-link to="foo">Foo</router-link>
      <router-link to="bar">Bar</router-link>
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
