// import external dependencies
import 'jquery';
//import 'slick-carousel/slick/slick.min';

import 'tiny-slider/src/tiny-slider.js';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import optOut from './routes/optOut';
import careers from './routes/careers';
import archive from './routes/archive';
import templateDataAccess from './routes/templateDataAccess';
import gforms from './routes/gforms';
// import marketo from './routes/marketo';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // common - all pages
  common,
  // gforms - all pages
  gforms,
  // marketo - all pages
  // marketo,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  careers,
  archive,
  optOut,
  templateDataAccess,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
