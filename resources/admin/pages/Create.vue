<script>
  export default {
    data() {
      return {
          loading: true,
          templates: [],
      };
    },
    methods: {
      create() {
        this.saving = true;
        this.$axios
          .post('/api/message-templates', {})
          .then(res => {
            const templateId = res.data.data.id;
            setTimeout(() => {
              this.$router.push(`/edit/${templateId}`);
            }, 3000);
          })
          .catch(err => {
            const keys = Object.keys(err.response.data.errors);
            let msg = '';
            keys.forEach(key => {
              msg += err.response.data.errors[key][0] + '<br />';
            });
            this.$root.$emit('ERROR-MSG', msg);
          });
      },
    },
    mounted() {
      this.create();
    },
  }
</script>