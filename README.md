[![Stories in Ready](https://badge.waffle.io/Digital-Peak-Incubator/tpl_tauristar.png?label=ready&title=Ready)](https://waffle.io/Digital-Peak-Incubator/tpl_tauristar)
Joomla! CMS™ [![Analytics](https://ga-beacon.appspot.com/UA-544070-3/joomla-cms/readme)](https://github.com/igrigorik/ga-beacon)
====================

Build Status
---------------------
Travis-CI: [![Build Status](https://travis-ci.org/Digital-Peak-Incubator/tpl_tauristar.svg?branch=staging)](https://travis-ci.org/Digital-Peak-Incubator/tpl_tauristar)

What is this?
---------------------
This repository shows an approach how to introduce CSS/JS frameworks like bootstrap 3 or font awesome into the current Joomla version.

How to get started?
---------------------
Install Joomla as usual by downloading it from this repository. As default template is tauristar set, which loads the bootstrap 3 framework without any customziation.

You can install the sample blog data on the last installation screen or create some sample articles by yourself.

What is new?
---------------------
Layouts are loaded with prefixes like bs3 to define which framework should be loaded. For example when protostar is activated, then the file (default.bs3.php)[modules/mod_menu/tmpl/default.bs3.php] is loaded instead of the (default.php)[modules/mod_menu/tmpl/default.php] file. The same works for component views and JLayouts.

How to contribute?
---------------------
Play around with the installation and convert some layout files to bootstrap 3., DOn't forget to open a pull request!! 

Copyright
---------------------
* Copyright (C) 2005 - 2016 Open Source Matters. All rights reserved.
* [Special Thanks](https://docs.joomla.org/Joomla!_Credits_and_Thanks)
* Distributed under the GNU General Public License version 2 or later
* See [License details](https://docs.joomla.org/Joomla_Licenses)
