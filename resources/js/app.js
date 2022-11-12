require('./bootstrap');

import Alpine from 'alpinejs';
import Settings from './components/settings';
import './components/jscolor';
import './components/quotes';
import './components/search';
window.Alpine = Alpine;
Alpine.start();


document.addEventListener('DOMContentLoaded', e => {
    const settings = new Settings().init()

})
