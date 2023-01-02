<?php
if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

/**
 * License Classes
 */
class Simple_wp_License
{
    /**
     * alias for license server url
     * 
     * @since 1.0.0
     * @var string
     */
    const SERVER = 'https://app.digitalkit.id';

    /**
     * alias for license ID
     * 
     * @since 1.0.0
     */
    private $id = '56UPL8BTAU';

    /**
     * api url
     */
    private $api;

    /**
     * this site host
     */
    private $host;

    /**
     * license code
     */
    private $code = '';

    /**
     * license key
     */
    private $key;

    /**
     * license data
     */
    private $data = [];

    private static $instance =  null;

    /**
     * Instance.
     *
     * Ensures only one instance of the renew class is loaded or can be loaded.
     *
     * @since 1.0.0
     * @access public
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * construction
     *
     */
    public function __construct()
    {
        $this->api = self::SERVER . '/wp-json/salesloo/v1/file/license';
        $this->host = preg_replace('(^https?://)', '', site_url());
        $this->key = '__simple_wplcns';
        $this->data();
    }

    public function encrypt($string)
    {
        $secret_key = AUTH_KEY;
        $secret_iv = AUTH_SALT;

        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        return base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    }

    public function decrypt($string)
    {
        $secret_key = AUTH_KEY;
        $secret_iv = AUTH_SALT;

        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        return openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    /**
     * data
     * 
     * get data from database;
     * 
     * @since 1.0.0
     * @return mixed
     */
    public function data()
    {
        $option = get_option($this->key);

        if (empty($option)) return $this;

        $this->data = json_decode($this->decrypt($option), true);

        return $this;
    }

    /**
     * getter
     * @param  string $name
     * @return mixed
     */
    public function __get($name)
    {
        $value = NULL;

        if (array_key_exists($name, (array)$this->data))
            $value = maybe_unserialize($this->data[$name]);

        return $name == 'status' ? intval($value) : $value;
    }

    /**
     * update_option
     *
     * @param  mixed $result
     * @return void
     */
    private function update_option($result)
    {
        wp_cache_delete($this->key, 'options');
        update_option($this->key, $this->encrypt(json_encode($result)));
    }

    /**
     * Register Menu
     * 
     * register manage license menu
     * 
     * @return array
     */
    public function menu()
    {
        add_menu_page(
            __('Simple_wp', 'simple_wp'),
            __('Simple_wp', 'simple_wp'),
            'manage_options',
            'simple_wp',
            [$this, 'page'],
            '',
            10
        );
    }

    /**
     * show menu page
     */
    public function page()
    {
        echo '<div class="wrap">';
        echo '<h2>' . __('License', 'simple_wp') . '</h2>';
        echo '<form action="" method="post" enctype="multipart/form-data" style="margin-top:30px">';
        wp_nonce_field('__simple_wp_activate', '__activate');

        $readonly = '';
        $value = '';

        $this->data();

        if ($this->status == 200 && $this->purchase_code) {
            $readonly = 'readonly';
            $value = substr_replace($this->purchase_code, '************************', 3, 24);
        }

        ob_start();
?>
        <div class="simple_wp-field default">
            <div class="simple_wp-field-label">
                <label><?php _e('Purchase Code', 'simple_wp'); ?></label>
            </div>
            <div class="simple_wp-field-input">
                <div class="simple_wp-field__text">
                    <input type="text" name="purchase_code" class="regular-text" value="<?php echo $value; ?>" <?php echo $readonly; ?>>
                    <p class="description"><?php echo sprintf('<a href="https://app.digitalkit.id/dashboard/" target="__blank">%s</a> %s', __('Click Here', 'simple_wp'), __('to get purchase code')); ?></p>
                </div>
                <p class="description"></p>
            </div>
        </div>

        <div class="simple_wp-field default">
            <div class="simple_wp-field-label">
                &nbsp;
            </div>
            <div class="simple_wp-field-input">
                <div class="simple_wp-field__text">
                    <?php if ($this->status != 200) : ?>
                        <input type="submit" class="button button-primary" name="action" value="Activate">
                    <?php else : ?>
                        <input type="submit" class="button button-primary" name="action" value="Deactivate">
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php
        $html = ob_get_clean();

        $status = sprintf('<span style="color:red">%s</span>', 'Inactive');
        $information = $this->message;

        if ($this->status == 200) {
            $status = sprintf('<span style="color:green">%s</span>', 'Active');
            $information .= '<br/> ' . sprintf(__('Your License expired on: %s', 'simple_wp'),  $this->expired_at);
            $information .= '<br/>' . sprintf(__('Your license has a limit of %s and be used %s', 'simple_wp'), $this->license['limit'], $this->license['used']);
        }

        echo "Your License Status : " . $status . "<br>";
        echo $information;
        echo $html;

        echo '</form>';
        echo '</div>';
    }

    /**
     * action submit
     *
     * @return void
     */
    public function on_save_action()
    {

        if (isset($_POST['__activate']) && wp_verify_nonce($_POST['__activate'], '__simple_wp_activate')) {
            if ($_POST['action'] == 'Activate') {
                $this->code = sanitize_text_field($_POST['purchase_code']);
                $this->activate();
            } else {
                $this->code = $this->purchase_code;
                $this->deactivate();
            }
        }
    }

    /**
     * api_response
     *
     * @param  mixed $response
     * @return mixed
     */
    private function api_response($response)
    {
        if (!is_wp_error($response)) {
            $result   = json_decode(wp_remote_retrieve_body($response), true);
            $code = intval(wp_remote_retrieve_response_code($response));
        } else {
            $result = [
                'status' => 999,
                'message' => $response->get_error_message()
            ];
        }

        return $result;
    }

    /**
     * activate 
     * 
     * activate the license
     *
     * @return mixed
     */
    private function activate()
    {
        $server = add_query_arg([
            'purchase_code' => $this->code,
            'id'            => $this->id,
            'host'          => $this->host
        ], $this->api);

        $result = $this->api_response(wp_remote_post($server));

        if (isset($result['message'])) {
            add_action('admin_notices', function () use ($result) {
                echo '<div id="message" class="notice notice-success"><p><strong>' . $result['message'] . '</strong></p></div>';
            });
        }

        if (isset($result['status']) && intval($result['status']) != 999) {
            $this->update_option($result);
        }

        return true;
    }

    /**
     * delete
     * 
     * delete the license
     *
     * @return void
     */
    private function deactivate()
    {
        $server = add_query_arg([
            'purchase_code' => $this->code,
            'id'            => $this->id,
            'host'          => $this->host
        ], $this->api);

        $result = $this->api_response(
            wp_remote_request(
                $server,
                ['method' => 'DELETE']
            )
        );

        if (isset($result['status']) && intval($result['status']) == 200) {

            unset($result['status']);
            $this->update_option($result);
        }

        if (isset($result['message'])) {
            add_action('admin_notices', function () use ($result) {
                echo '<div id="message" class="notice notice-error"><p><strong>' . $result['message'] . '</strong></p></div>';
            });
        }

        return true;
    }

    /**
     * check
     * 
     * checking the license
     * 
     * @return void
     */
    private function check()
    {
        $server = add_query_arg([
            'purchase_code' => $this->code,
            'id'            => $this->id,
            'host'          => $this->host
        ], $this->api);

        $result = $this->api_response(wp_remote_get($server));

        if (isset($result['status']) && intval($result['status']) != 999) {
            $this->update_option($result);
        }

        return true;
    }

    /**
     * periodic_check
     * 
     * on license periodic check
     *
     * @return void
     */
    public function periodic_check()
    {
        if ($this->purchase_code && $this->status == 200) {
            $this->code = $this->purchase_code;
            $this->check();
        }
    }
}
