'use strict'

import {removeDataProperties, carruselImg} from './modules/PropertiesCard.js';
import {selectedOptions, checkedRadio, disabledInput, selectCheckbox} from './modules/SearchFilter.js';


/* Card properies 
=============================================================== */
removeDataProperties('[data-expenses]');
removeDataProperties('[data-total-area]');
removeDataProperties('[data-rooms]');
removeDataProperties('[data-bedrooms]');
removeDataProperties('[data-bathrooms]');
removeDataProperties('[data-garage]');

carruselImg('.card-property-images', '.img-prev' , '.img-next')


/* Search filter
=============================================================== */

checkedRadio('search-contract')
// checkedRadio('search-currency'); disable html element in DOM

// selectedOptions('[name="type"]');
selectedOptions('[name="rooms"]');
selectedOptions('[name="bedrooms"]');
selectCheckbox('[data-type-checkbox]');

disabledInput('[name="bedrooms"]', '[data-type-checkbox]');
disabledInput('[name="rooms"]', '[data-type-checkbox]');
