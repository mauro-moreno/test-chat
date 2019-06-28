/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const ANIMATION_TIME = 500;

const showMessage = (message, isQuestion = true) => {
    const classes = [
        'col-9',
        'pt-2',
        'pb-2',
        'rounded',
        isQuestion ? 'offset-3 bg-primary text-white' : 'bg-light'
    ].join(' ');

    return (
        `<div class="row mb-2">
            <div class="${classes}">${message}</div>
        </div>`
    );
};

const scrollBottom = element => {
    $(element).parent().animate({ scrollTop: $(element).height()}, ANIMATION_TIME);
};

const question = (element, message) => {
    $(element).append(showMessage(message));
    scrollBottom(element);
};

const answer = (element, message) => {
    $(element).append(showMessage(message, false));
    scrollBottom(element);
};

const handleResponse = (response) => {
    console.log(response);
};

const chatContainer = $('#text-container');

$('#button-launcher').on('click', () => {
    $('#test-chat', window.parent.document).animate({height: "400px"}, ANIMATION_TIME);
    $('#btn-close').show();
});

$('#btn-close').on('click', () => {
    $('#test-chat', window.parent.document).animate({height: "46px"}, ANIMATION_TIME);
    $('#btn-close').hide();
});

$('#btn-send').on('click', () => {
    const message = $('#question').val();
    question(chatContainer, message);
    answer(chatContainer, 'Test');
    axios
        .post('/api/v1/answers', {question: message})
        .then(handleResponse)
        .catch((error) => {
            console.log(error);
        });
});
