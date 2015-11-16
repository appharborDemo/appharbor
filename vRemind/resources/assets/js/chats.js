var username;
var base_url = "http://localhost/vremind/messages/";

$(document).ready(function() 
{
    username = $('#username').html();

    pullData();

    $(document).keyup(function(e) {
        if (e.keyCode == 13)
            sendMessage();
        // else
        //     isTyping();
    });

    // does current browser support PJAX
    if ($.support.pjax) {
        $.pjax.defaults.timeout = 5000; // time in milliseconds
    }
});

// $(document).pjax('a', '#pjax-container');

function pullData()
{
    retrieveChatMessages();
    // retrieveTypingStatus();
    setTimeout(pullData,3000);
}

function retrieveChatMessages()
{
    $.post(base_url + 'retrieveChatMessages', {username: username}, function(data)
    {
        if (data.length > 0)
            $('#chat-window').append('<br><div>'+data+'</div><br>');
    });
    // setTimeout(retrieveChatMessages,3000);
}

function retrieveTypingStatus()
{
    $.post(base_url + 'retrieveTypingStatus', {username: username}, function(username)
    {
        if (username.length > 0)
            $('#typingStatus').html(username+' is typing');
        else
            $('#typingStatus').html('');
    });
}

function sendMessage()
{
    var message = $('#message').val();

    if (message.length > 0)
    {
        $.post(base_url + 'sendMessage', {message: message, username: username}, function()
        {
            $('#chat-window').append('<br><div style="text-align: right">'+message+'</div><br>');
            $('#message').val('');
            // notTyping();
        });
    }
}

function isTyping()
{
    $.post(base_url + 'isTyping', {username: username});
}

function notTyping()
{
    $.post(base_url + 'notTyping', {username: username});
}

function createMessage()
{
    $.pjax({url: base_url + 'new', container: '#chat-area'})
}

function showMessage(id)
{
    $.pjax({url: base_url + id, container: '#chat-area'})
    // setTimeout(showMessage,3000);
}

$(document).on('submit', 'form[data-pjax]', function(event) {
  $.pjax.submit(event, '#chat-area')
})