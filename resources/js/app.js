/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const ANIMATION_TIME = 500;

const iframeContainer = '#test-chat';
const buttonLauncher = '#btn-launcher';
const buttonClose = '#btn-close';
const buttonSend = '#btn-send';
const questionTextarea = '#question';

const chatContainer = $('#text-container');

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

const animateChat = (height) => {
    $(iframeContainer, window.parent.document).animate({height: `${height}px`}, ANIMATION_TIME);
};

$(buttonLauncher).on('click', () => {
    animateChat(400);
    $(buttonClose).show();
});

$(buttonClose).on('click', () => {
    animateChat(46);
    $(buttonClose).hide();
});

$(buttonSend).on('click', () => {
    const questionInput = $(questionTextarea);
    const message = questionInput.val().replace(/(<([^>]+)>)/ig,"");
    if (message !== '') {
        question(chatContainer, message);
        answer(chatContainer, 'Test');
        questionInput.val('');
        axios
            .post('/api/v1/answers', {question: message})
            .then(handleResponse)
            .catch((error) => {
                console.log(error);
            });
    } else {
        questionInput.focus();
    }
});
