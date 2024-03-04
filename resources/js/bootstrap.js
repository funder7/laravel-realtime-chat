/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo   from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
                               broadcaster      : 'pusher',
                               key              : import.meta.env.VITE_PUSHER_APP_KEY,
                               cluster          : import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
                               wsHost           : import.meta.env.VITE_PUSHER_HOST,
                               wsPort           : import.meta.env.VITE_PUSHER_PORT ?? 80,
                               wssPort          : import.meta.env.VITE_PUSHER_PORT ?? 443,
                               forceTLS         : (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
                               enabledTransports: [ 'ws', 'wss' ],
                               encrypted        : true,
                               disableStats     : true
                           });


window.Echo.channel('messages')
      .listen('NewMessage', (event) => {
          console.log('New message:', event.message);
      });


// const receiverId = 'set-with-user-ID';

// window.Echo.private('private-chat.' + receiverId)
//       .listen('NewPrivateMessageNotification', (event) => {
//           console.log('New private message:', event.message);
//       });