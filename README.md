# Muser

Muser is a Drupal installation profile that allows you to quickly set up a site to connect undergraduate students with mentors (faculty, postdoctoral researchers, lab technicians/managers/research affiliates, and graduate students) that have projects with open research positions. Mentors can post their projects while students can browse and search for opportunities that interest them and apply directly through the site. Mentors then review applications online and accept or reject them.

## Blind Review

To help reduce unconscious bias in the initial review of applications, mentors do not see the names of the students applying when they first read their application-- they only see an essay written by the applicant. After mentors complete this initial review, they can view the full information (name, major, transcript, resume, etc.).

## Automated Emails

The Muser site can be configured to send out emails automatically to:

- Inform mentors that they can begin posting projects and let them know when the project-posting period is ending.
- Let mentors know when it's time to start reviewing applications and remind them to complete their reviews before the review period ends.
- Notify students when their applications have been accepted or rejected.

## Customizable Colors

Muser uses a custom theme that allows you to select one of various pre-set color schemes or to choose the exact colors to match your school's color palette.

# Composer template for Drupal Muser projects

This project template provides a starter kit for managing your site
dependencies with [Composer](https://getcomposer.org/).

It is based on  drupal/recommended-project :
https://github.com/drupal/recommended-project

## Usage

First you need to [install composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).

> Note: The instructions below refer to the [global composer installation](https://getcomposer.org/doc/00-intro.md#globally).
You might need to replace `composer` with `php composer.phar` (or similar) 
for your setup.

After that you can create the project:

```shell
cd your-muser-base-directory
composer create-project jaybeaton/muser-drupal-project:9.x-dev . --no-interaction
```

With `composer require ...` you can download new dependencies to your 
installation.

```shell
cd some-dir
composer require drupal/devel:~1.0
```

The `composer create-project` command passes ownership of all files to the 
project that is created. You should create a new git repository, and commit 
all files not excluded by the .gitignore file.

## What does the template do?

When installing the given `composer.json` some tasks are taken care of:

* Drupal will be installed in the `web` directory.
* Modules (packages of type `drupal-module`) will be placed in `web/modules/contrib/`
* Theme (packages of type `drupal-theme`) will be placed in `web/themes/contrib/`
* Profiles (packages of type `drupal-profile`) will be placed in `web/profiles/`
* Creates `web/sites/default/files` directory.
* Creates `./private-files` directory.

# After installing the code

After installing the Muser site code, you will need to perform the normal tasks associated
with setting up any Drupal site including creaing a database, creating a `settings.php`
and (possibly) a `settings.local.php` file, etc.

You can then install the Drupal Muser site by visiting your site in a browser and running
through the Drupal installation steps.

# After installing the site

Once the Muser site is installed, you will need to set up several cron jobs to keep the
system's "current round" up to date and to send automated emails. These are in addition
to any standard Drupal cron jobs.

Example crontab additions (assuming the document root for the Muser site is `/app/web`):

```shell
# Check and set the current Round.
* * * * * cd /app/web && drush muser_system:set-current-round > /dev/null 2>&1
# Check for and send scheduled emails.
* * * * * cd /app/web && drush muser_system:send-scheduled-emails > /dev/null 2>&1
# Run queue_mail queue worker.
* * * * * cd /app/web && drush queue:run queue_mail > /dev/null 2>&1
```

You may need to modify these for your server.

In order to allow the site to actually send automated emails, you will need to edit your
`settings.php` / `settings.local.php` and set `$settings['do_not_send_scheduled_emails']`
to `FALSE`.
