<?php
/**
 * Created by PhpStorm.
 * User: vallabh
 * Date: 04/07/15
 * Time: 20:29
 */

defined('BASEPATH') OR exit('No direct script access allowed');


class Mustache{

    /*
     * CI Object for the CodeIgnitor
     *
     */

    private $CI;

    /*
     * Default cache directory for the CI
     */
    private $cache;

    /*
     * $mustache is basic object of Mustache library
     * usd for this whole library.
     */

    private $mustache;

    private  $tpl;
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->cache = $this->CI->config->config['cache_path'];
        $this->mustache = new Mustache_Engine(
                array(
//            'template_class_prefix' => '__MyTemplates_',
                    'cache' => APPPATH . '/cache/mustache',
                    'cache_file_mode' => FILE_READ_MODE, // Please, configure your umask instead of doing this :)
                    'cache_lambda_templates' => true,
                    'loader' => new Mustache_Loader_FilesystemLoader(VIEWPATH),
                    'partials_loader' => new Mustache_Loader_FilesystemLoader(VIEWPATH . 'partials'),
//            'helpers' => array('i18n' => function($text) {
//                 do something translatey here...
//            }),
//            'escape' => function($value) {
//                return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
//            },
                    'charset' => 'ISO-8859-1',
                    'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
//            'strict_callables' => true,
//            'pragmas' => [Mustache_Engine::PRAGMA_FILTERS],
                )
    );
    }
    public function view($templateName = 'index',$templateData)
    {
        $localData = array(
            'site' =>array(
                'url' => base_url(),
                'name' => 'CIS Skeleton Application'
            ),
            'form' =>array(
                'open' => form_open($this->CI->uri->segment(1) .'/'. $this->CI->router->fetch_class() .'/'. $this->CI->router->fetch_method()),
                'validation' => array(
                    'errors'=> validation_errors()
                ),

            ),
        );
        $this->tpl = $this->mustache->loadTemplate($templateName);
        echo $this->tpl->render(array_merge($templateData,$localData));
    }

}