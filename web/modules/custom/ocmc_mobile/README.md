# Overview

OCMC Mobile ships a new field type "URL" which allows an administrator to add
links that will be used in the mobile app.

# Installation

Install as you would normally install a contributed Drupal module. See
https://www.drupal.org/docs/8/extending-drupal-8/installing-modules for further
information.

# Configuration

Go to admin/structure/ocmc_mobile_app_link and create a mobile app link.

# Usage

- Add new OCMC Mobile App Link in the OCMC Mobile app configurations page.

# How It Works

Once a mobile app link gets added to the list, a JSONAPI endpoint is created to allow
the app developers to read and use within the mobile app. Once a link gets added,
notify the mobile app team so that they know where and how to retrieve it and what it
will be used for.

# Requirements

- Drupal Core 8.7.7+ or 9.0+.
