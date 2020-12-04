<template>
  <div id="app">
  <OuterHeader />
    <router-view/>
  </div>
</template>

<script>
import OuterHeader from "@/components/OuterHeader";
import { BaseApi } from "@/apis/Api";
export default {
  components: {
    OuterHeader
  },
  mounted() {
    this.$store.commit("LOGIN", !!localStorage.getItem("token"));
  }
}
</script>
<style lang="scss">
#app {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  /*padding-left: 15px;*/
  /*padding-right: 25px;*/
  /*overflow-x:hidden;*/
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

ul[class],
ol[class] {
  padding: 0;
}

body,
h1,
h2,
h3,
h4,
p,
ul[class],
ol[class],
li,
figure,
figcaption,
blockquote,
dl,
dd {
  margin: 0;
}

body {
  /*min-height: 100vh;*/
  scroll-behavior: smooth;
  text-rendering: optimizeSpeed;
  line-height: 1.5;
}

ul[class],
ol[class] {
  list-style: none;
}

a:not([class]) {
  text-decoration-skip-ink: auto;
}

img {
  max-width: 100%;
  display: block;
}

article > * + * {
  margin-top: 1em;
}

body,
input,
button,
textarea,
select {
  font-family: 'Proxima Nova Rg', sans-serif !important;
  /*font: inherit;*/
}

@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}

</style>

