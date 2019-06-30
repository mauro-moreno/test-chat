/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const ANIMATION_TIME = 500;

let countWrong = 0;

/** ELEMENTS */

const iframeContainer = '#test-chat';
const buttonLauncher = '#btn-launcher';
const buttonClose = '#btn-close';
const buttonSend = '#btn-send';
const questionTextarea = '#question';
const questionFeedback = '.question';
const chatContainer = '#text-container';


/** ANIMATIONS */

const animateChat = (height) => {
    $(iframeContainer, window.parent.document).animate({height: `${height}px`}, ANIMATION_TIME);
};

const scrollBottom = element => {
    $(element).parent().animate({ scrollTop: $(element).height()}, ANIMATION_TIME);
};


/** MESSAGES */

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
            <div class="${classes}">
                ${message}
            </div>
        </div>`
    );
};

const question = (element, message) => {
    $(element).append(showMessage(message));
    scrollBottom(element);
};

const answer = (element, message) => {
    $(element).append(showMessage(message, false));
    scrollBottom(element);
};

const sendQuestion = message => {
    question(chatContainer, message);
    axios
        .get('/api/es/chat/ask', {question: message})
        .then((response) => {
            answer(chatContainer, receiveAnswer(response));
        })
        .catch((error) => {
            answer(chatContainer, error.data);
        });
};

const receiveAnswer = response => {
    const data = response.data;

    const action = {
        more: () => {
            const answers = data.data;
            return (
                `
                <p>${data.description}</p>
                <ul>
                    ${answers.map(item => `<li><a href="#" class="question">${item.question}</a></li>`)
                        .reduce((prevVal, nextVal) => prevVal + nextVal)}
                </ul>
                `
            );
        },
        one: () => {
            return `<p>${data.data.answer}</p>`;
        },
        none: () => {
            return `<p>${data.data.answer}</p>`;
        }
    };

    return (action[data.action])();
};


/** INTERACTIONS */

$(buttonLauncher).on('click', () => {
    animateChat(400);
    $(buttonClose).show();
});

$(buttonClose).on('click', () => {
    animateChat(46);
    $(buttonClose).hide();
});

$(chatContainer).on('click', questionFeedback, (e) => {
    e.preventDefault();
    sendQuestion($(e.target).text());
});

$(buttonSend).on('click', () => {
    const questionInput = $(questionTextarea);
    const message = questionInput.val().replace(/(<([^>]+)>)/ig,"");
    if (message !== '') {
        questionInput.val('');
        sendQuestion(message);
    } else {
        questionInput.focus();
    }
});
