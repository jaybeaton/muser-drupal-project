
/************************************************
* Muser settings.
************************************************/

/**
 * Set this to TRUE to ignore all date restrictions (e.g. allow project editing
 * outside of specified project-posting time period).
 * For platform.sh:  drupal:ignore_date_checking
 */
$settings['ignore_date_checking'] = FALSE;

/**
 * Set this to TRUE to prevent the site from actually sending scheduled emails.
 * It will still mark them as "sent" on the Round entity.
 * For platform.sh:  drupal:do_not_send_scheduled_emails
 */
$settings['do_not_send_scheduled_emails'] = TRUE;

/**
 * Set this to TRUE to allow admin users to set/edit "Is current" and
 * "X email sent" fields on Rounds.  Note that this *should not* be used to
 * actually set a round to "current".  This should be done via the normal
 * process (the muser_system_set_current_round() function).
 * For platform.sh:  drupal:manage_all_round_fields
 */
$settings['manage_all_round_fields'] = FALSE;

// Custom colorsets for the theme may be added here or with
// hook_muser_colorsets_alter(). Example:
/*
$settings['custom_colorsets'] = [
  'colorset_ocean' => [
    'name' => 'Ocean (Blue)',
    'PRIMARY_COLOR' => '#001A57',
    'SECONDARY_COLOR' => '#339898',
    'BACKGROUND_COLOR' => '#F3F2F1',
    'TITLE_COLOR' => '#001A57',
    'TEXT_COLOR' => '#262626',
    'MESSAGE_ERROR_BG' => '#C84E00',
    'MESSAGE_WARNING_BG' => '#E89923',
    'MESSAGE_STATUS_BG' => '#A1B70D',
    'MESSAGE_ERROR_TEXT' => '#FFFFFF',
    'MESSAGE_WARNING_TEXT' => '#FFFFFF',
    'MESSAGE_STATUS_TEXT' => '#FFFFFF',
    'TEXT_OVER_PRIMARY' => '#FFFFFF',
    'TEXT_OVER_SECONDARY' => '#FFFFFF',
    'PRIMARY_TEXT_OVER_WHITE' => 'var(--primary)',
    'SECONDARY_TEXT_OVER_WHITE' => 'var(--secondary)',
  ],
];
*/

