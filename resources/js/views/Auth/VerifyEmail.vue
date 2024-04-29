<template>
  <div class="mt-n16">
    <img src="/images/parently.jpg"  alt="Parently" style="width:100vw;height:100vh;object-fit:cover;object-position:center;position:absolute;">
    <auth-form :redirect="false">
      <template v-slot:title>
        {{ $t('auth.verify.title') }}
      </template>
      <template v-slot:form>
        <template v-if="!user?.email_verified_at">
          <p class="my-4">
            {{ $t('auth.verify.check-email', {email: user?.email}) }}
          </p>
          <p class="my-4">
            {{ $t('auth.verify.already-did') }}
          </p>
          <v-btn @click="loadUser" color="primary" class="my-4" :loading="loading">{{
              $t('auth.verify.refresh')
            }}
          </v-btn>
          <p class="my-4">
            {{ $t('auth.verify.didnt-receive') }}
          </p>
          <v-btn @click="resend" color="primary" class="my-4" :loading="loading">{{ $t('auth.verify.resend') }}</v-btn>
        </template>
        <template v-else>
          <p>
            {{ $t('auth.verify.success') }}
          </p>
          <v-btn :to="{name: 'portal'}" color="primary" class="my-4">{{ $t('portal.title') }}</v-btn>
        </template>
      </template>

    </auth-form>
  </div>
</template>
<script>
import AuthForm from "@/components/ui/AuthForm.vue";
import {mapActions, mapState} from "pinia";
import {useAuthStore} from "@/stores/auth/index.js";
import {useAlertsStore} from "@/stores/alerts/index.js";

export default {
  components: {AuthForm},
  data() {
    return {
      loading: false,
    }
  },
  computed: {
    ...mapState(useAuthStore, ['user']),
  },
  methods: {
    ...mapActions(useAlertsStore, ['showSnackbar']),
    ...mapActions(useAuthStore, ['loadUser']),
    resend() {
      this.loading = true;
      axios.post('/email/verification-notification', {}, {baseURL: '/'})
          .then((response) => {
            this.showSnackbar({
              color: 'success',
              text: this.$t('auth.verify.sent')
            });
          })
          .catch((error) => {
            console.log(error)
            this.showSnackbar({
              color: 'error',
              text: error.response.data.message
            });
          })
          .finally(() => {
            this.loading = false;
          })
    }
  },
  mounted() {
    this.loadUser()
  }
}
</script>
