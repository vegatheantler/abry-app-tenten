<template>
  <div aria-expanded="true" data-modal="template-selection" class="v--modal-overlay">
    <div class="v--modal-background-click">
      <div class="v--modal-top-right"></div>
      <div role="dialog" aria-modal="true" class="v--modal-box bg-white shadow-lg rounded" style="top: 96px; left: 393px; width: 750px; height: auto;">
        <header class="px-6 py-5 bg-blue-800 flex justify-between">
          <h3 class="text-xl text-white font-medium text-gray-100">
            Message templates
          </h3>
          <button @click="close()" type="button" class="text-gray-400 hover:text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </button>
        </header>
        <div class="py-12 px-8">
          <div>
            <h2 class="text-2xl mb-6 text-gray-700 font-semibold leading-none">
              Select a message template type
            </h2>
          </div>
          <div class="flex h-full">
            <div class="flex-1 mr-6">
              <button 
                class="w-full border rounded-lg border-blue-500 px-4 py-8 text-gray-700 hover:shadow-md mr-6 mb-2"
                @click="rich()"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <h2 class="text-xl font-semibold">
                  Rich
                </h2>
              </button>
              <small class="text-gray-600 text-sm leading-normal">
              Use rich messages to send out interactive content
              featuring images you've selected.
              </small>
            </div>
            <div class="flex-1 mr-6">
              <button
                class="w-full border rounded-lg border-blue-500 px-4 py-8 text-gray-700 hover:shadow-md mr-6 mb-2"
                @click="text()"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                </svg>
                <h2 class="text-xl font-semibold">
                  Text
                </h2>
              </button>
              <small class="text-gray-600 text-sm leading-normal">
              Use text messages to send a simple text based message.
              </small>
            </div>
            <div class="flex-1">
              <button
                class="w-full border rounded-lg border-blue-500 px-4 py-8 text-gray-700 hover:shadow-md mr-6 mb-2"
                @click="video()"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4">
                  <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                  <line x1="7" y1="2" x2="7" y2="22"></line>
                  <line x1="17" y1="2" x2="17" y2="22"></line>
                  <line x1="2" y1="12" x2="22" y2="12"></line>
                  <line x1="2" y1="7" x2="7" y2="7"></line>
                  <line x1="2" y1="17" x2="7" y2="17"></line>
                  <line x1="17" y1="17" x2="22" y2="17"></line>
                  <line x1="17" y1="7" x2="22" y2="7"></line>
                </svg>
                <h2 class="text-xl font-semibold">
                  Video
                </h2>
              </button>
              <small class="text-gray-600 text-sm leading-normal">
              Use multimedia messages to send a video.
              </small>
            </div>
          </div>
        </div>
        <!---->
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    methods: {
      close() {
        this.$emit('close');
      },
      rich() {
        this.$emit('rich');
      },
      text() {
        this.$emit('text');
      },
      video() {
        this.$emit('video');
      },
    }
  }
</script>