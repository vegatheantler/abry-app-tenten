<template>
  <div aria-expanded="true" data-modal="rich-message" class="v--modal-overlay">
    <div class="v--modal-background-click">
      <div class="v--modal-top-right"></div>
      <div role="dialog" aria-modal="true" class="v--modal-box bg-white shadow-xl rounded" style="top: 0px; left: 168px; width: 1200px; height: auto;">
        <header class="px-6 py-3 bg-blue-800 flex justify-between items-center">
          <a @click="back()" class="cursor-pointer text-xl text-white font-medium text-gray-100 flex items-center hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
              <line x1="19" y1="12" x2="5" y2="12"></line>
              <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Choose different message type
          </a>
          <div class="flex">
            <!----> <button @click="save()" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded flex items-center">
              {{ messageId ? 'Save' : 'Add' }} 
            </button>
          </div>
        </header>
        <span>
          <form class="px-6 pb-6 overflow-y-scroll vld-parent" style="height: 700px;">
            <div tabindex="0" aria-label="Loading" class="vld-overlay is-active" style="display: none;">
              <div class="vld-background"></div>
              <div class="vld-icon">
                <svg viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" width="64" height="64" stroke="#000">
                  <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)" stroke-width="2">
                      <circle stroke-opacity=".25" cx="18" cy="18" r="18"></circle>
                      <path d="M36 18c0-9.94-8.06-18-18-18">
                        <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.8s" repeatCount="indefinite"></animateTransform>
                      </path>
                    </g>
                  </g>
                </svg>
              </div>
            </div>
            <div>
              <div role="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 -mb-4" style="display: none;"><span class="block">Please check all the required fields.</span></div>
              <div class="py-10 flex justify-between items-center">
                <div>
                  <h1 class="text-4xl font-thin mb-2">
                    Rich message
                  </h1>
                  <p class="text-gray-700">
                    Use rich messages to send out interactive
                    content featuring images you've selected.
                  </p>
                </div>
              </div>
              <hr class="mb-6">
              <div class="mb-8 w-3/4">
                <h3 class="text-2xl font-light mb-4">Title</h3>
                <span><input name="title" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2" v-model="message.title"></span> <small class="text-gray-600">
                The message title is shown in push notifications
                and&nbsp;in the user's chat list.
                </small>
              </div>
              <div class="mb-16">
                <h3 class="text-2xl font-light mb-8">
                  Message settings
                </h3>
                <div class="flex">



                  <div 
                    v-if="messageFormat == 1"
                    class="mr-8 flex flex-wrap relative" style="min-width: 300px; height: 300px;"
                  >
                    <div class="flex h-full w-full"><span class="image-previews text-2xl h-full w-full bg-gray-300 text-white flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[0] +');'">A</span></div>
                  </div>

                  <div 
                    v-if="messageFormat == 2"
                    class="mr-8 flex flex-wrap relative" style="min-width: 300px; height: 300px;"
                  ><div class="w-1/2 text-center bg-gray-300 h-full flex items-center justify-center"><span class="image-previews text-2xl h-full w-full text-white bg-cover bg-no-repeat flex items-center justify-center" :style="'background-image: url('+ imageUrls[0] +');'">A</span></div> <div class="w-1/2 text-center bg-gray-500 h-full flex items-center justify-center"><span class="image-previews text-2xl h-full w-full text-white bg-cover bg-no-repeat flex items-center justify-center" :style="'background-image: url('+ imageUrls[1] +');'">B</span></div></div>


                  <div 
                    v-if="messageFormat == 3"
                    class="mr-8 flex flex-wrap relative" style="min-width: 300px; height: 300px;"
                  ><div class="w-1/2 text-center bg-gray-300 w-full " style="height: 50%;"><span class="image-previews text-2xl text-white  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[0] +');'">A</span></div> <div class="w-1/2 text-center bg-gray-500 w-full flex items-center justify-center" style="height: 50%;"><span class="image-previews text-2xl text-white  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[1] +');'">B</span></div></div>

                  <div 
                    v-if="messageFormat == 4"
                    class="mr-8 flex flex-wrap relative" style="min-width: 300px; height: 300px;"
                  ><div class="w-1/3 text-center bg-gray-300 w-full flex items-center justify-center" style="height: 33.33%;"><span class="image-previews text-2xl h-full w-full text-white  bg-cover bg-no-repeat flex items-center justify-center" :style="'background-image: url('+ imageUrls[0] +');'">A</span></div> <div class="w-1/3 text-center bg-gray-500 w-full flex items-center justify-center" style="height: 33.33%;"><span class="image-previews text-2xl h-full w-full text-white  bg-cover bg-no-repeat flex items-center justify-center" :style="'background-image: url('+ imageUrls[1] +');'">B</span></div> <div class="w-1/3 text-center bg-gray-700 w-full flex items-center justify-center" style="height: 33.33%;"><span class="image-previews text-2xl h-full w-full text-gray-300  bg-cover bg-no-repeat flex items-center justify-center" :style="'background-image: url('+ imageUrls[2] +');'">C</span></div></div>

                  <div 
                    v-if="messageFormat == 5"
                    class="mr-8 flex flex-wrap relative" style="min-width: 300px; height: 300px;"
                  ><div class="w-1/2 text-center bg-gray-300 flex items-center justify-center" style="height: 50%;"><span class="image-previews text-2xl h-full w-full text-white  bg-cover bg-no-repeat flex items-center justify-center" :style="'background-image: url('+ imageUrls[0] +');'">A</span></div> <div class="w-1/2 text-center bg-gray-500 flex items-center justify-center" style="height: 50%;"><span class="image-previews text-2xl h-full w-full text-white  bg-cover bg-no-repeat flex items-center justify-center" :style="'background-image: url('+ imageUrls[1] +');'">B</span></div> <div class="w-1/2 text-center bg-gray-700 flex items-center justify-center" style="height: 50%;"><span class="image-previews text-2xl h-full w-full text-gray-400  bg-cover bg-no-repeat flex items-center justify-center" :style="'background-image: url('+ imageUrls[2] +');'">C</span></div> <div class="w-1/2 text-center bg-gray-900 flex items-center justify-center" style="height: 50%;"><span class="image-previews text-2xl h-full w-full text-gray-200  bg-cover bg-no-repeat flex items-center justify-center" :style="'background-image: url('+ imageUrls[3] +');'">D</span></div></div>

                  <div 
                    v-if="messageFormat == 6"
                    class="mr-8 flex flex-wrap relative" style="min-width: 300px; height: 300px;"
                  ><div class="w-full text-center bg-gray-300 flex items-center justify-center" style="height: 50%;"><span class="image-previews text-2xl text-white  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[0] +');'">A</span></div> <div class="w-1/2 text-center bg-gray-500 flex items-center justify-center" style="height: 50%;"><span class="image-previews text-2xl text-white  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[1] +');'">B</span></div> <div class="w-1/2 text-center bg-gray-700 flex items-center justify-center" style="height: 50%;"><span class="image-previews text-2xl text-gray-300  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[2] +');'">C</span></div></div>

                  <div 
                    v-if="messageFormat == 7"
                    class="mr-8 flex flex-wrap relative" style="min-width: 300px; height: 300px;"
                  ><div class="w-full text-center bg-gray-300 flex items-center justify-center" style="height: 58%;"><span class="image-previews text-2xl text-white  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[0] +');'">A</span></div> <div class="flex-wrap items-center justify-center w-full pb-20"><div class="text-center bg-gray-500 flex items-center justify-center" style="height: 90%;"><span class="image-previews text-2xl text-white  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[1] +');'">B</span></div> <div class="text-center bg-gray-700 flex items-center justify-center" style="height: 85%;"><span class="image-previews text-2xl text-gray-300  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[2] +');'">C</span></div></div></div>

                  <div 
                    v-if="messageFormat == 8"
                    class="mr-8 flex flex-wrap relative" style="min-width: 300px; height: 300px;"
                  ><div class="flex flex-wrap w-full h-full pl-1 pt-1"><div class="w-1/3 text-center bg-gray-200 flex items-center justify-center"><span class="image-previews text-2xl text-white  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[0] +');'">A</span></div> <div class="w-1/3 text-center bg-gray-300 flex items-center justify-center"><span class="image-previews text-2xl text-white  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[1] +');'">B</span></div> <div class="w-1/3 text-center bg-gray-400 flex items-center justify-center"><span class="image-previews text-2xl text-white  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[2] +');'">C</span></div> <div class="w-1/3 text-center bg-gray-500 flex items-center justify-center"><span class="image-previews text-2xl text-gray-400  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[3] +');'">D</span></div> <div class="w-1/3 text-center bg-gray-600 flex items-center justify-center"><span class="image-previews text-2xl text-gray-300  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[4] +');'">E</span></div> <div class="w-1/3 text-center bg-gray-900 flex items-center justify-center"><span class="image-previews text-2xl text-gray-200  h-full w-full flex items-center justify-center bg-no-repeat bg-cover" :style="'background-image: url('+ imageUrls[5] +');'">F</span></div></div></div>



                  <div>
                    <div class="mb-8">
                      <h4 class="text-xl font-light mb-4">Select template</h4>
                      <div class="flex flex-wrap">
                        <div class="mr-3 mb-3 w-1/8">
                          <input type="radio" name="template" id="template-one" class="hidden" value="0"> 
                          <label @click="messageFormat = 1" for="template-one" class="block cursor-pointer">
                            <svg width="134" height="137" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="1" y="1" width="132" height="135" rx="9" :fill="messageFormat == 1 ? '#E2E8F0' : '#F7FAFD'" stroke="#D0D4DA" stroke-width="2"></rect>
                            </svg>
                          </label>
                        </div>
                        <div class="mr-3 mb-3 w-1/8">
                          <input type="radio" name="template" id="template-two" class="hidden" value="1"> 
                          <label @click="messageFormat = 2" for="template-two" class="block cursor-pointer">
                            <svg width="136" height="137" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="1" y="1" width="134" height="135" rx="9" :fill="messageFormat == 2 ? '#E2E8F0' : '#F7FAFD'" stroke="#D0D4DA" stroke-width="2"></rect>
                              <path stroke="#D0D4DA" stroke-width="2" d="M69 0v137"></path>
                            </svg>
                          </label>
                        </div>
                        <div class="mr-3 mb-3 w-1/8">
                          <input type="radio" name="template" id="template-three" class="hidden" value="2"> 
                          <label @click="messageFormat = 3" for="template-three" class="block cursor-pointer">
                            <svg width="137" height="137" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="136" y="1" width="135" height="135" rx="9" transform="rotate(90 136 1)" :fill="messageFormat == 3 ? '#E2E8F0' : '#F7FAFD'" stroke="#D0D4DA" stroke-width="2"></rect>
                              <path stroke="#D0D4DA" stroke-width="2" d="M137 70H0"></path>
                            </svg>
                          </label>
                        </div>
                        <div class="mr-3 mb-3 w-1/8">
                          <input type="radio" name="template" id="template-four" class="hidden" value="3"> 
                          <label @click="messageFormat = 4" for="template-four" class="block cursor-pointer">
                            <svg width="137" height="137" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="1" y="1" width="135" height="135" rx="9" :fill="messageFormat == 4 ? '#E2E8F0' : '#F7FAFD'" stroke="#D0D4DA" stroke-width="2"></rect>
                              <path stroke="#D0D4DA" stroke-width="2" d="M137 47H0M137 92H0"></path>
                            </svg>
                          </label>
                        </div>
                        <div class="mr-3 mb-3 w-1/8">
                          <input type="radio" name="template" id="template-five" class="hidden" value="4"> 
                          <label @click="messageFormat = 5" for="template-five" class="block cursor-pointer">
                            <svg width="136" height="137" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="135" y="1" width="135" height="134" rx="9" transform="rotate(90 135 1)" :fill="messageFormat == 5 ? '#E2E8F0' : '#F7FAFD'" stroke="#D0D4DA" stroke-width="2"></rect>
                              <path stroke="#D0D4DA" stroke-width="2" d="M70 0v137M136 70H0"></path>
                            </svg>
                          </label>
                        </div>
                        <div class="mr-3 mb-3 w-1/8">
                          <input type="radio" name="template" id="template-six" class="hidden" value="5"> 
                          <label @click="messageFormat = 6" for="template-six" class="block cursor-pointer">
                            <svg width="137" height="137" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="1" y="1" width="135" height="135" rx="9" :fill="messageFormat == 6 ? '#E2E8F0' : '#F7FAFD'" stroke="#D0D4DA" stroke-width="2"></rect>
                              <path stroke="#D0D4DA" stroke-width="2" d="M68 69v68M137 70H0"></path>
                            </svg>
                          </label>
                        </div>
                        <div class="mr-3 mb-3 w-1/8">
                          <input type="radio" name="template" id="template-seven" class="hidden" value="6"> 
                          <label @click="messageFormat = 7" for="template-seven" class="block cursor-pointer">
                            <svg width="135" height="137" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="1" y="1" width="133" height="135" rx="9" :fill="messageFormat == 7 ? '#E2E8F0' : '#F7FAFD'" stroke="#D0D4DA" stroke-width="2"></rect>
                              <path stroke="#D0D4DA" stroke-width="2" d="M135 80H0M135 109H1"></path>
                            </svg>
                          </label>
                        </div>
                        <div class="mr-3 mb-3 w-1/8">
                          <input type="radio" name="template" id="template-eight" class="hidden" value="7"> 
                          <label @click="messageFormat = 8" for="template-eight" class="block cursor-pointer">
                            <svg width="137" height="137" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="1" y="1" width="135" height="135" rx="9" :fill="messageFormat == 8 ? '#E2E8F0' : '#F7FAFD'" stroke="#D0D4DA" stroke-width="2"></rect>
                              <path stroke="#D0D4DA" stroke-width="2" d="M47 0v137M92 0v137M137 70H0"></path>
                            </svg>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div>
                      <ul class="flex border-b mb-6">
                        <li
                          v-for="n in richMessageType.image_count || 1"
                          class="-mb-px mr-1"
                          @click="selectedImageUpload = n"
                        >
                          <a href="#"
                            class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold"
                            :class="{'border-l border-t border-r rounded-t text-blue-700': (selectedImageUpload == n)}"
                          >
                            {{ String.fromCharCode(('A').charCodeAt(0) + n-1) }}
                          </a>
                        </li>
                      </ul>
                      <div
                        v-for="n in richMessageType.image_count || 1"
                        :keys="n"
                        v-show="n == selectedImageUpload"
                      >
                        <div class="my-8"><span><label for="image0" class="block mb-4 text-gray-700"><span class="font-medium py-2 px-6 rounded border bg-gray-200 cursor-pointer hover:bg-gray-300">
                          Upload an Image
                          </span> <input @change="onFileUpload" type="file" id="image0" accept="image/png, image/jpeg, image/gif" class="hidden"></label></span> <small class="text-gray-600">The image must below 1MB of file size with a resolution of at
                          least 1040x1040</small>
                        </div>
                        <div class="mb-6">
                          <label for="actionType0" class="block mb-2 text-gray-700">Action type</label> 
                          <div class="inline-block relative w-64">
                            <select id="actionType0" required="required" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                              <option value="" selected="selected">None</option>
                              <option value="link">Link</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current h-4 w-4">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                              </svg>
                            </div>
                          </div>
                        </div>
                        <!---->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </span>
        <!---->
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        message: {},
        messageFormat: 1,
        richMessageTypes: [],
        richMessageType: {
          image_count: 1,
        },
        selectedImageUpload: 1,
        imageUrls: {
          '0': null,
          '1': null,
          '2': null,
          '3': null,
          '4': null,
          '5': null,
          '6': null,
        },
        imageFiles: {
          '0': null,
          '1': null,
          '2': null,
          '3': null,
          '4': null,
          '5': null,
          '6': null,
        },
      }
    },
    props: [
      'messageId',
    ],
    watch: {
      messageFormat: function (id) {
        let vm = this;
        this.richMessageType = this.richMessageTypes.find(obj => {
          return obj.id == vm.messageFormat
        });
      },
    },
    methods: {
      onFileUpload(e) {
        const file = e.target.files[0];
        this.imageUrls[this.selectedImageUpload-1] = URL.createObjectURL(file);
        this.imageFiles[this.selectedImageUpload-1] = file;
      },
      back() {
        this.$emit('close');
      },
      getPostData() {
        return JSON.stringify({
          id: this.messageId ?? null,
          title: this.message.title ?? '',
          message_type: 'App\\RichMessage',
          rich_message_type_id: this.messageFormat,
          message_template_id: this.$route.params.id
        });
      },
      save() {
        let form = new FormData();
        form.append('images[0]', this.imageFiles[0]);
        form.append('images[1]', this.imageFiles[1]);
        form.append('images[2]', this.imageFiles[2]);
        form.append('images[3]', this.imageFiles[3]);
        form.append('images[4]', this.imageFiles[4]);
        form.append('images[5]', this.imageFiles[5]);
        form.append('data', this.getPostData());
        this.$axios
          .post(`/api/rich-messages`, form)
          .then(res => {
            this.$root.$emit(
              'NOTIFICATION-MSG',
              'Rich Message successfully saved. Redirecting you shortly...'
            );
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          })
          .catch(err => {
            console.log(err);
            const keys = Object.keys(err.response.data.errors);
            let msg = '';
            keys.forEach(key => {
              msg += err.response.data.errors[key][0] + '<br />';
            });
            this.$root.$emit('ERROR-MSG', msg);
          });
      },
    },
    async mounted() {
      let [rich_message_types] = await Promise.all([
        this.$axios.get(
          `/api/rich-message-types`
        ),
      ]);
      this.richMessageTypes = rich_message_types.data.data;

      if (this.messageId) {
        let [messages] = await Promise.all([
          this.$axios.get(
            `/api/messages?filter[id]=${this.messageId}&include=messagable,messagable.images`
          ),
        ]);
        this.message = messages.data.data[0];
        this.messageFormat = this.message.messagable.rich_message_type_id;
        
        const arrayLength = this.message.messagable.images.length;
        for (var i = 0; i < arrayLength; i++) {
            this.imageUrls[i] = this.message.messagable.images[i].src.replace('public', '/storage');
        }
      }
    },
  }
</script>