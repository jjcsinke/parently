<template>
  <footer class="footer bg-primary-subtle py-4">
    <div class="container my-4">
      <div class="row">
        <div class="col-12 col-sm-6 d-flex flex-column justify-content-between">
          <img style="width: 200px; max-width: 80%; height: auto;" src="/images/logo.svg"
               alt="Parently">
          <span class="text-muted">&copy;2023 // mrpaaj</span>
        </div>
        <div class="col-3" v-for="menu in menus">
          <h3>{{ menu.title }}</h3>
          <ul class="list-unstyled">
            <li class="py-2" v-for="item in menu.items">
              <template v-if="item.to">
                <router-link class="text-decoration-none" :to="item.to">{{ item.text }}</router-link>
              </template>
              <template v-else-if="item.href">
                <a target="_blank" class="text-decoration-none" :href="item.href">
                  {{ item.text }}
                </a>
              </template>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
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
