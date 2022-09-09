require('./bootstrap');
require('./categorias');
require('./preguntasFrecuentes');

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'
 

import "@fortawesome/fontawesome-free/js/all";

window.Alpine = Alpine;

Alpine.plugin(persist)
Alpine.start();