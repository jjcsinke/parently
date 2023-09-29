<template>
  <div class="container">

    <h1>Children</h1>
    <child-list/>
  </div>
</template>
<script>
import {defineComponent} from "vue";
import ChildList from "../../../components/ChildList.vue";

export default defineComponent({
  components: {ChildList}
})
</script>
