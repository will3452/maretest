
require('./bootstrap');

window.Vue = require('vue').default;

import { createApp } from 'vue';

import ExampleComponent from './components/ExampleComponent';

createApp({})
.component('example-component', ExampleComponent)
.mount('#app')
