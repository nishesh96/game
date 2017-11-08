/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function () {
    var list = $('#chip-list'),
        levelLabel = $('#level'),
        gameBoardComponent = $('#game-board'),
        current = 0,
        startTime, endTime;
    levelLabel.text('Level ' + (current + 1));
    var userInput = [{
        'section-1': {},
        'section-2': {},
    }, {
        'section-1': {},
        'section-2': {},
    }, {
        'section-1': {},
        'section-2': {},
    }];
    var constUserInput = $.extend(true, {}, userInput);
    $('.category-section').droppable({
        drop: function (e, ui) {
            userInput[current][e.target.id][ui.draggable[0].innerText] = true;
        },
        out: function (e, ui) {
            delete userInput[current][e.target.id][ui.draggable[0].innerText];
        }
    });
    var startButton = $('#start')
        .on('click', function () {
            current = 0;
            gameBoardComponent.addClass('active');
            startButton.hide();
            initLevel();
        })
    var nextButton = $('#next')
        .on('click', function () {
            if ((Object.keys(userInput[current]['section-1']).length + Object.keys(userInput[current]['section-2']).length) == userInput[current].words.length) {
                userInput[current].duration = Date.now() - startTime;
                if (current < 2) {
                    list.html('');
                    initLevel();
                    current++;
                    levelLabel.text('Level ' + (current + 1));
                    if (current == 2) {
                        nextButton.text('Finish');
                    }
                } else
                    findResult();
            } else {
                alert('All words need to be separated before proceeding')
            }
        });

    function findResult() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var payload = $.extend({}, {
            data: userInput.map(function (item) {
                return {
                    category1: Object.keys(item['section-1']),
                    category2: Object.keys(item['section-2']),
                    words: item.words,
                    duration: item.duration
                };
            }),
            _token: CSRF_TOKEN
        });
        var config = {
            url: '/game_submit',
            type: 'POST',
            data: JSON.stringify(payload),
            contentType: "application/json; charset=utf-8",
            dataType: 'json',
            success: function (result) {
                console.log(result);
                userInput = $.extend(true, {}, constUserInput);
            }
        };
        $.ajax(config)
    };

    function initLevel() {
        $.ajax({
            url: '/game_words',
            dataType: 'json',
            success: function (result) {
                userInput[current].words = result;
                userInput[current].words.forEach(function (item) {
                    list.append('<span class="chip">' + item + '</span>');
                });
                $('.chip').draggable();
                startTime = Date.now();
            }
        });
    }
});