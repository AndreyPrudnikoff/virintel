<template>
  <div>
    <div id="thankYou">Thank you, <p class="userName">{{ isUser.name }}!</p><br> This is your  <b>VirintelID</b>
      <h2 id="userId">{{ isUser.id }}</h2>
    </div>
    <div>
      <router-link :to="path">My profile</router-link>
    </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";

export default {
  name: 'ThankYou',
  computed: {
    ...mapGetters(['isUser', 'path'])
  },
  async mounted() {
    await this.$store.dispatch('authUser')
  }
}
</script>
<style lang="scss">
#thankYou {
  text-align: center;
  font-size: 24pt;

  .userName {
    color: #15416B;
    font-weight: bold;
    font-size: 34pt;
  }
}

#userId {
  font-weight: bold;
  font-size: 36pt;
  max-width: 400px;
  margin: 30px auto;
  padding: 10px;
  border: 3px dashed gray;
  border-radius: 20px;
  background-color: #eee;
}
</style>
