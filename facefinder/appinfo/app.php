<?php

/**
* ownCloud - facefinder
*
* @author Aaron Messner
* @copyright 2012 Aaron Messner aaron.messner@stuudent.uibk.ac.at
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Lesser General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/


// OCP\Share::registerBackend('photo', new OC_Share_Backend_Photo());

//$l = OC_L10N::get('gallery');

OCP\App::addNavigationEntry( array(
 'id' => 'facefinder',
 'order' => 20,
 'href' => OCP\Util::linkTo('facefinder', 'index.php'),
 'icon' => OCP\Util::imagePath('core', 'places/picture.svg'),
 'name' => "FaceFinder"
));

