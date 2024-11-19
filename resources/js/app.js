/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

// import './bootstrap';
// require('bootstrap');
// import '../../public/assets/client/js/room.js';
import React from 'react';
import {createRoot} from 'react-dom/client';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// import './components/TemplateCV.jsx';
// import './components/TemplateViewer';
import CV from './components/CV';
import ReviewCV from './components/ReviewCV';
import TemplateView from './components/TemplateView';

window.React = React;
window.createRoot = createRoot;
window.CV = CV;
window.ReviewCV = ReviewCV;
// window.Template1 = Template1;
window.TemplateView = TemplateView;
