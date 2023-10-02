<?php
class DyanmicCss {
    public function __construct() {
        // Add hooks for enqueuing scripts and initializing rewrite rules
        add_action('init', array($this, 'initRewriteRules'));
        add_action('wp_enqueue_scripts', array($this, 'enqueueDynamicCss'), 11);
        add_action('template_redirect', array($this, 'handleDynamicCssRequest'));
    }
    public function enqueueDynamicCss() {
        wp_enqueue_style('dynamic-css', home_url() . '/kdynamiccss/dynamic_css' .'?action=dynamic_css', '', '1.0');
    }
    public function handleDynamicCssRequest() {
        global $wp_query;
        $method = $wp_query->get('rewrite_kaveh_dynamic_cc');
        if (!$method) {
            return;
        }
        if ($method === 'dynamic_css') {
            require(get_template_directory() . '/custom.css.php');
            exit;
        }
    }
    public function initRewriteRules() {
        add_rewrite_tag('%rewrite_kaveh_dynamic_cc%', '([^&/]+)');
        add_rewrite_rule('kdynamiccss/?([^/]*)', 'index.php?rewrite_kaveh_dynamic_cc=$matches[1]', 'top');
    }
}
$dynamic_css = new DyanmicCss();




