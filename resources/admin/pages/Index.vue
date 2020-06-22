<template>
  <div>
    <main class="flex-grow flex justify-center items-center">

        <div class="mx-auto px-4 sm:px-8 py-2 w-full">

          <div class="py-6 flex justify-between items-center"><div><h1 class="text-4xl font-thin">LINE Message Templates ({{ templates.length }})</h1></div> <div><a @click="create()" class="cursor-pointer bg-blue-500 border-2 border-transparent hover:bg-blue-700 text-white font-bold py-3 px-6 rounded">
                Create template</a></div></div>

          <table class="border table-auto w-full text-gray-700 shadow mt-6">
            <colgroup><col width="60"> <col width=""> <col width="300"> <col width="300"></colgroup> <tr class="border-b text-left bg-gray-200"><th class="py-4 px-8 font-semibold text-sm">ID</th> <th class="py-4 px-4 font-semibold text-sm">TITLE</th> <th class="py-4 px-4 font-semibold text-sm">LAST UPDATED</th> <th class="py-4 px-4 font-semibold text-sm">CREATED</th></tr>
            <tr v-for="template in templates" :key="template.id" class="hover:bg-gray-200 border-b bg-white">
              <td class="py-3 px-8">
                {{ template.id }}
              </td>
              <td>
                <div class="py-3 px-4 relative"><a :href="`/admin/${template.id}/edit/`" class="font-medium text-blue-500 hover:underline w-full flex">
                {{ template.title || 'Untitled' }}
                </a>
                  <div class="absolute h-full flex items-center top-0 right-0"><a :href="`/admin/${template.id}/edit/`" class="block p-2 bg-gray-100 hover:bg-white rounded mr-2 text-gray-600 border text-xs">Edit</a>
                    <button @click="remove(template.id)" type="button" class="block p-2 bg-gray-100 hover:bg-white rounded mr-2 text-gray-600 border text-xs">
                      Remove
                    </button>
                  </div>
                </div>
              </td>
              <td class="py-3 px-4">
                <dl><dd class="mb-2 text-sm"><span tabindex="0">
                  {{ localTime(template.updated_at) }}
                </span></dd></dl>
              </td>
              <td class="py-3 px-4">
                <dl><dd class="mb-2 text-sm"><span tabindex="0">
                  {{ localTime(template.created_at) }}
                </span></dd></dl>
              </td>
            </tr>
          </table>
        </div>

    </main>
  </div>
</template>

<script>
  export default {
    data() {
      return {
          loading: true,
          templates: [],
      };
    },
    methods: {
      fetchTemplates() {
        this.loading = true;
        this.templates = [];
        this.$axios.get(`/api/message-templates`).then(res => {
          this.loading = false;
          this.templates = res.data.data;
        });
      },
      create() {
        this.saving = true;
        this.$axios
          .post('/api/message-templates')
          .then(res => {
            const templateId = res.data.data.id;
            setTimeout(() => {
              this.$router.push(`/${templateId}/edit`);
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
      remove(id) {
        this.saving = true;
        this.$axios
          .delete(`/api/message-templates/${id}`)
          .then(res => {
            window.location.reload();
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
      this.fetchTemplates();
    },
  }
</script>