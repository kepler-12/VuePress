<template>
  <header>
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
