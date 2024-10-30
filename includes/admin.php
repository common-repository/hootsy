<?php

// Output the options page
function hootsy_options_page()
{
  // Get options
  $options = get_option('Hootsy_settings');

  // Check to see if Hootsy is enabled
  $hootsy_activated = false;
  if ( esc_attr( $options['hootsy_enabled'] ) == "on" ) {
    $hootsy_activated = true;
    wp_cache_flush();
  }

?>
        <div class="wrap">
        <form name="Hootsy-form" action="options.php" method="post" enctype="multipart/form-data">
          <?php settings_fields( 'Hootsy_settings_group' ); ?>

            <h1>Hootsy</h1>
            <?php if ( $hootsy_activated ) { ?>
                <div style="margin:10px auto; border:3px #c5fbd4 solid; background-color:#ddffe6; color:#000; padding:10px; text-align:center;">
                <a href="https://app.hootsy.com" target="_blank">Click here to view active visitors in Hootsy</a>
                </div>
            <?php } ?>
            <h3>Basic Options</h3>
            <?php if ( ! $hootsy_activated ) { ?>
                <div style="margin:10px auto; border:3px #f00 solid; background-color:#fdd; color:#000; padding:10px; text-align:center;">
                Hootsy Live Chat is currently <strong>DISABLED</strong>.
                </div>
            <?php } ?>
            <?php do_settings_sections( 'Hootsy_settings_group' ); ?>

            <table class="form-table" cellspacing="2" cellpadding="5" width="100%">
                <tr>
                    <th width="30%" valign="top" style="padding-top: 10px;">
                        <label for="hootsy_enabled">Hootsy Live Chat is:</label>
                    </th>
                    <td>
                      <?php
                          echo "<select name=\"Hootsy_settings[hootsy_enabled]\"  id=\"hootsy_enabled\">\n";

                          echo "<option value=\"on\"";
                          if ( $hootsy_activated ) { echo " selected='selected'"; }
                          echo ">Enabled</option>\n";

                          echo "<option value=\"off\"";
                          if ( ! $hootsy_activated ) { echo " selected='selected'"; }
                          echo ">Disabled</option>\n";
                          echo "</select>\n";
                        ?>
                    </td>
                </tr>
            </table>
            <table class="form-table" cellspacing="2" cellpadding="5" width="100%">
            <tr>
                <th valign="top" style="padding-top: 10px;">
                    <label for="hootsy_org">Hootsy Organization Id:</label>
                </th>
                <td>
                  <input name="Hootsy_settings[hootsy_org]" type="text" value="<?php echo esc_attr( $options['hootsy_org'] ); ?>" placeholder="Org Id">
                  <p style="margin: 5px 10px;">You can find your <a href="https://app.hootsy.com/settings/menu/app" target="_blank" title="Open Hootsy Settings">Hootsy Organization Id here</a> under Install. A <a href="https://app.hootsy.com/register" target="_blank" title="Register for Hootsy">Hootsy account</a> is required to use this plugin.</p>
                </td>
            </tr>
            </table>
            <p class="submit">
                <?php echo submit_button('Save Changes'); ?>
            </p>
        </div>
        </form>

<?php
}
?>
