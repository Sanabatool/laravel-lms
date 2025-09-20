<div id="chatbot-container" class="chatbot-box hidden">
    <div id="chat-header">Chatbot Assistant</div>
    <div id="messages"></div>
    <form id="chat-form">
        <input type="text" id="question" placeholder="Ask something..." autocomplete="off">
        <button type="submit">&#10148;</button>
    </form>
</div>

<link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">
<script defer src="{{ asset('js/chatbot.js') }}"></script>
