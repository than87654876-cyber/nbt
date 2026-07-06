import './echo';

window.Echo.channel('chat-room')
    .listen('MessageSent', (e) => {
        console.log('Tin nhắn nhận được:', e.message);
    });
