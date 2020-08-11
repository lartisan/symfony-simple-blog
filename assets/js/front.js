/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (admin.css in this case)
import '../css/front.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';

require('bootstrap');

console.log('Hello Webpack Encore! Edit me in assets/js/front.js');

$(document).ready(function () {
    $('#front_comments_form').submit(function (e) {
        e.preventDefault();

        var action = $(this).attr('action');
        var form_data = $(this).serialize();

        $.ajax({
            url : action,
            type: "POST",
            data : form_data
        }).done(function() {
            location.reload();
        });
    });
});
