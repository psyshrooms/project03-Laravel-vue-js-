
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// ES6
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message', require('./components/message.vue'));

const app = new Vue({
    el: '#app',
    data:{
        message:'',
        chat:{
            message:[],
            user:[],
            color:[],
            time:[]
        },
        typing:''
    },
    watch:{
      message(){
          Echo.private('chat')
              .whisper('typing', {
                  name: this.message
              });
      }
    },
    methods:{
        send(){
            if(this.message.length !=0){

                this.chat.message.push(this.message);
                this.chat.user.push('you');
                this.chat.color.push('success');
                this.chat.time.push(this.getTime());


                axios.post('/send', {
                    message : this.message
                })
                    .then(response =>  {
                        console.log(response);
                        this.message='';
                    })
                    .catch(error => {
                        console.log(error);
                    });

            }        },
            getTime(){
            let time =new Date();
            return time.getHours()+':'+time.getMinutes();
            }
    },
    mounted(){
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
        this.chat.message.push(e.message);
        this.chat.user.push(e.user);
        this.chat.color.push('danger');
        this.chat.time.push(this.getTime());
                // console.log(e);
            })
            .listenForWhisper('typing', (e) => {
                if(e.name !=''){
                    this.typing='typing....'
                }else {
                    this.typing=''
                }


            });
    }
});
