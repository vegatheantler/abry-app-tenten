<template>
  <div>
    <main class="pt-12">
      <div class="mb-5 flex justify-center">
        <div class="relative inline-block">
          <input type="text" id="template-title" placeholder="Untitled" class="whover:bg-gray-800 border-2 text-center text-xl py-3 px-4 bg-gray-900 focus:bg-gray-800 text-gray-100 font-medium rounded focus:outline-none transition-colors duration-75 border-gray-900 focus:shadow-outline focus:border-gray-800" :value="template.title || ''"> 
          <label for="template-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute inset-y-0 my-auto right-0 my-auto text-gray-600 -mr-8">
              <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
              <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
            </svg>
          </label>
        </div>
      </div>
      <div class="flex flex-col justify-center items-center pb-16">
        <div class="h-32 relative text-gray-600 border border-gray-400 bg-white rounded-lg shadow flex flex-col items-center justify-center cursor-pointer hover:border-blue-600 hover:shadow-lg transition-all duration-75 ease-in" style="width: 350px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mb-4">
            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
            <line x1="12" y1="22.08" x2="12" y2="12"></line>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute top-0 right-0 m-4 text-blue-600" style="display: none;">
            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
          </svg>
          <h3 class="text-lg font-medium mb-2 text-gray-700">
            Template ID: {{ template.id }}
          </h3>
          <!-- <small class="text-gray-500">Click to copy template ID</small> -->
        </div>
        <div v-for="message in messages" :key="message.id">
          <span class="h-16 w-1 bg-gray-300 block mx-auto"></span> 
          <div
            @click="toggleRich(message.id)"
            v-if="message.messagable_type=='App\\RichMessage'"
            class="h-40 border border-gray-400 bg-white rounded-lg shadow flex flex-col items-center justify-center hover:border-blue-600 hover:shadow-lg cursor-pointer relative transition-all duration-75 ease-in"
            style="width: 350px;"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute top-0 right-0 text-blue-600 mr-4 mt-4" style="display: none;">
              <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
            </svg>
            <div class="mb-2 text-gray-700">
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                <polyline points="21 15 16 10 5 21"></polyline>
              </svg>
            </div>
            <h3 class="text-gray-700 font-medium mb-2 w-64 py-1 truncate mx-auto text-center">
              {{ message.title }}
            </h3>
            <small class="text-gray-500 text-sm">Rich message</small>
          </div>
          <div
            @click="toggleText(message.id)"
            v-else-if="message.messagable_type=='App\\TextMessage'"
            class="h-40 border border-gray-400 bg-white rounded-lg shadow flex flex-col items-center justify-center hover:border-blue-600 hover:shadow-lg cursor-pointer relative transition-all duration-75 ease-in"
            style="width: 350px;"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute top-0 right-0 text-blue-600 mr-4 mt-4" style="display: none;">
              <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
            </svg>
            <div class="mb-2 text-gray-700">
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
              </svg>
            </div>
            <h3 class="text-gray-700 font-medium mb-2 w-64 py-1 truncate mx-auto text-center">
              {{ message.title }}
            </h3>
            <small class="text-gray-500 text-sm">Text message</small>
          </div>
          <div
            @click="toggleVideo(message.id)"
            v-else-if="message.messagable_type=='App\\VideoMessage'"
            class="h-40 border border-gray-400 bg-white rounded-lg shadow flex flex-col items-center justify-center hover:border-blue-600 hover:shadow-lg cursor-pointer relative transition-all duration-75 ease-in"
            style="width: 350px;"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute top-0 right-0 text-blue-600 mr-4 mt-4" style="display: none;">
              <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
            </svg>
            <div class="mb-2 text-gray-700">
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                <line x1="7" y1="2" x2="7" y2="22"></line>
                <line x1="17" y1="2" x2="17" y2="22"></line>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <line x1="2" y1="7" x2="7" y2="7"></line>
                <line x1="2" y1="17" x2="7" y2="17"></line>
                <line x1="17" y1="17" x2="22" y2="17"></line>
                <line x1="17" y1="7" x2="22" y2="7"></line>
              </svg>
            </div>
            <h3 class="text-gray-700 font-medium mb-2 w-64 py-1 truncate mx-auto text-center">
              {{ message.title }}
            </h3>
            <small class="text-gray-500 text-sm">Video message</small>
          </div>
        </div>
        <div>
          <span class="h-16 w-1 bg-gray-300 block mx-auto"></span> 
          <button @click="chooseMessageModalOpen = true" class="p-2 rounded-full border border-gray-400 bg-gray-200 rounded-lg shadow flex flex-col items-center justify-center hover:bg-gray-100 transition-colors duration-75 focus:shadow-outline focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600">
              <line x1="12" y1="5" x2="12" y2="19"></line>
              <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
          </button>
        </div>
      </div>
    </main>

    <choose-message-modal
      v-if="chooseMessageModalOpen"
      @close="closeChooseMessageModal"
      @rich="toggleRich"
      @text="toggleText"
      @video="toggleVideo"
    />
    <rich-message-modal
      v-if="richMessageModalOpen"
      @close="toggleRich"
      :messageId="messageId"
    />
    <text-message-modal
      v-if="textMessageModalOpen"
      @close="toggleText"
      :messageId="messageId"
    />
    <video-message-modal
      v-if="videoMessageModalOpen"
      @close="toggleVideo"
      :messageId="messageId"
    />
  </div>
</template>

<script>
  import ChooseMessageModal from '../components/ChooseMessageModal.vue';
  import RichMessageModal from '../components/RichMessageModal.vue';
  import TextMessageModal from '../components/TextMessageModal.vue';
  import VideoMessageModal from '../components/VideoMessageModal.vue';
  export default {
    data() {
      return {
        template: {
          title: '',
          id: null
        },
        messages: [],
        messageId: null,
        chooseMessageModalOpen: false,
        richMessageModalOpen: false,
        textMessageModalOpen: false,
        videoMessageModalOpen: false,
      };
    },
    components: {
      ChooseMessageModal,
      RichMessageModal,
      TextMessageModal,
      VideoMessageModal,
    },
    methods: {
      openChooseMessageModal() {
        this.messageId = null;
        this.chooseMessageModalOpen = true;
      },
      closeChooseMessageModal() {
        this.chooseMessageModalOpen = false;
      },
      toggleRich(id) {
        this.messageId = id || null;
        this.richMessageModalOpen = !this.richMessageModalOpen;
      },
      toggleText(id) {
        this.messageId = id || null;
        this.textMessageModalOpen = !this.textMessageModalOpen;
      },
      toggleVideo(id) {
        this.messageId = id || null;
        this.videoMessageModalOpen = !this.videoMessageModalOpen;
      },
    },
    async mounted() {
      let [template] = await Promise.all([
        this.$axios.get(
          `/api/message-templates?filter[id]=${this.$route.params.id}&include=messages`
        ),
      ]);
      this.template = template.data.data[0];
      this.messages = this.template.messages;
    },
  }
</script>

<style>
  .v--modal-overlay {
    position: fixed;
    box-sizing: border-box;
    left: 0;
    top: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.2);
    z-index: 999;
    opacity: 1;
  }

  .v--modal-overlay .v--modal-background-click {
    width: 100%;
    min-height: 100%;
    height: auto;
  }

  .v--modal-top-right {
      display: block;
      position: absolute;
      right: 0;
      top: 0;
  }

  .v--modal-overlay .v--modal-box {
      position: relative;
      overflow: hidden;
      box-sizing: border-box;
  }
</style>