<template>
  <v-footer app color="primary-lighten">
<!--    <v-container>-->
<!--      <v-row>-->

<!--        <v-col cols="12" sm="6">-->

<!--          <v-img width="200px"-->
<!--                 max-width="80%"-->
<!--                 height="auto"-->
<!--                 src="/images/logo.svg"-->
<!--                 alt="Parently"/>-->
<!--        </v-col>-->
<!--        <v-col v-for="menu in menus" cols="12" sm="3">-->
<!--          <ul style="list-style: none;">-->
<!--            <li class="py-2">-->
<!--              <h4>-->
<!--                {{ menu.title}}-->
<!--              </h4>-->
<!--            </li>-->
<!--            <li class="py-2" v-for="item in menu.items">-->
<!--              <template v-if="item.to">-->
<!--                <router-link class="text-decoration-none" :to="item.to">{{ item.text }}</router-link>-->
<!--              </template>-->
<!--              <template v-else-if="item.href">-->
<!--                <a class="text-decoration-none"-->
<!--                   target="_blank" :href="item.href">-->
<!--                  {{ item.text }}-->
<!--                </a>-->
<!--              </template>-->
<!--            </li>-->
<!--          </ul>-->
<!--        </v-col>-->
<!--      </v-row>-->
<!--      <v-row>-->

<!--        <v-col>-->
<!--          <span class="">&copy;2023 - mrpaaj</span>-->
<!--        </v-col>-->
<!--      </v-row>-->
<!--    </v-container>-->
  </v-footer>
</template>
<script>
export default {

  data() {
    return {
      menus: [
        {
          title: 'About',
          items: [
            {
              text: 'Homepage',
              to: {name: 'home'},
            }
          ]
        },
        {
          title: 'Contribute',
          items: [
            {
              text: 'Ideas & Discussions',
              href: "https://github.com/jjcsinke/parently/discussions",
            },
            {
              text: 'Report issues',
              href: "https://github.com/jjcsinke/parently/issues",
            },
            {
              text: 'Github',
              href: "https://github.com/jjcsinke/parently",
            }
          ]
        }
      ]
    }
  }
}
</script>
