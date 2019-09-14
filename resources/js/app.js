/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.WordCloud = require('wordcloud');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.config.productionTip = false;

const app = new Vue({
    el: '#app',
});

window.onload = function(){
    // var wordcloud2List = [['Python',4],['Laravel',9],['Materialize',6],['Bootstrap', 9], ['jQuery', 5], ['Vagrant', 5], ['PHP', 12], ['C#', 10], ['CSS', 8], ['JavaScript', 8], ['C++', 6], ['MySQL', 5], ['Java', 4], ['Windows', 9], ['Linux', 7], ['MS Office', 6], ['HTML', 11], ['Adobe CC', 6]];
    var wordcloud2List = [];



    $("#wordcloud").children("p.wordcloud2List").each(function( index ) {
        wordcloud2List.push([$(this).children()[0].innerText, $(this).children()[1].innerText]);
    });

    var wc2ListFG = $("#wordcloud").children("p.fg")[0].innerText;
    var wc2ListBG = $("#wordcloud").children("p.bg")[0].innerText;

    var widthBefore = $(window).width();
    function InitWC(){
        WordCloud(document.getElementById('wordcloud'), {
            list: wordcloud2List,
            color: wc2ListFG,
            backgroundColor: wc2ListBG,
            shape: 'circle',
            weightFactor:function (size) {
                return size*($("#wordcloud").width()/100);
            }
        });
    }
    InitWC();
    $(window).resize(function() {
        if(this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function() {
            $(this).trigger('resizeEnd');
        }, 500);
    });
    $(window).bind('resizeEnd', function() {
        if(Math.abs(widthBefore - $(window).width()) > 10){
            InitWC();
        }
        widthBefore = $(window).width();
    });
};